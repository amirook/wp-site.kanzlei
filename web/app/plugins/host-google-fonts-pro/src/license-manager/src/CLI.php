<?php
/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace Daan\LicenseManager;

use Daan\LicenseManager\Admin\Functions;
use Daan\LicenseManager\Plugin as LicenseManager;

class CLI {
	/**
	 * List of items we should log in the terminal if activation is succesful.
	 *
	 * @var string[]
	 */
	private $log_info = [
		'activations_left',
		'expires',
		'item_name',
		'license',
		'license_limit',
	];

	/**
	 * Lists all installed plugins in the terminal, along with their internal IDs.
	 *
	 * Example: wp daan list plugins
	 *
	 * @return void
	 */
	public function list_plugins() {
		$installed_plugins = apply_filters( 'ffwp_license_manager_licenses', [] );

		if ( empty( $installed_plugins ) ) {
			\WP_CLI::error( __( 'Oops! I couldn\'t find any installed plugins.', 'daan-license-manager' ) );
		}

		\WP_CLI::success(
			sprintf(
				_n(
					'Awesome! I found %s installed plugin.',
					'Awesome! I found %s installed plugins.',
					count( $installed_plugins ),
					'daan-license-manager'
				),
				count( $installed_plugins )
			)
		);

		foreach ( $installed_plugins as $plugin ) {
			\WP_CLI::line( sprintf( __( 'Plugin Name: %1$s / ID: %2$s', 'daan-license-manager' ), $plugin[ 'label' ], $plugin[ 'id' ] ) );
		}
	}

	/**
	 * Activate a license by providing its key and item ID. Run `wp daan list` to list all installed Daan.dev plugins on your system along with their
	 * internal item IDs.
	 *
	 * Example: wp daan activate --key="123abc456etc" --id="1234"
	 *
	 * @param mixed $args
	 * @param mixed $assoc_args
	 *
	 * @return void
	 */
	public function activate( $args, $assoc_args ) {
		/**
		 * We intentionally use extract here as we're in the terminal. If a malicious user has access here, user has bigger fish to fry.
		 */
		// phpcs:ignore
		extract( $assoc_args );

		/**
		 * TODO: We could clean all other vars using get_defined_vars() to prevent malicious use.
		 */

		if ( empty( $key ) || empty( $id ) ) {
			\WP_CLI::error(
				__(
					'Please specify the license key (e.g. --key="123abc456etc") and/or internal ID (e.g. --id="1234") of the plugin you wish to activate.',
					'daan-license-manager'
				)
			);
		}

		$license_manager = new Functions();
		$license_data    = $license_manager->activate_license( $key, $id );

		if ( ! empty( $license_data ) && isset( $license_data->success ) && $license_data->success === true ) {
			\WP_CLI::success( __( 'Yay! Your license was successfully activated!', 'daan-license-manager' ) );

			foreach ( $license_data as $data_key => $data ) {
				if ( ! in_array( $data_key, $this->log_info ) ) {
					continue;
				}

				$data_name = \ucwords( str_replace( '_', ' ', $data_key ) );

				\WP_CLI::line( \WP_CLI::colorize( "%B$data_name:%n $data" ) );
			}
		}

		\WP_CLI::line( __( 'Preparing license data for storage to database...', 'daan-license-manager' ) );

		$installed_plugins = apply_filters( 'ffwp_license_manager_licenses', [] );

		foreach ( $installed_plugins as $plugin ) {
			if ( $plugin[ 'id' ] === (int) $id ) {
				break;
			}
		}

		$valid_licenses        = LicenseManager::valid_licenses();
		$valid_licenses[ $id ] = $license_manager->generate_valid_license_data(
			$license_data->license,
			$key,
			$license_data->expires ?? null,
			$plugin[ 'plugin_file' ]
		);

		// Store key data to database.
		update_option( Admin::OPTION_VALID_LICENSES, $valid_licenses );

		\WP_CLI::line( __( 'Storing encrypted license data...', 'daan-license-manager' ) );

		$stored_license_keys        = get_option( Admin::SETTING_LICENSE_KEY );
		$stored_license_keys[ $id ] = [
			'key'         => $valid_licenses[ $id ][ 'license' ],
			'plugin_file' => $plugin[ 'plugin_file' ],
			'encrypted'   => true,
		];

		// Store license data to database.
		update_option( Admin::SETTING_LICENSE_KEY, $stored_license_keys );

		// Reset transient.
		delete_transient( Admin::NOTICE_COUNT );

		\WP_CLI::success( __( 'Done!', 'daan-license-manager' ) );
	}
}
