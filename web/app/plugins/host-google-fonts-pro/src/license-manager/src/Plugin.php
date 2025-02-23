<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace Daan\LicenseManager;

use Daan\LicenseManager\Admin\Notice;
use Daan\LicenseManager\Updater;

class Plugin {
	const FFW_PRESS_URL_WORDPRESS_PLUGINS = 'https://daan.dev/wordpress-plugins';

	const FFW_PRESS_URL_LICENSE_KEYS      = 'https://daan.dev/account/license-keys/';

	const FFW_PRESS_URL_RENEW_LICENSE     = 'https://daan.dev/checkout/?nocache=true&download_id=%s&edd_license_key=%s';

	const FFW_PRESS_URL_CONTACT           = 'https://daan.dev/contact';

	const DAAN_LM_ENC_KEY_LABEL           = 'DAAN_LICENSE_ENC_KEY';

	const FFWP_ENCRYPTION_METHOD          = 'AES-128-CTR';

	/**
	 * Plugin constructor.
	 */
	public function __construct() {
		$this->generate_cypher();

		add_filter( 'edd_sl_api_request_verify_ssl', '__return_true' );
		add_action( 'cli_init', [ $this, 'register_cli_commands' ] );
		add_action( 'wp_loaded', [ $this, 'do_updater' ] );

		if ( ! is_admin() ) {
			return;
		}

		$this->init();
	}

	/**
	 * Generates cypher used for encryption and stores it into the database.
	 */
	private function generate_cypher() {
		/**
		 * @since v1.10.3 No need to go through all that when the cypher is
		 *                already defined.
		 */
		if ( defined( 'CYPHER' ) ) {
			return;
		}

		$cypher = get_option( Admin::OPTION_CYPHER );

		if ( ! $cypher ) {
			$cypher = bin2hex( random_bytes( 8 ) );

			update_option( Admin::OPTION_CYPHER, $cypher );
		}

		define( 'CYPHER', $cypher );
	}

	/**
	 * Initiate Daan.dev License Manager
	 */
	private function init() {
		$db = get_option( Admin::OPTION_DB_VERSION );

		if ( version_compare( $db, DAAN_LICENSE_MANAGER_DB_VERSION ) < 0 ) {
			new DB\Migration();
		}

		new Admin();
		new Admin\Ajax();
	}

	/**
	 * Encrypt key for storage.
	 *
	 * @param mixed $key
	 *
	 * @return string
	 */
	public static function encrypt( $key ) {
		if ( ! defined( self::DAAN_LM_ENC_KEY_LABEL ) ) {
			Notice::set_notice(
				sprintf(
					__(
						'Your Daan.dev/Daan.dev license(s) failed to validate, because required encryption keys are missing. Visit the <a href="%1$s">Manage Licenses</a> page to fix it. If this message reappears, try reloading the page, otherwise <a href="%2$s">fix it manually</a>.',
						'ffwp-license-manager'
					),
					admin_url( 'options-general.php?page=ffwp-license-manager' ),
					'https://daan.dev/docs/getting-started/activate-license/#encryption-key'
				),
				'error',
				'ffwp-encryption-key-missing',
				'all',
				1
			);

			return '';
		}

		return openssl_encrypt( $key, self::FFWP_ENCRYPTION_METHOD, DAAN_LICENSE_ENC_KEY, 0, CYPHER );
	}

	/**
	 * Install the encryption key to wp-config.php
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public static function install_encryption_key() {
		if ( defined( self::DAAN_LM_ENC_KEY_LABEL ) || apply_filters( 'daan_do_not_install_encryption_key', false ) ) {
			return;
		}

		if ( file_exists( ABSPATH . 'wp-config.php' ) && is_writable( ABSPATH . 'wp-config.php' ) ) {
			self::write_to_config_file( ABSPATH . 'wp-config.php' );
		} elseif ( file_exists( dirname( ABSPATH ) . '/wp-config.php' ) && is_writable( dirname( ABSPATH ) . '/wp-config.php' ) ) {
			self::write_to_config_file( dirname( ABSPATH ) . '/wp-config.php' );
		}
	}

	/**
	 * Generates a cypher of 64 characters and writes it to wp-config.php.
	 *
	 * @since v1.10.2
	 * @return void
	 * @var string $path The absolute path to to the wp-config.php file.
	 *
	 */
	private static function write_to_config_file( $path ) {
		$wp_config = file_get_contents( $path );
		$label     = self::DAAN_LM_ENC_KEY_LABEL;
		$enc_key   = defined( 'AUTH_SALT' ) ? AUTH_SALT : bin2hex( random_bytes( 32 ) );
		$wp_config = preg_replace(
			"/^([\r\n\t ]*)(\<\?)(php)?/i",
			"<?php\n// Added by Daan.dev License Manager. Do not change/remove this.\ndefine('$label', '$enc_key');",
			$wp_config
		);

		file_put_contents( $path, $wp_config );
	}

