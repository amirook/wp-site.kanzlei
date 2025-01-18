<?php
/**
 * Add Portfolio Settings in Customizer
 *
 * @package Catch_Corporate
 */

/**
 * Add portfolio options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_corporate_portfolio_options( $wp_customize ) {
	// Add note to Jetpack Portfolio Section
	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_jetpack_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Catch_Corporate_Note_Control',
			'label'             => sprintf( esc_html__( 'For Portfolio Options for Bold Photography Theme, go %1$shere%2$s', 'catch-corporate' ),
				 '<a href="javascript:wp.customize.section( \'catch_corporate_portfolio\' ).focus();">',
				 '</a>'
			),
			'section'           => 'jetpack_portfolio',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

	$wp_customize->add_section( 'catch_corporate_portfolio', array(
			'panel'    => 'catch_corporate_theme_options',
			'title'    => esc_html__( 'Portfolio', 'catch-corporate' ),
		)
	);

	$action = 'install-plugin';
    $slug   = 'essential-content-types';

    $install_url = wp_nonce_url(
        add_query_arg(
            array(
                'action' => $action,
                'plugin' => $slug
            ),
            admin_url( 'update.php' )
        ),
        $action . '_' . $slug
    );

    catch_corporate_register_option( $wp_customize, array(
            'name'              => 'catch_corporate_portfolio_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Corporate_Note_Control',
          	'active_callback'   => 'catch_corporate_is_ect_portfolio_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Portfolio, install %1$sEssential Content Types%2$s Plugin with Portfolio Type Enabled', 'catch-corporate' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'catch_corporate_portfolio',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_portfolio_option',
			'default'           => 'disabled',
			'active_callback'   => 'catch_corporate_is_ect_portfolio_active',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'choices'           => catch_corporate_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-corporate' ),
			'section'           => 'catch_corporate_portfolio',
			'type'              => 'select',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Catch_Corporate_Note_Control',
			'active_callback'   => 'catch_corporate_is_portfolio_active',
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'catch-corporate' ),
				 '<a href="javascript:wp.customize.control( \'jetpack_portfolio_title\' ).focus();">',
				 '</a>'
			),
			'section'           => 'catch_corporate_portfolio',
			'type'              => 'description',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_portfolio_number',
			'default'           => 6,
			'sanitize_callback' => 'catch_corporate_sanitize_number_range',
			'active_callback'   => 'catch_corporate_is_portfolio_active',
			'label'             => esc_html__( 'Number of items to show', 'catch-corporate' ),
			'section'           => 'catch_corporate_portfolio',
			'type'              => 'number',
			'input_attrs'       => array(
				'style'             => 'width: 100px;',
				'min'               => 0,
			),
		)
	);

	$number = get_theme_mod( 'catch_corporate_portfolio_number', 6 );

	for ( $i = 1; $i <= $number ; $i++ ) {
		//for CPT
		catch_corporate_register_option( $wp_customize, array(
				'name'              => 'catch_corporate_portfolio_cpt_' . $i,
				'sanitize_callback' => 'catch_corporate_sanitize_post',
				'active_callback'   => 'catch_corporate_is_portfolio_active',
				'label'             => esc_html__( 'Portfolio', 'catch-corporate' ) . ' ' . $i ,
				'section'           => 'catch_corporate_portfolio',
				'type'              => 'select',
				'choices'           => catch_corporate_generate_post_array( 'jetpack-portfolio' ),
			)
		);
	} // End for().
}
add_action( 'customize_register', 'catch_corporate_portfolio_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'catch_corporate_is_portfolio_active' ) ) :
	/**
	* Return true if portfolio is active
	*
	* @since 1.0.0
	*/
	function catch_corporate_is_portfolio_active( $control ) {
		$enable = $control->manager->get_setting( 'catch_corporate_portfolio_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( catch_corporate_is_ect_portfolio_active( $control ) && catch_corporate_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'catch_corporate_is_ect_portfolio_inactive' ) ) :
    /**
    *
    * @since Shop Spot 1.0
    */
    function catch_corporate_is_ect_portfolio_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;

if ( ! function_exists( 'catch_corporate_is_ect_portfolio_active' ) ) :
    /**
    *
    * @since Shop Spot 1.0
    */
    function catch_corporate_is_ect_portfolio_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;
