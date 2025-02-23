<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

namespace OMGF\Pro;

use OMGF\Pro\Admin\Settings;

class Ajax {
	/**
	 * Build class.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Init hooks and filters.
	 *
	 * @return void
	 */
	private function init() {
		add_filter( 'omgf_clean_up_instructions', [ $this, 'set_clean_up' ] );
	}

	/**
	 * Add Fallback Font Stacks to db clean up before emptying cache directory.
	 *
	 * @since v2.5.0
	 *
	 * @param mixed $instructions
	 *
	 * @return array containing a 'init', 'exclude' and 'queue'.
	 */
	public function set_clean_up( $instructions ) {
		$active_tab = $_GET[ 'tab' ] ?? 'omgf-optimize-settings';

		if ( $active_tab !== Settings::OMGF_PRO_SETTINGS_FIELD_OPTIMIZE ) {
			return $instructions;
		}

		$section = $instructions[ 'init' ] ?? 'optimize-webfonts';

		if ( $section == 'optimize-webfonts' ) {
			array_push(
				$instructions[ 'queue' ],
				Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK,
				Settings::OMGF_PRO_PROCESSED_STYLESHEETS,
				Settings::OMGF_PRO_PROCESSED_EXT_STYLESHEETS,
				Settings::OMGF_OPTIMIZE_SETTING_REPLACE_FONT
			);
		}

		return $instructions;
	}
}
