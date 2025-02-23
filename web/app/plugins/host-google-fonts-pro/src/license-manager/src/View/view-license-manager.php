<?php

/**
 * Developers (or me) can add extra license registration fields using the below filter.
 *
 * The result should be an array element containing the following information:
 * - 'id'         : The ID the plugin has in EDD.
 * - 'label'      : Will be displayed besides the license input field.
 * - 'version'    : The current version of the plugin.
 * - 'plugin_file': The path to the plugin file, required for EDD updates.
 */
$licenses     = apply_filters( 'ffwp_license_manager_licenses', [] );
$just_renewed = __( '<em><a href="#" data-key="%1$s" data-item-id="%2$s" class="check-license">Just renewed</a>?</em>', 'daan-license-manager' );
?>
<div class="wrap">
    <h1><img class="ffwp-logo" alt="Daan.dev logo" src="<?php echo DAAN_LICENSE_MANAGER_PLUGIN_URL; ?>assets/images/daan-dev-logo.png"> <?php echo __(
			'License Manager',
			'daan-license-manager'
		); ?></h1>
    <p>
		<?php echo __( 'Activate your license key to start using your Daan.dev products on this site.', 'daan-license-manager' ); ?>
    </p>
    <h2>
		<?php echo __( 'Don\'t have a License Key?', 'daan-license-manager' ); ?>
    </h2>
    <p>
		<?php echo sprintf(
			__(
				'Daan.dev products require a valid license key to function properly. If somehow you came across this plugin before acquiring one, you can purchase a license at <a href="%s" target="_blank">Daan.dev</a>.'
			),
			'https://daan.dev/'
		); ?>
    </p>
    <h2>
		<?php echo __( 'Where can I find my License Key(s)?', 'daan-license-manager' ); ?>
    </h2>
    <p>
		<?php
		echo sprintf(
			_n(
				'Your license key was sent to the email address you entered upon purchase. Can\'t find the email? Simply <a href="%1$s">login to your account</a> to retrieve your license key.',
				'Your license keys were sent to the email address(es) you entered upon purchase. Can\'t find the email? Simply <a href="%1$s">login to your account</a> to retrieve your license keys.',
				count( $licenses ),
				'daan-license-manager'
			),
			\Daan\LicenseManager\Plugin::FFW_PRESS_URL_LICENSE_KEYS
		);
		?>
    </p>
    <form id="ffwp-license-form" method="post" action="options.php">
		<?php
		settings_fields( \Daan\LicenseManager\Admin::SETTINGS_SECTION );
		do_settings_sections( \Daan\LicenseManager\Admin::SETTINGS_SECTION );
		wp_nonce_field( \Daan\LicenseManager\Admin::SETTINGS_NONCE, \Daan\LicenseManager\Admin::SETTINGS_NONCE );
		?>

        <table class="form-table">
			<?php if ( ! empty( $licenses ) ) : ?>
				<?php foreach ( $licenses as $license ) : ?>
                    <tr>
                        <th scope="row">
                            <label for="<?php echo $license[ 'id' ]; ?>">
								<?php echo $license[ 'label' ]; ?>
                            </label>
                        </th>
                        <td>
							<?php
							$valid_licenses      = \Daan\LicenseManager\Plugin::valid_licenses();
							$license_data        = $valid_licenses[ $license[ 'id' ] ] ?? null;
							$encrypted_key       = $license_data[ 'license' ] ?? '';
							$expiry_date         = $license_data[ 'expires' ] ?? '';
							$expiry_date_seconds = strtotime( $expiry_date );
							$decrypted_key       = '';

							if ( $encrypted_key ) {
								$decrypted_key = \Daan\LicenseManager\Plugin::decrypt( $encrypted_key, $license[ 'id' ] );
							}
							?>
							<?php if ( ! $decrypted_key ) : ?>
                                <!-- License Key failed to decrypt -->
                                <i class="ffwp-icon ffwp-invalid dashicons-before dashicons-no"></i>
							<?php elseif ( \Daan\LicenseManager\Plugin::license_will_expire_soon( $valid_licenses, $license[ 'id' ] ) ) : ?>
                                <!-- License will expires soon -->
                                <i class="ffwp-icon ffwp-valid ffwp-warning">!</i>
							<?php elseif ( \Daan\LicenseManager\Plugin::license_is_expired( $valid_licenses, $license[ 'id' ] ) ) : ?>
                                <!-- License is expired -->
                                <i class="ffwp-icon ffwp-valid ffwp-warning">!</i>
							<?php elseif ( isset( $license_data[ 'license_status' ] ) && $license_data[ 'license_status' ] == 'valid' ) : ?>
                                <!-- License Key is valid -->
                                <i class="ffwp-icon ffwp-valid dashicons-before dashicons-yes"></i>
							<?php else : ?>
                                <!-- Something's wrong -->
                                <i class="ffwp-icon ffwp-invalid dashicons-before dashicons-no"></i>
							<?php endif; ?>
							<?php if ( $license_data !== null && $decrypted_key ) : ?>
								<?php
								$key_length = strlen( $decrypted_key );
								$masked_key = substr_replace( $decrypted_key, str_repeat( '*', $key_length - 10 ), 5, $key_length - 10 );
								?>
                                <input disabled class="ffwp-input-field" style="width: 33%;" type="text" id="<?php echo $license[ 'id' ]; ?>"
                                       value="<?php echo $masked_key; ?>"/>
                                <input type="hidden" name="ffwp_license_key[<?php echo $license[ 'id' ]; ?>][plugin_file]"
                                       class="ffwp-plugin-file"
                                       value="<?php echo esc_attr( $license[ 'plugin_file' ] ); ?>"/>
                                <input type="button" class="button button-secondary ffwp-deactivate-license"
                                       data-key="<?php echo $encrypted_key; ?>"
                                       data-item-id="<?php echo $license[ 'id' ]; ?>"
                                       value="<?php echo __( 'Deactivate License', 'daan-license-manager' ); ?>"/>
							<?php else : ?>
                                <input name="ffwp_license_key[<?php echo $license[ 'id' ]; ?>][key]" class="ffwp-license-key" style="width: 33%; "
                                       type="text"
                                       id="<?php echo $license[ 'id' ]; ?>"/>
                                <input type="hidden" name="ffwp_license_key[<?php echo $license[ 'id' ]; ?>][plugin_file]"
                                       class="ffwp-plugin-file"
                                       value="<?php echo esc_attr( $license[ 'plugin_file' ] ); ?>"/>
                                <input type="button" class="button button-primary ffwp-activate-license"
                                       data-item-id="<?php echo $license[ 'id' ]; ?>"
                                       value="<?php echo __( 'Activate License', 'daan-license-manager' ); ?>"/>
							<?php endif; ?>
                            <p class="description">
								<?php if ( ! $decrypted_key ) : ?>
									<?php
									echo // Empty license fields.
									sprintf(
										__( 'Enter the license key you received upon purchase to validate %s.', 'daan-license-manager' ),
										$license[ 'label' ]
									);
									?>
								<?php elseif ( $expiry_date == 'lifetime' ) : ?>
									<?php
									echo // Lifetime licenses.
									sprintf( __( 'Your license for %s will never expire.', 'daan-license-manager' ), $license[ 'label' ] );
									?>
								<?php elseif ( \Daan\LicenseManager\Plugin::license_will_expire_soon( $valid_licenses, $license[ 'id' ] ) ) : ?>
									<?php
									echo // Licenses expiring within 30 days.
										sprintf(
											__(
												'Your license for %1$s will expire on %2$s. <a target="_blank" href="%3$s">Click here</a> to extend your license.',
												'daan-license-manager'
											),
											$license[ 'label' ],
											date_i18n( get_option( 'date_format' ), $expiry_date_seconds ),
											sprintf( \Daan\LicenseManager\Plugin::FFW_PRESS_URL_RENEW_LICENSE, $license[ 'id' ], $decrypted_key )
										) . ' ' . sprintf( $just_renewed, $encrypted_key, $license[ 'id' ] );
									?>
								<?php elseif ( \Daan\LicenseManager\Plugin::license_is_expired( $valid_licenses, $license[ 'id' ] ) ) : ?>
									<?php
									echo // Expired licenses.
										sprintf(
											__(
												'Your license for %1$s expired on %2$s. <a target="_blank" href="%3$s">Click here</a> to renew your license.',
												'daan-license-manager'
											),
											$license[ 'label' ],
											date_i18n( get_option( 'date_format' ), $expiry_date_seconds ),
											sprintf( \Daan\LicenseManager\Plugin::FFW_PRESS_URL_RENEW_LICENSE, $license[ 'id' ], $decrypted_key )
										) . ' ' . sprintf( $just_renewed, $encrypted_key, $license[ 'id' ] );
									?>
								<?php elseif ( $expiry_date ) : ?>
									<?php
									echo // Valid, non-expired licenses.
									sprintf(
										__( 'Your license for %1$s will expire on %2$s.', 'daan-license-manager' ),
										$license[ 'label' ],
										date_i18n( get_option( 'date_format' ), $expiry_date_seconds )
									);
									?>
								<?php else : ?>
									<?php
									echo // Empty license fields.
									sprintf(
										__( 'Enter the license key you received upon purchase to validate %s.', 'daan-license-manager' ),
										$license[ 'label' ]
									);
									?>
								<?php endif; ?>
                            </p>
                        </td>
                    </tr>
				<?php endforeach; ?>
			<?php else : ?>
                <tr>
                    <th scope="row">
						<?php echo __( 'No licenses found. Are your Daan.dev installed and activated?', 'daan-license-manager' ); ?>
                    </th>
                    <td></td>
                </tr>
			<?php endif; ?>
        </table>

		<?php if ( ! defined( \Daan\LicenseManager\Plugin::DAAN_LM_ENC_KEY_LABEL ) ) : ?>
            <a href="#" class="button button-primary pulse" id="ffwp_install_enc_key"><?php echo __(
					'Install Missing Encryption Key',
					'ffwp-license-manager'
				); ?></a>
		<?php endif; ?>
    </form>
</div>

<style>
    .ffwp-logo {
        height: 35px;
        vertical-align: middle;
    }

    .ffwp-icon {
        position: relative;
        float: left;
        height: 17px;
        width: 23px;
        padding: 6px 5px 6px 5px;
        border-radius: 2px;
    }

    .ffwp-icon:before {
        position: absolute;
        left: 0;
        bottom: 10px;
        font-size: 32px;
        color: white;
    }

    .ffwp-icon.ffwp-valid {
        background-color: #2ECC40;
    }

    .ffwp-icon.ffwp-valid.ffwp-warning {
        background-color: #FF851B;
        text-align: center;
        font-size: 24px;
        font-style: initial;
        font-weight: bold;
        color: white;
        line-height: .6;
    }

    .ffwp-icon.ffwp-invalid {
        background-color: #FF4136;
    }

    .pulse {
        margin: 0 auto;
        animation-name: stretch;
        animation-duration: .4s;
        animation-timing-function: ease-out;
        animation-direction: alternate;
        animation-iteration-count: 6;
        animation-play-state: running;
    }

    @keyframes stretch {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.25);
        }
    }
</style>
