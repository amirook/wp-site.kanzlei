<?php
/**
 * AJAX Functions.
 *
 * @package Ziri
 */
defined( 'ABSPATH' ) || exit;

class ZiriAjaxFunctions {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialization.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init() {
		// Initialize hooks.
		$this->init_hooks();
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_hooks() {

		add_action( 'wp_ajax_ziri_get_install_starter', array( $this, 'ziri_get_install_starter' ) );
	}

	/**
	 * AJAX callback to install a plugin.
	 */
	function ziri_get_install_starter() {
		if ( ! check_ajax_referer( 'ziri-ajax-verification', 'security', false ) ) {
			wp_send_json_error( __( 'Security Error, Please reload the page.', 'ziri' ) );
		}
		if ( ! current_user_can( 'install_plugins' ) ) {
			wp_send_json_error( __( 'Security Error, Need higher Permissions to install plugin.', 'ziri' ) );
		}
		// Get selected file index or set it to 0.
		$status = empty( $_POST['status'] ) ? 'install' : sanitize_text_field( $_POST['status'] );
		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}
		if ( ! class_exists( 'WP_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}
		$install = true;
		if ( 'install' === $status ) {
			$api = plugins_api(
				'plugin_information',
				array(
					'slug' => 'demo-importer-plus',
					'fields' => array(
						'short_description' => false,
						'sections' => false,
						'requires' => false,
						'rating' => false,
						'ratings' => false,
						'downloaded' => false,
						'last_updated' => false,
						'added' => false,
						'tags' => false,
						'compatibility' => false,
						'homepage' => false,
						'donate_link' => false,
					),
				)
			);
			if ( ! is_wp_error( $api ) ) {

				// Use AJAX upgrader skin instead of plugin installer skin.
				$upgrader = new \Plugin_Upgrader( new \WP_Ajax_Upgrader_Skin() );

				$installed = $upgrader->install( $api->download_link );
				if ( $installed ) {
					$activate = activate_plugin( 'demo-importer-plus/demo-importer-plus.php', '', false, true );
					if ( is_wp_error( $activate ) ) {
						$install = false;
					}
				} else {
					$install = false;
				}
			} else {
				$install = false;
			}
		} elseif ( 'activate' === $status ) {
			$activate = activate_plugin( 'demo-importer-plus/demo-importer-plus.php', '', false, true );
			if ( is_wp_error( $activate ) ) {
				$install = false;
			}
		}

		if ( false === $install ) {
			wp_send_json_error( __( 'Error, plugin could not be installed, please install manually.', 'ziri' ) );
		} else {
			wp_send_json_success();
		}
	}
}

new ZiriAjaxFunctions();
