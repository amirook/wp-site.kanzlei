<?php
/**
 * Plugin Name: OMGF Pro
 * Plugin URI: https://daan.dev/wordpress/omgf-pro/
 * Description: Premium add-on for OMGF. Requires OMGF (free) to activate.
 * Version: 3.12.5
 * Author: Daan from Daan.dev
 * Author URI: https://daan.dev
 * Text Domain: omgf-pro
 */

defined( 'ABSPATH' ) || exit;

define( 'OMGF_PRO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'OMGF_PRO_PLUGIN_FILE', __FILE__ );
define( 'OMGF_PRO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'OMGF_PRO_DB_VERSION', '3.8.2' );

/**
 * Takes care of loading classes on demand.
 *
 * @param $class
 *
 * @return mixed|void
 */
require_once OMGF_PRO_PLUGIN_DIR . 'vendor/autoload.php';

/**
 * All systems GO!!! Except when we're doing integration tests.
 *
 * @return OMGF\Pro\Plugin
 */
if ( ! defined( 'DAAN_DOING_TESTS' ) ) {
	$omgf_pro = new OMGF\Pro\Plugin();
}
