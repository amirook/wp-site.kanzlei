<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

namespace OMGF\Pro\Admin;

use OMGF\Pro\Admin;
use OMGF\Pro\Admin\Notice;
use OMGF\Pro\Plugin;
use OMGF\Pro\Wrapper;

class Actions {
	const WORDPRESS_ORG_SEARCH_QUERY = 'plugin-install.php?s=%s&tab=search&type=term';

	/**
	 * Executes all Actions required in the Admin area.
	 *
	 * @return void
	 */
	public function __construct() {
		/**
		 * Priorities are set to 8 and 9, because register_settings runs at default priority (10).
		 *
		 * @see   \OMGF\Admin\Settings create_menu()
		 * @since v3.0.5
		 */
		add_action( '_admin_menu', [ $this, 'do_enrollment' ], 8 );
		add_action( '_admin_menu', [ $this, 'init_admin' ], 9 );
		add_action( 'admin_notices', [ $this, 'print_notices' ] );
		add_filter( 'omgf_settings_defaults', [ $this, 'add_default_settings' ] );
		add_action( 'omgf_optimize_local_fonts_replace', [ $this, 'add_hidden_fields' ], 10, 2 );
	}

	/**
	 * OMGF Pro depends on License Manager and OMGF to function properly.
	 *
	 * @since v3.0.1 Changed required_plugins to static array. Let's count on it that people don't rename the folder on
	 *        purpose.
	 * @since v3.7.2 OMGF Pro (and its license manager) requires at least PHP 7.2
	 *
	 * @codeCoverageIgnore
	 */
	public function do_enrollment() {
		if ( version_compare( phpversion(), '7.2.0', '<' ) ) {
			// Clear all previously set notices.
			delete_transient( Notice::OMGF_PRO_ADMIN_NOTICE_TRANSIENT );

			Notice::set_notice(
				__(
					'OMGF Pro requires at least PHP 7.2 to run properly. Please upgrade your PHP version to at least PHP 7.2 and re-activate this plugin.',
					'omgf-pro'
				),
				'error',
				'omgf_pro_outdated_php_version'
			);

			deactivate_plugins( OMGF_PRO_PLUGIN_BASENAME );

			Plugin::$halt = true;
		}

		$required_plugins = [
			'OMGF' => defined( 'OMGF_PLUGIN_FILE' ) ? OMGF_PLUGIN_FILE : false,
		];

		$inactive_plugin = array_search( false, $required_plugins );
		$plugin_name     = get_plugin_data( OMGF_PRO_PLUGIN_FILE )[ 'Name' ];

		if ( $inactive_plugin ) {
			add_filter(
				'wp_admin_notice_markup',
				function ( $markup, $message, $args ) use ( $inactive_plugin, $plugin_name ) {
					$replace_message = sprintf(
						__(
							'<strong>%1$s</strong> needs to be installed and active for %2$s to function properly. Download it from <a href="%3$s"><em>Plugins > Add New</em></a> and make sure it\'s activated, before activating %4$s.',
							'omgf-pro'
						),
						$inactive_plugin,
						$plugin_name,
						sprintf( admin_url( self::WORDPRESS_ORG_SEARCH_QUERY ), $inactive_plugin ),
						$plugin_name
					);

					return str_replace( [ $message, 'notice' ], [ '<p>' . $replace_message . '</p>', 'error' ], $markup );
				},
				10,
				3
			);

			deactivate_plugins( OMGF_PRO_PLUGIN_BASENAME );

			Plugin::$halt = true;
		} elseif ( class_exists( 'OMGF\Pro\Admin\Notice' ) && (bool) Wrapper::get_option( Notice::OMGF_PRO_ENROLLMENT_TRANSIENT ) !== true ) {
			add_filter(
				'wp_admin_notice_markup',
				function ( $markup, $message ) {
					$replace_message = sprintf(
						__(
							'<strong>Thank you for purchasing OMGF Pro!</strong> Head on over to the <a href="%s">settings screen</a> to take advantage of all the new, fancy features you\'ve just unlocked!',
							'omgf-pro'
						),
						admin_url( Admin::OMGF_PRO_SETTINGS_PAGE )
					);

					return str_replace( $message, '<p>' . $replace_message . '</p>', $markup );
				},
				10,
				2
			);

			Wrapper::update_option( Notice::OMGF_PRO_ENROLLMENT_TRANSIENT, true );
		}

		/**
		 * Deactivate legacy FFW.Press License Manager, if it's still active. Throw a notice to inst
		 */
		$legacy_license_manager_active =
			defined( 'FFWP_LICENSE_MANAGER_PLUGIN_FILE' ) ? is_plugin_active( plugin_basename( FFWP_LICENSE_MANAGER_PLUGIN_FILE ) ) : false;

		if ( $legacy_license_manager_active ) {
			$license_manager_name = get_plugin_data( FFWP_LICENSE_MANAGER_PLUGIN_FILE )[ 'Name' ];

			Notice::set_notice(
				sprintf(
					__(
						'%1$s has been deactivated. You can safely delete that plugin, since it now comes packaged with %2$s.',
						'omgf-pro'
					),
					$license_manager_name,
					$plugin_name
				)
			);

			deactivate_plugins( plugin_basename( FFWP_LICENSE_MANAGER_PLUGIN_FILE ) );
		}
	}

	/**
	 * Initialize all Admin related tasks.
	 *
	 * @return void
	 */
	public function init_admin() {
		if ( Plugin::$halt ) {
			return;
		}

		new Settings();
		new Admin();
	}

	/**
	 * Add notice to admin screen.
	 */
	public function print_notices() {
		Notice::print_notice();
	}

	/**
	 * Append OMGF Pro's defaults to OMGF's $defaults array.
	 *
	 * @filter omgf_pro_settings
	 * @see    \OMGF\Helper update_settings()
	 *
	 * @param mixed $default
	 *
	 * @return string[]
	 */
	public function add_default_settings( $defaults ) {
		$defaults[ Settings::OMGF_OPTIMIZE_SETTING_DTAP ]                          = '';
		$defaults[ Settings::OMGF_OPTIMIZE_SETTING_AUTO_CONFIG ]                   = '';
		$defaults[ Settings::OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY ]            = '';
		$defaults[ Settings::OMGF_OPTIMIZE_SETTING_REMOVE_ASYNC_FONTS ]            = '';
		$defaults[ Settings::OMGF_DETECTION_SETTING_PROCESS_LOCAL_STYLESHEETS ]    = '';
		$defaults[ Settings::OMGF_DETECTION_SETTING_PROCESS_EXTERNAL_STYLESHEETS ] = '';
		$defaults[ Settings::OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES ]        = '';
		$defaults[ Settings::OMGF_DETECTION_SETTING_PROCESS_WEBFONT_LOADER ]       = '';
		$defaults[ Settings::OMGF_ADV_SETTING_SOURCE_URL ]                         = '';
		$defaults[ Settings::OMGF_ADV_SETTING_WHITE_LABEL ]                        = 'on';

		return $defaults;
	}

	/**
	 * This will make the option always show up in POST, even when no boxes are checked.
	 *
	 * @return void
	 */
	public function add_hidden_fields( $handle, $font_id ) {
		?>
        <input type="hidden"
               name="<?php echo esc_attr( Settings::OMGF_OPTIMIZE_SETTING_REPLACE_FONT ); ?>[<?php echo esc_attr(
			       $handle
		       ); ?>][<?php echo esc_attr(
			       $font_id
		       ); ?>]" value="0"/>
		<?php
	}
}
