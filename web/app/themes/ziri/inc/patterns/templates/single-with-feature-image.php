<?php
/**
 * Title: Single Page With Feature Image
 * Slug: single-with-feature-image
 * Categories: ziri-fse-pages
 * Keywords: single-with-feature-image
 */

return array(
    'title'  => __('Single Page With Feature Image', 'ziri'),
    'categories' => array( 'ziri-fse-pages' ),
	'keywords'   => array( 'single-with-feature-image'),
    'content' => '
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"gradient":"banner-section","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide has-banner-section-gradient-background has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"minHeight":333,"minHeightUnit":"px","gradient":"banner-section","isDark":false,"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignwide is-light" style="min-height:333px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim has-background-gradient has-banner-section-gradient-background"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"15px","left":"var:preset|spacing|100"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"inherit":true,"type":"constrained","justifyContent":"left"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-right:15px;padding-left:var(--wp--preset--spacing--100)"><!-- wp:post-title {"textAlign":"center","level":1,"align":"wide"} /--></div>
    <!-- /wp:group --></div></div>
    <!-- /wp:cover --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:post-content {"layout":{"inherit":true}} /--></div>
    <!-- /wp:group -->',
);