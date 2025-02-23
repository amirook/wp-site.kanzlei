<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

namespace OMGF\Pro\Frontend\Optimize;

use OMGF\Pro\Admin\Settings;
use OMGF\Pro\Frontend\Optimize;
use OMGF\Pro\Wrapper;

class ExternalStylesheets extends Optimize {
	/**
	 * @since v3.3.0 Contains an array of processed stylesheets to speed up processing on pageload.
	 * @var array $processed_external_stylesheets
	 */
	private $processed_external_stylesheets = [];

	/**
	 * Build properties.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->processed_external_stylesheets = Wrapper::get_option( Settings::OMGF_PRO_PROCESSED_EXT_STYLESHEETS, [] ) ?: [];

		parent::__construct( false );

		$this->init();
	}

	/**
	 * @return void
	 */
	private function init() {
		add_filter( 'omgf_pro_process_import_full_matches', [ $this, 'add_import_full_matches' ], 10, 2 );
		add_filter( 'omgf_pro_process_import_urls', [ $this, 'add_import_urls' ], 10, 2 );
	}

	/**
	 * @param $full_matches
	 * @param $contents
	 *
	 * @return mixed
	 */
	public function add_import_full_matches( $full_matches, $contents ) {
		$imports = $this->match_imports( $contents );

		if ( ! empty( $imports[ 0 ] ) ) {
			$full_matches = array_merge( $full_matches, $imports[ 0 ] );
		}

		Wrapper::debug_array( 'added import full matches to filter', $full_matches );

		return $full_matches;
	}

	/**
	 * Match all @import statements in $contents.
	 *
	 * @param $contents
	 *
	 * @return array
	 */
	private function match_imports( $contents ) {
		preg_match_all( '/@import(?:(?!@import).)\s?([\'"]|url\([\'"]?)(?P<urls>.+?[^\'")]|.+?)[\'")]{1,2}/', $contents, $imports );

		Wrapper::debug_array( 'matched imports', $imports );

		return $imports;
	}

	/**
	 * @param $urls
	 * @param $contents
	 *
	 * @return array
	 */
	public function add_import_urls( $urls, $contents ) {
		$imports = $this->match_imports( $contents );

		if ( ! empty( $imports[ 'urls' ] ) ) {
			$urls = array_merge( $urls, $imports[ 'urls' ] );
		}

		Wrapper::debug_array( 'added import url matches to filter', $urls );

		return $urls;
	}

