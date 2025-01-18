<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Catch_Corporate
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function catch_corporate_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Always add a front-page class to the front page.
	if ( is_front_page() && ! is_home() ) {
		$classes[] = 'page-template-front-page';
	}

	$classes[] = 'fluid-layout';

	// For svg icons throughout the theme
	$classes[] = 'has-svg-patterns';

	// Absolute Header on Homepage
	if( is_home() || is_front_page() ) {
		$classes[] = 'absolute-header';
	}

	// Adds a class of navigation-(default|classic) to blogs.
	$classes[] = 'navigation-classic';

	// Adds a class if Gradient Button is enabled
	if( get_theme_mod( 'catch_corporate_header_innerpage_text_color', 0 ) ) {
		$classes[] = 'header-text-white';
	}

	//For slider images
	$text_below_image = get_theme_mod( 'catch_corporate_slider_text_below_image', 1 );

	if( $text_below_image ) {
		$classes[] = 'text-below-image';
	}

	//For slider images
	$header_text_below_image = get_theme_mod( 'catch_corporate_header_image_text_below_image', 1 );

	if( $header_text_below_image ) {
		$classes[] = 'text-below-header-image';
	}

	// Adds a class with respect to layout selected.
	$layout  = catch_corporate_get_theme_layout();
	$sidebar = catch_corporate_get_sidebar_id();

	$layout_class = "no-sidebar full-width-layout";

	if ( 'right-sidebar' === $layout && '' !== $sidebar ) {
		$layout_class = 'two-columns-layout content-left';
	}

	$classes[] = $layout_class;

	$classes[] = 'excerpt';

	$classes[] = 'header-media-fluid';

	$enable_sticky_playlist = get_theme_mod( 'catch_corporate_sticky_playlist_visibility', 'disabled' );

	if ( catch_corporate_check_section( $enable_sticky_playlist ) ) {
		$classes[] = 'sticky-playlist-enabled';
	}

	$header_image = catch_corporate_featured_overall_image();

	if ( 'disable' !== $header_image ) {
		$classes[] = 'has-header-media';
	}

	if ( ! ( catch_corporate_has_header_media_text() ) ) {
		$classes[] = 'header-media-text-disabled';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	$classes[] = 'has-pattern-shape';

	// Added color scheme to body class.
	$classes[] = 'color-scheme-default';

	return $classes;
}
add_filter( 'body_class', 'catch_corporate_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function catch_corporate_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'catch_corporate_pingback_header' );

if ( ! function_exists( 'catch_corporate_comment_field' ) ) :
	/**
	 * Modify Comment Textarea Fields
	 *
	 * @uses comment_form_field_comment filter
	 * @since 1.0.0
	 */
	function catch_corporate_comment_field( $comment_field ) {
		if ( function_exists( 'is_product' ) && is_product() ) {
			return $comment_field;
		}

		$comment_field =
		'<p class="comment-form-comment">
				<textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Comment", "catch-corporate" ) . ' *' . '" cols="45" rows="8" aria-required="true"></textarea>
			</p>';

		return $comment_field;
	}
endif; // catch_corporate_comment_field.
add_filter( 'comment_form_field_comment', 'catch_corporate_comment_field' );

/**
 * Adds custom overlay for Header Media
 */
function catch_corporate_header_media_image_overlay_css() {
	$home_overlay  = get_theme_mod( 'catch_corporate_header_media_homepage_image_opacity', 0 );
	$inner_overlay = get_theme_mod( 'catch_corporate_header_media_innerpage_image_opacity', 0 );

	if ( $home_overlay || $inner_overlay ) {
		$home_overlay_bg = $home_overlay / 100;

		$inner_overlay_bg = $inner_overlay / 100;

		$css = '.home .custom-header-overlay {
			background-color: rgba(0, 0, 0, ' . esc_attr( $home_overlay_bg ) . ' );
		} '; // Dividing by 100 as the option is shown as % for user

		$css .= 'body:not(.home) .custom-header-overlay {
			background-color: rgba(0, 0, 0, ' . esc_attr( $inner_overlay_bg ) . ' );
		} '; // Dividing by 100 as the option is shown as % for user

		wp_add_inline_style( 'catch-corporate-style', $css );
	}


}
add_action( 'wp_enqueue_scripts', 'catch_corporate_header_media_image_overlay_css', 11 );

