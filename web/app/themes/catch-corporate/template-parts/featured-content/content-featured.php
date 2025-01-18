<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package Catch_Corporate
 */
$catch_corporate_number        = get_theme_mod( 'catch_corporate_featured_content_number', 3 );
$catch_corporate_post_list     = array();
$catch_corporate_no_of_post    = 0;

$catch_corporate_args = array(
	'post_type'           => 'post',
	'ignore_sticky_posts' => 1, // ignore sticky posts.
);

// Get valid number of posts.
$catch_corporate_args['post_type'] = 'featured-content';

	for ( $i = 1; $i <= $catch_corporate_number; $i++ ) {
		$catch_corporate_post_id = '';

		$catch_corporate_post_id = get_theme_mod( 'catch_corporate_featured_content_cpt_' . $i );

		if ( $catch_corporate_post_id && '' !== $catch_corporate_post_id ) {
			$catch_corporate_post_list = array_merge( $catch_corporate_post_list, array( $catch_corporate_post_id ) );

			$catch_corporate_no_of_post++;
		}
	}

	$catch_corporate_args['post__in'] = $catch_corporate_post_list;
	$catch_corporate_args['orderby']  = 'post__in';

if ( ! $catch_corporate_no_of_post ) {
	return;
}

$catch_corporate_args['posts_per_page'] = $catch_corporate_no_of_post;

$catch_corporate_loop = new WP_Query( $catch_corporate_args );

while ( $catch_corporate_loop->have_posts() ) :
	
	$catch_corporate_loop->the_post();

	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="hentry-inner">
			<?php
			$thumbnail = array( 508, 338 ); //Ratio 3:2

			catch_corporate_post_thumbnail( $thumbnail, 'html', true, true ); ?>

			<div class="entry-container">
				<header class="entry-header">
					<div class="entry-meta">
						<?php catch_corporate_entry_category(); ?>
					</div>

					<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>' ); ?>
				</header>
				<?php
					$excerpt = get_the_excerpt();

					echo '<div class="entry-summary"><p>' . $excerpt . '</p></div><!-- .entry-summary -->';
				?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php catch_corporate_posted_on(); ?>

				</div><!-- .entry-meta -->
				<?php endif; ?>
			</div><!-- .entry-container -->
		</div><!-- .hentry-inner -->
	</article>
<?php
endwhile;

wp_reset_postdata();
