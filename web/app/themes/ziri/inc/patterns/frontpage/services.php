<?php
/**
 * Title: Services Section
 * Slug: services
 * Categories: ziri-fse-patterns
 * Keywords: services
 */

return array(
	'title'      => __( 'Services Section', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'services' ),
	'content' => '
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|140","left":"var:preset|spacing|140","top":"0px","bottom":"0px"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"primary-accent","className":"is-style-slide-up-fade-in","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group alignfull is-style-slide-up-fade-in has-primary-accent-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:var(--wp--preset--spacing--140);padding-bottom:0px;padding-left:var(--wp--preset--spacing--140)"><!-- wp:spacer {"height":"80px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:80px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0px"},"blockGap":{"top":"40px","left":"40px"},"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-default"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-style-default" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"30%","style":{"spacing":{"padding":{"top":"var:preset|spacing|default","right":"68px","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--default);padding-right:68px;padding-bottom:var(--wp--preset--spacing--default);padding-left:var(--wp--preset--spacing--default);flex-basis:30%"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"textColor":"primary"} -->
<p class="has-primary-color has-text-color" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-size:16px;font-style:normal;font-weight:600">'. esc_html__('ACHIEVE MORE', 'ziri'). '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"16px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="margin-top:16px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Take Your Business to Next Level', 'ziri').'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"18%","style":{"spacing":{"blockGap":"0px","padding":{"top":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}}} -->
<div class="wp-block-column is-vertically-aligned-top" style="padding-top:var(--wp--preset--spacing--default);padding-bottom:var(--wp--preset--spacing--default);padding-left:var(--wp--preset--spacing--default);flex-basis:18%"><!-- wp:image {"width":60,"height":60,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:60px;height:60px" width="60" height="60"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"85%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:85%"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Strategic Planning', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"16px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-top:16px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('A methodical approach to setting goals, making informed decisions, and driving business growth.', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"24px","left":"24px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"18%","style":{"spacing":{"padding":{"top":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}}} -->
<div class="wp-block-column is-vertically-aligned-top" style="padding-top:var(--wp--preset--spacing--default);padding-bottom:var(--wp--preset--spacing--default);padding-left:var(--wp--preset--spacing--default);flex-basis:18%"><!-- wp:image {"width":60,"height":60,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/contentcreation.png') ) .'" alt="" style="object-fit:contain;width:60px;height:60px" width="60" height="60"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"85%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:85%"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Customize Solution', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"16px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-top:16px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">' . esc_html__('Tailored strategies and tools, designed to perfectly address your unique business needs.', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"80px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:80px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->' 
);
