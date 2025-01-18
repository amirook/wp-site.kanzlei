<?php
/**
 * Catch Corporate Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Catch_Corporate
 */

if ( ! function_exists( 'catch_corporate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function catch_corporate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Catch Corporate Pro, use a find and replace
		 * to change 'catch-corporate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'catch-corporate', get_parent_theme_file_path( '/languages' ) );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 *
		 * Google fonts url addition
		 *
		 * Font Awesome addition
		 */
		add_editor_style( array(
			'assets/css/editor-style.css',
			catch_corporate_fonts_url(),
			trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'assets/css/font-awesome/css/font-awesome.css' )
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Used in Blog post
		set_post_thumbnail_size( 960, 640, true ); // Ratio 3:2

		// Used in featured slider
		add_image_size( 'catch-corporate-slider', 1920, 1080, true ); //16:9

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'          => esc_html__( 'Primary', 'catch-corporate' ),
			'social-menu'     => esc_html__( 'Header Social Menu', 'catch-corporate' ),
			'menu-footer'     => esc_html__( 'Footer Menu', 'catch-corporate' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add support for essential widget image.
		 *
		 */
		add_theme_support( 'ew-newsletter-image' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'catch-corporate' ),
					'shortName' => esc_html__( 'XS', 'catch-corporate' ),
					'size'      => 13,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'catch-corporate' ),
					'shortName' => esc_html__( 'S', 'catch-corporate' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'catch-corporate' ),
					'shortName' => esc_html__( 'M', 'catch-corporate' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'catch-corporate' ),
					'shortName' => esc_html__( 'L', 'catch-corporate' ),
					'size'      => 42,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'catch-corporate' ),
					'shortName' => esc_html__( 'XL', 'catch-corporate' ),
					'size'      => 58,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'catch-corporate' ),
					'shortName' => esc_html__( 'XL', 'catch-corporate' ),
					'size'      => 70,
					'slug'      => 'huge',
				),
			)
		);

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'White', 'catch-corporate' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Black', 'catch-corporate' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => esc_html__( 'Medium Black', 'catch-corporate' ),
				'slug'  => 'medium-black',
				'color' => '#222222',
			),
			array(
				'name'  => esc_html__( 'Gray', 'catch-corporate' ),
				'slug'  => 'gray',
				'color' => '#999999',
			),
			array(
				'name'  => esc_html__( 'Light Gray', 'catch-corporate' ),
				'slug'  => 'light-gray',
				'color' => '#f8f8f8',
			),
			array(
				'name'  => esc_html__( 'Orange', 'catch-corporate' ),
				'slug'  => 'orange',
				'color' => '#f95042',
			),
			array(
				'name'  => esc_html__( 'Pink', 'catch-corporate' ),
				'slug'  => 'pink',
				'color' => '#e03ae0',
			),
		) );

		/**
		 * Adds support for Catch Breadcrumb.
		 */
		add_theme_support( 'catch-breadcrumb', array(
			'content_selector'   => '.custom-header .entry-header',
			'breadcrumb_dynamic' => 'after',
		) );
	}
endif;
add_action( 'after_setup_theme', 'catch_corporate_setup' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 */
function catch_corporate_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-2' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-4' ) ) {
		$count++;
	}

	if ( is_active_sidebar( 'sidebar-5' ) ) {
		$count++;
	}

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class ) {
		echo 'class="widget-area footer-widget-area ' . esc_attr( $class ) . '"';
	}
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function catch_corporate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'catch_corporate_content_width', 920 );
}
add_action( 'after_setup_theme', 'catch_corporate_content_width', 0 );

