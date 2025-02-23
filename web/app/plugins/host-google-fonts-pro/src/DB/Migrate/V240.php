<?php
/**
 * @since     v2.4.0
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
class V240 {
	/** Options to be migrated. */
	const OMGF_MIGRATE_OPTION_CDN_URL      = 'omgf_cdn_url';

	const OMGF_MIGRATE_OPTION_REL_URLS     = 'omgf_relative_url';

	const OMGF_MIGRATE_OPTION_ALT_REL_PATH = 'omgf_cache_uri';

	const OMGF_MIGRATE_OPTION_WOFF2_ONLY   = 'omgf_woff2_only';

	/** @var $version string The version number this migration script was introduced with. */
	private $version = '2.4.0';

	/**
	 * Buid
	 *
	 * @return void
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialize
	 *
	 * @return void
	 */
	private function init() {
		$this->migrate_src_url_options();
		$this->clean_up( $this->get_option_names( __CLASS__ ) );

		/**
		 * Update stored version number.
		 */
		Wrapper::update_option( Settings::OMGF_PRO_DB_VERSION, $this->version );
	}

	/**
	 * Migrate all relevant options to Fonts Source URL option.
	 *
	 * @return void
	 */
	private function migrate_src_url_options() {
		$src_url = Wrapper::get_option( Settings::OMGF_ADV_SETTING_SOURCE_URL );

		if ( ! $src_url ) {
			return;
		}

		$rel_path = '/' . implode( '/', array_slice( explode( '/', $src_url ), 3 ) );

		// Replace regular relative path (Cache Path option) with Alternative Relative Path.
		// phpcs:ignore
		if ( $alt_rel_path = Wrapper::get_option( self::OMGF_MIGRATE_OPTION_ALT_REL_PATH ) ) {
			$src_url = str_replace( $rel_path, $alt_rel_path, $src_url );
		}

		// Removes everything before the third '/', i.e. the Home URL.
		if ( Wrapper::get_option( self::OMGF_MIGRATE_OPTION_REL_URLS ) ) {
			$src_url = $rel_path;

			if ( $alt_rel_path ) {
				$src_url = $alt_rel_path;
			}
		}

		// Replace Home URL with CDN URL if set.
		// phpcs:ignore
		if ( $cdn_url = Wrapper::get_option( self::OMGF_MIGRATE_OPTION_CDN_URL ) ) {
			$src_url = str_replace( home_url(), $cdn_url, $src_url );
		}

		Wrapper::update_option( Settings::OMGF_ADV_SETTING_SOURCE_URL, $src_url );
	}

	/**
	 * Clean up options in wp_option table.
	 *
	 * @param array $options
	 *
	 * @return void
	 */
	private function clean_up( array $options ) {
		foreach ( $options as $option ) {
			delete_option( $option );
		}
	}

	/**
	 * Get class constants.
	 *
	 * @return array
	 */
	private function get_option_names( $class_name ) {
		$class = new \ReflectionClass( $class_name );

		return array_values( $class->getConstants() );
	}
}
