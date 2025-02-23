<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace OMGF\Pro\Admin;

class Settings {
	/**
	 * Internal Use
	 */
	const OMGF_PRO_DB_VERSION                = 'omgf_pro_db_version';

	const OMGF_PRO_PROCESSED_STYLESHEETS     = 'omgf_pro_processed_local_stylesheets';

	const OMGF_PRO_PROCESSED_EXT_STYLESHEETS = 'omgf_pro_processed_ext_stylesheets';

	/**
	 * Settings Fields
	 */
	const OMGF_PRO_SETTINGS_FIELD_OPTIMIZE  = 'omgf-optimize-settings';

	const OMGF_PRO_SETTINGS_FIELD_DETECTION = 'omgf-detection-settings';

	const OMGF_PRO_SETTINGS_FIELD_ADVANCED  = 'omgf-advanced-settings';

	/**
	 * Optimize Fonts
	 */
	const OMGF_OPTIMIZE_SETTING_DTAP               = 'dtap';

	const OMGF_OPTIMIZE_SETTING_AUTO_CONFIG        = 'auto_config';

	const OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY = 'force_font_display';

	const OMGF_OPTIMIZE_SETTING_REMOVE_ASYNC_FONTS = 'remove_async_fonts';

	/**
	 * These settings keep the prefix, because they're stored in separate rows, due to their size.
	 */
	const OMGF_OPTIMIZE_SETTING_REPLACE_FONT        = 'omgf_pro_replace_font';

	const OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK = 'omgf_pro_fallback_font_stack';

	/**
	 * Detection Settings
	 */
	const OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS    = 'process_local_stylesheets';

	const OMGF_DETECTION_SETTING_PROCESS_EXTERNAL_STYLESHEETS = 'process_external_stylesheets';

	const OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES        = 'process_inline_styles';

	const OMGF_DETECTION_SETTING_PROCESS_WEBFONT_LOADER       = 'process_webfont_loader';

	/**
	 * Advanced Settings
	 */
	const OMGF_ADV_SETTING_SOURCE_URL  = 'source_url';

	const OMGF_ADV_SETTING_WHITE_LABEL = 'white_label';

	/** @var string $active_tab */
	private $active_tab;

	/** @var string $page */
	private $page;

	/**
	 * OMGF\Pro\Admin\Settings constructor.
	 */
	public function __construct() {
		$this->active_tab = $_GET[ 'tab' ] ?? 'omgf-optimize-settings';
		$this->page       = $_GET[ 'page' ] ?? '';

		$this->init();
	}

	/**
	 * Initialize hooks
	 *
	 * @return void
	 */
	private function init() {
		add_filter( 'omgf_settings_constants', [ $this, 'add_constants' ], 10, 1 );
	}

	/**
	 * @param $constants
	 *
	 * @return array
	 * @throws ReflectionException
	 */
	public function add_constants( $constants ) {
		if ( $this->active_tab !== self::OMGF_PRO_SETTINGS_FIELD_OPTIMIZE &&
			$this->active_tab !== self::OMGF_PRO_SETTINGS_FIELD_DETECTION &&
			$this->active_tab !== self::OMGF_PRO_SETTINGS_FIELD_ADVANCED ) {
			return $constants; // @codeCoverageIgnore
		}

		$reflection    = new \ReflectionClass( $this );
		$new_constants = $reflection->getConstants();

		return array_merge( $new_constants, $constants );
	}
}
