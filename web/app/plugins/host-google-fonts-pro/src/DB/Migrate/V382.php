<?php
/**
 * @since     v3.7.7
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh. All Rights Reserved.
 * @package   OMGF Pro
 */

namespace OMGF\Pro\DB\Migrate;

use OMGF\Pro\Admin\Settings;
use OMGF\Pro\Wrapper;

/**
 * @codeCoverageIgnore
 */
class V382 {
	/** @var $current_version The version that initially triggered the migration scripts. */
	private $current_version = '';

	/** @var $version string The version number this migration script was introduced with. */
	private $version = '3.8.2';

	/**
	 * Buid
	 *
	 * @return void
	 */
	public function __construct( $current_version ) {
		$this->current_version = $current_version;

		$this->init();
	}

	/**
	 * Initialize
	 *
	 * @return void
	 */
	private function init() {
		// Don't run this migration script if it's a fresh install.
		if ( $this->current_version === false ) {
			return;
		}

		// Remove this, because it'll automatically be populated again anyway.
		Wrapper::delete_option( Settings::OMGF_PRO_PROCESSED_STYLESHEETS );

		/**
		 * Update stored version number.
		 */
		Wrapper::update_option( Settings::OMGF_PRO_DB_VERSION, $this->version );
	}
}