	/**
	 * Check for @import and @font-face statements inside external stylesheets.
	 * Rewrite them to use local copies and cache them.
	 *
	 * @param string $html
	 *
	 * @return string
	 * @throws \TypeError
	 */
	public function optimize( $html ) {
		$search  = [];
		$replace = [];

		/**
		 * @since v3.7.6 Prevent unnecessary writes to the database, by having something to compare to.
		 */
		$processed_ext_stylesheets = $this->processed_external_stylesheets;

		/**
		 * @since v3.4.5 Use lookaround for stricter matches.
		 */
		preg_match_all( '/(?=<link).+?href=[\'"](?P<urls>[a-zA-Z0-9;,\/?:@&=+$\-_.!~*\'()#]+?)[\'"].+?(?<=>)/', $html, $links );

		/**
		 * @see          https://stackoverflow.com/a/27396794/4949411
		 * @since        v3.7.0 This matches with SSL, non-SSL and relative references in the following syntax's:
		 *               - @import url('');
		 *               - @import url();
		 *               - @import '';
		 *               This does NOT match e.g. @import https://domain.com/example; (i.e. no quotes) simply because I can't imagine that that's
		 *               valid CSS. If it is, we'll find out soon enough.
		 *               the "(?:(?!@import).)" part is a negative lookahead assertion, and makes sure the match is as short as possible (from the
		 *               end), i.e. match @import as long as it's not followed by another @import.
		 */
		$imports = $this->match_imports( $html );

		if ( empty( $links[ 'urls' ] ) && empty ( $imports[ 'urls' ] ) ) {
			return $html;
		}

		$full_matches = array_merge( $links[ 0 ], $imports[ 0 ] );
		$urls         = array_merge( $links[ 'urls' ], $imports[ 'urls' ] );

		foreach ( $urls as $i => $url ) {
			/**
			 * Check if full match is a stylesheet or an @import statement.
			 */
			if ( ! preg_match( '/rel=[\'"]stylesheet[\'"]/', $full_matches[ $i ] ) && ! str_contains( $full_matches[ $i ], '@import' ) ) {
				continue;
			}

			/**
			 * Double check if this is a (protocol relative) URL.
			 */
			if ( ! str_starts_with( $url, '//' ) && ! str_starts_with( $url, 'http' ) ) {
				continue; // @codeCoverageIgnore
			}

			$fixed_url = $url;

			/**
			 * Check if URL is protocol relative and fix it.
			 */
			if ( str_starts_with( $url, '//' ) ) {
				$fixed_url = ( is_ssl() ? 'https:' : 'http:' ) . $url; // @codeCoverageIgnore
			}

			/**
			 * This class only process external stylesheets.
			 */
			if ( str_contains( $fixed_url, get_home_url() ) ) {
				continue; // @codeCoverageIgnore
			}

			/**
			 * This is only used for the eventual search/replace. Nothing else.
			 */
			$full_url  = $url;
			$url_parts = parse_url( $fixed_url );

			/**
			 * @since v3.7.6 Fixes [OP-84]: Remove any query parameters from $url. To make sure no duplicate entires are saved in
			 *                              processed_external_stylesheets.
			 */
			$url = $url_parts[ 'scheme' ] . '//' . $url_parts[ 'host' ] . $url_parts[ 'path' ];

			/**
			 * To avoid collisions on servers that have allow_url_fopen disabled, we fetch the contents using absolute paths.
			 *
			 * @since v3.4.4 using content_url is warranted, because we need to insert the path to OMGF (Pro)'s upload dir.
			 * @since v3.6.0 Use a preg_replace() to remove any present query parameters from local paths ($local_path and $cache_path)
			 *               Query parameters are allowed in URLs.
			 * @since v3.7.6 Fixes [OP-84]: Query parameters are removed from $cached_file_path, because we also remove it from $url. It's not like
			 *                              we remove them from the source code, so any present parameters will remain intact.
			 */
			$cached_file_path = trailingslashit( Wrapper::get_upload_dir() ) . $url_parts[ 'host' ] . $url_parts[ 'path' ];
			$cached_file_url  = trailingslashit( Wrapper::get_upload_url() ) . $url_parts[ 'host' ] . $url_parts[ 'path' ];

			/**
			 * If this stylesheet has been cached previously, assume nothing has changed and continue to the next.
			 */
			if ( ! $this->force_optimize && file_exists( $cached_file_path ) && in_array( $url, $processed_ext_stylesheets, true ) ) {
				// Append/replace the `ver` parameter to bust browser cache when server cache is refreshed.
				$mod_time        = filemtime( $cached_file_path );
				$cached_file_url = add_query_arg( [ 'ver' => $mod_time, 'cached' => true ], $cached_file_url );

				$search[ $i ]  = $full_url;
				$replace[ $i ] = $cached_file_url;

				continue;
			}

			/**
			 * @since v3.6.0 If file wasn't cached, but origin file does exist, and it was processed before, bail!
			 */
			if ( ! $this->force_optimize && ! file_exists( $cached_file_path ) && in_array( $url, $processed_ext_stylesheets, true ) ) {
				continue; // @codeCoverageIgnore
			}

			$response      = wp_remote_get( $full_url );
			$contents      = wp_remote_retrieve_body( ( $response ) );
			$response_code = wp_remote_retrieve_response_code( $response );
			$comparison    = $contents;

			if ( is_wp_error( $contents ) || $response_code !== 200 ) {
				continue; // @codeCoverageIgnore
			}

			/**
			 * @since v3.6.0 Mark it as processed, before going through it all.
			 */
			if ( ! in_array( $url, $processed_ext_stylesheets, true ) && ! is_dir( $cached_file_path ) ) {
				$processed_ext_stylesheets[] = $url;
			}

			if ( ! $contents ) {
				continue; // @codeCoverageIgnore
			}

			/**
			 * @since v3.7.0 Always run if Auto Config is enabled.
			 */
			if ( $this->auto_config || ! empty( Wrapper::get_option( Settings::OMGF_DETECTION_SETTING_PROCESS_EXTERNAL_STYLESHEETS ) ) ) {
				// TODO: [OP-62] Add user friendly handles (including stylesheet ID, if any) + migration script.
				$contents = $this->process_imports( $contents, 'ext-stylesheet-import' );
				$contents = $this->process_font_faces( $contents, 'ext-stylesheet-font-face' );
			}

			/**
			 * @since v3.7.0 Don't run Fallback Font Stacks if Auto Config (and Save & Optimize) is running to prevent false
			 *               positives for Process Local Stylesheets.
			 */
			if ( ! $this->auto_config && ! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK ) ) ) {
				$contents = $this->process_fallback_font_stacks( $contents ); // @codeCoverageIgnore
			}

