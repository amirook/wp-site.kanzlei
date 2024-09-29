<?php
/**
 * Title:service Page
 * Slug: service
 * Categories: ziri-fse-pages
 * Keywords: service-page
 */
return array(
    'title'  => __('Service Page', 'ziri'),
    'categories' => array( 'ziri-fse-pages' ),
	'keywords'   => array( 'service-page'),
    'content' => '
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"var:preset|spacing|default"}}},"gradient":"banner-section","layout":{"type":"constrained","contentSize":""}} -->
    <div class="wp-block-group alignfull has-banner-section-gradient-background has-background" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--default);padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:15px"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
        <div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"},"padding":{"right":"0","left":"0","top":"0em","bottom":"0em"},"margin":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0;padding-top:0em;padding-right:0;padding-bottom:0em;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained","contentSize":"620px"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.8"}},"textColor":"primary"} -->
        <p class="has-text-align-center has-primary-color has-text-color" style="font-size:16px;font-style:normal;font-weight:600;line-height:1.8">'. esc_html__('OUR SERVICES', 'ziri'). '</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"16px","right":"var:preset|spacing|default","left":"var:preset|spacing|default","bottom":"16px"}}},"textColor":"black","fontSize":"xx-large"} -->
        <h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-xx-large-font-size" style="margin-top:16px;margin-right:var(--wp--preset--spacing--default);margin-bottom:16px;margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('Our Tailored Services', 'ziri') .'</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"textColor":"heading","fontSize":"small"} -->
        <p class="has-text-align-center has-heading-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">' . esc_html__('Experience our tailored services, designed to meet your unique business needs, drive growth, and enhance operational efficiency.', 'ziri') .'</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->
        
        <!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
        <div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
        <!-- /wp:spacer --></div>
        <!-- /wp:group -->
        
        <!-- wp:pattern {"slug":"ziri/service/service-three-row"} /-->
        <!-- wp:pattern {"slug":"ziri/frontpage/features"} /-->
        <!-- wp:pattern {"slug":"ziri/service/service-testimonial"} /-->'
);