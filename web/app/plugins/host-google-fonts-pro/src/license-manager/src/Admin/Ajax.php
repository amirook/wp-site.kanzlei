<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace Daan\LicenseManager\Admin;

use Daan\LicenseManager\Admin;
use Daan\LicenseManager\Admin\Functions;
use Daan\LicenseManager\Plugin as LicenseManager;

class Ajax {
	/**
	 * Actions & Hooks
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_ajax_ffwp_license_manager_activate', [ $this, 'activate_license' ] );
		add_action( 'wp_ajax_ffwp_license_manager_deactivate', [ $this, 'deactivate_license' ] );
		add_action( 'wp_ajax_ffwp_license_manager_check', [ $this, 'check_license' ] );
		add_action( 'wp_ajax_ffwp_license_manager_install_enc_key', [ $this, 'install_encryption_key' ] );
		add_action( 'wp_ajax_ffwp_license_manager_decrypt', [ $this, 'decrypt_license_key' ] );
	}

	/**
	 * Saves a license as activated in the database. This function does NOT "call home" to activate the license. This is done using JS in the browser
	 * to avoid blocked IP issues as described in [DLM-19].
	 *
	 * @return void
	 */
	public function activate_license() {
		if ( ! isset( $_POST[ 'item_id' ] ) || ! isset( $_POST[ 'license' ] ) || ! isset( $_POST[ 'license_data' ] ) ) {
			return;
		}

		check_ajax_referer( Admin::SETTINGS_NONCE, Admin::SETTINGS_NONCE );

		$license_data = $_POST[ 'license_data' ];

		/**
		 * If no license data was returned. Skip out early.
		 */
		if ( ! $license_data || empty( (array) $license_data ) || ! $license_data[ 'success' ] ) {
			return;
		}

		$id              = $_POST[ 'item_id' ];
		$license_key     = $_POST[ 'license' ];
		$plugin_file     = $_POST[ 'plugin_file' ];
		$license_manager = new Functions();

		/**
		 * Contains all required data for automatic updates.
		 *
		 * @var array $valid_license
		 */
		$valid_license[ $id ] = $license_manager->generate_valid_license_data(
			$license_data[ 'license' ], // License Status
			$license_key, // License Key
			$license_data[ 'expires' ], // Expires,
			$plugin_file // Full Path to plugin
		);

		$valid_licenses        = get_option( Admin::OPTION_VALID_LICENSES );
		$valid_licenses[ $id ] = $valid_license[ $id ];

		update_option( Admin::OPTION_VALID_LICENSES, $valid_licenses );

		Notice::set_notice( __( 'License activated successfully.', 'daan-license-manager' ) );

		// Reset Admin Notice transient.
		delete_transient( Admin::NOTICE_COUNT );
	}

	/**
	 * Deletes an activated license from the DB. This function does not call home, as that is done by JS as described in DLM-19.
	 */
	public function deactivate_license() {
		if ( ! isset( $_POST[ 'item_id' ] ) ) {
			wp_send_json_error( __( 'Plugin ID not set.', 'daan-license-manager' ) );
		}

		check_ajax_referer( Admin::SETTINGS_NONCE, Admin::SETTINGS_NONCE );

		/**
		 * First remove the entry from the DB.
		 */
		$item_id        = sanitize_text_field( $_POST[ 'item_id' ] );
		$valid_licenses = LicenseManager::valid_licenses();
		$license_keys   = get_option( Admin::SETTING_LICENSE_KEY );

		unset( $valid_licenses[ $item_id ] );

		update_option( Admin::OPTION_VALID_LICENSES, $valid_licenses );

		unset( $license_keys[ $item_id ] );

		/**
		 * To prevent double encryption, the 'encrypted' boolean needs to be set.
		 */
		foreach ( $license_keys as &$existing_key ) {
			$existing_key[ 'encrypted' ] = true;
		}

		update_option( Admin::SETTING_LICENSE_KEY, $license_keys );

		Notice::set_notice( __( 'License deactivated successfully.', 'daan-license-manager' ) );

		delete_transient( Admin::NOTICE_COUNT );

		wp_send_json_success();
	}

	/**
	 * Validates a license and overwrites the current data in the DB. This function does not call home, as that is done by JS as described in DLM-19.
	 *
	 * @return void
	 */
	public function check_license() {
		if ( ! isset( $_POST[ 'item_id' ] ) ) {
			wp_send_json_error( __( 'Plugin ID not set.', 'daan-license-manager' ) );
		}

		check_ajax_referer( Admin::SETTINGS_NONCE, Admin::SETTINGS_NONCE );

		$item_id      = sanitize_text_field( $_POST[ 'item_id' ] );
		$license_data = $_POST[ 'license_data' ];

		/**
		 * If 'success' element turns out false, something weird is going on. If 'license' element is still invalid. User didn't renew the license and has nothing to do here.
		 */
		if ( $license_data[ 'success' ] === false || $license_data[ 'license' ] === 'invalid' ) {
			return;
		}

		$item_name      = $license_data[ 'item_name' ];
		$valid_licenses = LicenseManager::valid_licenses();

		if ( ! isset( $valid_licenses[ $item_id ] ) ) {
			$message = sprintf( __( 'No license exists for %s.', 'daan-license-manager' ), $item_name );
			Notice::set_notice( $message, 'error' );

			wp_send_json_error();
		}

		// If 'expires' is empty, the license was never renewed.
		if ( empty( $license_data[ 'expires' ] ) ) {
			Notice::set_notice( __( 'This license is expired', 'daan-license-manager' ) );

			wp_send_json_error();
		}

		$updated_information = [
			'license_status' => $license_data[ 'license' ],
			'expires'        => $license_data[ 'expires' ],
		];

		$valid_licenses[ $item_id ] = array_replace( $valid_licenses[ $item_id ], $updated_information );

		update_option( Admin::OPTION_VALID_LICENSES, $valid_licenses );

		Notice::set_notice( __( 'License data successfully refreshed.', 'daan-license-manager' ) );

		delete_transient( Admin::NOTICE_COUNT );
	}

	/**
	 * Runs a few checks to properly install the encryption key. If it fails, the message will reappear.
	 */
	public function install_encryption_key() {
		LicenseManager::install_encryption_key();

		wp_send_json_success();
	}

	/**
	 * @return void
	 */
	public function decrypt_license_key() {
		if ( ! isset( $_POST[ 'item_id' ] ) || ! isset( $_POST[ 'license_key' ] ) ) {
			wp_send_json_error( __( 'Required parameters missing.', 'daan-license-manager' ) );
		}

		check_ajax_referer( Admin::SETTINGS_NONCE );

		$item_id       = sanitize_text_field( $_POST[ 'item_id' ] );
		$license_key   = sanitize_text_field( $_POST[ 'license_key' ] );
		$decrypted_key = LicenseManager::decrypt( $license_key, $item_id );

		if ( ! $decrypted_key ) {
			wp_send_json_error();
		}

		wp_send_json_success( [ 'key' => $decrypted_key ] );
	}
}
