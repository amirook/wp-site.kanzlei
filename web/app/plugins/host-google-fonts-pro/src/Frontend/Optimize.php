<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

namespace OMGF\Pro\Frontend;

use OMGF\Pro\Admin\Notice;
use OMGF\Pro\Admin\Settings;
use OMGF\Pro\FallbackFontStacks;
use OMGF\Pro\Helper as OMGF_Pro;
use OMGF\Pro\UnicodeRanges;
use OMGF\Pro\Wrapper;

class Optimize {
	const FONT_DISPLAY_ATTRIBUTE = 'font-display: %s;';

	/**
	 * Is the omgf_optimize GET-parameter set?
	 *
	 * @var bool
	 */
	public $force_optimize = false;

	/**
	 * @since v3.7.0 Is Auto Config enabled?
	 * @var bool
	 */
	public $auto_config = false;

	/**
	 * Build Class.
	 */
	public function __construct( $init = true ) {
		$this->force_optimize = isset( $_GET[ 'omgf_optimize' ] );
		$this->auto_config    = OMGF_Pro::run_auto_config();

		if ( $init ) {
			$this->init();
		}
	}

	/**
	 * Actions & Hooks
	 *
	 * @return void
	 */
	private function init() {
		add_action( 'omgf_frontend_process_before_ob_start', [ $this, 'maybe_init' ] );
		add_filter( 'omgf_processed_html', [ $this, 'process' ], 10, 2 );
	}

	/**
	 * Convert relative URLS in $contents to Absolute URLs using $url to decide the base.
	 *
	 * @see   convert_rel_url_to_abs()
	 * @since v3.7.2 [OP-79] Re-factored code to optimize performance and to take a uniform approach for detecting
	 *                       Relative URLs.
	 *
	 * @param string $contents Valid CSS
	 * @param string $url
	 *
	 * @return string Valid CSS
	 */
	public function maybe_convert_rel_url_to_abs( $contents, $url ) {
		preg_match_all( '/url\([\s\'"]{0,2}(?P<src>.*?)[\s"\']{0,2}\)/i', $contents, $srcs );

		if ( empty( $srcs[ 'src' ] ) ) {
			return $contents;
		}

		$rel_urls = [];

		foreach ( $srcs[ 'src' ] as $src ) {
			$src = trim( $src, '\'\" ' );

			if ( $this->is_rel_url( $src ) ) {
				$rel_urls[] = $src;
			}
		}

		if ( empty( $rel_urls ) ) {
			return $contents;
		}

		return $this->convert_rel_url_to_abs( $contents, $url, $rel_urls );
	}

	/**
	 * Checks if $source contain mentions of '../' or doesn't begin with either 'http' or '../'.
	 *
	 * @param string $source
	 *
	 * @return bool  false || true for e.g. "../fonts/file.woff2" or "fonts/file.woff2"
	 */
	private function is_rel_url( string $source ) {
		/**
		 * Don't rewrite, if:
		 *
		 * @since v3.6.3 this is either a root or protocol relative URL or,
		 * @since v3.6.4 if this is a Base64 encoded datatype.
		 */
		if ( str_starts_with( $source, '/' ) || str_starts_with( $source, 'data:' ) ) {
			return false;
		}

		// true: ../fonts/file.woff2
		return str_starts_with( $source, '../' )
			// true: fonts/file.woff2
			||
			( ! str_contains( $source, 'http' ) && ! str_contains( $source, '../' ) && strpos( $source, '/' ) > 0 )
			// true: file.woff2
			||
			( ! str_contains( $source, 'http' ) &&
				! str_contains( $source, '../' ) &&
				! str_contains( $source, '/' ) &&
				preg_match( '/^[a-zA-Z]/', $source ) === 1 );
	}

