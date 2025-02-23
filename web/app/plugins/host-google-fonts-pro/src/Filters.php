<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

namespace OMGF\Pro;

use OMGF\Pro\Admin\Settings;
use OMGF\Pro\Wrapper;

class Filters {
	/**
	 * Build class.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Filter & action hooks.
	 *
	 * @return void
	 */
	private function init() {
		// OMGF Filters
		add_filter( 'omgf_upload_dir', [ $this, 'rewrite_upload_dir' ] );
		add_filter( 'omgf_upload_url', [ $this, 'rewrite_upload_url' ] );
		add_filter( 'omgf_frontend_process_url', [ $this, 'maybe_rewrite_url' ] );
		add_filter( 'omgf_optimize_url', [ $this, 'remove_excessive_spacing' ], 9 );
		add_filter( 'omgf_optimize_fonts_object', [ $this, 'optimize_additional_css' ], 10, 2 );
		add_filter( 'omgf_generate_stylesheet_after', [ $this, 'append_additional_css' ], 10, 2 );
		add_filter( 'omgf_generate_stylesheet_after', [ $this, 'maybe_white_label_css' ], 11 );
		add_filter( 'omgf_uninstall_db_entries', [ $this, 'add_db_entries' ] );
		add_filter( 'omgf_settings_page_title', [ $this, 'modify_page_title' ] );

		// 3rd Party (Compatibility Fixes)
		add_filter( 'vc_get_vc_grid_data_response', [ $this, 'parse_vc_grid_data' ], 11 );
	}

	/**
	 * @since v3.4.0 Use native wp_upload_dir() to add Multisite support.
	 *
	 * @param string $dir
	 *
	 * @return string
	 */
	public function rewrite_upload_dir() {
		return wp_upload_dir()[ 'basedir' ] . '/omgf';
	}

	/**
	 * @since v3.4.0 Use native wp_upload_dir() to add Multisite support.
	 * @since v3.7.3 Make Upload URL protocol relative to avoid Mixed Content warnings in some configurations.
	 * @since v3.10.0 Always make URLs webroot-relative on Multisite's, when WPML is activated and support DTAP option.
	 *
	 * @param string $dir
	 *
	 * @return string
	 */
	public function rewrite_upload_url() {
		if ( ! Wrapper::get_option( Settings::OMGF_ADV_SETTING_SOURCE_URL ) && ! Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_DTAP ) ) {
			return str_replace( [ 'http:', 'https:' ], '', wp_upload_dir()[ 'baseurl' ] . '/omgf' );
		} elseif ( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_DTAP ) === 'on' || is_multisite() || function_exists( 'wpml_loaded' ) ) {
			return wp_make_link_relative( wp_upload_dir()[ 'baseurl' ] . '/omgf' );
		}

		return apply_filters( 'omgf_pro_modify_source_url', Wrapper::get_option( Settings::OMGF_ADV_SETTING_SOURCE_URL ) );
	}

	/**
	 * @param $url
	 *
	 * @return array|mixed|string|string[]
	 */
	public function maybe_rewrite_url( $url ) {
		$is_relative_dir = OMGF_UPLOAD_URL[ 0 ] === '/' && OMGF_UPLOAD_URL[ 1 ] !== '/';

		if ( ! $is_relative_dir ) {
			return $url;
		}

		$rel_home_url = str_replace( [ 'https:', 'http:' ], '', get_home_url() );

		return str_replace( $rel_home_url, '', $url );
	}

	/**
	 * Removes excessive spacing in $url.
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	public function remove_excessive_spacing( $url ) {
		$url = preg_replace( '/\s{2,}/', ' ', urldecode( $url ) );
		$url = str_replace( ', ', ',', $url );

		return $url;
	}

	/**
	 * @since v3.6.5 Processes any additional CSS classes found in stylesheets delivered by the Variable Fonts (CSS2) API.
	 *
	 * @param string $url
	 * @param object $fonts
	 *
	 * @return object
	 */
	public function optimize_additional_css( $fonts, $url ) {
		$optimize = new Optimize();

		return $optimize->additional_css( $fonts, $url );
	}

	/**
	 * @since v3.6.5 Appends any additional CSS classes found in $fonts to $stylesheet.
	 *
	 * @param object $fonts
	 * @param string $stylesheet
	 *
	 * @return string A valid CSS stylesheet.
	 */
	public function append_additional_css( $stylesheet, $fonts ) {
		$stylesheet_generator = new StylesheetGenerator();

		return $stylesheet_generator->append_additional_css( $stylesheet, $fonts );
	}

	/**
	 * @since v3.9.0 Removes the OMGF Pro branding from the stylesheet.
	 *
	 * @param string $stylesheet A valid CSS stylesheet.
	 *
	 * @return string A valid CSS stylesheet.
	 */
	public function maybe_white_label_css( $stylesheet ) {
		if ( empty( Wrapper::get_option( Settings::OMGF_ADV_SETTING_WHITE_LABEL, 'on' ) ) ) {
			return $stylesheet; // @codeCoverageIgnore
		}

		$parts = preg_split( '/(\*\/\n)/', $stylesheet, - 1, PREG_SPLIT_DELIM_CAPTURE );

		if ( ! isset( $parts[ 2 ] ) ) {
			// Something went wrong. Bail.
			return $stylesheet;
		}

		return $parts[ 2 ];
	}

	/**
	 * Add OMGF Pro's DB entries to the queue for removal upon uninstall.
	 *
	 * @param mixed $db_entries
	 *
	 * @return array
	 */
	public function add_db_entries( $db_entries ) {
		$add_entries = [
			Settings::OMGF_PRO_DB_VERSION,
			Settings::OMGF_PRO_PROCESSED_STYLESHEETS,
			Settings::OMGF_PRO_PROCESSED_EXT_STYLESHEETS,
			Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK,
			Settings::OMGF_OPTIMIZE_SETTING_REPLACE_FONT,
		];

		return array_merge( $db_entries, $add_entries );
	}

	/**
	 * @return string
	 */
	public function modify_page_title() {
		return __( 'OMGF Pro', 'omgf-pro' );
	}

	/**
	 * @since  v3.7.2 Parse HTML generated by Visual Composer's Grid elements for Material Icons, which is loaded async using AJAX.
	 * @filter vc_get_vc_grid_data_response
	 * @return string Valid HTML generated by Visual Composer.
	 */
	public function parse_vc_grid_data( $data ) {
		$processor = Wrapper::get_frontend_processor();
		$optimize  = new \OMGF\Pro\Frontend\Optimize\MaterialIcons();
		$data      = $optimize->optimize( $data, $processor );

		return $data;
	}
}
