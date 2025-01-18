<?php
/**
 * The template used for displaying slider
 *
 * @package Catch_Corporate
 */

$catch_corporate_enable_slider = get_theme_mod( 'catch_corporate_slider_option', 'disabled' );

if ( ! catch_corporate_check_section( $catch_corporate_enable_slider ) ) {
	return;
}


$classes[] = 'feature-slider-section section text-align-left content-align-left';

$text_below_image       = get_theme_mod( 'catch_corporate_slider_text_below_image', 1 );

if( $text_below_image ) {
	$classes[] = 'text-below-image';
}

$catch_corporate_type   = get_theme_mod( 'catch_corporate_slider_type', 'category' );
?>

<div id="feature-slider-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper section-content-wrapper feature-slider-wrapper">
		<div class="main-slider owl-carousel">
			<?php get_template_part( 'template-parts/slider/post-type-slider' ); ?>
		</div><!-- .main-slider -->

		<div class="scroll-down">
			<a class="scroll-inner" href="#">
				<?php echo catch_corporate_get_svg( array( 'icon' => 'angle-down' ) ); ?>
				<span></span>
				<?php esc_html_e( 'Scroll', 'catch-corporate' ); ?>
			</a>
		</div><!-- .scroll-down -->
	</div><!-- .wrapper -->
</div><!-- #feature-slider -->

