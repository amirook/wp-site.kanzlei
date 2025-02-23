<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */
namespace OMGF\Pro\Frontend\Optimize;

use OMGF\Pro\Frontend\Optimize;

class MaterialIcons extends Optimize {
	/**
	 * Filter/Action hooks.
	 *
	 * @return void
	 */
	public function __construct() {
		/** Material Icons compatibility */
		add_filter( 'omgf_setting_subsets', [ $this, 'add_material_icons_subset' ] );
	}

	/**
	 * The Material Icons stylesheet defines a subset, named 'fallback', so we're adding it here.
	 *
	 * @param array $subsets
	 *
	 * @return array
	 */
	public function add_material_icons_subset( $subsets ) {
		return array_merge( [ 'fallback' ], $subsets );
	}

	/**
	 * Process Material Icons in $html. Multiple occurences are replaced with the same stylesheet.
	 *
	 * @param string                 $html      Valid HTML
	 * @param \OMGF\Frontend\Process $processor No need to check dependencies here, because this function
	 *                                          is only executed if OMGF is installed/activated.
	 *
	 * @filter omgf_processed_html
	 *
	 * @return string Valid HTML
	 *
	 * @throws SodiumException
	 * @throws SodiumException
	 * @throws TypeError
	 * @throws TypeError
	 * @throws TypeError
	 */
	public function optimize( $html, $processor ) {
		return $this->invoke_processor( $html, $processor, '/<link.*fonts\.googleapis\.com\/icon.*?[\/]?>/' );
	}
}
