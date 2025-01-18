<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Catch_Corporate
 */

if ( ! function_exists( 'catch_corporate_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function catch_corporate_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on">' . catch_corporate_get_svg( array( 'icon' => 'calendar-new' ) ) . '<span class="screen-reader-text">' .  esc_html__( ' Posted on ', 'catch-corporate' ) . '</span>' .  $posted_on . '</span>';
	}
endif;

if ( ! function_exists( 'catch_corporate_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function catch_corporate_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( ' ' ); // Separate list by space.

			if ( $categories_list  ) {
				echo '<span class="cat-links">' . '<span>' . __( 'Categories', 'catch-corporate' ) . ':' .  '</span>' . $categories_list . '</span>';
			}

			$tags_list = get_the_tag_list( '', ' ' ); // Separate list by space.

			if ( $tags_list  ) {
				echo '<span class="tags-links">' . '<span>' . __( 'Tags', 'catch-corporate' ) . ':' . '</span>' . $tags_list . '</span>';
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'catch-corporate' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'catch-corporate' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'catch_corporate_author_bio' ) ) :
	/**
	 * Prints HTML with meta information for the author bio.
	 */
	function catch_corporate_author_bio() {
		if ( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/biography' );
		}
	}
endif;

if ( ! function_exists( 'catch_corporate_by_line' ) ) :
	/**
	 * Prints HTML with meta information for the author bio.
	 */
	function catch_corporate_by_line() {
		$post_id = get_queried_object_id();
		$post_author_id = get_post_field( 'post_author', $post_id );

		$byline = '<span class="author vcard">';

		$byline .= '<a class="url fn n" href="' . esc_url( get_author_posts_url( $post_author_id ) ) . '">' . esc_html( get_the_author_meta( 'nickname', $post_author_id ) ) . '</a></span>';

		echo '<span class="byline">' . catch_corporate_get_svg( array( 'icon' => 'user' ) ) . '' . $byline . '</span>';
	}
endif;

if ( ! function_exists( 'catch_corporate_cat_list' ) ) :
	/**
	 * Prints HTML with meta information for the categories
	 */
	function catch_corporate_cat_list() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the / */
			$categories_list = get_the_category_list( esc_html__( ', ', 'catch-corporate' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . catch_corporate_get_svg( array( 'icon' => 'folder-light' ) ) . '<span class="screen-reader-text">%1$s </span>%2$s</span>', esc_html__(  'Cat Links', 'catch-corporate' ), $categories_list ); // WPCS: XSS OK.
			}
		} elseif ( 'jetpack-portfolio' == get_post_type() ) {
			/* translators: used between list items, there is a space after the / */
			$categories_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '', esc_html__( ' / ', 'catch-corporate' ) );

			if ( ! is_wp_error( $categories_list ) ) {
				printf( '<span class="cat-links">' . catch_corporate_get_svg( array( 'icon' => 'folder-light' ) ) . '<span class="screen-reader-text">%1$s </span>%2$s</span>', esc_html__(  'Cat Links', 'catch-corporate' ), $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'catch_corporate_comments_link' ) ) :
	/**
	 * Prints HTML with meta information for the comments
	 */
	function catch_corporate_comments_link() {
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'catch-corporate' ), esc_html__( '1 Comment', 'catch-corporate' ), esc_html__( '% Comments', 'catch-corporate' ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'catch_corporate_entry_category_date' ) ) :
	/**
	 * Prints HTML with category and tags for current post.
	 *
	 * Create your own catch_corporate_entry_category_date() function to override in a child theme.
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_entry_category_date() {
		$meta = '<div class="entry-meta">';

		$portfolio_categories_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '<span class="portfolio-entry-meta entry-meta">', esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'catch-corporate' ), '</span>' );

		if ( 'jetpack-portfolio' === get_post_type() ) {
			$meta .= sprintf( '<span class="cat-links">%1$s%2$s</span>',
				sprintf( _x( '<span class="screen-reader-text">Categories: </span>', 'Used before category names.', 'catch-corporate' ) ),
				$portfolio_categories_list
			);
		}

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'catch-corporate' ) );
		if ( $categories_list && catch_corporate_categorized_blog() ) {
			$meta .= sprintf( '<span class="cat-links">%1$s%2$s</span>',
				sprintf( _x( '<span class="screen-reader-text">Categories: </span>', 'Used before category names.', 'catch-corporate' ) ),
				$categories_list
			);
		}

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$meta .= sprintf( '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			sprintf( __( '<span class="date-label">Posted on </span>', 'catch-corporate' ) ),
			esc_url( get_permalink() ),
			$time_string
		);

		$meta .= '</div><!-- .entry-meta -->';

		return $meta;
	}
endif;

if ( ! function_exists( 'catch_corporate_categorized_blog' ) ) :
	/**
	 * Determines whether blog/site has more than one category.
	 *
	 * Create your own catch_corporate_categorized_blog() function to override in a child theme.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if there is more than one category, false otherwise.
	 */
	function catch_corporate_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'catch_corporate_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'catch_corporate_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so catch_corporate_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so catch_corporate_categorized_blog should return false.
			return false;
		}
	}
