<?php

/**
 * Title: Blog
 * Slug: blog
 * Categories: ziri-fse-patterns
 * Keywords: blog
 */

return array(
	'title'      => __( 'Blog', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'blog' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"15px","left":"15px"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"section-bg","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-section-bg-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:15px"><!-- wp:spacer {"height":"120px","className":".is-style-has-mb-50 is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer .is-style-has-mb-50 is-style-has-mb-50"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.8"},"spacing":{"margin":{"top":"0px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"textColor":"primary"} -->
	<p class="has-text-align-center has-primary-color has-text-color" style="margin-top:0px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-size:16px;font-style:normal;font-weight:600;line-height:1.8">'. esc_html__('KNOWLEDGE CENTER', 'ziri') .'</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"16px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"xx-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:16px;margin-right:0px;margin-bottom:0px;margin-left:0px">'.esc_html__('Latest Article &amp; Blog', 'ziri'). '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide"><!-- wp:query {"queryId":55,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide","className":"is-style-mg-0"} -->
	<div class="wp-block-query alignwide is-style-mg-0"><!-- wp:spacer {"height":"36px","className":"is-style-has-mb-20","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div style="margin-top:0px;margin-bottom:0px;height:36px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-20"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"20px"}},"className":"is-style-mg-0 is-style-default","layout":{"type":"grid","columnCount":3},"fontFamily":"system"} -->
	<!-- wp:post-featured-image {"isLink":true,"height":"","style":{"border":{"radius":{"topLeft":"32px","topRight":"32px","bottomLeft":"32px","bottomRight":"32px"}},"spacing":{"margin":{"bottom":"0px","top":"0px"}}},"className":"fr-hover-scale-img"} /-->
	
	<!-- wp:group {"style":{"spacing":{"blockGap":"0px","padding":{"top":"24px","left":"16px","right":"0px","bottom":"0px"},"margin":{"top":"0px","bottom":"0px"}},"border":{"radius":{"bottomLeft":"12px","bottomRight":"12px","topLeft":"0px","topRight":"0px"}}},"backgroundColor":"white"} -->
	<div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;margin-top:0px;margin-bottom:0px;padding-top:24px;padding-right:0px;padding-bottom:0px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group"><!-- wp:post-terms {"term":"category","textAlign":"left","separator":"  ","style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"16px","lineHeight":"1.8"}}} /-->
	
	<!-- wp:post-date {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"400","lineHeight":"1.8"}}} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"lineHeight":"1.6","letterSpacing":"-0.02em"},"spacing":{"margin":{"top":"8px"}}},"className":"is-style-on-hover","fontSize":"medium"} /-->
	
	<!-- wp:post-excerpt {"moreText":"'. esc_html__('Continue Reading →', 'ziri'). ' ","style":{"spacing":{"margin":{"top":"16px"}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"className":"is-style-show-two-lines"} /--></div>
	<!-- /wp:group -->
	<!-- /wp:post-template --></div>
	<!-- /wp:query --></div>
	<!-- /wp:group -->
	
	<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"center","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"style":{"spacing":{"padding":{"left":"90px","right":"90px","top":"16px","bottom":"16px"}}},"className":"is-style-ziri-button-3"} -->
	<div class="wp-block-button is-style-ziri-button-3"><a class="wp-block-button__link wp-element-button" href="#" style="padding-top:16px;padding-right:90px;padding-bottom:16px;padding-left:90px">'. esc_html__('Read All Articles →', 'ziri') .'</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	<!-- wp:spacer {"height":"90px","className":"is-style-has-mb-30","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div style="margin-top:0px;margin-bottom:0px;height:90px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-30"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:group -->'
);


