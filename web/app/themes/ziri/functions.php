<?php
/**
 * Ziri Functions and definitions
 *
 * @package Ziri
 */
$ziri_theme_data = wp_get_theme();
if( ! defined( 'ZIRI_VERSION' ) ) define( 'ZIRI_VERSION', $ziri_theme_data->get( 'Version' ) );
if( ! defined( 'ZIRI_THEME_NAME' ) ) define( 'ZIRI_THEME_NAME', $ziri_theme_data->get( 'Name' ) );
if( ! defined( 'ZIRI_THEME_TEXTDOMAIN' ) ) define( 'ZIRI_THEME_TEXTDOMAIN', $ziri_theme_data->get( 'TextDomain' ) );   

if ( ! function_exists( 'ziri_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Ziri 1.0.0
	 *
	 * @return void
	 */
	function ziri_support() {

		$suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
        add_theme_support( 'align-wide' );

		//responsive iframes
		add_theme_support( 'responsive-embeds' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles and fonts.
		add_editor_style(
			array(
				'./assets/css/editor-style' . $suffix . '.css'
			)
		);

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );
	}
endif;
add_action( 'after_setup_theme', 'ziri_support' );

/**
 * Extras Files in the theme
*/
require get_template_directory() . '/inc/extras.php';

/**
 * Include block patterns.
*/
require get_template_directory() . '/inc/patterns/block-patterns.php';

/**
 * Custom Functions
*/
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Ajax Functionality
*/
require get_template_directory() . '/inc/ajax-functions.php';

/**
 * Admin Notices Functionality
*/
require get_template_directory() . '/inc/class-admin-notices.php';