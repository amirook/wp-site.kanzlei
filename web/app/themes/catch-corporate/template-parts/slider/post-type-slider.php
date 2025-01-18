<?php
/**
 * The template used for displaying slider
 *
 * @package Catch_Corporate
 */

$catch_corporate_quantity     = get_theme_mod( 'catch_corporate_slider_number', 4 );
$catch_corporate_no_of_post   = 0; // for number of posts
$catch_corporate_post_list    = array(); // list of valid post/page ids
$catch_corporate_type         = get_theme_mod( 'catch_corporate_slider_type', 'category' );

$catch_corporate_args = array(
	'ignore_sticky_posts' => 1, // ignore sticky posts
);

//Get valid number of posts
$catch_corporate_args['post_type'] =  'page';

for ( $i = 1; $i <= $catch_corporate_quantity; $i++ ) {
	$catch_corporate_id = get_theme_mod( 'catch_corporate_slider_page_' . $i );

	if ( $catch_corporate_id && '' !== $catch_corporate_id ) {
		$catch_corporate_post_list = array_merge( $catch_corporate_post_list, array( $catch_corporate_id ) );

		$catch_corporate_no_of_post++;
	}
}

$catch_corporate_args['post__in'] = $catch_corporate_post_list;
$catch_corporate_args['orderby'] = 'post__in';

if ( ! $catch_corporate_no_of_post ) {
	return;
}

$catch_corporate_args['posts_per_page'] = $catch_corporate_no_of_post;
$catch_corporate_loop = new WP_Query( $catch_corporate_args );

while ( $catch_corporate_loop->have_posts() ) :
	$catch_corporate_loop->the_post();

	$catch_corporate_classes = 'page post-' . get_the_ID() . ' hentry slides';
	?>
	<article class="<?php echo esc_attr( $catch_corporate_classes ); ?>">
		<div class="hentry-inner">
			<?php catch_corporate_post_thumbnail( 'catch-corporate-slider', 'html', true, true ); ?>

			<div class="entry-container">
				<div class="content-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
					</header>
					
					<div class="entry-summary">
					<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				</div> <!--  .content-container  -->
			</div><!-- .entry-container -->
		</div><!-- .hentry-inner -->
	</article><!-- .slides -->
<?php
endwhile;

wp_reset_postdata();
