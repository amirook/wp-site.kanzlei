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

class V140 {
	private $version = '1.4.0';

	public function __construct() {
		$this->init();
	}

	private function init() {
		/**
		 * Encrypt stored licensed products.
		 */
		$licensed_products = get_option( Admin::SETTING_LICENSE_KEY );

		if ( is_array( $licensed_products ) ) {
			foreach ( $licensed_products as &$product ) {
				$product[ 'key' ] = LicenseManager::encrypt( $product[ 'key' ] );
			}

			update_option( Admin::SETTING_LICENSE_KEY, $licensed_products );
		}

		/**
		 * Encrypt stored valid licenses.
		 */
		$valid_licenses = LicenseManager::valid_licenses();

		if ( is_array( $valid_licenses ) ) {
			foreach ( $valid_licenses as &$license ) {
				$license[ 'license' ] = LicenseManager::encrypt( $license[ 'license' ] );
			}

			update_option( Admin::OPTION_VALID_LICENSES, $valid_licenses );
		}

		/**
		 * Update stored version number.
		 */
		update_option( Admin::OPTION_DB_VERSION, $this->version );
	}
}
