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

class Helper {
	/**
	 * Should we run Auto Config?
	 * @since v3.7.2 Allow manually triggering Auto Config by appending ?omgf_optimize=1&omgf_pro_auto_config=1 to an URL.
	 * @return bool
	 */
	public static function run_auto_config() {
		return array_key_exists( 'omgf_optimize', $_GET ) && array_key_exists( 'omgf_pro_auto_config', $_GET ) || defined( 'OMGF_PRO_TESTS_ROOT' );
	}
}
