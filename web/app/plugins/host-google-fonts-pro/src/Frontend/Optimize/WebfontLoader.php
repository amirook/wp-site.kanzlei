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

use OMGF\Pro\Frontend\Optimize;
use OMGF\Pro\Wrapper;

class WebfontLoader extends Optimize {
	const WEBFONTLOADER_ASYNC_SCRIPT = "WebFontConfig = { custom: { families: [ %s ], urls: [ '%s' ] } };";

	const WEBFONTLOADER_SCRIPT       = "WebFont.load({ custom: { families: [ %s ], urls: [ '%s' ] } });";

	/**
	 * @since v3.7.2 Keeps track of the number of found WebFont Loaders on a page.
	 * @var int
	 */
	private static $webfont_loader_uid = 0;

	/**
	 * @param string $html Valid HTML
	 *
	 * @return string
	 * @throws SodiumException
	 * @throws SodiumException
	 * @throws TypeError
	 * @throws TypeError
	 * @throws TypeError
	 */
	public function optimize( $html ) {
		// Replace any (external!) webfont.js libraries with the one included in OMGF Pro.
		$local_lib = plugin_dir_url( OMGF_PRO_PLUGIN_FILE ) . 'assets/js/lib/webfont.js';
		$home_url  = get_home_url();
		$html      = preg_replace( "~(src\s?=\s?['\"])(?!$home_url).*?(webfont\.js|webfont\.min\.js)~", '$1' . $local_lib, $html );

		// Parse script blocks
		preg_match_all( '/<script.*?<\/script>/s', $html, $script_blocks );

		if ( empty( $script_blocks[ 0 ] ) ) {
			return $html; // @codeCoverageIgnore
		}

		$script_blocks = $script_blocks[ 0 ];
		$configs       = [];

		foreach ( $script_blocks as $block ) {
			/**
			 * Two separate if-statements, because one <script> block can theoretically contain multiple
			 * types of Web Font Loaders.
			 */
			if ( str_contains( $block, 'WebFontConfig' ) || str_contains( $block, 'WebFont.load' ) ) {
				$configs[] = $block;
			}
		}

		if ( ! empty( $configs ) ) {
			$configs = $this->build_webfont_loader_search_replace( $configs );
			$html    = str_replace( $configs[ 'search' ], $configs[ 'replace' ], $html );
		}

		return $html;
	}

	/**
	 * @param mixed $configs
	 * @param bool  $async
	 *
	 * @return array
	 * @throws SodiumException
	 * @throws SodiumException
	 * @throws TypeError
	 * @throws TypeError
	 * @throws TypeError
	 */
	private function build_webfont_loader_search_replace( $configs ) {
		$search  = [];
		$replace = [];

		foreach ( $configs as $config ) {
			/**
			 * @since v3.7.2 Use a static variable to make sure no earlier WebFont Loader configs are overwritten.
			 */
			$i             = self::$webfont_loader_uid;
			$matches       = [];
			$async_matches = [];

			/**
			 * We need to trigger this filter over and over again, so we can allow some kind of conditions inside
			 * potential filter functions by using the $config variable.
			 * Use WebFontConfig.*?{(.*?)}[;]+? to reach a wider match, like so:
			 *  add_filter('omgf_pro_webfont_loader_search_replace_regex_async', function () {
			 *      return '/WebFontConfig.*?{(.*?)}[;]+?/s';
			 *  });
			 *
			 * @filter omgf_pro_webfont_loader_search_replace_regex_async
			 * @since  v3.7.2
			 */
			if ( str_contains( $config, 'WebFontConfig' ) ) {
				$regex = apply_filters( 'omgf_pro_webfont_loader_search_replace_regex_async', '/WebFontConfig.*?{(.*?)}[;]?/s', $config );

				preg_match_all( $regex, $config, $async_matches );
			}

			/**
			 * If the open parenthesis starts on a new line, this will do the trick:
			 * add_filter('omgf_pro_webfont_loader_search_replace_regex', function () { return '/WebFont\.load[\s\r\n]*?\(.*?\);/s'; });
			 *
			 * @filter omgf_pro_webfont_loader_search_replace_regex
			 * @since  v3.7.2
			 */
			if ( str_contains( $config, 'WebFont.load' ) ) {
				$regex = apply_filters( 'omgf_pro_webfont_loader_search_replace_regex', '/WebFont\.load\(.*?\);/s', $config );

				preg_match_all( $regex, $config, $matches );
			}

			$matches = array_unique( array_merge( $matches[ 0 ] ?? [], $async_matches[ 0 ] ?? [] ) );

			if ( empty( $matches ) ) {
				continue; // @codeCoverageIgnore
			}

			foreach ( $matches as $match ) {
				$cache_key  =
					! empty( Wrapper::get_cache_key( "webfont-loader-$i" ) ) ? Wrapper::get_cache_key( "webfont-loader-$i" ) : "webfont-loader-$i";
				$cache_url  = Wrapper::get_upload_url() . "/$cache_key/$cache_key.css";
				$cache_path = Wrapper::get_upload_dir() . "/$cache_key/$cache_key.css";

				/**
				 * If stylesheets is marked as unloaded, remove the entire config.
				 */
				if ( Wrapper::unloaded_stylesheets() && in_array( $cache_key, Wrapper::unloaded_stylesheets(), true ) ) {
					// @codeCoverageIgnoreStart
					$search[]  = $match;
					$replace[] = '';

					continue;
					// @codeCoverageIgnoreEnd
				}

				$request = $this->convert_webfont_config( $match, false );

				if ( ! $request ) {
					continue; // @codeCoverageIgnore
				}

				/**
				 * Allow filtering the output that should replace the found match.
				 *
				 * @since  v3.6.6
				 * @filter omgf_pro_frontend_web_font_loader_replace_script
				 */
				$replace_script = apply_filters(
					'omgf_pro_frontend_web_font_loader_script',
					str_contains( $match, 'WebFontConfig' ) ? self::WEBFONTLOADER_ASYNC_SCRIPT : self::WEBFONTLOADER_SCRIPT
				);

				if ( ! $this->force_optimize && file_exists( $cache_path ) ) {
					// @codeCoverageIgnoreStart
					$search[]  = $match;
					$replace[] = sprintf( $replace_script, $request, $cache_url );

					self::$webfont_loader_uid ++;

					continue;
					// @codeCoverageIgnoreEnd
				}

				$request_uri = $this->convert_webfont_config( $config );
				$cache_url   = $this->run_optimization( 'https://fonts.googleapis.com/css?family=' . $request_uri, $cache_key, "webfont-loader-$i" );

				/**
				 * Something went wrong, let's bail.
				 */
				if ( ! $cache_url ) {
					continue; // @codeCoverageIgnore
				}

				$search[]  = $match;
				$replace[] = sprintf( $replace_script, $request, $cache_url );

				self::$webfont_loader_uid ++;
			}
		}

		return [
			'search'  => $search,
			'replace' => $replace,
		];
	}

