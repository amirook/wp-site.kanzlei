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

class Admin {
	const ADMIN_JS_HANDLE        = 'omgf-pro-admin-js';

	const FFWP_BASE_URL          = 'https://daan.dev';

	const OMGF_PRO_SETTINGS_PAGE = 'options-general.php?page=optimize-webfonts';

	/**
	 * OmgfPro_Admin constructor.
	 */
	public function __construct() {
		/** Admin-wide stuff. */
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );

		/** Add options for which a cache flush notice should be shown. */
		add_filter( 'omgf_admin_stale_cache_options', [ $this, 'add_show_notice_options' ], 10, 1 );

		/** Remove promotional material and modify page title */
		add_filter( 'apply_omgf_pro_promo', '__return_false' );
		add_filter( 'omgf_pro_promo', '__return_empty_string' );
		add_filter( 'omgf_help_tab_plugin_url', [ $this, 'rewrite_plugin_url' ] );

		/** Modify Advanced Processing options if needed. */
		add_filter( 'omgf_detection_settings_advanced_processing_description', [ $this, 'maybe_add_auto_config_notice' ] );

		/** Add registration link to this plugin's row in plugins screen */
		add_filter( 'plugin_action_links_' . plugin_basename( OMGF_PRO_PLUGIN_FILE ), [ $this, 'add_plugin_overview_links' ] );

		/** */
		add_filter( 'pre_update_option_omgf_pro_source_url', [ $this, 'check_source_path' ], 10, 2 );

