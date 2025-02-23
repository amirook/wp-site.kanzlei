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

class V1101 {
	private $version = '1.10.1';

	private $has_run = false;

	public function __construct() {
		add_action( 'admin_init', [ $this, 'init' ] );
	}

	/**
	 * Not actually a DB upgrade, but it's a nice workaround to make sure the encryption key is installed upon update.
	 */
	public function init() {
		if ( $this->has_run ) {
			return;
		}

		LicenseManager::install_encryption_key();

		/**
		 * Update stored version number.
		 */
		update_option( Admin::OPTION_DB_VERSION, $this->version );

		$this->has_run = true;
	}
}
