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

class LocalStylesheets extends Optimize {
	/**
	 * @since v3.3.0 Contains an array of processed stylesheets to speed up processing on pageload.
	 * @var array $processed_local_stylesheets
	 */
	private $processed_local_stylesheets = [];

	/**
	 * @since  v3.6.2 Provides an easy interface to add additional handles used by themes/plugins to generate dynamic CSS.
	 * @filter omgf_pro_optimize_dynamic_css_handles
	 * @var array $dynamic_css_handles
	 */
	private $dynamic_css_handles = [];

	/**
	 * Build properties.
	 *
	 * @return void
	 */
	public function __construct() {
		// phpcs:ignore
		$this->processed_local_stylesheets = Wrapper::get_option( Settings::OMGF_PRO_PROCESSED_STYLESHEETS, [] ) ?: [];
		// TODO: [OP-65] Write documentation about how to use this handle.
		$this->dynamic_css_handles = apply_filters( 'omgf_pro_optimize_dynamic_css_handles', [ 'load', 'action', 'custom-css' ] );

		parent::__construct( false );
	}

	/**
	 * Check for @import and @font-face statements inside local stylesheets.
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
		$processed_local_stylesheets = $this->processed_local_stylesheets;

		/**
		 * @since v3.4.5 Use lookaround for stricter matches.
		 */
		preg_match_all( '/(?=<link).+?href=[\'"](?P<urls>.+?)[\'"].+?(?<=>)/', $html, $links );

		if ( empty( $links[ 'urls' ] ) ) {
			return $html; // @codeCoverageIgnore
		}