if ( ! function_exists( 'catch_corporate_template_redirect' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet for different value other than the default one
	 *
	 * @global int $content_width
	 */
	function catch_corporate_template_redirect() {
		$layout = catch_corporate_get_theme_layout();

		if ( 'no-sidebar-full-width' === $layout ) {
			$GLOBALS['content_width'] = 1510;
		}

		if ( is_singular() ) {
			$GLOBALS['content_width'] = 680;
		}
	}
endif;
add_action( 'template_redirect', 'catch_corporate_template_redirect' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function catch_corporate_widgets_init() {
	$args = array(
		'before_widget' => '<section id="%1$s" class="widget %2$s"> <div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Sidebar', 'catch-corporate' ),
		'id'          => 'sidebar-1',
		'description' => esc_html__( 'Add widgets here.', 'catch-corporate' ),
		) + $args
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Footer 1', 'catch-corporate' ),
		'id'          => 'sidebar-2',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'catch-corporate' ),
		) + $args
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Footer 2', 'catch-corporate' ),
		'id'          => 'sidebar-3',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'catch-corporate' ),
		) + $args
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Footer 3', 'catch-corporate' ),
		'id'          => 'sidebar-4',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'catch-corporate' ),
		) + $args
	);

	register_sidebar( array(
		'name'        => esc_html__( 'Instagram', 'catch-corporate' ),
		'id'          => 'sidebar-instagram',
		'description' => esc_html__( 'Appears above footer. This sidebar is only for Instagram Feed Gallery', 'catch-corporate' ),
		) + $args
	);
}
add_action( 'widgets_init', 'catch_corporate_widgets_init' );

if ( ! function_exists( 'catch_corporate_fonts_url' ) ) :
	/**
	 * Register Google fonts for catch_corporate Pro
	 *
	 * Create your own catch_corporate_fonts_url() function to override in a child theme.
	 *
	 * @since 1.0.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function catch_corporate_fonts_url() {

		/* Translators: If there are characters in your language that are not
		* supported by Poppins, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$poppins = _x( 'on', 'Poppins: on or off', 'catch-corporate' );

		if ( 'on' === $poppins ) {
			// Load google font locally.
			require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
			
			return esc_url_raw( wptt_get_webfont_url( 'https://fonts.googleapis.com/css?family=Poppins::300,400,500,600,700,900,400italic,700italic' ) );
		}
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since 1.0.0
 */
