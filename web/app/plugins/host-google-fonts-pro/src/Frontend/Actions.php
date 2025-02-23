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

use OMGF\Pro\Plugin;

class Actions {
	/**
	 * Execute all actions required in the frontend.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'do_frontend_optimize' ], 49 );

		add_action( 'admin_bar_menu', [ $this, 'add_admin_bar_item' ], 1001 );
	}

	/**
	 * Run frontend Optimization logic.
	 */
	public function do_frontend_optimize() {
		if ( Plugin::$halt ) {
			return; // @codeCoverageIgnore
		}

		new \OMGF\Pro\Frontend\Optimize();
	}

	/**
	 * @param \WP_Admin_Bar $admin_bar
	 *
	 * @return void
	 */
	public function add_admin_bar_item( \WP_Admin_Bar $admin_bar ) {
		/**
		 * Display only in frontend, for logged in admins.
		 */
		if ( ! defined( 'DAAN_DOING_TESTS' ) && ( ! current_user_can( 'manage_options' ) || is_admin() ) ) {
			return; // @codeCoverageIgnore
		}

		global $wp;

		$permalink_structure = get_option( 'permalink_structure' );
		$site_url            = home_url( $wp->request );

		if ( ! $permalink_structure ) {
			foreach ( $wp->query_vars as $query_var_key => $query_var_value ) {
				$site_url = add_query_arg( $query_var_key, $query_var_value, $site_url );
			}
		}

		foreach ( [ 'omgf_optimize', 'omgf_pro_auto_config' ] as $param ) {
			$site_url = add_query_arg( $param, '1', $site_url );
		}

		$admin_bar->add_menu(
			[
				'id'     => 'omgf-pro-auto-config',
				'parent' => 'omgf',
				'title'  => __( 'Auto-configure detection settings for current page', 'host-webfonts-local' ),
				'href'   => $site_url,
			]
		);
	}
}
