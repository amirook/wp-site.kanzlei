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

class Plugin {
	/** @var bool $halt Halt execution if dependencies aren't installed and/or activated. */
	public static $halt = false;

	/**
	 * Build class.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Init hooks & filters.
	 */
	private function init() {
		$this->load_license_manager();
		$this->define_constants();

		if ( version_compare( OMGF_PRO_STORED_DB_VERSION, OMGF_PRO_DB_VERSION ) < 0 ) {
			add_action( 'plugins_loaded', [ $this, 'do_migrate_db' ] );
		}

		/** Add license field to Daan.dev License Manager */
		add_filter( 'ffwp_license_manager_licenses', [ $this, 'do_license_field' ], 1, 1 );

		new Filters();
		new Compatibility();

		if ( is_admin() ) {
			new Admin\Actions();
			new Ajax();
		}

		if ( ! is_admin() ) {
			new Frontend\Actions();
		}
	}

	/**
	 * Loads the license manager submodule
	 *
	 * @return void
	 */
	private function load_license_manager() {
		if ( ! defined( 'DAAN_DOING_TESTS' ) && ! class_exists( 'DaanLicenseManager' ) ) {
			require_once OMGF_PRO_PLUGIN_DIR . 'src/license-manager/daan-license-manager.php'; // @codeCoverageIgnore
		}
	}

	/**
	 * Define constants.
	 */
	public function define_constants() {
		if ( ! defined( 'OMGF_PRO_STORED_DB_VERSION' ) ) {
			define( 'OMGF_PRO_STORED_DB_VERSION', esc_attr( get_option( Settings::OMGF_PRO_DB_VERSION ) ) );
		}

		if ( ! defined( 'OMGF_PRO_ACTIVE' ) ) {
			define( 'OMGF_PRO_ACTIVE', true );
		}
	}

	/**
	 * @param $licenses
	 *
	 * @return array
	 *
	 * @codeCoverageIgnore
	 */
	public function do_license_field( $licenses ) {
		$licenses[] = [
			'id'          => 4027,
			'label'       => __( 'OMGF Pro', 'omgf-pro' ),
			'plugin_file' => OMGF_PRO_PLUGIN_FILE,
		];

		return $licenses;
	}

	/**
	 * Run any DB migration scripts if needed.
	 *
	 * @return void
	 */
	public function do_migrate_db() {
		new DB\Migrate();
	}
}
