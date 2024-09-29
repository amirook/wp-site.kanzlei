<?php
/**
 * Title: Contact Map
 * Slug: contact-map
 * Categories: ziri-fse-patterns
 * Keywords: contact-map
 */

return array(
    'title'      => __( 'Contact Map', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'contact', 'contact-map' ),
    'content'   => '
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"right":"15px","left":"15px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-right:15px;padding-left:15px"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"left":"var:preset|spacing|default","right":"0px"}}},"textColor":"black","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-xx-large-font-size" style="margin-right:0px;margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('We\'d love to hear from you', 'ziri') . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","right":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"textColor":"heading","fontSize":"small"} -->
<p class="has-text-align-center has-heading-color has-text-color has-small-font-size" style="margin-top:16px;margin-right:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('We have offices and teams all around the world.', 'ziri'). '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px"><!-- wp:image {"align":"wide","id":33688,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image alignwide size-large"><img src="'. esc_url( get_theme_file_uri( '/assets/images/map.webp' ) ) . '" alt="" class="wp-image-33688"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"64px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:64px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('California', 'ziri'). '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"8px","right":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"textColor":"heading","fontSize":"small"} -->
<p class="has-text-align-center has-heading-color has-text-color has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Our friendly team is here to help.', 'ziri'). '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px"}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size" style="margin-top:16px;font-style:normal;font-weight:600"><a href="#">support@website.com</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Sales', 'ziri'). '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"8px","right":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"textColor":"heading","fontSize":"small"} -->
<p class="has-text-align-center has-heading-color has-text-color has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Questions or queries? Get in touch!', 'ziri'). '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px"}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size" style="margin-top:16px;font-style:normal;font-weight:600"><a href="#">sales@website.com</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Phone', 'ziri'). '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"8px","right":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"textColor":"heading","fontSize":"small"} -->
<p class="has-text-align-center has-heading-color has-text-color has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Mon-Fri from 8am to 5pm.', 'ziri'). '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px"}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size" style="margin-top:16px;font-style:normal;font-weight:600">'. esc_html__('+1 (555) 000-0000', 'ziri'). '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"90px","className":"is-style-has-mb-30","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:90px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-30"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
    '
);
