<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 * @version   v1.16.2
 */

use Daan\LicenseManager\Plugin;

defined( 'ABSPATH' ) || exit;

class DaanLicenseManager {
	/**
	 * Build Class
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Actions and hooks.
	 */
	private function init() {
		/**
		 * Define global constants
		 */
		define( 'DAAN_LICENSE_MANAGER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define( 'DAAN_LICENSE_MANAGER_PLUGIN_FILE', __FILE__ );
		define( 'DAAN_LICENSE_MANAGER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		define( 'DAAN_LICENSE_MANAGER_STATIC_VERSION', '1.16.0' );
		define( 'DAAN_LICENSE_MANAGER_DB_VERSION', '1.10.4' );

		$this->run();
	}

	/**
	 * All systems go!
	 *
	 * @return void
	 */
	private function run() {
		/**
		 * All systems GO!!!
		 *
		 * @return Plugin
		 */
		new Plugin();
	}
}

new DaanLicenseManager();
