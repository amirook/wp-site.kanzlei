<?php
/**
 * Header Media Options
 *
 * @package Catch_Corporate
 */

/**
 * Add Header Media options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_corporate_header_media_options( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->description = esc_html__( 'If you add video, it will only show up on Homepage/FrontPage. Other Pages will use Header/Post/Page Image depending on your selection of option. Header Image will be used as a fallback while the video loads ', 'catch-corporate' );

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_option',
			'default'           => 'homepage',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'catch-corporate' ),
				'entire-site'            => esc_html__( 'Entire Site', 'catch-corporate' ),
				'disable'                => esc_html__( 'Disabled', 'catch-corporate' ),
			),
			'label'             => esc_html__( 'Enable on', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_image_position_desktop',
			'default'           => 'center center',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'label'             => esc_html__( 'Image Position (Desktop View)', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'choices'           => array(
				'left top'      => esc_html__( 'Left Top', 'catch-corporate' ),
				'left center'   => esc_html__( 'Left Center', 'catch-corporate' ),
				'left bottom'   => esc_html__( 'Left Bottom', 'catch-corporate' ),
				'right top'     => esc_html__( 'Right Top', 'catch-corporate' ),
				'right center'  => esc_html__( 'Right Center', 'catch-corporate' ),
				'right bottom'  => esc_html__( 'Right Bottom', 'catch-corporate' ),
				'center top'    => esc_html__( 'Center Top', 'catch-corporate' ),
				'center center' => esc_html__( 'Center Center', 'catch-corporate' ),
				'center bottom' => esc_html__( 'Center Bottom', 'catch-corporate' ),
			),
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_image_position_mobile',
			'default'           => 'center center',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'label'             => esc_html__( 'Image Position (Mobile View)', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'choices'           => array(
				'left top'      => esc_html__( 'Left Top', 'catch-corporate' ),
				'left center'   => esc_html__( 'Left Center', 'catch-corporate' ),
				'left bottom'   => esc_html__( 'Left Bottom', 'catch-corporate' ),
				'right top'     => esc_html__( 'Right Top', 'catch-corporate' ),
				'right center'  => esc_html__( 'Right Center', 'catch-corporate' ),
				'right bottom'  => esc_html__( 'Right Bottom', 'catch-corporate' ),
				'center top'    => esc_html__( 'Center Top', 'catch-corporate' ),
				'center center' => esc_html__( 'Center Center', 'catch-corporate' ),
				'center bottom' => esc_html__( 'Center Bottom', 'catch-corporate' ),
			),
		)
	);

	/*Overlay Option for Header Media*/
	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_homepage_image_opacity',
			'default'           => '0',
			'sanitize_callback' => 'catch_corporate_sanitize_number_range',
			'label'             => esc_html__( 'Header Media Overlay on Homepage', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'number',
			'input_attrs'       => array(
				'style' => 'width: 80px;',
				'min'   => 0,
				'max'   => 100,
			),
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_innerpage_image_opacity',
			'default'           => '0',
			'sanitize_callback' => 'catch_corporate_sanitize_number_range',
			'label'             => esc_html__( 'Header Media Overlay on Inner Pages', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'number',
			'input_attrs'       => array(
				'style' => 'width: 80px;',
				'min'   => 0,
				'max'   => 100,
			),
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_image_text_below_image',
			'sanitize_callback' => 'catch_corporate_sanitize_checkbox',
			'default'           => 1,
			'label'             => esc_html__('Text below Header Image on Mobile Devices', 'catch-corporate'),
			'section'           => 'header_image',
			'custom_control'    => 'Catch_Corporate_Toggle_Control',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_image_scroll_down',
			'sanitize_callback' => 'catch_corporate_sanitize_checkbox',
			'default'           => 1,
			'label'             => esc_html__( 'Scroll Down Button', 'catch-corporate' ),
			'section'           => 'header_image',
			'custom_control'    => 'Catch_Corporate_Toggle_Control',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_innerpage_text_color',
			'default'			=> 0,
			'sanitize_callback' => 'catch_corporate_sanitize_checkbox',
			'label'             => esc_html__( 'Text color white on Inner Pages', 'catch-corporate' ),
			'section'           => 'header_image',
			'custom_control'    => 'Catch_Corporate_Toggle_Control',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_text_alignment',
			'default'           => 'text-align-left',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'choices'           => array(
				'text-align-center' => esc_html__( 'Center', 'catch-corporate' ),
				'text-align-right'  => esc_html__( 'Right', 'catch-corporate' ),
				'text-align-left'   => esc_html__( 'Left', 'catch-corporate' ),
			),
			'label'             => esc_html__( 'Text Alignment', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'select',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_content_alignment',
			'default'           => 'content-align-left',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'choices'           => array(
				'content-align-center' => esc_html__( 'Center', 'catch-corporate' ),
				'content-align-right'  => esc_html__( 'Right', 'catch-corporate' ),
				'content-align-left'   => esc_html__( 'Left', 'catch-corporate' ),
			),
			'label'             => esc_html__( 'Content Alignment', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'select',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_title',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Title', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_highlighted_text',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Highlighted Text', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_alt_text',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Alternate Text', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

    catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_text',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Site Header Text', 'catch-corporate' ),
			'section'           => 'header_image',
			'type'              => 'textarea',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_url',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Header Media Url', 'catch-corporate' ),
			'section'           => 'header_image',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_url_text',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Header Media Url Text', 'catch-corporate' ),
			'section'           => 'header_image',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_url_target',
			'sanitize_callback' => 'catch_corporate_sanitize_checkbox',
			'label'             => esc_html__( 'Open Link in New Window/Tab', 'catch-corporate' ),
			'section'           => 'header_image',
			'custom_control'    => 'Catch_Corporate_Toggle_Control',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_sec_button_url',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Secondary Button Url', 'catch-corporate' ),
			'section'           => 'header_image',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_sec_button_url_text',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Secondary Button Text', 'catch-corporate' ),
			'section'           => 'header_image',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_header_media_sec_button_url_target',
			'sanitize_callback' => 'catch_corporate_sanitize_checkbox',
			'label'             => esc_html__( 'Open Link in New Window/Tab', 'catch-corporate' ),
			'section'           => 'header_image',
			'custom_control'    => 'Catch_Corporate_Toggle_Control',
		)
	);
}
add_action( 'customize_register', 'catch_corporate_header_media_options' );