/**
 * Adds custom overlay for Slider
 */
function catch_corporate_slider_image_overlay_css() {
	$enable_slider = catch_corporate_check_section( get_theme_mod( 'catch_corporate_slider_option', 'disabled' ) );

	if ( ! $enable_slider ) {
		return;
	}

	$overlay = get_theme_mod( 'catch_corporate_slider_opacity' );

	if ( $overlay ) {
		$overlay_bg = $overlay / 100;

		$css = '#feature-slider-section .post-thumbnail:before {
			background-color: rgba(0, 0, 0, ' . esc_attr( $overlay_bg ) . ' );
		} '; // Dividing by 100 as the option is shown as % for user

		wp_add_inline_style( 'catch-corporate-style', $css );
	}
}
add_action( 'wp_enqueue_scripts', 'catch_corporate_slider_image_overlay_css', 11 );

/**
 * Adds Slider image CSS
 */
function catch_corporate_slider_image_position_css() {
	$css = '';

	$image_position_mobile = get_theme_mod( 'catch_corporate_slider_image_position_mobile', 'center center' );

	if ( 'center center' !== $image_position_mobile ) {
		$css = '#feature-slider-section .post-thumbnail img {
			object-position: '. esc_attr( $image_position_mobile ) . ';
		} ';
	}

	$image_position_desktop = get_theme_mod( 'catch_corporate_slider_image_position_desktop', 'center center' );

	if ( 'center center' !== $image_position_desktop ) {
		$css .= '
		@media only screen and (min-width: 64em) {
			#feature-slider-section .post-thumbnail img {
				object-position: '. esc_attr( $image_position_desktop ) . ';
			}
		}';
	}

	wp_add_inline_style( 'catch-corporate-style', $css );
}
add_action( 'wp_enqueue_scripts', 'catch_corporate_slider_image_position_css', 11 );

/**
 * Remove first post from blog as it is already show via recent post template
 */
function catch_corporate_alter_home( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$cats = get_theme_mod( 'catch_corporate_front_page_category' );

		if ( is_array( $cats ) && ! in_array( '0', $cats ) ) {
			$query->query_vars['category__in'] = $cats;
		}

		if ( get_theme_mod( 'catch_corporate_exclude_slider_post' ) ) {
			$quantity = get_theme_mod( 'catch_corporate_slider_number', 4 );

			$post_list	= array();	// list of valid post ids

			for( $i = 1; $i <= $quantity; $i++ ){
				if ( get_theme_mod( 'catch_corporate_slider_post_' . $i ) && get_theme_mod( 'catch_corporate_slider_post_' . $i ) > 0 ) {
					$post_list = array_merge( $post_list, array( get_theme_mod( 'catch_corporate_slider_post_' . $i ) ) );
				}
			}

			if ( ! empty( $post_list ) ) {
				$query->query_vars['post__not_in'] = $post_list;
			}
		}
	}
}
add_action( 'pre_get_posts', 'catch_corporate_alter_home' );

