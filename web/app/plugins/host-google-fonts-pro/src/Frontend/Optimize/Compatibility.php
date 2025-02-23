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

/**
 * This class contains compatibility fixes needed in frontend only.
 * For global fixes, @see \OMGF\Pro\Compatibility!
 */
class Compatibility extends Optimize {
	const JS_WITHOUT_SEMICOLON_THEMES = [
		'jupiter',
	];

	/**
	 * Action & Filter hooks.
	 *
	 * @return void
	 */
	public function __construct() {
		/** Go Pricing */
		add_filter( 'do_shortcode_tag', [ $this, 'go_pricing_compatibility' ], 10, 2 );

		/** Jupiter Theme */
		add_action( 'wp_enqueue_scripts', [ $this, 'jupiter_theme_compatibility' ], 2 );

		/** Pen Theme */
		add_action( 'wp_enqueue_scripts', [ $this, 'pen_theme_compatibility' ], 11 );

		/** Essential Grid */
		add_filter( 'essgrid_output_navigation_skin', [ $this, 'essential_grid_compatibility' ] );

		/** Themes that use shorthand javascript */
		add_filter( 'omgf_pro_webfont_loader_search_replace_regex_async', [ $this, 'use_webfontloader_regex_without_semicolon' ] );
	}

	/**
	 * Parse inline CSS added by the "go_pricing" shortcode.
	 *
	 * @param string $output
	 * @param string $tag
	 *
	 * @return string
	 */
	public function go_pricing_compatibility( $output, $tag ) {
		if ( $tag !== 'go_pricing' ) {
			return $output; // @codeCoverageIgnore
		}

		$inline_styles = new Optimize\InlineStyles( false );

		return $inline_styles->optimize( $output );
	}

	/**
	 * Modify Web Font Loader script to make sure OMGF Pro can properly parse it.
	 *
	 * @return void
	 */
	public function jupiter_theme_compatibility() {
		$theme = wp_get_theme();

		if ( $theme instanceof \WP_Theme && $theme->get_template() !== 'jupiter' ) {
			return; // @codeCoverageIgnore
		}

		global $wp_scripts;

		$webfont_loader = $wp_scripts->registered[ 'mk-webfontloader' ] ?? '';

		if ( ! $webfont_loader ) {
			return; // @codeCoverageIgnore
		}

		$inline_scripts = $webfont_loader->extra[ 'after' ];

		if ( empty( $inline_scripts ) ) {
			return; // @codeCoverageIgnore
		}

		foreach ( $inline_scripts as &$script ) {
			if ( str_contains( $script, 'mk_google_fonts' ) ) {
				$script = preg_replace( '/({[\s]*families:[\s]*).*?(})/s', '$1' . mk_google_fonts() . '$2', $script );
			}
		}

		$is_modified = array_diff( $webfont_loader->extra[ 'after' ], $inline_scripts );

		if ( empty( $is_modified ) ) {
			return; // @codeCoverageIgnore
		}

		add_filter(
			'omgf_pro_webfont_loader_search_replace_regex_async',
			function ( $regex, $config ) {
				if ( str_contains( $config, 'mk-webfontloader' ) ) {
					return '/WebFontConfig\.google.*?}/s';
				}

				return $regex;
			},
			10,
			2
		);

		$wp_scripts->registered[ 'mk-webfontloader' ]->extra[ 'after' ] = $inline_scripts;
	}

	/**
	 * Adds compatibility for Pen theme.
	 *
	 * @since v3.7.3
	 */
	public function pen_theme_compatibility() {
		$theme  = wp_get_theme();
		$parent = $theme->parent();

		if ( ( $theme instanceof \WP_Theme && $theme->get_template() !== 'pen' ) ||
			( $parent instanceof \WP_Theme && $parent->get( 'Name' ) !== 'pen' ) ) {
			return; // @codeCoverageIgnore
		}

		global $wp_scripts;

		$webfont_loader = $wp_scripts->registered[ 'pen-googlefonts' ] ?? '';

		if ( ! $webfont_loader ) {
			return; // @codeCoverageIgnore
		}

		$inline_script = $webfont_loader->extra[ 'data' ];

		if ( empty( $inline_script ) ) {
			return; // @codeCoverageIgnore
		}

		if ( str_contains( $inline_script, 'pen_googlefonts' ) ) {
			$webfont_loader = new Optimize\WebfontLoader();

			$inline_script =
				sprintf( 'WebFont.load({ google: { families: [ %s ] } });', $webfont_loader->convert_webfont_config( $inline_script, false ) );
		}

		$wp_scripts->registered[ 'pen-googlefonts' ]->extra[ 'data' ] = $inline_script;
	}

	/**
	 * Adds compatibility for Essential Grid
	 *
	 * @since v3.7.3
	 *
	 * @param mixed $html
	 *
	 * @return string
	 */
	public function essential_grid_compatibility( $html ) {
		$inline_styles = new Optimize\InlineStyles( false );

		return $inline_styles->optimize( $html );
	}

	/**
	 * Filters the WebFontLoader regex to not include a semicolon.
	 *
	 * @param string $regex A valid regular expression
	 *
	 * @return string A valid regular expression
	 */
	public function use_webfontloader_regex_without_semicolon( $regex ) {
		$theme    = wp_get_theme();
		$template = $theme instanceof \WP_Theme ? $theme->get_template() : '';

		if ( in_array( $template, self::JS_WITHOUT_SEMICOLON_THEMES, true ) ) {
			return '/WebFontConfig(?:(?!WebFontConfig).)*?=\s+{(.*?)}.*?}/s';
		}

		return $regex; // @codeCoverageIgnore
	}
}
