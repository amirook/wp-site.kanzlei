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
class V380 {
	/** @var string $current_version The version that initially triggered the migration scripts. */
	private $current_version = '';

	/** @var $version string The version number this migration script was introduced with. */
	private $version = '3.8.0';

	/**
	 * Rows that need to be migrated and deleted from the DB.
	 *
	 * @var array
	 */
	private $rows = [];

	/**
	 * Buid
	 *
	 * @return void
	 */
	public function __construct( $current_version ) {
		$this->current_version = $current_version;
		$this->rows            = [
			Settings::OMGF_OPTIMIZE_SETTING_AUTO_CONFIG,
			Settings::OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY,
			Settings::OMGF_OPTIMIZE_SETTING_REMOVE_ASYNC_FONTS,
			Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS,
			Settings::OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES,
			Settings::OMGF_DETECTION_SETTING_PROCESS_WEBFONT_LOADER,
			Settings::OMGF_ADV_SETTING_SOURCE_URL,
		];

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

		$new_settings = Wrapper::get_option( 'omgf_settings', [] );

		foreach ( $this->rows as $row ) {
			$option_value = get_option( "omgf_pro_$row" );

			if ( $option_value !== false ) {
				$new_settings[ $row ] = get_option( "omgf_pro_$row" );

				delete_option( "omgf_pro_$row" );
			}
		}

		Wrapper::update_option( 'omgf_settings', $new_settings );

		/**
		 * Update stored version number.
		 */
		Wrapper::update_option( Settings::OMGF_PRO_DB_VERSION, $this->version );
	}
}