		/** Add Auto-Config query arg if option is enabled. */
		add_filter( 'omgf_optimize_run_args', [ $this, 'maybe_add_auto_config_arg' ] );
	}

	/**
	 * Enqueues the necessary JS and CSS and passes options as a JS object.
	 *
	 * @param $hook
	 */
	public function enqueue_admin_scripts( $hook ) {
		if ( $hook === 'settings_page_optimize-webfonts' ) {
			wp_enqueue_script(
				self::ADMIN_JS_HANDLE,
				plugin_dir_url( OMGF_PRO_PLUGIN_FILE ) . 'assets/js/omgf-pro-admin.js',
				[ 'jquery', 'omgf-admin-js' ],
				filemtime( OMGF_PRO_PLUGIN_DIR . 'assets/js/omgf-pro-admin.js' ),
				true
			);
		}
	}

	/**
	 * @param $options
	 *
	 * @return array
	 */
	public function add_show_notice_options( $options ) {
		$pro_options = [
			Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS,
			Settings::OMGF_DETECTION_SETTING_PROCESS_EXTERNAL_STYLESHEETS,
			Settings::OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES,
			Settings::OMGF_DETECTION_SETTING_PROCESS_WEBFONT_LOADER,
			Settings::OMGF_ADV_SETTING_WHITE_LABEL,
			Settings::OMGF_ADV_SETTING_SOURCE_URL,
		];

		return array_merge( $pro_options, $options );
	}

	/**
	 * @return string
	 */
	public function rewrite_plugin_url() {
		return 'https://daan.dev/wordpress/omgf-pro/';
	}

	/**
	 * Show notice if Auto-Config is enabled.
	 */
	public function maybe_add_auto_config_notice( $description ) {
		if ( ! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_AUTO_CONFIG ) ) ) {
			return '<span class="advanced-processing-notice info">' . sprintf(
					__(
						'According to <strong>Auto-Config</strong> the current selection is required to detect all Google Fonts on this website. If you want to change them, first <a href="%s">disable Auto-Configure Adv. Processing</a>. Only change them if you\'re certain it\'s needed, because it might (unnecessarily) impact performance.',
						'omgf-pro'
					),
					admin_url( 'options-general.php?page=optimize-webfonts' )
				) . '</span>';
		}

		return $description; // @codeCoverageIgnore
	}

	/**
	 * @param $links
	 *
	 * @return string
	 */
	public function add_plugin_overview_links( $links ) {
		$admin_url     = admin_url() . 'options-general.php?page=ffwp-license-manager';
		$license_link  = "<a href='$admin_url'>" . __( 'Manage License', 'omgf-pro' ) . '</a>';
		$admin_url     = admin_url( 'options-general.php?page=optimize-webfonts' );
		$settings_link = "<a href='$admin_url'>" . __( 'Settings', 'omgf-pro' ) . '</a>';
		array_push( $links, $settings_link, $license_link );

		return $links;
	}

	/**
	 *
	 */
	public function check_source_path( $new_path, $old_path ) {
		if ( ! $new_path ) {
			return $new_path; // @codeCoverageIgnore
		}

		global $wp_settings_errors;

		if ( ! empty( $wp_settings_errors ) ) {
			// Provide a better API then!
			// phpcs:ignore
			$wp_settings_errors = [];
		}

		// $new_path shouldn't end with a slash.
		$new_path = rtrim( $new_path, '/' );
		$path     = $new_path;

		if ( str_starts_with( $new_path, '/' ) && ! str_starts_with( $new_path, '//' ) ) {
			// Directory Relative Path (not protocol relative)
			$path = rtrim( ABSPATH, '/' ) . $new_path;
		} elseif ( ! str_starts_with( $new_path, '/' ) && ! str_starts_with( $new_path, 'http' ) ) {
			// Invalid entry
			if ( ! empty( $wp_settings_errors ) ) {
				// Provide a better API then!
				// @codeCoverageIgnore
				$wp_settings_errors = [];
			}

			add_settings_error(
				'general',
				'omgf_pro_invalid_modified_source_url',
				sprintf(
					__(
						'The value set to be used as a <strong>Modified Source URL</strong> is neither an absolute or relative path and can\'t be used. Please try again or <a href="%s" target="_blank">refer to the manual</a> to learn how to use it.',
						'omgf-pro'
					),
					'https://daan.dev/docs/omgf-pro/advanced-settings/'
				)
			);

			return $old_path;
		} elseif ( ! str_contains( $new_path, get_home_url() ) && ! str_starts_with( $new_path, '/' ) ) {
			// CDN URL - Just warn user.
			if ( ! empty( $wp_settings_errors ) ) {
				// Provide a better API then!
				// @codeCoverageIgnore
				$wp_settings_errors = [];
			}

			add_settings_error(
				'general',
				'omgf_pro_modified_source_url_is_cdn',
				__(
					'The value set to be used as a <strong>Modified Source URL</strong> seems to be a CDN URL. Please make sure you\'re pointing to the correct URL.',
					'omgf-pro'
				),
				'success'
			);

			return $new_path;
		}

		$is_abs = true;

		if ( str_starts_with( $new_path, 'http' ) ) {
			// Absolute URL
			$path = parse_url( $new_path, PHP_URL_PATH );
			$path = rtrim( ABSPATH, '/' ) . $path;
		} elseif ( str_starts_with( $new_path, '/' ) ) {
			// Relative Path
			$path   = get_home_url( null, $new_path );
			$is_abs = false;
		}

		// Check if Absolute Path exists on filesystem.
		if ( $is_abs && ! file_exists( $path ) ) {
			if ( ! empty( $wp_settings_errors ) ) {
				// Provide a better API then!
				// @codeCoverageIgnore
				$wp_settings_errors = [];
			}

			add_settings_error(
				'general',
				'omgf_pro_non_existent_source_url',
				sprintf(
					__(
						'The value set to be used as a <strong>Modified Source URL</strong> leads to a non-existent directory. Please try again or <a href="%s" target="_blank">refer to the manual</a> to learn how it works.',
						'omgf-pro'
					),
					'https://daan.dev/docs/omgf-pro/advanced-settings/'
				)
			);

			return $old_path;
		}

		// If a Relative Path is set, let's just trust the user.
		add_settings_error(
			'general',
			'omgf_pro_relative_source_url',
			__(
				'The value set to be used as a <strong>Modified Source URL</strong> seems to be a Relative Path. Please make sure it exists and test thoroughly.',
				'omgf-pro'
			),
			'success'
		);

		return $new_path;
	}

	/**
	 * @since v3.7.3 Add the omgf_pro_auto_config query argument if Auto-Config Adv. Processing is enabled.
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	public function maybe_add_auto_config_arg( $args ) {
		if ( ! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_AUTO_CONFIG ) ) ) {
			$args[ 'omgf_pro_auto_config' ] = 1;
		}

		return $args;
	}
}
