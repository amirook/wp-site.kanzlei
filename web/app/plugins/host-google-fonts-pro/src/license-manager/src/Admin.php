<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace Daan\LicenseManager;

use Daan\LicenseManager\Plugin as LicenseManager;
use Daan\LicenseManager\Admin\Notice;

class Admin {
	const SETTINGS_SECTION      = 'ffwp-license-manager';

	const SETTINGS_NONCE        = 'ffwp_license_manager_nonce';

	const SETTING_LICENSE_KEY   = 'ffwp_license_key';

	const OPTION_VALID_LICENSES = 'ffwp_valid_licenses';

	const OPTION_CYPHER         = 'ffwp_encryption_cypher';

	const OPTION_DB_VERSION     = 'ffwp_db_version';

	const NOTICE_COUNT          = 'ffwp_notice_count';

	/**
	 * @since v1.8.0 Contains an array of plugin basenames and on which free plugin they depend.
	 * @since v1.9.1 This array should only contain plugins that actually have parents!
	 * @var array $plugin_deps
	 */
	private $plugin_deps = [
		'caos-pro/caos-pro.php'                           => 'host-analyticsjs-local/host-analyticsjs-local.php',
		'host-google-fonts-pro/host-google-fonts-pro.php' => 'host-webfonts-local/host-webfonts-local.php',
		'omgf-additional-fonts/omgf-additional-fonts.php' => 'host-webfonts-local/host-webfonts-local.php',
	];

	/**
	 * Any plugins with licenses expiring soon are kept here to make sure updates remain allowed, where needed.
	 *
	 * @var array
	 */
	private $expires_soon = [];

	/**
	 * Any plugins of which licenses are expiring soon, but have actual updates are kept here to make sure updates
	 * remain allowed while the license is still valid.
	 *
	 * @var array
	 */
	private $has_update = [];

	/**
	 * FFWPLM_Admin constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_js_scripts' ] );
		add_filter(
			'plugin_action_links_' . plugin_basename( DAAN_LICENSE_MANAGER_PLUGIN_FILE ),
			[ $this, 'add_settings_link' ]
		);
		add_action( 'admin_menu', [ $this, 'create_menu' ] );
		add_filter( 'submenu_file', [ $this, 'hide_menu_item' ] );
		add_action( 'admin_notices', [ $this, 'add_notice' ] );
		add_action( 'all_plugins', [ $this, 'check_license_keys' ] );
		add_action( 'all_plugins', [ $this, 'maybe_block_updates' ] );
		add_filter( 'site_transient_update_plugins', [ $this, 'add_to_update_list' ] );

		// Add Manage License tabs to plugins.
		add_action( 'caos_settings_tab', [ $this, 'add_license_manager_tab' ], 5 );
		add_action( 'omgf_settings_tab', [ $this, 'add_license_manager_tab' ], 4 );

		new \Daan\LicenseManager\Admin\Functions();
	}

	/**
	 * Enqueue JS scripts for Administrator Area.
	 *
	 * @param $hook
	 */
	public function enqueue_admin_js_scripts( $hook ) {
		if ( $hook === 'settings_page_ffwp-license-manager' || $hook === 'plugins.php' ) {
			wp_enqueue_script(
				'ffwp_license_manager_admin',
				plugins_url( 'assets/js/ffwp-license-manager-admin.js', DAAN_LICENSE_MANAGER_PLUGIN_FILE ),
				[ 'jquery' ],
				DAAN_LICENSE_MANAGER_STATIC_VERSION,
				true
			);
		}
	}

	/**
	 * @return array
	 */
	public function add_settings_link( $links ) {
		$admin_url     = $this->manage_license_url();
		$settings_link = "<a href='$admin_url'>" . __( 'Manage Licenses', 'daan-license-manager' ) . '</a>';
		array_push( $links, $settings_link );

		return $links;
	}

	/**
	 * @param int    $download_id Download ID
	 * @param string $license_key An ENCRYPTED license key.
	 *
	 * @return string
	 */
	private function manage_license_url( $download_id = null, $license_key = null ) {
		if ( ! $download_id || ! $license_key ) {
			return admin_url( 'options-general.php?page=ffwp-license-manager' );
		}

		$license_key = LicenseManager::decrypt( $license_key, $download_id );

		return sprintf( LicenseManager::FFW_PRESS_URL_RENEW_LICENSE, $download_id, $license_key );
	}

