<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace OMGF\Pro\DB;

use OMGF\Pro\Admin\Settings;
use OMGF\Pro\Wrapper;

class Migrate {
	/** @var string */
	private $current_version = '';

	/**
	 * DB Migration constructor.
	 */
	public function __construct() {
		$this->current_version = Wrapper::get_option( Settings::OMGF_PRO_DB_VERSION, false );

		if ( $this->should_run_migration( '2.4.0' ) ) {
			new Migrate\V240();
		}

		if ( $this->should_run_migration( '3.3.0' ) ) {
			new Migrate\V330( $this->current_version );
		}

		if ( $this->should_run_migration( '3.6.0' ) ) {
			new Migrate\V360( $this->current_version );
		}

		if ( $this->should_run_migration( '3.7.6' ) ) {
			new Migrate\V376( $this->current_version );
		}

		if ( $this->should_run_migration( '3.8.0' ) ) {
			new Migrate\V380( $this->current_version );
		}

		if ( $this->should_run_migration( '3.8.2' ) ) {
			new Migrate\V382( $this->current_version );
		}
	}

	/**
	 * Checks whether migration script has been run.
	 *
	 * @param mixed $version
	 *
	 * @return bool
	 */
	private function should_run_migration( $version ) {
		return version_compare( $this->current_version, $version ) < 0;
	}
}
