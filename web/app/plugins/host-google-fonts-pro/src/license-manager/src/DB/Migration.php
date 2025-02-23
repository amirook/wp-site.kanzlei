<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */
namespace Daan\LicenseManager\DB;

use Daan\LicenseManager\Admin;



class Migration {

	/** @var string */
	private $current_version = '';

	/**
	 * DB Migration constructor.
	 */
	public function __construct() {
		$this->current_version = get_option( Admin::OPTION_DB_VERSION );

		if ( $this->should_run_migration( '1.4.0' ) ) {
			new \Daan\LicenseManager\DB\Migration\V140();
		}

		if ( $this->should_run_migration( '1.6.0' ) ) {
			new \Daan\LicenseManager\DB\Migration\V160();
		}

		if ( $this->should_run_migration( '1.10.1' ) ) {
			new \Daan\LicenseManager\DB\Migration\V1101();
		}

		if ( $this->should_run_migration( '1.10.3' ) ) {
			new \Daan\LicenseManager\DB\Migration\V1103();
		}
	}

	/**
	 * Checks whether migration script has been run.
	 *
	 * @param mixed $version
	 * @return bool
	 */
	private function should_run_migration( $version ) {
		return version_compare( $this->current_version, $version ) < 0;
	}
}
