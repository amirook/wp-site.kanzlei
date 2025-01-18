<?php
/**
 * Theme Options
 *
 * @package Catch_Corporate
 */

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_corporate_theme_options( $wp_customize ) {
	$wp_customize->add_panel( 'catch_corporate_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'catch-corporate' ),
		'priority' => 130,
	) );

	// Layout Options
	$wp_customize->add_section( 'catch_corporate_layout_options', array(
		'title' => esc_html__( 'Layout Options', 'catch-corporate' ),
		'panel' => 'catch_corporate_theme_options',
		)
	);

	/* Default Layout */
	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_default_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'label'             => esc_html__( 'Default Layout', 'catch-corporate' ),
			'section'           => 'catch_corporate_layout_options',
			'type'              => 'select',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'catch-corporate' ),
				'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'catch-corporate' ),
			),
		)
	);

	/* Homepage/Archive Layout */
	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_homepage_archive_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'label'             => esc_html__( 'Homepage/Archive Layout', 'catch-corporate' ),
			'section'           => 'catch_corporate_layout_options',
			'type'              => 'select',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'catch-corporate' ),
				'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'catch-corporate' ),
			),
		)
	);

	/* Single Page/Post Image */
	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_single_layout',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'label'             => esc_html__( 'Single Page/Post Image', 'catch-corporate' ),
			'section'           => 'catch_corporate_layout_options',
			'type'              => 'select',
			'choices'           => array(
				'disabled'        => esc_html__( 'Disabled', 'catch-corporate' ),
				'post-thumbnail'  => esc_html__( 'Post Thumbnail', 'catch-corporate' )
			),
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'catch_corporate_excerpt_options', array(
		'panel'     => 'catch_corporate_theme_options',
		'title'     => esc_html__( 'Excerpt Options', 'catch-corporate' ),
	) );

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_excerpt_length',
			'default'           => '25',
			'sanitize_callback' => 'absint',
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 5,
				'style' => 'width: 80px;',
			),
			'label'    => esc_html__( 'Excerpt Length (words)', 'catch-corporate' ),
			'section'  => 'catch_corporate_excerpt_options',
			'type'     => 'number',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_excerpt_more_text',
			'default'           => esc_html__( 'Continue reading', 'catch-corporate' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Read More Text', 'catch-corporate' ),
			'section'           => 'catch_corporate_excerpt_options',
			'type'              => 'text',
		)
	);

	// Search Options.
	$wp_customize->add_section( 'catch_corporate_search_options', array(
		'panel'     => 'catch_corporate_theme_options',
		'title'     => esc_html__( 'Search Options', 'catch-corporate' ),
	) );

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_search_text',
			'default'           => esc_html__( 'Search a keyword', 'catch-corporate' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Search Text', 'catch-corporate' ),
			'section'           => 'catch_corporate_search_options',
			'type'              => 'text',
		)
	);

	// Homepage / Frontpage Options.
	$wp_customize->add_section( 'catch_corporate_homepage_options', array(
		'description' => esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'catch-corporate' ),
		'panel'       => 'catch_corporate_theme_options',
		'title'       => esc_html__( 'Homepage / Frontpage Options', 'catch-corporate' ),
	) );

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_recent_posts_tagline',
			'default'              => 'Latest Updates & Posts',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Recent Posts Tagline', 'catch-corporate' ),
			'section'           => 'catch_corporate_homepage_options',
			'type'              => 'text'
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_recent_posts_title',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'From Our Blog', 'catch-corporate' ),
			'label'             => esc_html__( 'Recent Posts Title', 'catch-corporate' ),
			'section'           => 'catch_corporate_homepage_options',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_front_page_category',
			'sanitize_callback' => 'catch_corporate_sanitize_category_list',
			'custom_control'    => 'Catch_Corporate_Multi_Cat',
			'label'             => esc_html__( 'Categories', 'catch-corporate' ),
			'section'           => 'catch_corporate_homepage_options',
			'type'              => 'dropdown-categories',
		)
	);

	//Menu Options
	$wp_customize->add_section( 'catch_corporate_menu_options', array(
		'description' => esc_html__( 'Extra Menu Options specific to this theme', 'catch-corporate' ),
		'title'       => esc_html__( 'Menu Options', 'catch-corporate' ),
		'panel'       => 'catch_corporate_theme_options',
	) );

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_primary_button_label',
			'default'           => 'Contact us',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Primary Button Label', 'catch-corporate' ),
			'section'           => 'catch_corporate_menu_options',
			'type'              => 'text',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_primary_button_link',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Primary Button Link', 'catch-corporate' ),
			'section'           => 'catch_corporate_menu_options',
		)
	);

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_primary_button_target',
			'sanitize_callback' => 'catch_corporate_sanitize_checkbox',
			'label'             => esc_html__( 'Open in New Tab', 'catch-corporate' ),
			'section'           => 'catch_corporate_menu_options',
			'custom_control'    => 'Catch_Corporate_Toggle_Control',
		)
	);
	//Menu Options End

	// Pagination Options.
	$pagination_type = get_theme_mod( 'catch_corporate_pagination_type', 'default' );

	$nav_desc = '';

	/**
	* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	*/
	$nav_desc = sprintf(
		wp_kses(
			__( 'For infinite scrolling, use %1$sCatch Infinite Scroll Plugin%2$s with Infinite Scroll module Enabled.', 'catch-corporate' ),
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
				),
				'br'=> array()
			)
		),
		'<a target="_blank" href="https://wordpress.org/plugins/catch-infinite-scroll/">',
		'</a>'
	);

	$wp_customize->add_section( 'catch_corporate_pagination_options', array(
		'description'     => $nav_desc,
		'panel'           => 'catch_corporate_theme_options',
		'title'           => esc_html__( 'Pagination Options', 'catch-corporate' ),
		'active_callback' => 'catch_corporate_scroll_plugins_inactive'
	) );

	catch_corporate_register_option( $wp_customize, array(
			'name'              => 'catch_corporate_pagination_type',
			'default'           => 'default',
			'sanitize_callback' => 'catch_corporate_sanitize_select',
			'choices'           => catch_corporate_get_pagination_types(),
			'label'             => esc_html__( 'Pagination type', 'catch-corporate' ),
			'section'           => 'catch_corporate_pagination_options',
			'type'              => 'select',
		)
	);

	/* Scrollup Options */
	$wp_customize->add_section( 'catch_corporate_scrollup', array(
		'panel'    => 'catch_corporate_theme_options',
		'title'    => esc_html__( 'Scrollup Options', 'catch-corporate' ),
	) );

	$action = 'install-plugin';
	$slug   = 'to-top';

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

	// Add note to Scroll up Section
    catch_corporate_register_option( $wp_customize, array(
            'name'              => 'catch_corporate_to_top_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Corporate_Note_Control',
            'active_callback'   => 'catch_corporate_is_to_top_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Scroll Up, install %1$sTo Top%2$s Plugin', 'catch-corporate' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'catch_corporate_scrollup',
            'type'              => 'description',
            'priority'          => 1,
        )
    );
}
add_action( 'customize_register', 'catch_corporate_theme_options' );

