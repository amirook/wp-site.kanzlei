<?php
/**
 * Title: Why Choose Us Section
 * Slug: why-choose-us
 * Categories: ziri-fse-patterns
 * Keywords: why-choose-us
 */

return array(
	'title'      => __( 'Why Choose Us Section', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'why-choose-us'),
	'content' => '
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"var:preset|spacing|default","right":"15px","bottom":"var:preset|spacing|default","left":"15px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--default);padding-right:15px;padding-bottom:var(--wp--preset--spacing--default);padding-left:15px"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"40px","left":"80px"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"56%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:56%"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<p class="has-primary-color has-text-color" style="font-size:16px;font-style:normal;font-weight:600">'. esc_html__('OUR SERVICES', 'ziri'). '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"16px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:16px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('Why Choose us?', 'ziri'). '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"24px","right":"var:preset|spacing|default","bottom":"32px","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-top:24px;margin-right:var(--wp--preset--spacing--default);margin-bottom:32px;margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('We blend experience with innovation to provide custom-tailored business solutions and coupled with a deep understanding of industry dynamics, ensures effective strategies for your success.', 'ziri') .'</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"className":"is-style-ziri-button-4","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-ziri-button-4 has-small-font-size" style="font-style:normal;font-weight:500"><a class="wp-block-button__link wp-element-button" href="#">'. esc_html__('Know why we are best →', 'ziri') .'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"44%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:44%"><!-- wp:image {"align":"right","id":80,"width":480,"height":500,"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"32px"}},"className":"is-style-clipIn"} -->
<figure class="wp-block-image alignright size-full is-resized has-custom-border is-style-clipIn"><img src="'. esc_url( get_theme_file_uri('/assets/images/about1.webp') ) .'" alt="" class="wp-image-80" style="border-radius:32px;object-fit:cover;width:480px;height:500px" width="480" height="500"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->' 
);
