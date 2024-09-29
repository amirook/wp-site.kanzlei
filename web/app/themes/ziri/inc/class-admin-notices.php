<?php
/**
 * Ziri Admin Notices
 *
 * @package  Ziri
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ziri_Admin_Notice' ) ) :

	/**
	 * Ziri Admin Notices
	 */
	class Ziri_Admin_Notice {
		/**
		 * @since 1.0.0
		 */
		public function __construct() {
            add_action( 'admin_notices', array( $this, 'admin_notices' ), 99 );
			add_action( 'wp_ajax_ziri_dismiss_notice', array( $this, 'dismiss_notices' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Output admin notices.
		 *
		 * @since 1.0.0
		 */
		public function admin_notices() {
			global $pagenow;

			if ( true === (bool) get_option( 'ziri_notice_dismissed' ) ) {
				return;
			}
			if ( 'themes.php' === $pagenow  && !( isset( $_GET['page'] ) && $_GET['page'] == 'ziri-dashboard' ) ) { ?>
			<div class="notice notice-info ziri-dismiss-btn is-dismissible">
				<div class="ziri-install-notification">
					<div class="text">
						<h1 class="ziri-notification-title"><?php esc_html_e( 'Start with Ready-Made Templates', 'ziri' ); ?></h1>
						<p class="ziri-notification-desc"><?php esc_html_e( 'Ziri is a feature-rich Full Site Editing (FSE) theme with lots of pre-built patterns and templates for beautiful a professional website using Gutenberg Editor.', 'ziri' ); ?></p>
						<div class="links">
							<a class="ziri-btn btn-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=ziri-dashboard' ) ); ?>"> <?php esc_html_e( 'Go to Dashboard', 'ziri' ); ?></a>
							<a class="ziri-btn btn-secondary" rel="nofollow" target="_blank" href="https://rarathemes.com/wordpress-themes/ziri/?utm_source=ziri&utm_medium=dashboard&utm_campaign=upgrade_to_pro"><?php esc_html_e( 'Learn More', 'ziri' ); ?></a>
						</div>

					</div>
					<div class="image">
						<img src="<?php echo esc_url( get_theme_file_uri('/assets/images/banner-img.png')); ?>" alt="<?php esc_attr_e( 'Banner Image', 'ziri' ); ?>">
					</div>
				</div>
			</div>
			<?php
			}
		}

        /**
		 * Enqueue scripts.
		 *
		 * @since 2.2.0
		 */
		public function enqueue_scripts() {

			$suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_style(
				'ziri-admin-notices',
				get_theme_file_uri( 'assets/css/admin' . $suffix . '.css' ),
				array(),
				ZIRI_VERSION
			);

			wp_enqueue_script( 'ziri-admin-notices', get_template_directory_uri() . '/assets/js/admin' . $suffix . '.js', array( 'jquery' ), ZIRI_VERSION, 'all' );

			$admin_nonce = array(
				'nonce' => wp_create_nonce( 'ziri_notice_dismiss' ),
			);

			wp_localize_script( 'ziri-admin-notices', 'ziriNotices', $admin_nonce );
		}

		/**
		 * AJAX dismiss notice.
		 *
		 * @since 1.0.0
		 */
		public function dismiss_notices() {
			if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['nonce'] ) ), 'ziri_notice_dismiss' ) || ! current_user_can( 'manage_options' ) ) { // WPCS: input var ok.
				die();
			}

			update_option( 'ziri_notice_dismissed', true );
		}

	}

endif;

return new Ziri_Admin_Notice();