	/**
	 * Check if license is entered.
	 *
	 * @param array $valid_licenses
	 * @param int   $plugin_id
	 *
	 * @return bool
	 */
	public static function no_license_entered( $valid_licenses, $plugin_id ) {
		return ! isset( $valid_licenses[ $plugin_id ] );
	}

	/**
	 * Check if $expiry_date of license will expire within 7 days.
	 *
	 * @param array $valid_licenses
	 * @param int   $plugin_id
	 *
	 * @return bool
	 */
	public static function license_will_expire_soon( $valid_licenses, $plugin_id ) {
		/**
		 * If 'expires' is set to lifetime, set $expiry_date to 'lifetime'. If not, convert to time.
		 */
		$expiry_date = isset( $valid_licenses[ $plugin_id ][ 'expires' ] ) ?
			( $valid_licenses[ $plugin_id ][ 'expires' ] === 'lifetime' ? 'lifetime' : strtotime( $valid_licenses[ $plugin_id ][ 'expires' ] ) ) : '';

		if ( $expiry_date === 'lifetime' ) {
			return false;
		}

		return ( isset( $valid_licenses[ $plugin_id ] ) && $expiry_date > strtotime( 'now' ) && $expiry_date < strtotime( '+7 days' ) );
	}

	/**
	 * Check if $expiry_date of license has passed.
	 *
	 * @param array $valid_licenses
	 * @param int   $plugin_id
	 *
	 * @return bool
	 */
	public static function license_is_expired( $valid_licenses, $plugin_id ) {
		if ( ! isset( $valid_licenses[ $plugin_id ] ) ) {
			return false;
		}

		/**
		 * If 'expires' is set to lifetime, set $expiry_date to 'lifetime'. If not, convert to time.
		 */
		$expiry_date = isset( $valid_licenses[ $plugin_id ][ 'expires' ] ) ?
			( $valid_licenses[ $plugin_id ][ 'expires' ] === 'lifetime' ? 'lifetime' : strtotime( $valid_licenses[ $plugin_id ][ 'expires' ] ) ) : '';

		if ( $expiry_date === 'lifetime' ) {
			return false;
		}

		$license_status = $valid_licenses[ $plugin_id ][ 'license_status' ] ?? '';

		return ( $license_status === 'valid' && $expiry_date < strtotime( 'now' ) ) || $license_status === 'expired';
	}

	/**
	 * Register CLI commands, which allow license (de-)activation through WP CLI.
	 *
	 * @return void
	 */
	public function register_cli_commands() {
		\WP_CLI::add_command( 'daan', '\Daan\LicenseManager\CLI' );
	}