if ( ! function_exists( 'catch_corporate_content_nav' ) ) :
	/**
	 * Display navigation/pagination when applicable
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_content_nav() {
		global $wp_query;

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$pagination_type = get_theme_mod( 'catch_corporate_pagination_type', 'default' );

		if ( ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) || class_exists( 'Catch_Infinite_Scroll' ) ) {
			// Support infinite scroll plugins.
			the_posts_navigation();
		} elseif ( 'numeric' === $pagination_type && function_exists( 'the_posts_pagination' ) ) {
			the_posts_pagination( array(
				'prev_text'          => '<span>' . esc_html__( 'Prev', 'catch-corporate' ) . '</span>',
				'next_text'          => '<span>' . esc_html__( 'Next', 'catch-corporate' ) . '</span>',
				'screen_reader_text' => '<span class="nav-subtitle screen-reader-text">' . esc_html__( 'Page', 'catch-corporate' ) . ' </span>',
			) );
		} else {
			the_posts_navigation();
		}
	}
endif; // catch_corporate_content_nav

/**
 * Check if a section is enabled or not based on the $value parameter
 * @param  string $value Value of the section that is to be checked
 * @return boolean return true if section is enabled otherwise false
 */
function catch_corporate_check_section( $value ) {
	return ( 'entire-site' == $value  || ( is_front_page() && 'homepage' === $value ) );
}

/**
 * Return the first image in a post. Works inside a loop.
 * @param [integer] $post_id [Post or page id]
 * @param [string/array] $size Image size. Either a string keyword (thumbnail, medium, large or full) or a 2-item array representing width and height in pixels, e.g. array(32,32).
 * @param [string/array] $attr Query string or array of attributes.
 * @return [string] image html
 *
 * @since 1.0.0
 */
function catch_corporate_get_first_image( $postID, $size, $attr, $src = false ) {
	ob_start();

	ob_end_clean();

	$image 	= '';

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post_field('post_content', $postID ) , $matches);

	if ( isset( $matches[1][0] ) ) {
		// Get first image.
		$first_img = $matches[1][0];

		if ( $src ) {
			//Return url of src is true
			return $first_img;
		}

		return '<img class="wp-post-image" src="'. esc_url( $first_img ) .'">';
	}

	return false;
}

function catch_corporate_get_theme_layout() {
	$layout = get_theme_mod( 'catch_corporate_default_layout', 'right-sidebar' );

	if ( is_home() || is_archive() ) {
		$layout = get_theme_mod( 'catch_corporate_homepage_archive_layout', 'right-sidebar' );
	}

	return $layout;
}

function catch_corporate_get_sidebar_id() {
	$sidebar = $id = '';

	$layout = catch_corporate_get_theme_layout();

	if ( 'no-sidebar-full-width' === $layout ) {
		return $sidebar;
	}

	// Blog Page or Front Page setting in Reading Settings.
	if ( 'page' == get_option('show_on_front') ) {
		$id = get_option('show_on_front');
	} elseif ( is_singular() ) {
		global $post;

		$id = $post->ID;

		if ( is_attachment() ) {
			$id = $post->post_parent;
		}
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$sidebar = 'sidebar-1'; // Primary Sidebar.
	}

	return $sidebar;
}

if ( ! function_exists( 'catch_corporate_truncate_phrase' ) ) :
	/**
	 * Return a phrase shortened in length to a maximum number of characters.
	 *
	 * Result will be truncated at the last white space in the original string. In this function the word separator is a
	 * single space. Other white space characters (like newlines and tabs) are ignored.
	 *
	 * If the first `$max_characters` of the string does not contain a space character, an empty string will be returned.
	 *
	 * @since 1.0.0
	 *
	 * @param string $text            A string to be shortened.
	 * @param integer $max_characters The maximum number of characters to return.
	 *
	 * @return string Truncated string
	 */
	function catch_corporate_truncate_phrase( $text, $max_characters ) {

		$text = trim( $text );

		if ( mb_strlen( $text ) > $max_characters ) {
			//* Truncate $text to $max_characters + 1
			$text = mb_substr( $text, 0, $max_characters + 1 );

			//* Truncate to the last space in the truncated string
			$text = trim( mb_substr( $text, 0, mb_strrpos( $text, ' ' ) ) );
		}

		return $text;
	}
endif; //catch_corporate_truncate_phrase

