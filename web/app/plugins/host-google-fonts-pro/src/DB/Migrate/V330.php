<?php
/**
 * @since     v3.3.0
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh. All Rights Reserved.
 * @package   OMGF Pro
 */

namespace OMGF\Pro\DB\Migrate;

use OMGF\Pro\Admin\Notice;
use OMGF\Pro\Admin\Settings;
use OMGF\Pro\Wrapper;

/**
 * @codeCoverageIgnore
 */
class V330 {
	const DB_ENTRIES_TO_REMOVE  = [
		'omgf_cache_is_stale',
		'omgf_cache_keys',
		'omgf_optimized_fonts',
		'omgf_unload_fonts',
		'omgf_preload_fonts',
		'omgf_unload_stylesheets',
	];

	const DB_ENTRIES_TO_MIGRATE = [
		'omgf_pro_process_stylesheet_imports',
		'omgf_pro_process_stylesheet_font_faces',
	];

	/** @var $current_version The version that initially triggered the migration scripts. */
	private $current_version = '';

	/** @var $version string The version number this migration script was introduced with. */
	private $version = '3.3.0';

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
		if ( $this->current_version == false ) {
			return;
		}

		/**
		 * Remove previously saved default value of Fonts Source URL.
		 */
		$fonts_source_url = Wrapper::get_option( Settings::OMGF_ADV_SETTING_SOURCE_URL );

		/**
		 * @since v3.4.3 Using content_url here is warranted, because we need this specific value.
		 */
		if ( $fonts_source_url === content_url( '/uploads/omgf' ) ) {
			delete_option( Settings::OMGF_ADV_SETTING_SOURCE_URL );
		}

		/**
		 * Flush cached files and relevant db entries.
		 */
		$dirs = array_filter( (array) glob( Wrapper::get_upload_dir() . '/*' ) );

		foreach ( $dirs as $dir ) {
			$this->delete( $dir );
		}

		foreach ( self::DB_ENTRIES_TO_REMOVE as $option ) {
			delete_option( $option );
		}

		Notice::set_notice(
			sprintf(
				__(
					'Your OMGF Pro cache needs to be refreshed and has been flushed. Please <a href="%s">review your settings</a> and re-configure your stylesheets where needed.',
					'omgf-pro'
				),
				admin_url( 'options-general.php?page=optimize-webfonts' )
			)
		);

		/**
		 * Migrate local stylesheets settings to new option.
		 */
		foreach ( self::DB_ENTRIES_TO_MIGRATE as $option_name ) {
			$option = Wrapper::get_option( $option_name );

			if ( $option != false ) {
				Wrapper::update_option( Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS, 'on' );

				break;
			}

			delete_option( $option_name );
		}

		/**
		 * Update stored version number.
		 */
		Wrapper::update_option( Settings::OMGF_PRO_DB_VERSION, $this->version );
	}

	/**
	 * @param mixed $entry
	 *
	 * @return void
	 */
	private function delete( $entry ) {
		if ( is_dir( $entry ) ) {
			$file = new \FilesystemIterator( $entry );

			// If dir is empty, valid() returns false.
			while ( $file->valid() ) {
				$this->delete( $file->getPathName() );
				$file->next();
			}

			rmdir( $entry );
		} else {
			unlink( $entry );
		}
	}
}