function catch_corporate_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'catch_corporate_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function catch_corporate_scripts() {
	$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$path = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'assets/js/source/' : 'assets/js/';

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'catch-corporate-fonts', catch_corporate_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'catch-corporate-style', get_stylesheet_uri(), null, date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) ) );

	// Theme block stylesheet.
	wp_enqueue_style( 'catch-corporate-block-style', get_theme_file_uri( 'assets/css/blocks.css' ), array( 'catch-corporate-style' ), filemtime( get_theme_file_path( 'assets/css/blocks.css' ) ) );

	// Load the html5 shiv.
	wp_enqueue_script( 'catch-corporate-html5',  get_theme_file_uri() . $path . 'html5' . $min . '.js', array(), '3.7.3' );

	wp_script_add_data( 'catch-corporate-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'catch-corporate-skip-link-focus-fix', trailingslashit( esc_url ( get_template_directory_uri() ) ) . $path . 'skip-link-focus-fix' . $min . '.js', array(), '201800703', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$deps[] = 'jquery';

	$portfolio_type   = get_theme_mod( 'catch_corporate_portfolio_type', 'category' );

	//Slider Scripts
	$enable_slider      = catch_corporate_check_section( get_theme_mod( 'catch_corporate_slider_option', 'disabled' ) );
	$enable_testimonial_slider      = catch_corporate_check_section( get_theme_mod( 'catch_corporate_testimonial_option', 'disabled' ) );


	$slider_trans_in       = get_theme_mod( 'catch_corporate_slider_transition_in', 'default' );
	$slider_trans_out      = get_theme_mod( 'catch_corporate_slider_transition_out', 'default' );
	$product_review 	   = catch_corporate_check_section( get_theme_mod( 'catch_corporate_products_review_option', 'disabled' ) );
	$product_review_slider = get_theme_mod( 'catch_corporate_products_review_slider', 1 );

	if ( $enable_slider || $enable_testimonial_slider || ( $product_review && $product_review_slider ) ) {
		// Enqueue owl carousel css. Must load CSS before JS.
		wp_enqueue_style( 'owl-carousel-core', get_theme_file_uri( 'assets/css/owl-carousel/owl.carousel' . $min . '.css' ), null, '2.3.4' );
		wp_enqueue_style( 'owl-carousel-default', get_theme_file_uri( 'assets/css/owl-carousel/owl.theme.default' . $min . '.css' ), null, '2.3.4' );
		// Enqueue script
		wp_enqueue_script( 'owl-carousel', get_theme_file_uri( $path . 'owl.carousel' . $min . '.js'), array( 'jquery' ), '2.3.4', true );

		$deps[] = 'owl-carousel';
	}

	$enable_woo_product = catch_corporate_check_section( get_theme_mod( 'catch_corporate_woo_products_showcase_option', 'disabled' ) );
	$woo_category 		= get_theme_mod( 'catch_corporate_woo_products_showcase_category' );
	$enable_trending    = catch_corporate_check_section( get_theme_mod( 'catch_corporate_trending_products_option', 'disabled' ) );
	$trending_category  = get_theme_mod( 'catch_corporate_trending_products_category' );

	if ( ( $enable_woo_product && ! empty( $woo_category ) ) || ( $enable_trending && ! empty( $trending_category ) ) ) {
		$deps[] = 'jquery-ui-tabs';
	}

	$deps[] = 'jquery-masonry';

	wp_enqueue_script( 
		'catch-corporate-script', 
		get_theme_file_uri( $path . 'functions' . $min . '.js' ),
		$deps,
		filemtime( get_theme_file_path( $path . 'functions' . $min . '.js' ) ),
		true 
	);

	wp_localize_script( 'catch-corporate-script', 'catchCorporateOptions', array(
		'screenReaderText' => array(
			'expand'   => esc_html__( 'expand child menu', 'catch-corporate' ),
			'collapse' => esc_html__( 'collapse child menu', 'catch-corporate' ),
			'icon'     => catch_corporate_get_svg( array(
					'icon'     => 'angle-down',
					'fallback' => true,
				)
			),
		),
		'iconNavPrev'     => esc_html__( 'PREV', 'catch-corporate' ),
		'iconNavNext'     => esc_html__( 'NEXT', 'catch-corporate' ),
		'NavPrev'     => catch_corporate_get_svg(
			array(
				'icon'     => 'testimonial-icon',
				'fallback' => true,
			)
		),
		'NavNext'     => catch_corporate_get_svg(
			array(
				'icon'     => 'testimonial-icon',
				'fallback' => true,
			)
		),
		'rtl' => is_rtl(),
		'dropdownIcon'     => catch_corporate_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	) );

	// Remove Media CSS, we have ouw own CSS for this.
	wp_deregister_style('wp-mediaelement');
}
add_action( 'wp_enqueue_scripts', 'catch_corporate_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function catch_corporate_block_editor_styles() {
	// Bail on customizer preview page.
	if ( is_customize_preview() ) {
		return;
	}

	// Block styles.
	wp_enqueue_style( 'catch-corporate-block-editor-style', get_theme_file_uri( 'assets/css/editor-blocks.css' ) );

	// Add custom fonts.
	wp_enqueue_style( 'catch-corporate-fonts', catch_corporate_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'catch_corporate_block_editor_styles' );

if ( ! function_exists( 'catch_corporate_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		// Getting data from Customizer Options
		$length	= get_theme_mod( 'catch_corporate_excerpt_length', 25 );

		return absint( $length );
	}
endif; //catch_corporate_excerpt_length
add_filter( 'excerpt_length', 'catch_corporate_excerpt_length', 999 );

if ( ! function_exists( 'catch_corporate_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a option from customizer
	 *
	 * @return string option from customizer prepended with an ellipsis.
	 */
	function catch_corporate_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		$more_tag_text = get_theme_mod( 'catch_corporate_excerpt_more_text',  esc_html__( 'Continue reading', 'catch-corporate' ) );

		$link = sprintf( '<span class="more-button"><a href="%1$s" class="more-link">%2$s</a></a>',
			esc_url( get_permalink() ),
			/* translators: %s: Name of current post */
			wp_kses_data( $more_tag_text ) . '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
		);

		return $link;
	}
endif;
add_filter( 'excerpt_more', 'catch_corporate_excerpt_more' );

if ( ! function_exists( 'catch_corporate_custom_excerpt' ) ) :
	/**
	 * Adds Continue reading link to more tag excerpts.
	 *
	 * function tied to the get_the_excerpt filter hook.
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_custom_excerpt( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$more_tag_text = get_theme_mod( 'catch_corporate_excerpt_more_text', esc_html__( 'Continue reading', 'catch-corporate' ) );

			$link = sprintf( '<span class="more-button"><a href="%1$s" class="more-link">%2$s</a></a>',
				esc_url( get_permalink() ),
				/* translators: %s: Name of current post */
				wp_kses_data( $more_tag_text ). '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
			);

			$link = ' &hellip; ' . $link;

			$output .= $link;
		}

		return $output;
	}
