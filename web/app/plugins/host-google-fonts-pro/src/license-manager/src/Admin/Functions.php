<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace Daan\LicenseManager\Admin;

use Daan\LicenseManager\Admin;
use Daan\LicenseManager\Plugin as LicenseManager;

class Functions {
	/**
	 * Admin_Functions constructor.
	 */
	public function __construct() {
		add_filter( 'pre_update_option_' . Admin::SETTING_LICENSE_KEY, [ $this, 'encrypt_license_key_settings' ], 10, 1 );
		add_action( 'admin_action_update', [ $this, 'update_post' ] );
	}

	/**
	 * @param mixed $items
	 *
	 * @return mixed
	 */
	public function encrypt_license_key_settings( $items ) {
		// phpcs:ignore
		if ( $items == null ) {
			return get_option( Admin::SETTING_LICENSE_KEY );
		}

		foreach ( $items as &$item ) {
			if ( ! $item[ 'key' ] || isset( $item[ 'encrypted' ] ) ) {
				continue;
			}

			$item[ 'key' ] = LicenseManager::encrypt( $item[ 'key' ] );
		}

		return $items;
	}

	/**
	 * Activate license key.
	 *
	 * @param string $key     A valid license key provided by EDD.
	 * @param string $item_id The unique ID provided by EDD.
	 *
	 * @return object
	 */
	public function activate_license( $key, $item_id ) {
		if ( ! $key ) {
			return (object) [];
		}

		$params = [
			'edd_action' => 'activate_license',
			'license'    => $key,
			'item_id'    => $item_id,
			'url'        => home_url(),
		];

		$response = wp_remote_post(
			apply_filters( 'ffwp_license_manager_api_url', 'https://daan.dev' ),
			[
				'timeout'   => 15,
				'sslverify' => false,
				'body'      => $params,
			]
		);

		$message = '';

		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			$message = ( is_wp_error( $response ) && ! empty( $response->get_error_message() ) ) ? $response->get_error_message() : sprintf(
				__( 'An error occurred, contact support and include the following message: %1$s - %2$s', 'daan-license-manager' ),
				wp_remote_retrieve_response_code( $response ),
				wp_remote_retrieve_body( $response )
			);

			if ( defined( 'WP_CLI' ) && WP_CLI ) {
				\WP_CLI::error( $message );
			}

			Notice::set_notice( $message, 'error' );

			return (object) [];
		}

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		if ( $license_data !== null && $license_data->success === false ) {
			if ( $license_data->error === 'expired' ) {
				$message = $this->generate_message( $license_data->error, $license_data->item_name, $license_data->expires, $item_id, $key );
			} else {
				$message = $this->generate_message( $license_data->error, $license_data->item_name );
			}
		}

		if ( ! empty( $message ) ) {
			if ( defined( 'WP_CLI' ) && WP_CLI ) {
				\WP_CLI::error( $message );
			}

			Notice::set_notice( $message, 'error' );
		}

		return $license_data;
	}

	/**
	 * Generate error message.
	 *
	 * @param mixed      $error_code
	 * @param mixed      $plugin_name
	 * @param mixed|null $expires
	 * @param string     $item_id
	 * @param string     $key
	 *
	 * @return string
	 */
	private function generate_message( $error_code, $plugin_name, $expires = null, $item_id = '', $key = '' ) {
		switch ( $error_code ) {
			case 'expired':
				$message = sprintf(
					__( 'Your license key expired on %1$s. <a href="%2$s" target="_blank">Click here to renew</a>.', 'daan-license-manager' ),
					date_i18n( get_option( 'date_format' ), strtotime( $expires, current_time( 'timestamp' ) ) ),
					sprintf( LicenseManager::FFW_PRESS_URL_RENEW_LICENSE, $item_id, $key )
				);
				break;
			case 'revoked':
				$message = __( 'Your license key has been disabled.', 'daan-license-manager' );
				break;
			case 'missing':
				$message = sprintf(
					__(
						'License key doesn\'t exist. Purchase a license key on <a href="%s" target="_blank">Daan.dev</a>.',
						'daan-license-manager'
					),
					LicenseManager::FFW_PRESS_URL_WORDPRESS_PLUGINS
				);
				break;
			case 'invalid':
			case 'site_inactive':
				$message = __( 'Your license is not active for this URL.', 'daan-license-manager' );
				break;
			case 'item_name_mismatch':
				$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'daan-license-manager' ), $plugin_name );
				break;
			case 'no_activations_left':
				$message = sprintf(
					__(
						'You\'ve reached your limit for your license. Visit <a href="%s" target="_blank">your Account area</a> to upgrade your license or click on Manage Sites next to the corresponding license and free up a site activation slot for this license key.',
						'daan-license-manager'
					),
					LicenseManager::FFW_PRESS_URL_LICENSE_KEYS
				);
				break;
			default:
				$message = sprintf(
					__( 'An unexpected error occurred. Please <a href="%s">contact me</a>.', 'daan-license-manager' ),
					LicenseManager::FFW_PRESS_URL_CONTACT
				);
				break;
		}

		return $message;
	}

	/**
	 * Generate a data array for storage of a validated license.
	 *
	 * @param string $status      'valid' | 'invalid'
	 * @param string $key         Entered key
	 * @param string $expires     Not present when request failed. Is either data formatted as string or 'lifetime'.
	 * @param string $plugin_file Added by plugin.
	 *
	 * @return string[]
	 */
	public function generate_valid_license_data( $status = '', $key = '', $expires = '', $plugin_file = '' ) {
		return [
			'license_status' => $status,
			'license'        => LicenseManager::encrypt( $key ),
			'expires'        => $expires,
			'plugin_file'    => $plugin_file,
		];
	}

	/**
	 * Merge existing keys with newly added keys.
	 *
	 * @return void
	 */
	public function update_post() {
		if ( isset( $_POST[ 'option_page' ] ) && $_POST[ 'option_page' ] !== 'ffwp-license-manager' ) {
			return;
		}

		if ( ! isset( $_POST[ Admin::SETTING_LICENSE_KEY ] ) ) {
			return;
		}

		$existing_keys = get_option( Admin::SETTING_LICENSE_KEY ) ?: [];

		foreach ( $existing_keys as &$key ) {
			$key[ 'encrypted' ] = true;
		}

		$_POST[ Admin::SETTING_LICENSE_KEY ] = $_POST[ Admin::SETTING_LICENSE_KEY ] + $existing_keys;
	}
}
