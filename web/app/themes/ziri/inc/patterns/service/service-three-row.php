<?php
/**
 * Title: Service With Three Row
 * Slug: service-three-row
 * Categories: ziri-fse-patterns
 * Keywords: service-three-row
 */

return array(
    'title'  => __('Service With Three Row', 'ziri'),
    'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'services-three-row'),
    'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"var:preset|spacing|default","right":"15px","bottom":"var:preset|spacing|default","left":"15px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--default);padding-right:15px;padding-bottom:var(--wp--preset--spacing--default);padding-left:15px"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0px","bottom":"0px"},"blockGap":{"top":"30px","left":"40px"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:0;padding-bottom:0"><!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"43px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:43px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Strategy Consultation', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Helping firms define and implement powerful strategies to drive growth and competitive advantage.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"43px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:43px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Financial Advise','ziri'). '</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Offering expert advice on investment decisions, cost savings, and financial risk management.', 'ziri').'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"43px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:43px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Operational Improvement', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Enhancing efficiency and effectiveness of business operations to improve overall performance.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->
    
    <!-- wp:spacer {"height":"56px","className":"is-style-has-mb-30","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-30"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0px","bottom":"0px"},"blockGap":{"top":"30px","left":"40px"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:0;padding-bottom:0"><!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"43px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:43px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Digital Transformation', 'ziri'). '</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Guiding firms to integrate technology into all areas of their business &amp; services.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"43px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:43px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Resources Planning', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Assisting in creating effective HR strategies to attract, develop, and retain top talent.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"43px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:43px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Risk and Compliance', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Supporting firms to identify, evaluate, and manage business risks while ensuring regulatory compliance.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->
    
    <!-- wp:spacer {"height":"56px","className":"is-style-has-mb-30","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-30"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0px","bottom":"0px"},"blockGap":{"top":"30px","left":"40px"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:0;padding-bottom:0"><!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"43px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:43px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Market Analysis', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Leverage our in-depth market insights to identify opportunities, and decision-making.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"right":"32px","left":"32px","top":"32px","bottom":"32px"}},"border":{"radius":"32px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:contain;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Brand Strategy', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Enhance brand identity and market presence with targeted strategies and market presence.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","right":"32px","bottom":"32px","left":"32px"}},"border":{"radius":"32px","color":"#ebf1fb","width":"1px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained"}} -->
    <div class="wp-block-group is-style-box-shadow-one has-border-color has-white-background-color has-background" style="border-color:#ebf1fb;border-width:1px;border-radius:32px;padding-top:32px;padding-right:32px;padding-bottom:32px;padding-left:32px"><!-- wp:image {"align":"center","width":80,"height":80,"scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri( '/assets/images/visualdesign.png' ) ) . '" alt="" style="object-fit:cover;width:80px;height:80px" width="80" height="80"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"fontSize":"medium-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600">'. esc_html__('Experience Management', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"8px"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:8px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('Optimize your customer touchpoints, fostering loyalty through improved satisfaction and engagement.', 'ziri').'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->
    
    <!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
    <!-- /wp:spacer --></div>
    <!-- /wp:group -->',
);