endif;

/**
 * Footer Text
 *
 * @get footer text from theme options and display them accordingly
 * @display footer_text
 * @action catch_corporate_footer
 *
 * @since 1.0.0
 */
function catch_corporate_footer_content() {
	$theme_data = wp_get_theme();

	$footer_content = sprintf( _x( 'Copyright &copy; %1$s %2$s %3$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'catch-corporate' ), esc_attr( date_i18n( __( 'Y', 'catch-corporate' ) ) ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>', function_exists( 'get_the_privacy_policy_link' ) ? get_the_privacy_policy_link() : '' ) . '<span class="sep"> | </span>' . esc_html( $theme_data->get( 'Name' ) ) . '&nbsp;' . esc_html__( 'by', 'catch-corporate' ) . '&nbsp;<a target="_blank" href="' . esc_url( $theme_data->get( 'AuthorURI' ) ) . '">' . esc_html( $theme_data->get( 'Author' ) ) . '</a>';

	if ( ! $footer_content ) {
		// Bail early if footer content is empty
		return;
	}
	
	echo '<div class="site-info">' . $footer_content . '</div><!-- .site-info -->';
}
add_action( 'catch_corporate_credits', 'catch_corporate_footer_content', 10 );

if ( ! function_exists( 'catch_corporate_single_image' ) ) :
	/**
	 * Display Single Page/Post Image
	 */
	function catch_corporate_single_image() {
		if ( has_post_thumbnail() ) {
			$featured_image = get_theme_mod( 'catch_corporate_single_layout', 'disabled' );

?>
			<figure class="entry-image default">
                <?php the_post_thumbnail( $featured_image ); ?>
	        </figure>
	   	<?php
		}
	}
endif; // catch_corporate_single_image.

if ( ! function_exists( 'catch_corporate_archive_image' ) ) :
	/**
	 * Display Post Archive Image
	 */
	function catch_corporate_archive_image() {
		if ( ! has_post_thumbnail() ) {
			// Bail if there is no featured image.
			return;
		}

		$archive_layout = get_theme_mod( 'catch_corporate_homepage_archive_layout', 'right-sidebar' );

		if ( 'full-content' === $archive_layout ) {
			// Bail if full content is selected.
			return;
		}

		$thumbnail = 'post-thumbnail';

		if ( 'no-sidebar-full-width' === $archive_layout ) {
			$thumbnail = 'catch-corporate-slider';
		} ?>

		<div class="post-thumbnail">
			<a class="cover-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img src="<?php the_post_thumbnail_url( $thumbnail ); ?>"> 
				<?php echo catch_corporate_get_svg( array( 'icon' => 'info' ) ); ?>
			</a>
		</div>
		<?php
	}
endif; // catch_corporate_archive_image.

if ( ! function_exists( 'catch_corporate_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 */
	function catch_corporate_comment( $comment, $args, $depth ) {
		if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="comment-body">
				<?php esc_html_e( 'Pingback:', 'catch-corporate' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'catch-corporate' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		<?php else : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div><!-- .comment-author -->

				<div class="comment-container">
					<header class="comment-meta">
						<?php printf( __( '%s <span class="says screen-reader-text">says:</span>', 'catch-corporate' ), sprintf( '<cite class="fn author-name">%s</cite>', get_comment_author_link() ) ); ?>

						<a class="comment-permalink entry-meta" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>"><?php printf( esc_html__( '%s ago', 'catch-corporate' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time></a>
					<?php edit_comment_link( esc_html__( 'Edit', 'catch-corporate' ), '<span class="edit-link">', '</span>' ); ?>
					</header><!-- .comment-meta -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'catch-corporate' ); ?></p>
					<?php endif; ?>

					<div class="comment-content">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>',
						) ) );
					?>
				</div><!-- .comment-content -->

			</article><!-- .comment-body -->
		<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>

		<?php
		endif;
	}
endif; // ends check for catch_corporate_comment()

