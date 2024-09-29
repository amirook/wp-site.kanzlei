<?php
/**
 * Title: About Page
 * Slug: about
 * Categories: ziri-fse-pages
 * Keywords: about-page
 */
return array(
	'title'      => __('About Page', 'ziri'),
	'categories' => array( 'ziri-fse-pages' ),
	'keywords'   => array( 'about-page'),
    'content' => '
    <!-- wp:pattern {"slug":"ziri/about/about-banner"} /-->
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"right":"var:preset|spacing|140","left":"var:preset|spacing|140","top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:var(--wp--preset--spacing--140);padding-bottom:0px;padding-left:var(--wp--preset--spacing--140)"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:site-logo {"shouldSyncIcon":true,"align":"center","style":{"spacing":{"margin":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}}} /-->
    
    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"32px","bottom":"56px"}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"}},"fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-top:32px;margin-bottom:56px;font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('Our Philosophy: Pioneering Progress Together', 'ziri') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column -->
    <div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-small-font-size" style="line-height:1.8">'. esc_html__('Our philosophy is grounded in collaboration and innovation. Since our establishment in 2015, weve dedicated ourselves to serve as catalysts for business transformation, providing bespoke solutions that uniquely address each client&nbsp;s needs. Our expert team boasts a diverse portfolio of skills, harnessed to deliver strategic planning, financial advisory, operational improvement, and more.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-small-font-size" style="line-height:1.8">'. esc_html__('Were not just a consultancy; we see ourselves as your strategic partner, navigating the ever-evolving business landscape together. We firmly believe that your success is our success.', 'ziri') .'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
    <p class="has-small-font-size" style="line-height:1.8">'. esc_html__('By choosing us, you&nbsp;re investing in a future of potential, backed by a team that&nbsp;s equally passionate about your business&nbsp;s journey towards success.', 'ziri') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->
    
    <!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
    <!-- /wp:spacer --></div>
    <!-- /wp:group -->

<!-- wp:pattern {"slug":"ziri/about/about-client"} /-->
<!-- wp:pattern {"slug":"ziri/about/about-service-section"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0px","bottom":"0px","left":"15px","right":"15px"}}},"backgroundColor":"primary-accent","className":"is-style-slide-up-fade-in","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-slide-up-fade-in has-primary-accent-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:15px"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"620px"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:0px;font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('Let’s grow together', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"16px"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:16px;line-height:1.8">' . esc_html__('Join hands with us and embark on a transformative journey to scale your business, leveraging our expertise &amp; innovation', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":{"top":"30px","left":"98px"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"0px"}},"className":"is-style-hover-animation","layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group is-style-hover-animation" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="font-style:normal;font-weight:600">' . esc_html__('Shared Vision', 'ziri') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"16px"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:16px;line-height:1.8">'. esc_html__('Align your growth with ours as we build a roadmap to success, fueled by mutual goals.', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"0px"}},"className":"is-style-hover-animation","layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group is-style-hover-animation" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Strategic Partnership', 'ziri') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"16px"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:16px;line-height:1.8">'. esc_html__('Leverage our strategic approach to face business challenges confidently and achieve desired outcomes', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"0px"}},"className":"is-style-hover-animation","layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group is-style-hover-animation" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Continuous Support', 'ziri') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"16px"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:16px;line-height:1.8">'. esc_html__('Enjoy our unwavering support throughout your business journey, ensuring a seamless path to growth.', 'ziri') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

    <!-- wp:pattern {"slug":"ziri/frontpage/team"} /-->'
);