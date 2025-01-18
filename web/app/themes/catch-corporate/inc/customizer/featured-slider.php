<?php
/**
 * Featured Slider Options
 *
 * @package Catch_Corporate
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_corporate_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_corporate_featured_slider', array(
			'panel' => 'catch_corporate_theme_options',
			'title' => esc_html__( 'Featured Slider', 'catch-corporate' ),
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'choices'           => catch_corporate_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-corporate' ),
			'section'           => 'catch_corporate_featured_slider',
			'type'              => 'select',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_slider_text_below_image',
			'sanitize_callback' => 'catch_corporate_sanitize_checkbox',
			'active_callback'   => 'catch_corporate_is_slider_active',
			'default'           => 1,
			'label'             => esc_html__('Text below Slider Image on Mobile Devices', 'catch-corporate'),
			'section'           => 'catch_corporate_featured_slider',
			'custom_control'    => 'Catch_Corporate_Toggle_Control',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'catch_corporate_sanitize_number_range',

			'active_callback'   => 'catch_corporate_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'catch-corporate' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'catch-corporate' ),
			'section'           => 'catch_corporate_featured_slider',
			'type'              => 'number',
		)
	);

	$slider_number = get_theme_mod( 'catch_corporate_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {
		// Page Sliders
		catch_corporate_register_option( $wp_customize, array(
				'name'              => 'catch_corporate_slider_page_' . $i,
				'sanitize_callback' => 'catch_corporate_sanitize_post',
				'active_callback'   => 'catch_corporate_is_slider_active',
				'label'             => esc_html__( 'Page', 'catch-corporate' ) . ' # ' . $i,
				'section'           => 'catch_corporate_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'catch_corporate_slider_options' );

/** Active Callback Functions */

if ( ! function_exists( 'catch_corporate_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since 1.0.0
	*/
	function catch_corporate_is_slider_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_corporate_slider_option' )->value();

		//return true only if previwed page on customizer matches the type option selected
		return catch_corporate_check_section( $enable );
	}
endif;