if ( ! function_exists( 'catch_corporate_slider_entry_category' ) ) :
	/**
	 * Prints HTML with category and tags for current post.
	 *
	 * Create your own catch_corporate_entry_category_date() function to override in a child theme.
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_slider_entry_category() {
		$meta = '<div class="entry-meta">';

		$portfolio_categories_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '<span class="portfolio-entry-meta entry-meta">', '', '</span>' );

		if ( 'jetpack-portfolio' === get_post_type( ) ) {
			$meta .= sprintf( '<span class="cat-links">' .'<span class="cat-label screen-reader-text">%1$s</span>%2$s</span>',
				sprintf( _x( 'Categories', 'Used before category names.', 'catch-corporate' ) ),
				$portfolio_categories_list
			);
		}

		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list && catch_corporate_categorized_blog( ) ) {
			$meta .= sprintf( '<span class="cat-links">' . '<span class="cat-label screen-reader-text">%1$s</span>%2$s</span>',
				sprintf( _x( 'Categories', 'Used before category names.', 'catch-corporate' ) ),
				$categories_list
			);
		}

		$meta .= '</div><!-- .entry-meta -->';

		return $meta;
	}
endif;

if ( ! function_exists( 'catch_corporate_entry_date_author' ) ) :
	/**
	 * Prints HTML with category and tags for current post.
	 *
	 * Create your own catch_corporate_entry_category_date() function to override in a child theme.
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_entry_date_author() {
		$meta = '<div class="entry-meta">';

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$meta .= sprintf( '<span class="posted-on screen-reader-text">%3$s' . '<span class="date-label screen-reader-text">%1$s</span><a href="%2$s" rel="bookmark">%4$s</a></span>',
			_x( 'Posted on', 'Used before publish date.', 'catch-corporate' ),
			esc_url( get_permalink() ),
			esc_html__( 'Posted on ', 'catch-corporate' ),
			$time_string
		);

		// Get the author name; wrap it in a link.
		$byline = sprintf(
			/* translators: %s: post author */
			__( '<span class="author-label screen-reader-text">By </span>%s', 'catch-corporate' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
		);

		$meta .= sprintf( '<span class="byline">%1$s%2$s</span>',
			esc_html__( ' By ', 'catch-corporate' ),
			$byline
		 );


		$meta .= '</div><!-- .entry-meta -->';

		return $meta;
	}
endif;

if ( ! function_exists( 'catch_corporate_archives_cat_count_span' ) ) :
	/**
	 * Used to wrap post count in Categories widget with a span tag
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_archives_cat_count_span($links) {
		$links = str_replace('</a> (', '</a> <span>(', $links);
		$links = str_replace(')', ')</span>', $links);
		return $links;
	}
	add_filter( 'wp_list_categories', 'catch_corporate_archives_cat_count_span' );
endif;

if ( ! function_exists( 'catch_corporate_archives_count_span' ) ) :
	/**
	 * Used to wrap post count in Archives widget with a span tag
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_archives_count_span($links) {
		$links = str_replace('</a>&nbsp;(', '</a> <span>(', $links);
		$links = str_replace(')', ')</span>', $links);
		return $links;
	}
	add_filter( 'get_archives_link', 'catch_corporate_archives_count_span' );
endif;

if ( ! function_exists( 'catch_corporate_section_heading' ) ) :
	/**
	 * Display/get tagline title and subtitle
	 *
	 * @since 1.0.0
	 */
	function catch_corporate_section_heading( $tagline, $title, $description = '', $echo = true ) {
		$output = '';
		if ( $title || $tagline || $description ) {
			$output .= '<div class="section-heading-wrapper">';

			if ( $tagline ){
				$output .= '<div class="section-tagline">' . wp_kses_post( $tagline) . '</div><!-- .section-description-wrapper -->';
			}

			if ( $title ){
				$output .= '<div class="section-title-wrapper"><h2 class="section-title">' . wp_kses_post( $title ) . '</h2></div>';
			}

			if ( $description ){
				$output .= '<div class="section-description"><p>' . wp_kses_post( $description ) . '</p></div><!-- .section-description-wrapper -->';
			}

			$output .= '</div><!-- .section-heading-wrapper -->';
		}

		if ( ! $echo ) {
			return $output;
		} 

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'catch_corporate_single_product_category' ) ) :
	/**
	 * Display Single Product Category
	 */
	function catch_corporate_single_product_category() {
		global $product; ?>

		<div class="entry-meta">
			<?php echo wc_get_product_category_list( $product->get_id(), ', ' ); ?>
		</div>
		
	<?php
	}
endif; // catch_corporate_single_image.

if ( ! function_exists( 'catch_corporate_entry_category' ) ) :
	/**
	 * Prints HTML with meta information for the category.
	 */
	function catch_corporate_entry_category( $echo = true ) {
		$output          = '';
		$categories_list = get_the_category_list( ' ' );

		if ( $categories_list && ! is_wp_error( $categories_list ) ) {
			/* translators: 1: list of categories. */
			$output = sprintf( '<span class="cat-links">%1$s%2$s</span>',
				sprintf( _x( '<span class="cat-text screen-reader-text">Categories</span>', 'Used before category names.', 'catch-corporate' ) ),
				$categories_list
			); // WPCS: XSS OK.
		}

		if ( $echo ) {
			echo $output;
		} else {
			return $output;
		}
	}
endif;
