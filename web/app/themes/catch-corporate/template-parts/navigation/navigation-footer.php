<?php
/**
 * Displays Footer Navigation
 *
 * @package Catch_Corporate
 */

 if ( has_nav_menu( 'menu-footer' ) || has_nav_menu( 'social-footer' ) ) : ?>
	<div id="footer-menu-section" class="site-footer-menu">

			<?php if ( has_nav_menu( 'menu-footer' ) ) : ?>
				<nav id="site-footer-navigation" class="footer-navigation site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'catch-corporate' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>
	</div><!-- #footer-menu-section -->
<?php endif;
