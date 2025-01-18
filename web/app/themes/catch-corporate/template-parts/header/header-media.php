<?php
/**
 * Display Header Media
 *
 * @package Catch_Corporate
 */

$header_image = catch_corporate_featured_overall_image();

if ( 'disable' === $header_image ) {
	// Bail if all header media are disabled.
	return;
}
?>
<div class="custom-header header-media">
	<div class="wrapper">
		<?php if ( ( is_header_video_active() && has_header_video() ) || 'disable' !== $header_image ) : ?>
		<div class="custom-header-media">
			<?php
			if ( is_header_video_active() && has_header_video() ) {
				the_custom_header_markup();
			} elseif ( $header_image ) {
				echo '<div id="wp-custom-header" class="wp-custom-header"><img src="' . esc_url( $header_image ) . '"/></div>	';
			}
			?>

			<?php catch_corporate_header_media_text(); ?>

			<?php if ( get_theme_mod( 'catch_corporate_header_image_scroll_down', 1 ) && is_front_page() ) : ?>
				<div class="scroll-down">
					<a class="scroll-inner" href="#">
						<?php echo catch_corporate_get_svg( array( 'icon' => 'angle-down' ) ); ?>
						<span></span>
						<?php esc_html_e( 'Scroll', 'catch-corporate' ); ?>
					</a>
				</div><!-- .scroll-down -->
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div><!-- .wrapper -->
	<div class="custom-header-overlay"></div><!-- .custom-header-overlay -->
</div><!-- .custom-header -->
