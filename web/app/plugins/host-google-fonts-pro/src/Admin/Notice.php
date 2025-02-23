<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh. All Rights Reserved.
 */

namespace OMGF\Pro\Admin;

class Notice {
	const OMGF_PRO_ADMIN_NOTICE_TRANSIENT  = 'omgf_pro_admin_notice';

	const OMGF_PRO_ENROLLMENT_TRANSIENT    = 'omgf_pro_enrollment_shown';

	const OMGF_PRO_ADMIN_NOTICE_EXPIRATION = 60;

	/** @var array $notices */
	public static $notices = [];

	/**
	 * @param string $message
	 * @param string $type (info|warning|error|success)
	 * @param string $id
	 * @param string $screen_id
	 * @param int    $expire
	 */
	public static function set_notice(
		$message,
		$type = 'success',
		$id = '',
		$screen_id = 'all',
		$expire = self::OMGF_PRO_ADMIN_NOTICE_EXPIRATION
	) {
		self::$notices = get_transient( self::OMGF_PRO_ADMIN_NOTICE_TRANSIENT );

		if ( ! self::$notices ) {
			self::$notices = [];
		}

		self::$notices[ $screen_id ][ $type ][ $id ] = $message;

		set_transient( self::OMGF_PRO_ADMIN_NOTICE_TRANSIENT, self::$notices, $expire );
	}

	/**
	 * Prints notice (if any)
	 */
	public static function print_notice() {
		$admin_notices = get_transient( self::OMGF_PRO_ADMIN_NOTICE_TRANSIENT );

		if ( is_array( $admin_notices ) ) {
			$current_screen = get_current_screen();

			foreach ( $admin_notices as $screen => $notice ) {
				if ( ! defined( 'DAAN_DOING_TESTS' ) && $current_screen->id !== $screen && $screen !== 'all' ) {
					continue; // @codeCoverageIgnore
				}

				foreach ( $notice as $type => $message ) {
					?>
                    <div id="message" class="notice notice-<?php echo esc_attr( $type ); ?> is-dismissible">
						<?php foreach ( $message as $line ) : ?>
                            <p><strong><?php echo wp_kses( $line, 'post' ); ?></strong></p>
						<?php endforeach; ?>
                    </div>
					<?php
				}
			}
		}

		delete_transient( self::OMGF_PRO_ADMIN_NOTICE_TRANSIENT );
	}
}
