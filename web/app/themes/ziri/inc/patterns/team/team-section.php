<?php
/**
 * Title: Team Section One
 * Slug: team-section
 * Categories: ziri-fse-patterns
 * Keywords: team-section
 */

return array(
    'title'  => __('Team Section One', 'ziri'),
    'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'team-section'),
    'content' => '    
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"right":"15px","left":"15px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-right:15px;padding-left:15px"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|default","right":"15px","bottom":"var:preset|spacing|default","left":"15px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--default);padding-right:15px;padding-bottom:var(--wp--preset--spacing--default);padding-left:15px"><!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"30px","left":"30px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-columns alignfull" style="margin-top:0px;margin-bottom:0px"><!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":36,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team.webp') ) .'" alt="" class="wp-image-36" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Samantha Roberts', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">' . esc_html__('Lead Designer', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":39,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team1.webp') ) .'" alt="" class="wp-image-39" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Michael Anderson', 'ziri'). '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Senior Developer', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":40,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team2.webp') ) .'" alt="" class="wp-image-40" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Emily Smith', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('UX/UI Specialist', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":41,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team3.webp') ) .'" alt="" class="wp-image-41" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('David Wilson', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Project Coordinator', 'ziri'). '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-30","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-30"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"30px","left":"30px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-columns alignfull" style="margin-top:0px;margin-bottom:0px"><!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":36,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team.webp') ) .'" alt="" class="wp-image-36" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">Samantha Roberts</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">' . esc_html__('Lead Designer', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":39,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team1.webp') ) .'" alt="" class="wp-image-39" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Michael Anderson', 'ziri'). '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Senior Developer', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":40,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team2.webp') ) .'" alt="" class="wp-image-40" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Emily Smith', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('UX/UI Specialist', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":41,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team3.webp') ) .'" alt="" class="wp-image-41" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('David Wilson', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Project Coordinator', 'ziri'). '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-30","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-30"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"30px","left":"30px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-columns alignfull" style="margin-top:0px;margin-bottom:0px"><!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":36,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team.webp') ) .'" alt="" class="wp-image-36" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">Samantha Roberts</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">' . esc_html__('Lead Designer', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":39,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team1.webp') ) .'" alt="" class="wp-image-39" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Michael Anderson', 'ziri'). '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Senior Developer', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":40,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team2.webp') ) .'" alt="" class="wp-image-40" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('Emily Smith', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('UX/UI Specialist', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black"} -->
<div class="wp-block-column is-vertically-aligned-top has-black-color has-white-background-color has-text-color has-background has-link-color"><!-- wp:group {"style":{"border":{"radius":"32px","color":"#ebf1fb","width":"1px"},"spacing":{"padding":{"top":"32px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"var:preset|spacing|default"}}},"backgroundColor":"white","className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-box-shadow-two has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;margin-top:var(--wp--preset--spacing--default);padding-top:32px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"align":"center","id":41,"width":160,"height":160,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/team3.webp') ) .'" alt="" class="wp-image-41" style="width:160px;height:160px" width="160" height="160"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"top":"38px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:38px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.4">'. esc_html__('David Wilson', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Project Coordinator', 'ziri'). '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->',
);