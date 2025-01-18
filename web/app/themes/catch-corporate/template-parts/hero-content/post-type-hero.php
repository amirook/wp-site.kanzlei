<?php
/**
 * The template used for displaying hero content
 *
 * @package Catch_Corporate
 */

if ( $catch_corporate_id = get_theme_mod( 'catch_corporate_hero_content' ) ) {
	$catch_corporate_args['page_id'] = absint( $catch_corporate_id );
}

// If $catch_corporate_args is empty return false
if ( empty( $catch_corporate_args ) ) {
	return;
}

// Create a new WP_Query using the argument previously created
$hero_query = new WP_Query( $catch_corporate_args );
if ( $hero_query->have_posts() ) :
	while ( $hero_query->have_posts() ) :
		$hero_query->the_post();

		$class = '';
		if( ! has_post_thumbnail() ) {
			$class = 'full-width';
		}
		?>
		<div id="hero-section" class="hero-section section content-align-right text-align-left">
			<div class="wrapper">
				<div class="section-content-wrapper hero-content-wrapper">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="hentry-inner">
							<?php $post_thumbnail = catch_corporate_post_thumbnail( array( 508, 508 ), 'html', false ); // catch_corporate_post_thumbnail( $image_size, $catch_corporate_type = 'html', $echo = true, $no_thumb = false ).

						if ( has_post_thumbnail() ) : ?>
							<?php echo $post_thumbnail; ?>
							<div class="entry-container">
						<?php else : ?>
							<div class="entry-container full-width">
						<?php endif; ?>
								<header class="entry-header">
									<h2 class="entry-title">
										<?php the_title(); ?>
									</h2>
								</header><!-- .entry-header -->

								<div class="entry-summary">
									<?php 
									the_excerpt();  
									?>
								</div><!-- .entry-summary -->
								<?php
							?>

							<?php if ( get_edit_post_link() ) : ?>
								<footer class="entry-footer">
									<div class="entry-meta">
										<?php
											edit_post_link(
												sprintf(
													/* translators: %s: Name of current post */
													esc_html__( 'Edit %s', 'catch-corporate' ),
													the_title( '<span class="screen-reader-text">"', '"</span>', false )
												),
												'<span class="edit-link">',
												'</span>'
											);
										?>
									</div>	<!-- .entry-meta -->
								</footer><!-- .entry-footer -->
							<?php endif; ?>
							
							</div><!-- .entry-container -->
						</div><!-- .hentry-inner -->
					</article>
				</div><!-- .section-content-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .section -->
	<?php
	endwhile;

	wp_reset_postdata();
endif;
