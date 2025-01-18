<?php
/**
 * The template used for displaying hero content
 *
 * @package Catch_Corporate
 */

$catch_corporate_enable_section = get_theme_mod( 'catch_corporate_hero_content_visibility', 'disabled' );

if ( ! catch_corporate_check_section( $catch_corporate_enable_section ) ) {
	// Bail if hero content is not enabled
	return;
}

get_template_part( 'template-parts/hero-content/post-type-hero' );

