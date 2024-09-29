<?php
/**
 * Title: Sidebar
 * Slug: ziri-sidebar
 * Categories: ziri-fse-patterns
 * Keywords: ziri-sidebar
 */
return array(
	'title'      => __( 'Sidebar', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'ziri-sidebar'),
	'content' => '
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|default","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--default);margin-bottom:56px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"24px"},"padding":{"top":"16px","bottom":"16px","left":"16px","right":"16px"}},"border":{"radius":"16px"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background" style="border-radius:16px;margin-top:0px;margin-bottom:24px;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"0px","bottom":"0px"},"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","left":"var:preset|spacing|default","bottom":"0px"}}},"fontSize":"small-medium"} -->
<h2 class="wp-block-heading has-text-align-center has-small-medium-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-bottom:0px;margin-left:var(--wp--preset--spacing--default);padding-top:0px;padding-right:var(--wp--preset--spacing--default);padding-bottom:0px;padding-left:var(--wp--preset--spacing--default)">'. esc_html__('About Me', 'ziri').'</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":33684,"sizeSlug":"full","linkDestination":"none","style":{"color":{}},"className":"is-style-default"} -->
<figure class="wp-block-image aligncenter size-full is-style-default"><img src="'. esc_url( get_theme_file_uri('/assets/images/team.webp') ) .'" alt="" class="wp-image-33684"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center has-large-font-size" style="font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Emily Parker', 'ziri') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","bottom":"32px","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-bottom:32px;margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Fashion is a distinctive and often constant trend in the style in which a person dresses. It is the prevailing styles in behaviour.', 'ziri') .'</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"size":"has-small-icon-size","align":"center","style":{"spacing":{"blockGap":{"top":"20px","left":"24px"}}}} -->
<ul class="wp-block-social-links aligncenter has-small-icon-size"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"pinterest"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:56px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"24px"},"padding":{"top":"16px","bottom":"16px","left":"16px","right":"16px"}},"border":{"radius":"16px"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background" style="border-radius:16px;margin-top:0px;margin-bottom:24px;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"0px","bottom":"0px"},"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","left":"var:preset|spacing|default","bottom":"0px"}}},"fontSize":"small-medium"} -->
<h2 class="wp-block-heading has-text-align-center has-small-medium-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-bottom:0px;margin-left:var(--wp--preset--spacing--default);padding-top:0px;padding-right:var(--wp--preset--spacing--default);padding-bottom:0px;padding-left:var(--wp--preset--spacing--default)">'. esc_html__('Popular Categories', 'ziri') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:categories {"style":{"typography":{"textDecoration":"underline"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|default","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--default);margin-bottom:56px"><!-- wp:cover {"url":"'. esc_url( get_theme_file_uri('/assets/images/shop.webp') ) .'","id":33702,"dimRatio":0,"minHeight":360,"isDark":false,"style":{"border":{"radius":"32px"},"spacing":{"blockGap":"56px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:32px;min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-33702" alt="" src="'. esc_url( get_theme_file_uri('/assets/images/shop.webp') ) .'" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:site-logo {"align":"center"} /-->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"textColor":"white","fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default)">'. esc_html__('Journey of Ziri', 'ziri').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"textColor":"white","fontSize":"small"} -->
<p class="has-text-align-center has-white-color has-text-color has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default)">'. esc_html__('New Block Theme', 'ziri').'</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"24px"}}}} -->
<div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"white","textColor":"heading","style":{"spacing":{"padding":{"left":"40px","right":"40px","top":"14px","bottom":"14px"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"border":{"radius":"16px"}},"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size" style="font-style:normal;font-weight:500;line-height:1.2"><a class="wp-block-button__link has-heading-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:16px;padding-top:14px;padding-right:40px;padding-bottom:14px;padding-left:40px">'. esc_html__('SHOP NOW', 'ziri').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:56px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"24px"},"padding":{"top":"16px","bottom":"16px","left":"16px","right":"16px"}},"border":{"radius":"16px"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background" style="border-radius:16px;margin-top:0px;margin-bottom:24px;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"0px","bottom":"0px"},"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","left":"var:preset|spacing|default","bottom":"0px"}}},"fontSize":"small-medium"} -->
<h2 class="wp-block-heading has-text-align-center has-small-medium-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-bottom:0px;margin-left:var(--wp--preset--spacing--default);padding-top:0px;padding-right:var(--wp--preset--spacing--default);padding-bottom:0px;padding-left:var(--wp--preset--spacing--default)">'. esc_html__('Popular Posts', 'ziri') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:latest-posts {"postsToShow":3,"displayPostDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":100,"featuredImageSizeHeight":100,"style":{"spacing":{"padding":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"},"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","bottom":"0px","left":"var:preset|spacing|default"}}},"fontSize":"small"} /--></div>
<!-- /wp:group -->
' 
);