	/**
	 * Convert any relative URLs in $stylesheet to absolute URLs in using $source.
	 *
	 * @see   maybe_convert_rel_url_to_abs()
	 * @since v3.7.2 [OP-79] Re-factored code to optimize performance and to take a uniform approach for detecting
	 *                       Relative URLs.
	 *
	 * @param string $string
	 * @param string $source
	 *
	 * @return string
	 */
	private function convert_rel_url_to_abs( string $stylesheet, string $source, array $urls_to_convert = [] ) {
		$search  = [];
		$replace = [];

		foreach ( $urls_to_convert as $key => $rel ) {
			if ( ! $this->is_rel_url( $rel ) ) {
				continue; // @codeCoverageIgnore
			}

			$folder_depth  = substr_count( $rel, '../' );
			$url_to_insert = $source;

			/**
			 * Remove everything after the last occurence of a forward slash ('/');
			 * $i = 0: Filename (current directory)
			 *      1: First level parent directory, i.e. '../'
			 *      2: 2nd level parent directory, i.e. '../../'
			 *      3: Etc.
			 */
			for ( $i = 0; $i <= $folder_depth; $i ++ ) {
				$url_to_insert = substr( $source, 0, strrpos( $url_to_insert, '/' ) );
			}

			$path            = ltrim( $rel, './' );
			$search[ $key ]  = $rel;
			$replace[ $key ] = $url_to_insert . '/' . $path;
		}

		/**
		 * @since v3.4.2 Filter out duplicate values to prevent repeated search-replace madness.
		 */
		foreach ( $search as $key => $to_search ) {
			/**
			 * @since v3.5.1 We're using tildes (~) as delimiters, so we don't have to escape slashes in URLs.
			 *               Noice, roight? We only need to escape question marks (?), because it's a dumbass
			 *               fix for webfonts in Internet Exploder (?#eotfix).
			 */
			$to_search  = str_replace( [ '?', '(', ')' ], [ '\?', '\(', '\)' ], $to_search );
			$stylesheet = preg_replace( "~(url\([\s'\"]{0,2})$to_search([\s'\"]{0,2}\))~si", '$1' . $replace[ $key ] . '$2', $stylesheet );
		}

		return $stylesheet;
	}

	/**
	 * All listed methods are hooked to actions/filters, which should only be triggered if OMGF
	 * is actually allowed to run.
	 *
	 * @since  v3.6.6
	 * @action omgf_frontend_process_before_ob_start
	 * @return void
	 *
	 * @codeCoverageIgnore
	 */
	public function maybe_init() {
		// Block Async Google Fonts
		add_action( 'wp_head', [ $this, 'block_async_google_fonts' ], 1 );

		new Optimize\Compatibility();
		new Optimize\MaterialIcons();
	}

	/**
	 * Replaces all Google Fonts stylesheets found in @import statements with local copies.
	 *
	 * @param string $contents    A string of either valid HTML or CSS.
	 * @param string $handle_base The base to be used for building file cache and DB archive.
	 *
	 * @return string
	 * @throws \TypeError
	 */
	public function process_imports( $contents, $handle_base = 'inline-import' ) {
		/**
		 * @see          https://stackoverflow.com/a/27396794/4949411
		 * @since        v3.7.0 This matches with SSL, non-SSL and relative references to the Google Fonts API in the following syntax's:
		 *               - @import url('');
		 *               - @import url();
		 *               - @import '';
		 *               This does NOT match e.g. @import https://fonts.googleapis.com/css?etc; (i.e. no quotes) simply because I
		 *               can't imagine that that's valid CSS. If it is, we'll find out soon enough.
		 *               (?:(?!@import).) is a negative lookahead assertion, and makes sure the match is as short as
		 *               possible (from the end), i.e. match @import as long as it's not followed by another @import.
		 */
		preg_match_all(
			'/@import(?:(?!@import).)\s?([\'"]|url\([\'"]?)(?P<urls>(http:|https:)?\/\/fonts\.googleapis\.com\/(icon|css)(2.+?[^\'")]|.+?))[\'")]{1,2};/',
			$contents,
			$imports
		);

		$full_matches = apply_filters( 'omgf_pro_process_import_full_matches', $imports[ 0 ], $contents );
		$import_urls  = apply_filters( 'omgf_pro_process_import_urls', $imports[ 'urls' ], $contents );

		if ( empty( $import_urls ) ) {
			return $contents;
		}

		$search_replace = $this->build_import_search_replace( $full_matches, $import_urls, $handle_base );

		return str_replace( $search_replace[ 'search' ], $search_replace[ 'replace' ], $contents );
	}