	/**
	 * Create WP menu-item
	 */
	public function create_menu() {
		add_options_page(
			'Daan.dev License Manager',
			'Daan.dev Licenses',
			'manage_options',
			self::SETTINGS_SECTION,
			[ $this, 'create_license_manager_screen' ]
		);

		add_action( 'admin_init', [ $this, 'register_settings' ] );
	}

	/**
	 * Removes the menu item, but keeps the link reachable.
	 *
	 * @param mixed $submenus
	 *
	 * @return void
	 */
	public function hide_menu_item( $submenus ) {
		remove_submenu_page( 'options-general.php', self::SETTINGS_SECTION );
	}

	/**
	 *
	 */
	public function add_license_manager_tab() {
		$this->generate_tab( 'dashicons-admin-network', 'Manage License' );
	}

	/**
	 * @param      $id
	 * @param null $icon
	 * @param null $label
	 */
	private function generate_tab( $icon = null, $label = null ) {
		?>
        <a class="nav-tab dashicons-before <?php echo esc_attr( $icon ); ?>"
           href="<?php echo esc_url( $this->manage_license_url() ); ?>">
			<?php echo $label; ?>
        </a>
		<?php
	}

	/**
	 *
	 */
	public function create_license_manager_screen() {
		include_once 'View/view-license-manager.php';
	}

	/**
	 * @throws ReflectionException
	 */
	public function register_settings() {
		foreach ( $this->get_settings() as $constant => $value ) {
			register_setting(
				self::SETTINGS_SECTION,
				$value
			);
		}
	}

	/**
	 * Get all settings for the current section using the constants in this class.
	 *
	 * @return array
	 * @throws ReflectionException
	 */
	public function get_settings() {
		$reflection = new \ReflectionClass( $this );
		$constants  = $reflection->getConstants();
		$needle     = 'SETTING_';

		return array_filter(
			$constants,
			function ( $key ) use ( $needle ) {
				return strpos( $key, $needle ) !== false;
			},
			ARRAY_FILTER_USE_KEY
		);
	}

	/**
	 * Add notice to admin screen.
	 */
	public function add_notice() {
		Notice::print_notice();
	}

	/**
	 * This function makes sure the bottom border of the row is removed for plugins where a notice should be displayed.
	 * Then it hooks actions into after_plugin_row_{plugin_basename} to make sure notices are displayed.
	 *
	 * @return void
	 */
	public function check_license_keys( $active_plugins ) {
		$premium_plugins = apply_filters( 'ffwp_license_manager_licenses', [] );

		foreach ( $premium_plugins as $plugin_data ) {
			$plugin_id = $plugin_data[ 'id' ] ?? null;

			if ( ! $plugin_id ) {
				continue;
			}

			if ( $this->is_license_invalid( $plugin_id ) ) {
				// Set update element to true, to remove bottom border in row.
				$active_plugins[ plugin_basename( $plugin_data[ 'plugin_file' ] ) ][ 'update' ] = true;

				add_action(
					'after_plugin_row_' . plugin_basename( $plugin_data[ 'plugin_file' ] ),
					[ $this, 'add_license_notices' ],
					10,
					3
				);
			}
		}

		return $active_plugins;
	}

	/**
	 * Checks if license is in any way invalid.
	 *
	 * @param int $plugin_id
	 *
	 * @return bool
	 */
	private function is_license_invalid( $plugin_id ) {
		$valid_licenses = LicenseManager::valid_licenses();

		return LicenseManager::no_license_entered(
				$valid_licenses,
				$plugin_id
			) || LicenseManager::license_will_expire_soon(
				$valid_licenses,
				$plugin_id
			) || LicenseManager::license_is_expired( $valid_licenses, $plugin_id );
	}

