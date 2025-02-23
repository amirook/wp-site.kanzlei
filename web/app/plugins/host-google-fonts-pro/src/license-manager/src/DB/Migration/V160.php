<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */
namespace Daan\LicenseManager\DB\Migration;

use Daan\LicenseManager\Admin;
use Daan\LicenseManager\Admin\Notice;



class V160 {

	private $version = '1.6.0';

	public function __construct() {
		add_action( 'admin_init', [ $this, 'init' ] );
	}

	public function init() {
		$active_plugins = [];

		if ( defined( 'CAOS_PLUGIN_BASENAME' ) && is_plugin_active( CAOS_PLUGIN_BASENAME ) ) {
			array_push( $active_plugins, 'CAOS' );
		}

		if ( defined( 'OMGF_PLUGIN_BASENAME' ) && is_plugin_active( OMGF_PLUGIN_BASENAME ) ) {
			array_push( $active_plugins, 'OMGF' );
		}

		$plugins = $this->build_natural_sentence( $active_plugins );

		Notice::set_notice(
			sprintf(
				__( 'Thank you for updating <strong>Daan.dev License Manager</strong> to <strong>v%1$s</strong>! You might\'ve noticed I\'ve removed the Daan.dev menu item from the sidebar. You can find your License Manager through the <em>Manage License</em> tab on the settings screen of <strong>%2$s</strong>.' ),
				$this->version,
				$plugins
			)
		);

		/**
		 * Update stored version number.
		 */
		update_option( Admin::OPTION_DB_VERSION, $this->version );
	}

	/**
	 *
	 * @param array $list
	 * @return string
	 */
	private function build_natural_sentence( array $list ) {
		$i        = 0;
		$last     = count( $list ) - 1;
		$sentence = '';

		foreach ( $list as $alias ) {
			if ( count( $list ) > 1 && $i == $last ) {
				$sentence .= __( ' and ', 'daan-license-manager' );
			}

			$sentence .= sprintf( '%s', $alias );

			$i++;
		}

		return $sentence;
	}
}