	/**
	 * Fetches the WebFontConfig object and converts it to a request string.
	 *
	 * @since v3.7.2
	 *
	 * @param bool   $for_url Indicate if we should generate a request URI valid for the Google Fonts API.
	 *                        If false, it generates a valid object to be used in the WebFont Loader JS object.
	 * @param string $config
	 *
	 * @return string Returns a valid family string for use with OMGF_Optimize().
	 */
	public function convert_webfont_config( $config, $for_url = true ) {
		/**
		 * Captures everything between [].
		 * This regex is much less prone to error and faster, compared to negative look back, etc.
		 */
		preg_match_all( '/\[[^\[\]]*\]/', $config, $families );

		if ( empty( $families[ 0 ] ) ) {
			return ''; // @codeCoverageIgnore
		}

		Wrapper::debug_array( __( 'Found WebFontConfigs', 'omgf-pro' ), $families );

		$requested_families = [];

		foreach ( reset( $families ) as $match ) {
			if ( str_contains( $match, 'google' ) ||
				str_contains( $match, 'typekit' ) ||
				str_contains( $match, 'events' ) ||
				str_contains( $match, 'inactive' ) ||
				str_contains( $match, 'active' ) ||
				str_contains( $match, 'timeout' ) ) {
				// This is the font object itself or an object representing a parameter. Let's move on...
				continue; // @codeCoverageIgnore
			}

			// If $string contains alphabetic characters, we can assume it's a font-family request.
			$has_letters = preg_match( '/[a-z]/i', $match );

			if ( $has_letters !== 0 && $has_letters !== false ) {
				$requested_families[] = $match;
			}
		}

		$request_string = '';

		foreach ( $requested_families as $fonts ) {
			$fonts = trim( $fonts, " \n\r\t\v\x00[]'\"," );

			/**
			 * @since v3.7.2 If this request contains multiple families, let's do some cleaning
			 *               because the 'custom' parameter were going to use in WebFont Loader
			 *               to load our local stylesheet doesn't allow the e.g. 'subset' parameter.
			 */
			if ( preg_match( '/\',[\s\r\n]*?\'/', $fonts ) ) {
				$fonts = preg_split( '/\',[\s\r\n]*?\'/', $fonts );
			} else {
				$fonts = (array) $fonts; // @codeCoverageIgnore
			}

			foreach ( $fonts as $i => $font ) {
				/**
				 * @since v3.7.2 If this font request contains parameters, remove all of them.
				 */
				$font = html_entity_decode( $font );

				if ( str_contains( $font, '&' ) ) {
					$fonts[ $i ] = substr( $font, 0, strpos( $font, '&' ) );
				}
			}

			$fonts = implode( '\', \'', $fonts );

			if ( $for_url ) {
				$formatted      = preg_replace( "/(?:\',\s*\'|\",\s*\")/", '|', $fonts );
				$request_string .= empty( $request_string ) ? $formatted : '|' . $formatted;
			} else {
				$quotation      = str_contains( $fonts, '\'' ) ? '\'' : '"';
				$request_string .= $quotation . $fonts . $quotation;
			}
		}

		Wrapper::debug( __( 'Converted WebFontConfig to Request String', 'omgf-pro' ) . ": $request_string" );

		return $request_string;
	}
}
