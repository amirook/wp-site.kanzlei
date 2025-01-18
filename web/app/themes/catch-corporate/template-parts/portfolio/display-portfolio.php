<?php
/**
 * The template for displaying portfolio items
 *
 * @package Catch_Corporate
 */
?>

<?php
$enable = get_theme_mod( 'catch_corporate_portfolio_option', 'disabled' );

if ( ! catch_corporate_check_section( $enable ) ) {
	// Bail if portfolio section is disabled.
	return;
}

$catch_corporate_tagline = get_option( 'jetpack_portfolio_content' );
$catch_corporate_title   = get_option( 'jetpack_portfolio_title', esc_html__( 'Projects', 'catch-corporate' ) );

$classes[] = 'layout-three';
$classes[] = 'jetpack-portfolio';
$classes[] = 'section';

$classes[] = get_theme_mod( 'catch_corporate_filter_type', 'filter-type-classic' );

?>

<div id="portfolio-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php catch_corporate_section_heading( $catch_corporate_tagline, $catch_corporate_title ); ?>
		<div class="section-content-wrapper portfolio-content-wrapper layout-three">
			<div class="grid">
				<?php
					get_template_part( 'template-parts/portfolio/post-types', 'portfolio' );
				?>
			</div>
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- #portfolio-section -->