		foreach ( $links[ 'urls' ] as $i => $url ) {
			/**
			 * Check if full match is a stylesheet.
			 */
			if ( ! preg_match( '/rel=[\'"]stylesheet[\'"]/', $links[ 0 ][ $i ] ) ) {
				continue;
			}

			/**
			 * There's no need to check inside either core or stylesheets we generated ourselves.
			 */
			if ( ( ! str_contains( $url, get_home_url() ) && ! str_starts_with( $url, '/' ) ) ||
				str_contains( $url, 'wp-includes' ) ||
				str_contains( $url, Wrapper::get_upload_url() ) ) {
				continue;
			}

			/**
			 * This is only used for the eventual search/replace. Nothing else.
			 */
			$full_url = $url;

			/**
			 * Fix for protocol relative URLs.
			 */
			$fixed_url = $url;

			/**
			 * @since v3.7.6 Fixes [OP-84]: Remove any query parameters from $url. To make sure no duplicate entries are saved in
			 *                              processed_local_stylesheets.
			 */
			$url = preg_replace( '/\?.*$/', '', $url );

			/**
			 * Check if URL is protocol relative and fix it.
			 */
			if ( str_starts_with( $url, '//' ) ) {
				$fixed_url = ( is_ssl() ? 'https:' : 'http:' ) . $url; // @codeCoverageIgnore
			}

			/**
			 * @since v3.6.0 Check if URL is relative and fix it.
			 */
			if ( preg_match( '/^\/[a-zA-Z0-9]+/', $fixed_url ) === 1 ) {
				$fixed_url = get_home_url() . $fixed_url; // @codeCoverageIgnore
			}

			/**
			 * To avoid collisions on servers that have allow_url_fopen disabled, we fetch the
			 * contents using absolute paths.
			 *
			 * @since v3.4.4 using content_url is warranted, because we need to insert the path to OMGF (Pro)'s upload dir.
			 * @since v3.6.0 Use a preg_replace() to remove any present query parameters from local paths ($local_path and $cache_path)
			 *               Query parameters are allowed in URLs.
			 * @since v3.7.6 Fixes [OP-84]: Query parameters are removed from $cache_url, because we also remove it from $url. It's not like we remove them from the
			 *               source code, so any present parameters will remain intact.
			 */
			$content_url = $this->get_content_url();
			$local_path  = apply_filters(
				'omgf_pro_local_stylesheet_local_path',
				preg_replace( '/\?.*$/', '', str_replace( $content_url, WP_CONTENT_DIR, $fixed_url ) )
			);
			$cache_path  = preg_replace( '/\?.*$/', '', str_replace( $content_url, Wrapper::get_upload_dir(), $fixed_url ) );
			$cache_url   = preg_replace( '/\?.*$/', '', str_replace( $content_url, Wrapper::get_upload_url(), $fixed_url ) );

			/**
			 * @since v3.3.2 Add compatibility for themes/plugins using dynamic CSS generator scripts.
			 */
			if ( str_contains( $fixed_url, '?' ) ) {
				$path  = wp_parse_url( $fixed_url, PHP_URL_PATH );
				$query = wp_parse_url( $fixed_url, PHP_URL_QUERY );

				foreach ( $this->dynamic_css_handles as $handle ) {
					if ( str_contains( $query, $handle ) && ! str_ends_with( $path, '.css' ) ) {
						/**
						 * If this is a (known) dynamic CSS generator, reset $local_path to URL, because we can't convert that to a local path.
						 */
						$local_path = $fixed_url;
						$cache_path = $this->convert_dynamic_css( $fixed_url, $handle );
						$cache_url  = $this->convert_dynamic_css( $fixed_url, $handle, 'url' );
					}
				}
			}

			/**
			 * @since v3.6.2 If we failed to generate a proper cache path, after all our tricks. Let's just bail.
			 *               Prevents "HTTP wrapper does not support writeable connections" errors.
			 */
			if ( str_starts_with( $cache_path, 'http' ) ) {
				continue; // @codeCoverageIgnore
			}

			/**
			 * If this stylesheet has been cached previously, assume nothing has changed and continue to the next.
			 */
			if ( ! $this->force_optimize && file_exists( $cache_path ) && in_array( $url, $processed_local_stylesheets, true ) ) {
				// Append/replace the `ver` parameter to bust browser cache when server cache is refreshed.
				$mod_time  = filemtime( $cache_path );
				$cache_url = add_query_arg( [ 'ver' => $mod_time, 'cached' => true ], $cache_url );

				$search[ $i ]  = $full_url;
				$replace[ $i ] = $cache_url;

				continue;
			}

			/**
			 * @since v3.6.0 If file wasn't cached, but origin file does exist, and it was processed before, bail!
			 */
			if ( ! $this->force_optimize &&
				! file_exists( $cache_path ) &&
				file_exists( $local_path ) &&
				in_array( $url, $processed_local_stylesheets, true ) ) {
				continue; // @codeCoverageIgnore
			}

			// Get rid of any query parameters.
			if ( str_contains( $local_path, '?' ) ) {
				$parsed_url         = wp_parse_url( $local_path );
				$replace_local_path = true;

				foreach ( $this->dynamic_css_handles as $dynamic_css_handle ) {
					if ( str_contains( $parsed_url[ 'query' ], $dynamic_css_handle ) ) {
						$replace_local_path = false;

						break;
					}
				}

				if ( $replace_local_path ) {
					$local_path = $parsed_url[ 'path' ];
				}
			}

			$contents   = '';
			$comparison = '';

			/**
			 * @since v3.4.6 Some themes/plugins insert non-existent files in the HTML, so let's check
			 *               if it exists first, before attempting to fetch the contents.
			 * @since v3.6.0 URLs will always be fetched.
			 */
			if ( str_starts_with( $local_path, 'http' ) || ( ! is_dir( $local_path ) && @file_exists( $local_path ) ) ) {
				$contents   = file_get_contents( $local_path );
				$comparison = $contents;
			}

			/**
			 * @since v3.6.0 Mark it as processed, before going through it all.
			 */
			if ( ! in_array( $url, $processed_local_stylesheets, true ) && ! is_dir( $local_path ) ) {
				$processed_local_stylesheets[] = $url;
			}

			if ( ! $contents ) {
				continue; // @codeCoverageIgnore
			}

			/**
			 * @since v3.7.0 Always run if Auto Config is enabled.
			 */
			if ( $this->auto_config || ! empty( Wrapper::get_option( Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS ) ) ) {
				// TODO: [OP-62] Add user friendly handles (including stylesheet ID, if any) + migration script.
				$contents = $this->process_imports( $contents, 'local-stylesheet-import' );
				$contents = $this->process_font_faces( $contents, 'local-stylesheet-font-face' );
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
			 * Now we're sure that contents in the stylesheet has changed and it needs to be cached,
			 * convert relative to absolute URLs (if needed)
			 *
			 * @since v3.7.3 Set the $fixed_url to be protocol relative to avoid mixed content warnings related to
			 *               outdated permalinks and other SSL-related WordPress quirks.
			 */
			$contents = $this->maybe_convert_rel_url_to_abs( $contents, str_replace( [ 'http:', 'https:' ], '', $fixed_url ) );

			if ( str_contains( $cache_path, '?' ) ) {
				$cache_path = wp_parse_url( $cache_path, PHP_URL_PATH );
			}

			$filename  = basename( $cache_path );
			$cache_dir = str_replace( $filename, '', $cache_path );

			if ( ! file_exists( str_replace( $filename, '', $cache_path ) ) ) {
				wp_mkdir_p( $cache_dir );
			}

			// phpcs:ignore
			$write = file_put_contents( $cache_path, $contents );

			if ( ! $write ) {
				// TODO: [OP-53] Examine if it's needed to throw an error if writing contents failed.
				continue; // @codeCoverageIgnore
			}

			/**
			 * Let's append/replace the `ver` parameter to bust browser cache when server cache is refreshed.
			 */
			$mod_time  = filemtime( $cache_path );
			$cache_url = add_query_arg( [ 'ver' => $mod_time ], $cache_url );

			$search[ $i ]  = $full_url;
			$replace[ $i ] = $cache_url;
		}

		/**
		 * @since v3.7.6 Prevent unnecessary writes to the database by comparing the updated array with the original copy from the database.
		 */
		if ( ! empty( array_diff( $processed_local_stylesheets, $this->processed_local_stylesheets ) ) ) {
			Wrapper::update_option( Settings::OMGF_PRO_PROCESSED_STYLESHEETS, $processed_local_stylesheets );
		}

		if ( empty( $search ) || empty( $replace ) ) {
			return $html;
		}

		return str_replace( $search, $replace, $html );
	}

