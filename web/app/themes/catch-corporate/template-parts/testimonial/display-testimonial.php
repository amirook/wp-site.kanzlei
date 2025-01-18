<?php
/**
 * The template for displaying testimonial items
 *
 * @package Catch_Corporate
 */

$enable 			= get_theme_mod( 'catch_corporate_testimonial_option', 'disabled' );

if ( ! catch_corporate_check_section( $enable ) ) {
	// Bail if featured content is disabled
	return;
}

// Get Jetpack options for testimonial.
$catch_corporate_subtitle = get_option('jetpack_testimonial_content');
$catch_corporate_title    = get_option('jetpack_testimonial_title', esc_html__('Testimonials', 'catch-corporate'));


$classes[] = 'section testimonial-content-section';

if ( ! $catch_corporate_title && ! $catch_corporate_subtitle ) {
	$classes[] = 'no-section-heading';
}
?>

<div id="testimonial-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
			<?php if ( $catch_corporate_title || $catch_corporate_subtitle ) : ?>
				<div class="section-heading-wrapper">

				<?php if( $catch_corporate_subtitle ) : ?>
					<div class="section-subtitle">
						<?php echo wp_kses_post( $catch_corporate_subtitle ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $catch_corporate_title ) : ?>
					<div class="section-title-wrapper">
						<h2 class="section-title"><?php echo wp_kses_post( $catch_corporate_title ); ?></h2>
					</div><!-- .section-title-wrapper -->
				<?php endif; ?>

				</div><!-- .section-heading-wrapper -->
			<?php endif; ?>

			<?php

			$content_classes = 'section-content-wrapper testimonial-content-wrapper';

			$content_classes .= ' testimonial-slider owl-carousel';

			?>

			<div class="<?php echo esc_attr( $content_classes ); ?>">
				<?php
					get_template_part( 'template-parts/testimonial/post-types-testimonial' );
				?>
			</div><!-- .section-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- .testimonial-content-section -->