	/**
	 * This function does nothing more than insert an action IF an update for a Daan.dev premium plugin
	 * is available.
	 *
	 * @since v1.8.0
	 * @return void
	 */
	public function maybe_block_updates( $active_plugins ) {
		$premium_plugins = apply_filters( 'ffwp_license_manager_licenses', [] );

		foreach ( $premium_plugins as $plugin_data ) {
			$plugin_file = plugin_basename( $plugin_data[ 'plugin_file' ] );

			// Needs to run before wp_plugin_update_row(), which runs at priority 10.
			add_action( "after_plugin_row_{$plugin_file}", [ $this, 'maybe_block_plugin_update' ], 1 );
		}

		return $active_plugins;
	}

	/**
	 * If a plugin is available for a premium plugin, this plugin checks if a plugin is available
	 * for its parent as well.
	 * If so, the parent needs to be updated first.
	 *
	 * @since v1.8.0
	 *
	 * @param string $file
	 *
	 * @return false|void
	 */
	public function maybe_block_plugin_update( $file ) {
		$available_updates = get_site_transient( 'update_plugins' );
		$parent            = '';

		/**
		 * @since v1.9.1 Some premium plugins are orphans, i.e. they don't have parents.
		 */
		if ( isset( $this->plugin_deps[ $file ] ) ) {
			$parent = $this->plugin_deps[ $file ];
		}

		if ( ! $parent ) {
			return false;
		}

		/**
		 * We only have to adjust the plugin update row if both plugins have an update available.
		 */
		if ( ! isset( $available_updates->response[ $file ] ) || ! isset( $available_updates->response[ $parent ] ) ) {
			// Make sure current plugins transient data is refreshed at next pageload.
			unset( $available_updates->response[ $file ] );
			set_site_transient( 'update_plugins', $available_updates );

			return false;
		}

		// Block automatic update.
		$available_updates->response[ $file ]->package = '';

		set_site_transient( 'update_plugins', $available_updates );

		add_action( "in_plugin_update_message-{$file}", [ $this, 'append_update_notice' ] );
	}

	/**
	 * @return void
	 */
	public function append_update_notice( $plugin_data ) {
		$plugin_file = $plugin_data[ 'plugin' ];
		$parent      = $this->plugin_deps[ $plugin_file ];
		$parent_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $parent );

