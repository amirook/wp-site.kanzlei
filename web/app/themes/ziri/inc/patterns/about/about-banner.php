<?php
/**
 * Title: About Banner
 * Slug: about-banner
 * Categories: ziri-fse-patterns
 * Keywords: about-banner
 */
return array(
	'title'      => __( 'About Banner', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'about-banner'),
	'content' => '
    <!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"left":"var:preset|spacing|140","right":"var:preset|spacing|140","bottom":"0px","top":"0px"},"margin":{"top":"0px","bottom":"var:preset|spacing|default"}}},"gradient":"banner-section","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group alignfull has-banner-section-gradient-background has-background" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--default);padding-top:0px;padding-right:var(--wp--preset--spacing--140);padding-bottom:0px;padding-left:var(--wp--preset--spacing--140)"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"30px","left":"120px"},"padding":{"right":"var:preset|spacing|default","left":"var:preset|spacing|default"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px;padding-right:var(--wp--preset--spacing--default);padding-left:var(--wp--preset--spacing--default)"><!-- wp:column {"verticalAlignment":"center","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;font-size:16px"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:10px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.2","letterSpacing":"0.01em"}},"textColor":"primary"} -->
<p class="has-primary-color has-text-color" style="font-size:16px;font-style:normal;font-weight:500;letter-spacing:0.01em;line-height:1.2">'. esc_html__('ABOUT US', 'ziri') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"16px","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:16px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"style":{"spacing":{"margin":{"right":"0px","bottom":"0px","left":"0px","top":"0px"}},"typography":{"letterSpacing":"-0.02em"}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;letter-spacing:-0.02em"> '. esc_html__('Business Transformation Pioneers Since 2015', 'ziri') . '</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8","fontStyle":"normal","fontWeight":"400"}},"textColor":"heading","fontSize":"small"} -->
<p class="has-heading-color has-text-color has-small-font-size" style="font-style:normal;font-weight:400;line-height:1.8">'. esc_html__('Step into our world, established in 2015, championing business success through tailored strategies and solutions. Uncover how our expert team partners with you for unmatched growth and performance.', 'ziri') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"80px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:80px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|default"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--default)"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:image {"align":"wide","id":33799,"width":1180,"height":600,"scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"32px"}}} -->
<figure class="wp-block-image alignwide size-large is-resized has-custom-border"><img src="'. esc_url( get_theme_file_uri('/assets/images/about-image.webp') ) .'" alt="" class="wp-image-33799" style="border-radius:32px;object-fit:cover;width:1180px;height:600px" width="1180" height="600"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->' 
);
