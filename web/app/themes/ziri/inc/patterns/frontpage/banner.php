<?php
/**
 * Title: Banner
 * Slug: banner
 * Categories: ziri-fse-patterns
 * Keywords: Banner
 */

return array(
    'title'      => __( 'Banner', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'banner', 'banner-section' ),
    'content'   => '
    <!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"left":"var:preset|spacing|140","right":"var:preset|spacing|140","top":"0px","bottom":"0px"},"margin":{"top":"0px","bottom":"0px"}}},"gradient":"banner-section","layout":{"type":"constrained","contentSize":""}} -->
<main class="wp-block-group alignfull has-banner-section-gradient-background has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:var(--wp--preset--spacing--140);padding-bottom:0px;padding-left:var(--wp--preset--spacing--140)"><!-- wp:spacer {"height":"150px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:150px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"},"padding":{"right":"0","left":"0","top":"0em","bottom":"0em"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0;padding-top:0em;padding-right:0;padding-bottom:0em;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","left":"var:preset|spacing|default","bottom":"32px"}}},"textColor":"black","className":"wp-block-heading has-text-align-center has-xx-large-font-size","fontSize":"xxx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size has-black-color has-text-color has-xxx-large-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-bottom:32px;margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('The ', 'ziri') .'<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color">'. esc_html__('Ultimate Solution', 'ziri') .'</mark> '. esc_html__('for Your Digital Presence', 'ziri'). '</h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","bottom":"32px","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"textColor":"heading","fontSize":"small"} -->
<p class="has-text-align-center has-heading-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-bottom:32px;margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Discover the key to unlocking unlimited growth in the competitive world of business. Our comprehensive solutions are designed to enhance performance, maximize profitability, and foster innovation.', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"16px"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-fill has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#">'. esc_html__('Lets Get Started →', 'ziri'). '</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ziri-button-3","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-ziri-button-3 has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#">'. esc_html__('Discover More →', 'ziri'). '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"150px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:150px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></main>
<!-- /wp:group -->'
);
