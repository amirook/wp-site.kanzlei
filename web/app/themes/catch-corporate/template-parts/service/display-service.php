<?php
/**
 * The template for displaying service content
 *
 * @package Catch_Corporate
 */

$catch_corporate_enable_content = get_theme_mod( 'catch_corporate_service_option', 'disabled' );

if ( ! catch_corporate_check_section( $catch_corporate_enable_content ) ) {
	// Bail if service content is disabled.
	return;
}

$catch_corporate_tagline = get_option( 'ect_service_content' );
$catch_corporate_title    = get_option( 'ect_service_title', esc_html__( 'Services', 'catch-corporate' ) );

$catch_corporate_classes[] = 'service-section';
$catch_corporate_classes[] = 'section';

if ( ! $catch_corporate_title && ! $catch_corporate_tagline ) {
	$catch_corporate_classes[] = 'no-section-heading';
}
?>

<div id="service-section" class="<?php echo esc_attr( implode( ' ', $catch_corporate_classes ) ); ?>">
	<div class="wrapper">
		<?php catch_corporate_section_heading( $catch_corporate_tagline, $catch_corporate_title ); ?>

		<?php

		$wrapper_classes[] = 'section-content-wrapper service-content-wrapper';

		$wrapper_classes[] = 'layout-three';
		?>

		<div class="<?php echo esc_attr( implode( ' ', $wrapper_classes ) ); ?>">
			<?php
				get_template_part( 'template-parts/service/content-service' );
			?>

		</div><!-- .section-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- #service-section -->
