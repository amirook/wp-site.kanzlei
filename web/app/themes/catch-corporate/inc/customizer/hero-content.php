<?php
/**
 * Hero Content Options
 *
 * @package Catch_Corporate
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_corporate_hero_content_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_corporate_hero_content_options', array(
			'title' => esc_html__( 'Hero Content', 'catch-corporate' ),
			'panel' => 'catch_corporate_theme_options',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_hero_content_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'choices'           => catch_corporate_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-corporate' ),
			'section'           => 'catch_corporate_hero_content_options',
			'type'              => 'select',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_hero_content',
			'default'           => '0',
			'sanitize_callback' => 'catch_corporate_sanitize_post',
			'active_callback'   => 'catch_corporate_is_hero_content_active',
			'label'             => esc_html__( 'Page', 'catch-corporate' ),
			'section'           => 'catch_corporate_hero_content_options',
			'type'              => 'dropdown-pages',
		)
	);
}
add_action( 'customize_register', 'catch_corporate_hero_content_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'catch_corporate_is_hero_content_active' ) ) :
	/**
	* Return true if hero content is active
	*
	* @since 1.0.0
	*/
	function catch_corporate_is_hero_content_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_corporate_hero_content_visibility' )->value();

		return catch_corporate_check_section( $enable );
	}
endif;