	/**
	 * Provides compatibility fixes for 3rd party (CDN) plugins, i.e.
	 * plugins which alter the WordPress URL.
	 * Uses content_url() to determine the correct wp-content directory. Makes any rewrites needed to comply
	 * with (supported) 3rd party plugins.
	 *
	 * @since v3.4.6 Added compatibility with Bunny CDN.
	 * @return string An absolute URL pointing to the wp-content directory, e.g. https://yoursite.com/wp-content
	 */
	private function get_content_url() {
		if ( defined( 'BUNNYCDN_PLUGIN_FILE' ) ) {
			$bunny_cdn = Wrapper::get_option( 'bunnycdn' );

			// phpcs:ignore
			if ( $bunny_cdn != false ) {
				$cdn_domain_name = $bunny_cdn[ 'cdn_domain_name' ] ?? '';

				if ( $cdn_domain_name ) {
					$is_ssl = str_starts_with( get_home_url(), 'https://' );

					return str_replace( get_home_url(), $is_ssl ? 'https://' . $cdn_domain_name : 'http://' . $cdn_domain_name, content_url() );
				}
			}
		}

		return content_url();
	}

	/**
	 * Converts e.g. ./wp-admin/admin.ajax?action=kirky-styles to ./wp-content/uploads/omgf/kirky-styles/kirky-styles.css
	 *
	 * @since v3.3.2 Adds (limited) compatibility for themes (e.g. Kirki) and plugins using Dynamic CSS generator scripts.
	 * @since v3.6.0 Added $handle parameter, to apply this method with other present params used for dynamic CSS generation, e.g. custom-css
	 *
	 * @param string $url    The requested URL.
	 * @param string $handle The paramater used for storing the stylesheet on the server.
	 * @param string $return path|url
	 *
	 * @return string
	 */
	private function convert_dynamic_css( $url, $handle = 'action', $return = 'path' ) {
		$query = wp_parse_url( html_entity_decode( $url ), PHP_URL_QUERY );

		parse_str( $query, $params );

		if ( $return === 'url' ) {
			return Wrapper::get_upload_url() . '/' . $params[ $handle ] . '/' . $params[ $handle ] . '.css';
		}

		return Wrapper::get_upload_dir() . '/' . $params[ $handle ] . '/' . $params[ $handle ] . '.css';
	}
}