	/**
	 * Check for updates for all installed plugins, incl. this (free) plugin.
	 */
	public function do_updater() {
		foreach ( self::valid_licenses() as $id => $license_data ) {
			if ( $license_data[ 'license_status' ] !== 'valid' ) {
				continue;
			}

			if ( ! function_exists( 'is_plugin_active' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugin_file = plugin_basename( $license_data[ 'plugin_file' ] );

			/**
			 * @see is_plugin_active() returns the DB entry. If a plugin was deleted by SSH/FTP or anything, that will still return true.
			 * That's why we explicitly check if the file exists.
			 */
			if ( ! is_plugin_active( $plugin_file ) || ! file_exists( $license_data[ 'plugin_file' ] ) ) {
				continue;
			}

			$plugin_file = $license_data[ 'plugin_file' ] ?? '';
			$plugin_data = get_plugin_data( $plugin_file, false, false );

			if ( ! isset( $plugin_data[ 'Version' ] ) ) {
				continue;
			}

			$license_key = self::decrypt( $license_data[ 'license' ], $id );

			/**
			 * No need to continue if $license_key doesn't exist.
			 */
			if ( ! $license_key ) {
				continue;
			}

			$plugin_version = $plugin_data[ 'Version' ];

			new Updater(
				apply_filters( 'ffwp_license_manager_api_url', 'https://daan.dev' ), $plugin_file, [
					'license' => $license_key,
					'item_id' => $id,
					'version' => $plugin_version,
					'author'  => 'Daan van den Bergh',
					'url'     => home_url(),
					'beta'    => false,
				]
			);
		}
	}

	/**
	 * Fetches all previously validated licenses from the database.
	 *
	 * @return array
	 */
	public static function valid_licenses() {
		static $valid_licenses = [];

		if ( empty( $valid_licenses ) ) {
			$valid_licenses = get_option( Admin::OPTION_VALID_LICENSES, [] );
		}

		if ( empty( $valid_licenses ) ) {
			return [];
		}

		return $valid_licenses;
	}

	/**
	 * Decrypt $key (and validate) before returning the result.
	 *
	 * @param string $key Encrypted string.
	 * @param int    $id  Download ID.
	 *
	 * @return string
	 */
	public static function decrypt( $key, $id ) {
		/**
		 * @since v1.10.3 Store decrypted keys in a static array to prevent duplicate decrypts.
		 */
		static $decrypted_keys;

		if ( is_array( $decrypted_keys ) && isset( $decrypted_keys[ $id ] ) ) {
			return $decrypted_keys[ $id ];
		}

		if ( ! defined( self::DAAN_LM_ENC_KEY_LABEL ) ) {
			Notice::set_notice(
				sprintf(
					__(
						'Your Daan.dev license(s) failed to validate, because required encryption keys are missing. Visit the <a href="%1$s">Manage Licenses</a> page to fix it. If this message reappears, try reloading the page, otherwise <a href="%2$s">fix it manually</a>.',
						'ffwp-license-manager'
					),
					admin_url( 'options-general.php?page=ffwp-license-manager' ),
					'https://daan.dev/docs/getting-started/activate-license/#encryption-key'
				),
				'error',
				'ffwp-encryption-key-missing',
				'all',
				1
			);

			return '';
		}

		$decrypted_keys[ $id ] = openssl_decrypt( $key, self::FFWP_ENCRYPTION_METHOD, DAAN_LICENSE_ENC_KEY, 0, CYPHER );

		self::debug( "Decrypted key: $decrypted_keys[$id]." );

		/**
		 * Run a quick validation, before returning the result.
		 */
		if ( self::validate( $decrypted_keys[ $id ] ) ) {
			self::debug( "Validation succeeded for $id and key: $decrypted_keys[$id]." );

			return $decrypted_keys[ $id ];
		}

		self::debug( "Validation failed for $id and encrypted key: $key. Result was: $decrypted_keys[$id]." );

		// check if plugin is active.

		Notice::set_notice(
			sprintf(
				__(
					'Your Daan.dev license(s) failed to validate, likely because the encryption key has changed. Visit the <a href="%s">Manage Licenses</a> page and re-enter your license keys.',
					'ffwp-license-manager'
				),
				admin_url( 'options-general.php?page=ffwp-license-manager' )
			),
			'error',
			'ffwp-license-key-corrupt',
			'all',
			1
		);

		return '';
	}

	/**
	 * Global debug logging function.
	 *
	 * @param mixed $message
	 *
	 * @return void
	 */
	public static function debug( $message ) {
		if ( ! defined( 'DEBUG_MODE' ) || DEBUG_MODE === false ) {
			return;
		}

		error_log( current_time( 'Y-m-d H:i:s' ) . ": $message\n", 3, trailingslashit( WP_CONTENT_DIR ) . 'daan-debug.log' );
	}

	/**
	 * Check if $key contains only letters and numbers and is 32 characters long.
	 */
	public static function validate( $key ) {
		$trim_key = trim( $key );

		return preg_match( '/^[A-Za-z0-9]{32}$/', $trim_key ) === 1;
	}
}