	/**
	 * Build a processable Search/Replace array from @import statements.
	 *
	 * @param array  $full_matches Array of full matches.
	 * @param array  $url_matches  Array of partial matches.
	 * @param string $handle       The stylesheet handle.
	 *
	 * @return array
	 * @throws \TypeError
	 */
	private function build_import_search_replace( $full_matches, $url_matches, $handle_base = 'inline-import' ) {
		$search  = [];
		$replace = [];

		foreach ( $url_matches as $i => $url ) {
			/**
			 * @since v3.6.0 Use string length to generate a unique-ish identifier for @import-ed stylesheets.
			 */
			$original_handle = "$handle_base-" . strlen( $url );
			$handle          = ! empty( Wrapper::get_cache_key( $original_handle ) ) ? Wrapper::get_cache_key( $original_handle ) : $original_handle;
			$cached_file     = Wrapper::get_upload_dir() . "/$handle/$handle.css";

			/**
			 * @since v3.6.0 Check if stylesheet is marked for unloading, before we do anything else.
			 */
			if ( in_array( $original_handle, Wrapper::unloaded_stylesheets(), true ) ) {
				/** @codeCoverageIgnoreStart */
				$search[ $i ]  = $full_matches[ $i ];
				$replace[ $i ] = '';

				continue;
				/** @codeCoverageIgnoreEnd */
			}

			/**
			 * If file is already cached, and omgf_optimize parameter isn't set, let's just assume we don't need
			 * to re-optimize.
			 */
			if ( ! $this->force_optimize && file_exists( $cached_file ) ) {
				$search[ $i ]  = $url;
				$replace[ $i ] = str_replace( Wrapper::get_upload_dir(), Wrapper::get_upload_url(), $cached_file );

				continue;
			}

			$cache_dir = $this->run_optimization( $url, $handle, $original_handle );

			if ( ! $cache_dir ) {
				continue;
			}

			$search[ $i ]  = $url;
			$replace[ $i ] = $cache_dir;
		}

		return [
			'search'  => $search,
			'replace' => $replace,
		];
	}

	/**
	 * Try-catch wrapper for the OMGF_Optimize class.
	 *
	 * @param mixed $url             Full Google Fonts API request, e.g. https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,etc.
	 * @param mixed $cache_handle    Cache handle used for storing the fonts and generated stylesheet in OMGF's cache directory.
	 * @param mixed $original_handle Original cache handle (usually the stylesheet's ID)
	 * @param mixed $to_return
	 *
	 * @return string|array
	 * @throws \TypeError
	 *
	 * @codeCoverageIgnore
	 */
	public function run_optimization( $url, $cache_handle, $original_handle, $to_return = 'url', $return_early = false ) {
		if ( ! class_exists( '\OMGF\Optimize' ) ) {
			Notice::set_notice( __( 'OMGF not installed and/or activated.', 'omgf-pro' ) );

			return '';
		}

		try {
			$optimize = new \OMGF\Optimize( $url, $cache_handle, $original_handle, $to_return, $return_early );
			$fonts    = $optimize->process();
		} catch ( Requests_Exception $e ) {
			Notice::set_notice( $e );
		}

		if ( is_wp_error( $fonts ) ) {
			/** @var WP_Error $fonts */
			Notice::set_notice(
				__( 'Something went wrong while trying to fetch fonts', 'omgf-pro' ) .
				' - ' .
				$fonts->get_error_code() .
				': ' .
				$fonts->get_error_message(),
				'error',
				'omgf-pro-optimization-failed'
			);
		}

		return $fonts;
	}

