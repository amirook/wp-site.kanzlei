<?php
/**
 * Title: Team Section Two
 * Slug: team
 * Categories: ziri-fse-patterns
 * Keywords: team
 */

return array(
	'title'      => __( 'Team Section Two', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'team', 'team-members' ),
	'content' => '
    <!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"var:preset|spacing|default","right":"15px","bottom":"var:preset|spacing|default","left":"15px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--default);padding-right:15px;padding-bottom:var(--wp--preset--spacing--default);padding-left:15px"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"620px"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<p class="has-text-align-center has-primary-color has-text-color" style="font-size:16px;font-style:normal;font-weight:600">'. esc_html__('OUR TEAM MEMBERS', 'ziri') .'</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"16px"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:16px;font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('Meet Our Specialized Professionals', 'ziri') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|default","right":"15px","bottom":"var:preset|spacing|default","left":"15px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--default);padding-right:15px;padding-bottom:var(--wp--preset--spacing--default);padding-left:15px"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"20px","left":"30px"}}}} -->
<div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":36,"width":160,"height":160,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team.webp') ) .'" alt="" class="wp-image-36" style="object-fit:contain;width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"38px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('Samantha Roberts', 'ziri') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('CEO and Founder', 'ziri') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":39,"width":160,"height":160,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team1.webp') ) . '" alt="" class="wp-image-39" style="object-fit:contain;width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"38px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('Michael Anderson', 'ziri'). '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">Managing Partner</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":40,"width":160,"height":160,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team2.webp') ) . '" alt="" class="wp-image-40" style="object-fit:contain;width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"38px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('Emily Smith', 'ziri') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Business Consultant', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":41,"width":160,"height":160,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team3.webp') ) . '" alt="" class="wp-image-41" style="object-fit:contain;width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"38px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('David Wilson', 'ziri') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Project Coordinator', 'ziri'). '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"className":"is-style-ziri-button-3","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-ziri-button-3 has-small-font-size" style="font-style:normal;font-weight:500"><a class="wp-block-button__link wp-element-button" href="#">'. esc_html__('Meet All Members →', 'ziri'). '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->' 
);