endif; //catch_corporate_custom_excerpt
add_filter( 'get_the_excerpt', 'catch_corporate_custom_excerpt' );

if ( ! function_exists( 'catch_corporate_more_link' ) ) :
	/**
	 * Replacing Continue reading link to the_content more.
	 *
	 * function tied to the the_content_more_link filter hook.
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_more_link( $more_link, $more_link_text ) {
		$more_tag_text = get_theme_mod( 'catch_corporate_excerpt_more_text', esc_html__( 'Continue reading', 'catch-corporate' ) );

		return ' &hellip; ' . str_replace( $more_link_text, wp_kses_data( $more_tag_text ), $more_link );
	}
endif; //catch_corporate_more_link
add_filter( 'the_content_more_link', 'catch_corporate_more_link', 10, 2 );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function catch_corporate_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// Catch Web Tools.
		array(
			'name' => 'Catch Web Tools', // Plugin Name, translation not required.
			'slug' => 'catch-web-tools',
		),
		// Catch IDs
		array(
			'name' => 'Catch IDs', // Plugin Name, translation not required.
			'slug' => 'catch-ids',
		),
		// To Top.
		array(
			'name' => 'To top', // Plugin Name, translation not required.
			'slug' => 'to-top',
		),
		// Catch Gallery.
		array(
			'name' => 'Catch Gallery', // Plugin Name, translation not required.
			'slug' => 'catch-gallery',
		),
	);

	if ( ! class_exists( 'Catch_Infinite_Scroll_Pro' ) ) {
		$plugins[] = array(
			'name' => 'Catch Infinite Scroll', // Plugin Name, translation not required.
			'slug' => 'catch-infinite-scroll',
		);
	}

	if ( ! class_exists( 'Essential_Content_Types_Pro' ) ) {
		$plugins[] = array(
			'name' => 'Essential Content Types', // Plugin Name, translation not required.
			'slug' => 'essential-content-types',
		);
	}

	if ( ! class_exists( 'Essential_Widgets_Pro' ) ) {
		$plugins[] = array(
			'name' => 'Essential Widgets', // Plugin Name, translation not required.
			'slug' => 'essential-widgets',
		);
	}

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'catch-corporate',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'catch_corporate_register_required_plugins' );

/**
 * SVG icons functions and filters
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Implement the Custom Header feature
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions
 */
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );

/**
 * Color Scheme additions
 */
require get_parent_theme_file_path( '/inc/color-scheme.php' );

/**
 * Load Jetpack compatibility file
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_parent_theme_file_path( '/inc/jetpack.php' );
}

/**
 * Load Social Widgets
 */
require get_parent_theme_file_path( '/inc/widget-social-icons.php' );

/**
 * Load TGMPA
 */
require get_parent_theme_file_path( '/inc/class-tgm-plugin-activation.php' );

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/about.php' );