		printf(
			' <strong><em>' . __(
				'After updating %s, refresh this page to update.',
				'daan-license-manager'
			) . '</em></strong>',
			$parent_data[ 'Name' ]
		);
	}

	/**
	 * Adds premium plugins with expired license to the Update Available list.
	 */
	public function add_to_update_list( $transient ) {
		global $pagenow;

		if ( empty( $transient ) ) {
			return $transient;
		}

		/**
		 * Don't do anything if we're on the Dashboard > Updates page.
		 */
		if ( $pagenow === 'update-core.php' ) {
			foreach ( $transient->response as $slug => $update_data ) {
				if ( empty( $update_data->new_version ) ) {
					unset( $transient->response[ $slug ] );
				}
			}

			return $transient;
		}

		$premium_plugins = apply_filters( 'ffwp_license_manager_licenses', [] );

		foreach ( $premium_plugins as $plugin_data ) {
			$plugin_id = $plugin_data[ 'id' ] ?? '';

			if ( ! $plugin_id ) {
				continue;
			}

			$plugin_file = plugin_basename( $plugin_data[ 'plugin_file' ] );

			// Check if a license is entered.
			if ( $this->is_license_invalid( $plugin_id ) ) {
				// If an update is already available, there's no need for us to recreate this object.
				if ( ! isset( $transient->response[ $plugin_file ] ) ) {
					$transient->response[ $plugin_file ] = (object) [
						'slug'        => pathinfo( $plugin_data[ 'plugin_file' ] )[ 'basename' ],
						'plugin'      => $plugin_file,
						'new_version' => '',
					];
				}

				/**
				 * If license expires soon, add it to the list.
				 *
				 * @see add_license_notices()
				 */
				if ( LicenseManager::license_will_expire_soon( LicenseManager::valid_licenses(), $plugin_id ) ) {
					$this->expires_soon[ $plugin_id ] = $plugin_file;
				}

				/**
				 * If an actual update is available, add this plugin to the list.
				 *
				 * @see add_license_notices()
				 */
				if ( $transient->response[ $plugin_file ]->new_version ) {
					$this->has_update[ $plugin_id ] = $plugin_file;
				}
			}
		}

		return $transient;
	}

	/**
	 * @param mixed $file
	 * @param mixed $plugin_data
	 * @param mixed $status
	 *
	 * @return void
	 */
	public function add_license_notices( $file, $plugin_data, $status ) {
		$slug            = $plugin_data[ 'slug' ] ?? '';
		$premium_plugins = apply_filters( 'ffwp_license_manager_licenses', [] );
		$valid_licenses  = LicenseManager::valid_licenses();
		$notice          = '';
		$class           = 'error';

		foreach ( $premium_plugins as $premium_plugin_data ) {
			$plugin_file = $premium_plugin_data[ 'plugin_file' ];

			// Only handle current plugin.
			if ( strpos( $plugin_file, $file ) == false ) {
				continue;
			}

			$plugin_id = $premium_plugin_data[ 'id' ] ?? null;

			if ( ! $plugin_id ) {
				continue;
			}

			// Check if a license is entered.
			if ( LicenseManager::no_license_entered( $valid_licenses, $plugin_id ) ) {
				$notice = sprintf(
					__(
						'Please <a href="%s">enter a valid license key</a> in order to receive plugin updates and support.',
						'daan-license-manager'
					),
					$this->manage_license_url()
				);
			}

			$expiry_time_stamp = $valid_licenses[ $plugin_id ][ 'expires' ] ?? '';
			$expiry_date       = '';

			if ( $expiry_time_stamp ) {
				$expiry_date = date_create( $valid_licenses[ $plugin_id ][ 'expires' ] );
				$expiry_date = date_format( $expiry_date, 'Y-m-d' );
			}

			// Check if license will expire soon.
			if ( $expiry_date && LicenseManager::license_will_expire_soon( $valid_licenses, $plugin_id ) ) {
				$notice = sprintf(
					__(
						'Your license will expire soon. <a href="%1$s">Renew now</a> to keep receiving plugin updates and support after %2$s (<a href="#" data-key="%3$s" data-item-id="%4$s" data-plugin-file="%5$s" data-nonce="%6$s" class="check-license">click here after renewing</a>)',
						'daan-license-manager'
					),
					$this->manage_license_url( $plugin_id, $valid_licenses[ $plugin_id ][ 'license' ] ),
					$expiry_date,
					$valid_licenses[ $plugin_id ][ 'license' ],
					$plugin_id,
					$plugin_file,
					wp_create_nonce( self::SETTINGS_NONCE )
				);
				$class  = 'warning';
			}

			// Check if license is expired.
			if ( LicenseManager::license_is_expired( $valid_licenses, $plugin_id ) ) {
				$notice = sprintf(
					__(
						'Your license is expired. <a href="%s">Renew now</a> to keep receiving plugin updates and support (<a href="#" data-key="%s" data-item-id="%s" data-plugin-file="%s" data-nonce="%s" class="check-license">click here after renewing</a>)',
						'daan-license-manager'
					),
					$this->manage_license_url( $plugin_id, $valid_licenses[ $plugin_id ][ 'license' ] ),
					$valid_licenses[ $plugin_id ][ 'license' ],
					$plugin_id,
					$plugin_file,
					wp_create_nonce( self::SETTINGS_NONCE )
				);
			}
		}

		if ( ! $notice ) {
			return;
		}

		/**
		 * Because string contains single and double quotes, string needs to be properly escaped. Just in case.
		 */
		$notice = addslashes( $notice );

		/**
		 * This snippet of JS either overwrites or appends to the contents of the update message.
		 */ ?>
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                var row = document.getElementById('<?php echo esc_attr( $slug ); ?>-update');
				<?php if ( $class === 'error' ) : ?>
                row.getElementsByTagName('p')[0].innerHTML = '<?php echo $notice; ?>';
                row.getElementsByClassName('update-message')[0].classList.remove('notice-warning');
                row.getElementsByClassName('update-message')[0].classList.add('notice-error');
				<?php elseif ( in_array( $file, $this->expires_soon, true ) && in_array( $file, $this->has_update, true ) ) : ?>
                row.getElementsByTagName('p')[0].innerHTML += ' <?php echo $notice; ?>';
				<?php else : ?>
                row.getElementsByTagName('p')[0].innerHTML = '<?php echo $notice; ?>';
				<?php endif; ?>
            });
        </script>
		<?php
	}
}
