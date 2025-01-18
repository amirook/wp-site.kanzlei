<?php
/**
 * The template for displaying featured content
 *
 * @package Catch_Corporate
 */

$catch_corporate_enable_content = get_theme_mod( 'catch_corporate_featured_content_option', 'disabled' );

if ( ! catch_corporate_check_section( $catch_corporate_enable_content ) ) {
	// Bail if featured content is disabled.
	return;
}

$catch_corporate_title   = get_option( 'featured_content_title', esc_html__( 'Featured Content', 'catch-corporate' ) );
$catch_corporate_tagline = get_option( 'featured_content_content' );

$catch_corporate_classes[] = 'layout-three';
$catch_corporate_classes[] = 'featured-content';
$catch_corporate_classes[] = 'section';

if( ! $catch_corporate_title && ! $catch_corporate_tagline ) {
	$catch_corporate_classes[] = 'no-section-heading';
}
?>

<div id="featured-content-section" class="<?php echo esc_attr( implode( ' ', $catch_corporate_classes ) ); ?>">
	<div class="wrapper">
		<?php catch_corporate_section_heading( $catch_corporate_tagline, $catch_corporate_title ); ?>

		<div class="section-content-wrapper featured-content-wrapper layout-three">
			<?php
				get_template_part( 'template-parts/featured-content/content-featured' );
			?>
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- #featured-content-section -->
