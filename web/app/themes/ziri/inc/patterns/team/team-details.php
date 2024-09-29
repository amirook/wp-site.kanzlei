<?php
/**
 * Title: Team Details
 * Slug: team-details
 * Categories: ziri-fse-patterns
 * Keywords: team-details
 */

return array(
    'title'  => __('Team Details', 'ziri'),
    'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'team-details'),
    'content' => '    
    <!-- wp:group {"style":{"spacing":{"padding":{"right":"15px","left":"15px"},"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default" style="margin-top:0px;margin-bottom:0px;padding-right:15px;padding-left:15px"><!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0px","bottom":"0px","left":"15px","right":"15px"}}},"className":"is-style-slide-up-fade-in","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull is-style-slide-up-fade-in" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:15px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"580px"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"}},"fontSize":"xx-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:0px;font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('We are looking for the best', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"16px","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:16px;margin-right:0;margin-bottom:0;margin-left:0;line-height:1.8">'. esc_html__('We are a 100% remote team spread all accross the world. Join us!', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-two" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"verticalAlignment":null,"style":{"border":{"radius":"16px","color":"#0000001a","width":"1px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"0px","bottom":"40px"},"blockGap":{"top":"20px","left":"16px"}}},"backgroundColor":"white"} -->
    <div class="wp-block-columns has-border-color has-white-background-color has-background" style="border-color:#0000001a;border-width:1px;border-radius:16px;margin-top:0px;margin-bottom:40px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:column {"width":"80%"} -->
    <div class="wp-block-column" style="flex-basis:80%"><!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.8"}},"textColor":"primary"} -->
    <p class="has-primary-color has-text-color" style="font-size:16px;font-style:normal;font-weight:600;line-height:1.8">'. esc_html__('DESIGN', 'ziri') .'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"2px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
    <h3 class="wp-block-heading has-medium-font-size" style="margin-top:2px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('Product Designer', 'ziri').'</h3>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.8"},"spacing":{"margin":{"top":"16px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"small"} -->
    <p class="has-small-font-size" style="margin-top:16px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:400;line-height:1.8">'. esc_html__('We are looking for a mid-level product designer to join our team.', 'ziri') .'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"16px","bottom":"0px"},"blockGap":"24px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group" style="margin-top:16px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"bottom"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"5px"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:5px"><!-- wp:image {"id":33666,"width":20,"height":20,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="'. esc_url( get_theme_file_uri('/assets/images/marker-pin.svg') ) . '" alt="" class="wp-image-33666" style="object-fit:cover;width:20px;height:20px" width="20" height="20"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"}},"textColor":"heading"} -->
    <p class="has-heading-color has-text-color" style="font-size:16px;line-height:1.8">'. esc_html__('Remote', 'ziri').'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"bottom"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"5px"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:5px"><!-- wp:image {"id":33678,"width":20,"height":20,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="'. esc_url( get_theme_file_uri('/assets/images/clock.svg') ) . '" alt="" class="wp-image-33678" style="object-fit:cover;width:20px;height:20px" width="20" height="20"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"}},"textColor":"heading"} -->
    <p class="has-heading-color has-text-color" style="font-size:16px;line-height:1.8">'. esc_html__('Full-Time', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button {"textColor":"heading","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"}},"className":"is-style-ziri-button-4","fontSize":"small"} -->
    <div class="wp-block-button has-custom-font-size is-style-ziri-button-4 has-small-font-size" style="font-style:normal;font-weight:500;line-height:1.6"><a class="wp-block-button__link has-heading-color has-text-color wp-element-button">' . esc_html__('View Job →', 'ziri') .'</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-two" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"verticalAlignment":null,"style":{"border":{"radius":"16px","color":"#0000001a","width":"1px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"0px","bottom":"40px"},"blockGap":{"top":"20px","left":"16px"}}},"backgroundColor":"white"} -->
    <div class="wp-block-columns has-border-color has-white-background-color has-background" style="border-color:#0000001a;border-width:1px;border-radius:16px;margin-top:0px;margin-bottom:40px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:column {"width":"80%"} -->
    <div class="wp-block-column" style="flex-basis:80%"><!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.8"}},"textColor":"primary"} -->
    <p class="has-primary-color has-text-color" style="font-size:16px;font-style:normal;font-weight:600;line-height:1.8">'. esc_html__('SOFTWARE DEVELOPMENT', 'ziri') .'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"2px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
    <h3 class="wp-block-heading has-medium-font-size" style="margin-top:2px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('Engineering Manager', 'ziri') .'</h3>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.8"},"spacing":{"margin":{"top":"16px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"small"} -->
    <p class="has-small-font-size" style="margin-top:16px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:400;line-height:1.8">'. esc_html__('We’re looking for a mid-level product designer to join our team.', 'ziri') .'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"16px","bottom":"0px"},"blockGap":"24px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group" style="margin-top:16px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"bottom"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"5px"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:5px"><!-- wp:image {"id":33666,"width":20,"height":20,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="'. esc_url( get_theme_file_uri('/assets/images/marker-pin.svg') ) . '" alt="" class="wp-image-33666" style="object-fit:cover;width:20px;height:20px" width="20" height="20"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"}},"textColor":"heading"} -->
    <p class="has-heading-color has-text-color" style="font-size:16px;line-height:1.8">'. esc_html__('Remote', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"bottom"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"5px"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:5px"><!-- wp:image {"id":33678,"width":20,"height":20,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="'. esc_url( get_theme_file_uri('/assets/images/clock.svg') ) . '" alt="" class="wp-image-33678" style="object-fit:cover;width:20px;height:20px" width="20" height="20"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"}},"textColor":"heading"} -->
    <p class="has-heading-color has-text-color" style="font-size:16px;line-height:1.8">'. esc_html__('Full-Time', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button {"textColor":"heading","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"}},"className":"is-style-ziri-button-4","fontSize":"small"} -->
    <div class="wp-block-button has-custom-font-size is-style-ziri-button-4 has-small-font-size" style="font-style:normal;font-weight:500;line-height:1.6"><a class="wp-block-button__link has-heading-color has-text-color wp-element-button">' . esc_html__('View Job →', 'ziri') .'</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"className":"is-style-box-shadow-two","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-two" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"verticalAlignment":null,"style":{"border":{"radius":"16px","color":"#0000001a","width":"1px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"margin":{"top":"0px","bottom":"0px"},"blockGap":{"top":"20px","left":"16px"}}},"backgroundColor":"white"} -->
    <div class="wp-block-columns has-border-color has-white-background-color has-background" style="border-color:#0000001a;border-width:1px;border-radius:16px;margin-top:0px;margin-bottom:0px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:column {"width":"80%"} -->
    <div class="wp-block-column" style="flex-basis:80%"><!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.8"}},"textColor":"primary"} -->
    <p class="has-primary-color has-text-color" style="font-size:16px;font-style:normal;font-weight:600;line-height:1.8">'. esc_html__('MARKETING', 'ziri') .'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"margin":{"top":"2px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"medium"} -->
    <h3 class="wp-block-heading has-medium-font-size" style="margin-top:2px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('SEO Marketing Manager', 'ziri'). '</h3>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.8"},"spacing":{"margin":{"top":"16px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"small"} -->
    <p class="has-small-font-size" style="margin-top:16px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:normal;font-weight:400;line-height:1.8">'. esc_html__('We’re looking for a mid-level product designer to join our team.', 'ziri') .'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"16px","bottom":"0px"},"blockGap":"24px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group" style="margin-top:16px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"bottom"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"5px"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:5px"><!-- wp:image {"id":33666,"width":20,"height":20,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="'. esc_url( get_theme_file_uri('/assets/images/marker-pin.svg') ) . '" alt="" class="wp-image-33666" style="object-fit:cover;width:20px;height:20px" width="20" height="20"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"}},"textColor":"heading"} -->
    <p class="has-heading-color has-text-color" style="font-size:16px;line-height:1.8">'. esc_html__('Remote', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"bottom"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"5px"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:5px"><!-- wp:image {"id":33678,"width":20,"height":20,"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="'. esc_url( get_theme_file_uri('/assets/images/clock.svg') ) . '" alt="" class="wp-image-33678" style="object-fit:cover;width:20px;height:20px" width="20" height="20"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.8"}},"textColor":"heading"} -->
    <p class="has-heading-color has-text-color" style="font-size:16px;line-height:1.8">'. esc_html__('Full-Time', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button {"textColor":"heading","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"}},"className":"is-style-ziri-button-4","fontSize":"small"} -->
    <div class="wp-block-button has-custom-font-size is-style-ziri-button-4 has-small-font-size" style="font-style:normal;font-weight:500;line-height:1.6"><a class="wp-block-button__link has-heading-color has-text-color wp-element-button">' . esc_html__('View Job →', 'ziri') .'</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->
    
    <!-- wp:spacer {"height":"90px","className":"is-style-has-mb-30","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:90px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-30"></div>
    <!-- /wp:spacer --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group -->',
);