/** Active Callback Functions */
if ( ! function_exists( 'catch_corporate_scroll_plugins_inactive' ) ) :
	/**
	* Return true if infinite scroll functionality exists
	*
	* @since 1.0.0
	*/
	function catch_corporate_scroll_plugins_inactive( $control ) {
		if ( ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) || class_exists( 'Catch_Infinite_Scroll' ) ) {
			// Support infinite scroll plugins.
			return false;
		}

		return true;
	}
endif;

if ( ! function_exists( 'catch_corporate_is_static_page_enabled' ) ) :
	/**
	* Return true if A Static Page is enabled
	*
	* @since 1.0.0
	*/
	function catch_corporate_is_static_page_enabled( $control ) {
		$enable = $control->manager->get_setting( 'show_on_front' )->value();
		if ( 'page' === $enable ) {
			return true;
		}
		return false;
	}
endif;

if ( ! function_exists( 'catch_corporate_scroll_plugins_inactive' ) ) :
	/**
	* Return true if infinite scroll functionality exists
	*
	* @since 1.0.0
	*/
	function catch_corporate_scroll_plugins_inactive( $control ) {
		if ( ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) || class_exists( 'Catch_Infinite_Scroll' ) ) {
			// Support infinite scroll plugins.
			return false;
		}

		return true;
	}
endif;

if ( ! function_exists( 'catch_corporate_is_to_top_inactive' ) ) :
    /**
    * Return true if featured_content is active
    *
    * @since Simclick 0.1
    */
    function catch_corporate_is_to_top_inactive( $control ) {
        return ! ( class_exists( 'To_Top' ) );
    }
endif;