if ( ! function_exists( 'catch_corporate_get_the_content_limit' ) ) :
	/**
	 * Return content stripped down and limited content.
	 *
	 * Strips out tags and shortcodes, limits the output to `$max_char` characters, and appends an ellipsis and more link to the end.
	 *
	 * @since 1.0.0
	 *
	 * @param integer $max_characters The maximum number of characters to return.
	 * @param string  $more_link_text Optional. Text of the more link. Default is "(more...)".
	 * @param bool    $stripteaser    Optional. Strip teaser content before the more text. Default is false.
	 *
	 * @return string Limited content.
	 */
	function catch_corporate_get_the_content_limit( $max_characters, $more_link_text = '(more...)', $stripteaser = false ) {

		$content = get_the_content( '', $stripteaser );

		// Strip tags and shortcodes so the content truncation count is done correctly.
		$content = strip_tags( strip_shortcodes( $content ), apply_filters( 'get_the_content_limit_allowedtags', '<script>,<style>' ) );

		// Remove inline styles / .
		$content = trim( preg_replace( '#<(s(cript|tyle)).*?</\1>#si', '', $content ) );

		// Truncate $content to $max_char
		$content = catch_corporate_truncate_phrase( $content, $max_characters );

		// More link?
		if ( $more_link_text ) {
			$link   = apply_filters( 'get_the_content_more_link', sprintf( '<a href="%s" class="more-link">%s</a>', esc_url( get_permalink() ), $more_link_text ), $more_link_text );
			$output = sprintf( '<p>%s %s</p>', $content, $link );
		} else {
			$output = sprintf( '<p>%s</p>', $content );
			$link = '';
		}

		return apply_filters( 'catch_corporate_get_the_content_limit', $output, $content, $link, $max_characters );

	}
endif; //catch_corporate_get_the_content_limit

if ( ! function_exists( 'catch_corporate_content_image' ) ) :
	/**
	 * Template for Featured Image in Archive Content
	 *
	 * To override this in a child theme
	 * simply fabulous-fluid your own catch_corporate_content_image(), and that function will be used instead.
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_content_image() {
		if ( has_post_thumbnail() && catch_corporate_jetpack_featured_image_display() && is_singular() ) {
			$image_size = 'post-thumbnail';

			$layout = catch_corporate_get_theme_layout();

			if ( 'no-sidebar-full-width' === $layout ) {
				$image_size = 'catch-corporate-slider';
			}

			?>
			<div class="post-thumbnail default>">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( $image_size ); ?>
				</a>
			</div>
			<?php
		}
	}
endif; // catch_corporate_content_image.

if ( ! function_exists( 'catch_corporate_sections' ) ) :
	/**
	 * Display Sections on header and footer with respect to the section option set in catch_corporate_sections_sort
	 */
	function catch_corporate_sections() {
		get_template_part('template-parts/header/header-media');
		get_template_part('template-parts/slider/display-slider');
		get_template_part('template-parts/service/display-service');
		get_template_part('template-parts/hero-content/content-hero');
		get_template_part('template-parts/portfolio/display-portfolio');
		get_template_part('template-parts/testimonial/display-testimonial');
		get_template_part('template-parts/featured-content/display-featured');
	}
endif;