	/**
	 * Process each Advanced Processing option.
	 *
	 * @param string                 $html      Valid HTML.
	 * @param \OMGF\Frontend\Process $processor No need to check dependencies here, because this function is only triggered if
	 *                                          OMGF is active.
	 *
	 * @filter omgf_processed_html
	 * @return string
	 * @throws \TypeError
	 */
	public function process( $html, $processor ) {
		$compare = $html;

		if ( $this->auto_config ||
			! empty( Wrapper::get_option( Settings::OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES ) ) ||
			! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK ) ) ||
			! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY ) ) ) {
			$inline_styles = new Optimize\InlineStyles();
			$html          = $inline_styles->optimize( $html );

			if ( $this->auto_config && $compare !== $html ) {
				$compare = $html;

				Wrapper::update_option( Settings::OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES, 'on' );
			} elseif ( $this->auto_config && $compare === $html ) {
				Wrapper::delete_option( Settings::OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES );
			}
		}

		if ( $this->auto_config ||
			! empty( Wrapper::get_option( Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS ) ) ||
			! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK ) ) ||
			! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY ) ) ) {
			$local_stylesheets = new Optimize\LocalStylesheets();
			$html              = $local_stylesheets->optimize( $html );

			if ( $this->auto_config && $compare !== $html ) {
				$compare = $html;

				Wrapper::update_option( Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS, 'on' );
			} elseif ( $this->auto_config && $compare === $html ) {
				Wrapper::delete_option( Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS );
			}
		}

		if ( $this->auto_config || ! empty( Wrapper::get_option( Settings::OMGF_DETECTION_SETTING_PROCESS_WEBFONT_LOADER ) ) ) {
			$webfont_loader = new Optimize\WebfontLoader();
			$html           = $webfont_loader->optimize( $html );

			if ( $this->auto_config && $compare !== $html ) {
				$compare = $html;

				Wrapper::update_option( Settings::OMGF_DETECTION_SETTING_PROCESS_WEBFONT_LOADER, 'on' );
			} elseif ( $this->auto_config && $compare === $html ) {
				Wrapper::delete_option( Settings::OMGF_DETECTION_SETTING_PROCESS_WEBFONT_LOADER );
			}
		}

		if ( $this->auto_config ||
			! empty ( Wrapper::get_option( Settings::OMGF_DETECTION_SETTING_PROCESS_EXTERNAL_STYLESHEETS ) ) ||
			! empty ( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK ) ) ||
			! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY ) ) ) {
			$external_stylesheets = new Optimize\ExternalStylesheets();
			$html                 = $external_stylesheets->optimize( $html );

			if ( $this->auto_config && $compare !== $html ) {
				$compare = $html;

				Wrapper::update_option( Settings::OMGF_DETECTION_SETTING_PROCESS_EXTERNAL_STYLESHEETS, 'on' );
			} elseif ( $this->auto_config && $compare === $html ) {
				Wrapper::delete_option( Settings::OMGF_DETECTION_SETTING_PROCESS_EXTERNAL_STYLESHEETS );
			}
		}

		$material_icons = new Optimize\MaterialIcons();
		$html           = $material_icons->optimize( $html, $processor );

		return $html;
	}

	/**
	 * Process inline @font-face statements.
	 *
	 * @param string $contents    A string of either valid HTML or CSS.
	 * @param string $base_handle Default: 'inline-font-face'
	 *
	 * @return string
	 * @throws \TypeError
	 */
	public function process_font_faces( $contents, $base_handle = 'inline-font-face' ) {
		/**
		 * TODO: [OP-52] Figure out a regex (without catastrophic backtracking) which only retrieves @font-face
		 *       statements containing fonts.gstatic.com.
		 */
		preg_match_all( '/@font-face[\s]*?{.*?}/si', $contents, $font_faces );

		// No @font-face statements found.
		if ( empty( $font_faces[ 0 ] ) ) {
			return $contents;
		}

		$wp_font_manager_fonts = $this->get_theme_local_fonts( $contents );

		/**
		 * @since v3.7.1 Make sure we're hitting the domain (not a subfolder generated by some plugins)
		 */
		$font_faces = array_filter(
			$font_faces[ 0 ],
			function ( $value ) use ( $wp_font_manager_fonts ) {
				return str_contains( $value, 'fonts.gstatic.com' ) ||
					str_contains( $value, 'fonts.wp.com' ) ||
					str_contains( $value, 'fonts.mailerlite.com' ) ||
					str_contains( $wp_font_manager_fonts, $value );
			}
		);

		if ( empty( $font_faces ) ) {
			return $contents;
		}

		$families       = $this->convert_font_faces( $font_faces );
		$search_replace = $this->build_font_face_search_replace( $font_faces, $families, $base_handle );

		return str_replace( $search_replace[ 'search' ], $search_replace[ 'replace' ], $contents );
	}

	/**
	 * Some themes add unoptimized versions of local fonts, this method extracts them, so OMGF Pro can handle them either way.
	 *
	 * @param string $contents
	 *
	 * @return string
	 */
	public function get_theme_local_fonts( $contents ) {
		preg_match_all( '/<style id=[\'"](wp-fonts-local|kirki-inline-styles)[\'"]>.*?<\/style>/s', $contents, $wp_font_manager_fonts );

		if ( ! empty( $wp_font_manager_fonts[ 0 ] ) ) {
			$wp_font_manager_fonts = $wp_font_manager_fonts[ 0 ];

			$wp_font_manager_fonts = implode( '', $wp_font_manager_fonts );
		}

		if ( empty( $wp_font_manager_fonts[ 0 ] ) ) {
			$wp_font_manager_fonts = '';
		}

		return $wp_font_manager_fonts;
	}

	/**
	 * Converts @font-face statements to Array. If a unicode range is defined,
	 * it will map it to an identifier, e.g. "latin-ext"
	 *
	 * @param array $font_faces
	 *
	 * @return array [ font_family ] [ variants => [ variant_id => font_src ] , subsets ]
	 */
	private function convert_font_faces( $font_faces ) {
		$families = [];

		$font_faces = $this->parse_font_weights( $font_faces );

		/**
		 * Build variants object.
		 */
		foreach ( $font_faces as $i => $font_face ) {
			preg_match( '/font-family:[\s]*[\'"]?(?P<font_family>.*?)[\'"]?;/', $font_face, $font_family );
			preg_match( '/font-style:[\s]*[\'"]?(?P<font_style>.*?)[\'"]?;/', $font_face, $font_style );
			preg_match( '/font-weight:[\s]*[\'"]?(?P<font_weight>.*?)[\'"]?;/', $font_face, $font_weight );
			preg_match( '/src:.*?url\([\'"]?(?P<url>.*?)[\'"]?\)/', $font_face, $font_src );
			preg_match( '/unicode-range:[\s]*(?P<range>.*?)?;/', $font_face, $range );

			$font_family = $font_family[ 'font_family' ] ?? '';
			$font_style  = isset( $font_style[ 'font_style' ] ) && $font_style[ 'font_style' ] !== 'normal' ? $font_style[ 'font_style' ] : '';
			$font_weight = $font_weight[ 'font_weight' ] ?? '400';
			$font_src    = $font_src[ 'url' ] ?? '';
			$range       = $range[ 'range' ] ?? '';
			$subset      = array_search( str_replace( ' ', '', $range ), UnicodeRanges::MAP, true );

			/**
			 * @since v3.11.0 Improved the way the array is built. We no longer use a comma-separated list, and instead we build an array
			 *                with each subset containing a sub-array of weight/style => src mappings.
			 */
			if ( ! $subset ) {
				$families[ $font_family ][ 'variants' ][ 'default' ][ (string) $font_weight . $font_style ] = $font_src;
			} else {
				$families[ $font_family ][ 'variants' ][ $subset ][ (string) $font_weight . $font_style ] = $font_src;
			}

			if ( $subset && ! in_array( $subset, $families[ $font_family ][ 'subsets' ][ $i ] ?? [], true ) ) {
				$families[ $font_family ][ 'subsets' ][ $i ] = $subset;
			}
		}

		return $families;
	}

	/**
	 * Check if an @font-face statement contains multiple font-weights and corrects the font-faces array.
	 *
	 * @param $font_faces
	 *
	 * @return mixed
	 */
	private function parse_font_weights( $font_faces, $rewrite = true ) {
		/**
		 * Loop through them first, checking for multiple font-weights in one font-face.
		 */
		foreach ( $font_faces as $i => $font_face ) {
			preg_match( '/font-weight:[\s]*[\'"]?(?P<font_weight>.*?)[\'"]?;/', $font_face, $font_weight );

			$font_weight = $font_weight[ 'font_weight' ] ?? '400';

			/**
			 * If the font weight attribute value contains spaces, this means it's a variable font.
			 */
			if ( str_contains( $font_weight, ' ' ) ) {
				$font_weights = explode( ' ', $font_weight );

				foreach ( $font_weights as $ii => $single_font_weight ) {
					if ( $ii + 1 < count( $font_weights ) ) {
						array_splice( $font_faces, $i + $ii, 0, $font_face );
					}

					if ( $rewrite ) {
						$font_faces[ $i + $ii ] = str_replace( $font_weight, $single_font_weight, $font_face );
					}
				}
			}
		}

		return $font_faces;
	}

	/**
	 * Build a Search/Replace array from converted font faces.
	 *
	 * @param array  $font_faces  Array of strings containing full regex matched @font-face statements. Used for unloading.
	 * @param array  $families    Array of detected font-families.
	 * @param string $base_handle Handle of the stylesheet. Default: 'inline-font-face'
	 *
	 * @return array
	 * @throws \TypeError
	 */
	private function build_font_face_search_replace( $font_faces, $families, $base_handle = 'inline-font-face' ) {
		$search         = [];
		$replace        = [];
		$used_subsets   = Wrapper::get_option( 'subsets', [] );
		$unloaded_fonts = Wrapper::unloaded_fonts();

		foreach ( $families as $font_family => $properties ) {
			$family          = $font_family . ':' . implode( ',', $this->get_font_variants( $properties[ 'variants' ] ) );
			$original_handle = "$base_handle-" . str_replace( ' ', '-', strtolower( $font_family ) );
			$font_id         = str_replace( ' ', '-', strtolower( $font_family ) );

			/**
			 * @since v3.3.0 There's no need to proceed if the entire stylesheet is marked for unloading.
			 * BUG: [OP-63] If two local stylesheets contain the same @font-face statements, checking unload for one, unloads the other as well.
			 */
			if ( in_array( $original_handle, Wrapper::unloaded_stylesheets(), true ) ) {
				// @codeCoverageIgnoreStart
				foreach ( $font_faces as $key => $font_face ) {
					if ( str_contains( $font_face, $font_family ) ) {
						$search[]  = $font_face;
						$replace[] = '';

						unset( $font_faces[ $key ] );
					}
				}

				// Skip to the Font Family.
				continue;
				// @codeCoverageIgnoreEnd
			}

			/**
			 * @font-face statements for unused subsets can be safely unloaded.
			 * 'default' is used for @font-face statements without defined unicode-ranges and will always pass.
			 */
			foreach ( $properties[ 'variants' ] as $subset => $variants ) {
				if ( ! in_array( $subset, array_merge( [ 'default' ], $used_subsets ) ) ) {
					$range = UnicodeRanges::MAP[ $subset ];

					$to_unload = array_filter(
						$font_faces,
						function ( $font_face ) use ( $range ) {
							$range_with_spaces = str_replace( ',', ', ', $range );

							return str_contains( $font_face, $range ) || str_contains( $font_face, $range_with_spaces );
						}
					);

					foreach ( $to_unload as $key => $unload ) {
						$search[]  = $unload;
						$replace[] = '';

						unset( $font_faces[ $key ] );
					}
				}
			}

			/**
			 * @since v3.3.0 Do a quick check to see which @font-face statements should be removed entirely.
			 */
			foreach ( $properties[ 'variants' ] as $variants ) {
				// The stylesheet has no relevant fonts marked for unloading.
				if ( ! isset( $unloaded_fonts[ $original_handle ][ $font_id ] ) ) {
					break;
				}

				foreach ( $variants as $variant => $external_url ) {
					if ( in_array( (string) $variant, $unloaded_fonts[ $original_handle ][ $font_id ], true ) ) {
						/** Fetch the string to be removed from the stylesheet. */
						$to_unload = array_filter(
							$font_faces,
							function ( $font_face ) use ( $external_url, $variant ) {
								$font_weight = (string) $variant;
								$font_style  = '';

								if ( str_contains( $font_weight, 'italic' ) ) {
									$font_weight = str_replace( 'italic', '', $font_weight );
									$font_style  = 'italic';
								}

								return str_contains( $font_face, $external_url ) &&
									str_contains( $font_face, $font_weight ) &&
									str_contains( $font_face, $font_style );
							}
						);

						if ( empty( $to_unload ) ) {
							// @codeCoverageIgnoreStart
							Wrapper::debug( __( 'No @font-face matched.', 'omgf-pro' ) );

							continue;
							// @codeCoverageIgnoreEnd
						}

						foreach ( $to_unload as $key => $single_to_unload ) {
							$search[]  = $single_to_unload;
							$replace[] = '';

							unset( $font_faces[ $key ] );
						}
					}
				}
			}

			$handle = ! empty( Wrapper::get_cache_key( $original_handle ) ) ? Wrapper::get_cache_key( $original_handle ) : $original_handle;

			/**
			 * Whether the optimization bails early depends on the presence of the $_GET parameter.
			 */
			$fonts = $this->run_optimization(
				'https://fonts.googleapis.com/css?family=' . $family,
				$handle,
				$original_handle,
				'object', ! $this->force_optimize && ! defined( 'DAAN_DOING_TESTS' )
			);

			if ( ! $fonts ) {
				continue;
			}

			/**
			 * @since v3.3.0 $fonts has already filtered unloaded fonts. If the stylesheet is marked for unloading i.e. no
			 *               fonts are loaded, it'll skip the foreach() entirely.
			 */
			foreach ( $fonts as $contents ) {
				foreach ( $contents as $content ) {
					foreach ( $content->variants as $variant ) {
						$variant->id    = $variant->id === 'regular' ? '400' : ( $variant->id === 'italic' ? '400italic' : $variant->id );
						$search_variant =
							$properties[ 'variants' ][ $variant->subset ][ $variant->id ]
							??
							$properties[ 'variants' ][ 'default' ][ $variant->id ]
							??
							'';

						/**
						 * If variant doesn't exist, skip.
						 */
						if ( empty( $search_variant ) ) {
							continue; // @codeCoverageIgnore
						}

						$matched_font_faces = array_filter(
							$font_faces,
							function ( $font_face ) use ( $search_variant ) {
								return str_contains( $font_face, $search_variant );
							}
						);

						/**
						 * Correct the array if it contains variable fonts with multiple values in the font-weight attribute.
						 */
						$matched_font_faces = $this->parse_font_weights( $matched_font_faces, false );

						/**
						 * @see          self::convert_font_faces()
						 * @since        v3.11.0 improved the way subsets are handled. Therefore, a comma-separated list is no longer used, and instead
						 *               we use sub-arrays.
						 */
						foreach ( $matched_font_faces as $matched_font_face ) {
							$search[] = $matched_font_face;
							/**
							 * @since v3.6.0 Always force WOFF2. If people start demanding WOFF or TTF, I'll think of another solution, but
							 *               WOFF2 should suffice in >95% situations.
							 * BUG: [OP-59] If original @font-face statement contained a .WOFF file, the syntax is off.
							 */
							$replace[] =
								str_replace( $search_variant, isset( $variant->woff2 ) ? urldecode( $variant->woff2 ) : '', $matched_font_face );
						}
					}
				}
			}
		}

		return [
			'search'  => $search,
			'replace' => $replace,
		];
	}

	/**
	 * Build an array of
	 *
	 * @param $variants
	 *
	 * @return mixed
	 */
	private function get_font_variants( $variants ) {
		$font_variants = [];

		foreach ( $variants as $available_variants ) {
			$font_variants[] = array_keys( $available_variants );
		}

		return array_unique( call_user_func_array( 'array_merge', $font_variants ) );
	}

	/**
	 * Process Fallback Font Stacks in local stylesheets.
	 *
	 * @param string $contents Valid HTML/CSS.
	 *
	 * @return string
	 */
	public function process_fallback_font_stacks( $contents ) {
		$font_stacks = [];

		Wrapper::debug( __( 'Processing Fallback Font Stacks', 'omgf-pro' ) );

		foreach ( Wrapper::optimized_fonts() as $fonts ) {
			foreach ( $fonts as $font ) {
				$font_family = urldecode( $font->family );

				Wrapper::debug( __( 'Searching for font-family declarations for: ', 'omgf-pro' ) . $font_family );

				/**
				 * Matches with font-family:[ '"]?Font Family[ '"]?[;}]
				 *
				 * @since v3.7.0 This regex now also matches with font-family: "Font Family"}
				 */
				preg_match_all( "/font-family.*?:[\s]?(?P<font_stack>['\"]?$font_family.*?)[;}]/i", $contents, $matches );

				if ( empty( $matches[ 'font_stack' ] ) ) {
					continue; // @codeCoverageIgnore
				}

				Wrapper::debug_array( 'Found matching font stacks', $matches[ 'font_stack' ] );

				$font_stacks = array_merge( $matches[ 'font_stack' ], $font_stacks );
			}
		}

		if ( empty( $font_stacks ) ) {
			return $contents;
		}

		$searches = [];
		$replaces = [];

		foreach ( $font_stacks as $font_stack ) {
			$current_font_stack = $font_stack;

			// If a fallback is already set, lose it.
			if ( str_contains( $font_stack, ',' ) ) {
				$font_stack = explode( ',', $font_stack )[ 0 ];
			}

			// Make sure !important statements are stripped, too.
			if ( str_contains( $font_stack, '!important' ) ) {
				$font_stack = str_replace( [ '!important', ' !important' ], '', $font_stack );
			}

			$font_stack = trim( $font_stack, '\'"' );
			$font_id    = str_replace( ' ', '-', strtolower( $font_stack ) );
			$fallback   = $this->load_fallback_font_stack( $font_stack, $font_id );

			// No fallback was found. Skip out.
			if ( ! $fallback ) {
				continue; // @codeCoverageIgnore
			}

			$searches[] = $current_font_stack;
			$replaces[] = $fallback;
		}

		Wrapper::debug_array( 'Font family attributes to search for', $searches );
		Wrapper::debug_array( 'Fallback font stacks to replace the found font family attributes with', $replaces );

		$position    = 0;
		$prev_search = '';

		foreach ( $searches as $key => $search ) {
			$next_position = $position !== false ? $position + strlen( $search ) : 0;

			if ( $prev_search !== $search ) {
				$next_position = 0;
			}

			$position    = strpos( $contents, $search, $next_position );
			$prev_search = $search;

			if ( $position !== false && isset( $replaces[ $key ] ) ) {
				$contents = substr_replace( $contents, $replaces[ $key ], $position, strlen( $search ) );
			}
		}

		return $contents;
	}

	/**
	 * Map fallback font stack option to actual fallback font stack.
	 *
	 * @since v2.5
	 *
	 * @param string $font_id    Current font stack's ID in CSS/HTML
	 * @param string $font_stack Current font stack in CSS/HTML
	 *
	 * @return bool|string
	 */
	public function load_fallback_font_stack( $font_stack, $font_id ) {
		$fallback = '';

		foreach ( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK ) as $font_families ) {
			foreach ( $font_families as $font_family => $selected_fallback ) {
				if ( $font_family !== $font_id || ! $selected_fallback ) {
					continue; // @codeCoverageIgnore
				}

				$font_stacks = apply_filters( 'omgf_pro_fallback_font_stacks', FallbackFontStacks::MAP );
				$fallback    = $font_stacks[ $selected_fallback ];

				break;
			}
		}

		if ( ! $fallback ) {
			return false; // @codeCoverageIgnore
		}

		/**
		 * @since v3.2.0 If Replace is checked for this font family, then just return $fallback
		 *               instead of appending it to $font_family.
		 */
		$replaces = Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_REPLACE_FONT, [] ) ?: [];

		foreach ( $replaces as $font_families ) {
			if ( ! empty( $font_families[ $font_id ] ) ) {
				return $fallback;
			}
		}

		if ( str_contains( $font_stack, ' ' ) ) {
			return '"' . $font_stack . '"' . ', ' . $fallback;
		}

		return $font_stack . ', ' . $fallback;
	}

	/**
	 * Replaces existing font-display attribute values, and inserts it where its missing.
	 *
	 * @param string $contents Valid CSS/HTML.
	 *
	 * @return string valid CSS/HTML
	 */
	public function process_force_font_display( $contents ) {
		/**
		 * If Font Display attribute is present, somewhere in the document, replace it with the set value.
		 * Matches either font-display: swap; and font-display: swap}.
		 */
		$contents = preg_replace(
			'/(font-display:[\s]*).*?([;}])/si',
			'$1' . Wrapper::get_option( \OMGF\Admin\Settings::OMGF_OPTIMIZE_SETTING_DISPLAY_OPTION ) . '$2',
			$contents
		);

		/**
		 * Match all @font-face statements.
		 * TODO: [OP-54] Create a regex to match all @font-face statements NOT containing a font-display attribute.
		 */
		preg_match_all( '/@font-face[\s]*{(.*?)}/s', $contents, $font_faces );

		if ( ! isset( $font_faces[ 0 ] ) || empty( $font_faces[ 0 ] ) ) {
			return $contents; // @codeCoverageIgnore
		}

		$replace = [];
		$search  = [];
		$attr    = sprintf( self::FONT_DISPLAY_ATTRIBUTE, Wrapper::get_option( \OMGF\Admin\Settings::OMGF_OPTIMIZE_SETTING_DISPLAY_OPTION ) );

		foreach ( $font_faces[ 0 ] as $key => $font_face ) {
			// If a font-display attribute is already present. Skip it.
			if ( str_contains( $font_face, 'font-display' ) ) {
				continue;
			}

			$search[ $key ]  = $font_faces[ 0 ][ $key ];
			$replace[ $key ] = substr_replace( $font_faces[ 0 ][ $key ], $attr, strpos( $font_faces[ 0 ][ $key ], ';' ) + 1, 0 );
		}

		// No need to continue, if no work was done.
		if ( empty( $search ) || empty( $replace ) ) {
			return $contents; // @codeCoverageIgnore
		}

		// Rewrite contents of stylesheet to include font-display attribute.
		return str_replace( $search, $replace, $contents );
	}

	/**
	 * Invokes OMGF's default HTML processor. Used in Pro for Material Icons and Early Access support.
	 *
	 * @param string                 $html Valid HTML
	 * @param \OMGF\Frontend\Process $processor
	 * @param string                 $regex
	 */
	public function invoke_processor( $html, $processor, $regex ) {
		preg_match_all( $regex, $html, $links );

		if ( empty( $links[ 0 ] ) ) {
			return $html; // @codeCoverageIgnore
		}

		$google_fonts   = $processor->build_fonts_set( $links[ 0 ] );
		$search_replace = $processor->build_search_replace( $google_fonts );

		foreach ( $google_fonts as $google_font ) {
			$key = array_search( $google_font[ 'href' ], $search_replace[ 'search' ], true );

			if ( $key !== false ) {
				$search_replace[ 'search' ][ $key ] = $google_font[ 'href' ];
			}
		}

		if ( empty( $search_replace[ 'search' ] ) || empty( $search_replace[ 'replace' ] ) ) {
			return $html; // @codeCoverageIgnore
		}

		return str_replace( $search_replace[ 'search' ], $search_replace[ 'replace' ], $html );
	}

	/**
	 * Load JS snippet inline to block Async Google Fonts.
	 */
	public function block_async_google_fonts() {
		if ( ! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_REMOVE_ASYNC_FONTS ) ) ) {

			$suffix = $this->get_script_suffix();
			// phpcs:ignore
			$script = file_get_contents( OMGF_PRO_PLUGIN_DIR . "assets/js/remove-async-gfonts$suffix.js" );

			// If there's no suffix, that means Debug Mode is enabled.
			if ( ! $suffix ) : ?>
                <script id="omgf-pro-remove-async-google-fonts">
					<?php echo wp_kses( $script, 'post' ); ?>
                </script>
			<?php else : ?>
                <script id="omgf-pro-remove-async-google-fonts" type="text/javascript"
                        src="data:text/javascript;base64,<?php echo base64_encode( $script ); ?>"></script>
			<?php
			endif;
		}
	}

	/**
	 * Checks if debugging is enabled for local machines.
	 *
	 * @return string .min | ''
	 */
	public function get_script_suffix() {
		return Wrapper::get_option( 'omgf_debug' ) === 'on' ? '' : '.min';
	}
}
