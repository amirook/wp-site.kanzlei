<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */
namespace Daan\LicenseManager\DB\Migration;

use Daan\LicenseManager\Admin;
use Daan\LicenseManager\Plugin as LicenseManager;



class V1103 {

	private $version = '1.10.3';

	public function __construct() {
		add_action( 'admin_init', [ $this, 'init' ] );
	}

	/**
	 * In ye olde days, when this license manager was its own module, it required its own license key to receive updates.
	 *
	 * This isn't needed anymore, so let's clean up any entries related to it.
	 */
	public function init() {
		$valid_licenses = LicenseManager::valid_licenses();

		/**
		 * 4163 was the internal product ID of Daan.dev License Manager.
		 */
		if ( isset( $valid_licenses['4163'] ) ) {
			unset( $valid_licenses['4163'] );
		}

		update_option( Admin::OPTION_VALID_LICENSES, $valid_licenses );

		/**
		 * Update stored version number.
		 */
		update_option( Admin::OPTION_DB_VERSION, $this->version );
	}
}