if ( ! function_exists( 'catch_corporate_post_thumbnail' ) ) :
	/**
	 * $image_size post thumbnail size
	 * $type html, html-with-bg, url
	 * $echo echo true/false
	 * $no_thumb display no-thumb image or not
	 */
	function catch_corporate_post_thumbnail( $image_size = 'post-thumbnail', $type = 'html', $echo = true, $no_thumb = false ) {
		$image = $image_url = '';

		if ( has_post_thumbnail() ) {
			$image_url = get_the_post_thumbnail_url( get_the_ID(), $image_size );
			$image     = get_the_post_thumbnail( get_the_ID(), $image_size );
		} else {
			if ( is_array( $image_size ) && $no_thumb ) {
				$image_url  = trailingslashit( get_template_directory_uri() ) . 'assets/images/no-thumb-' . $image_size[0] . 'x' . $image_size[1] . '.jpg';
				$image      = '<img src="' . esc_url( $image_url ) . '" alt="" />';
			} elseif ( $no_thumb ) {
				global $_wp_additional_image_sizes;

				$image_url  = trailingslashit( get_template_directory_uri() ) . 'assets/images/no-thumb-1920x1080.jpg';

				if ( array_key_exists( $image_size, $_wp_additional_image_sizes ) ) {
					$image_url  = trailingslashit( get_template_directory_uri() ) . 'assets/images/no-thumb-' . $_wp_additional_image_sizes[ $image_size ]['width'] . 'x' . $_wp_additional_image_sizes[ $image_size ]['height'] . '.jpg';
				}

				$image      = '<img src="' . esc_url( $image_url ) . '" alt="" />';
			}

			// Get the first image in page, returns false if there is no image.
			$first_image_url = catch_corporate_get_first_image( get_the_ID(), $image_size, '', true );

			// Set value of image as first image if there is an image present in the page.
			if ( $first_image_url ) {
				$image_url = $first_image_url;
				$image = '<img class="wp-post-image" src="'. esc_url( $image_url ) .'">';
			}
		}

		if ( ! $image_url ) {
			// Bail if there is no image url at this stage.
			return;
		}

		if ( 'url' === $type ) {
			return $image_url;
		}

		$output = '<div';

		if ( 'html-with-bg' === $type ) {
			$output .= ' class="post-thumbnail-background" style="background-image: url( ' . esc_url( $image_url ) . ' )"';
		} else {
			$output .= ' class="post-thumbnail"';
		}

		$output .= '>';

		$output .= '<a class="cover-link" href="' . esc_url( get_the_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '">';

		if ( 'html-with-bg' !== $type ) {
			$output .= $image;
		}

		$output .= '</a></div><!-- .post-thumbnail -->';

		if ( ! $echo ) {
			return $output;
		}

		echo $output;
	}
endif;

if ( ! function_exists( 'catch_corporate_testimonial_posts_args' ) ) :
	function catch_corporate_testimonial_posts_args() {
		$number = get_theme_mod( 'catch_corporate_testimonial_number', 5 );

		$args = array(
			'ignore_sticky_posts' => 1 // ignore sticky posts
		);

		$post_list  = array();// list of valid post/page ids

		$args['post_type'] = 'jetpack-testimonial';

		for ( $i = 1; $i <= $number; $i++ ) {
			$post_id = '';

			$post_id =  get_theme_mod( 'catch_corporate_testimonial_cpt_' . $i );

			if ( $post_id && '' !== $post_id ) {
				// Polylang Support.
				if ( class_exists( 'Polylang' ) ) {
					$post_id = pll_get_post( $post_id, pll_current_language() );
				}

				$post_list = array_merge( $post_list, array( $post_id ) );

			}
		}

		$args['post__in'] = $post_list;
		$args['orderby'] = 'post__in';

		$args['posts_per_page'] = $number;

		return $args;
	}
endif;

if ( ! function_exists( 'catch_corporate_primary_menu_active_buttons' ) ) :

	/**
	 * Pricing content posts
	 */
	function catch_corporate_primary_menu_active_buttons() {
		$join_label   = get_theme_mod( 'catch_corporate_primary_button_label', 'Contact Us' );
		$join_link    = get_theme_mod( 'catch_corporate_primary_button_link' );
		$join_target  = get_theme_mod( 'catch_corporate_primary_button_target' ) ? '_blank': '_self';

		if( $join_label ) : ?>
			<div class ="action-buttons">
				<?php if( $join_label ) : ?>
					<a class="button" target="<?php echo $join_target; ?>" href="<?php echo esc_url( $join_link ); ?>"><?php echo esc_html( $join_label ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif;
	}
endif;