			/**
			 * @since v3.7.0 Don't run Force Font Display if Auto Config (and Save & Optimize) is running to prevent false
			 *               positives for Force Font Display.
			 */
			if ( ! $this->auto_config && ! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY ) ) ) {
				$contents = $this->process_force_font_display( $contents ); // @codeCoverageIgnore
			}

			/**
			 * No need to cache it, if we didn't change anything.
			 */
			if ( $comparison === $contents ) {
				continue; // @codeCoverageIgnore
			}

			/**
			 * Now we're sure that contents in the stylesheet have changed, and it needs to be cached, convert relative to absolute URLs (if needed)
			 *
			 * @since v3.7.3 Set the $fixed_url to be protocol relative to avoid mixed content warnings related to
			 *               outdated permalinks and other SSL-related WordPress quirks.
			 */
			$contents  = $this->maybe_convert_rel_url_to_abs( $contents, str_replace( [ 'http:', 'https:' ], '', $fixed_url ) );
			$filename  = basename( $cached_file_path );
			$cache_dir = str_replace( $filename, '', $cached_file_path );

			if ( ! file_exists( str_replace( $filename, '', $cached_file_path ) ) ) {
				wp_mkdir_p( $cache_dir );
			}

			$write = file_put_contents( $cached_file_path, $contents );

			if ( ! $write ) {
				// TODO: [OP-53] Examine if it's needed to throw an error if writing contents failed.
				continue; // @codeCoverageIgnore
			}

			/**
			 * Let's append/replace the `ver` parameter to bust browser cache when server cache is refreshed.
			 */
			$mod_time        = filemtime( $cached_file_path );
			$cached_file_url = add_query_arg( [ 'ver' => $mod_time ], $cached_file_url );

			$search[ $i ]  = $full_url;
			$replace[ $i ] = $cached_file_url;
		}

		/**
		 * @since v3.7.6 Prevent unnecessary writes to the database by comparing the updated array with the original copy from the database.
		 */
		if ( ! empty( array_diff( $processed_ext_stylesheets, $this->processed_external_stylesheets ) ) ) {
			Wrapper::update_option( Settings::OMGF_PRO_PROCESSED_EXT_STYLESHEETS, $processed_ext_stylesheets );
		}

		if ( empty( $search ) || empty( $replace ) ) {
			return $html; // @codeCoverageIgnore
		}

		return str_replace( $search, $replace, $html );
	}
}
