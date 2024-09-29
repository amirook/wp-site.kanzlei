<?php
/**
 * Title: Testimonial
 * Slug: testimonial
 * Categories: ziri-fse-patterns
 * Keywords: testimonial
 */

return array(
	'title'      => __( 'Testimonial', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'testimonial'),
	'content' => '
	<!-- wp:group {"className":"is-style-quote-testimonial","layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-quote-testimonial"><!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group"><!-- wp:image {"align":"center","id":34066,"width":48,"height":48,"scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-color-duotone"}}} -->
		<figure class="wp-block-image aligncenter size-full is-resized"><img src="'. esc_url( get_theme_file_uri('/assets/images/quote.svg') ) . '" alt="" class="wp-image-34066" style="object-fit:contain;width:48px;height:48px" width="48" height="48" title=""/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:group --></div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0px","right":"15px","bottom":"0px","left":"15px"}}},"backgroundColor":"primary-accent","className":"is-style-slide-up-fade-in","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-slide-up-fade-in has-primary-accent-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:15px"><!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"620px"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="font-style:normal;font-weight:600;line-height:1.3">'. esc_html__('What people are saying…', 'ziri'). '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"16px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}}} -->
<p class="has-text-align-center" style="margin-top:16px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default)">'. esc_html__('Read the testimonials of our happy customers', 'ziri'). '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"0"},"margin":{"top":"0px","bottom":"0px"},"blockGap":{"top":"30px","left":"20px"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--80);padding-bottom:0"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","right":"32px","bottom":"40px","left":"32px"}},"border":{"radius":"32px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group is-style-box-shadow-one has-white-background-color has-background" style="border-radius:32px;padding-top:40px;padding-right:32px;padding-bottom:40px;padding-left:32px"><!-- wp:image {"id":18,"width":64,"height":64,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/people.webp') ) . '" alt="" class="wp-image-18" style="object-fit:contain;width:64px;height:64px" width="64" height="64"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"24px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="margin-top:24px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('“Their strategic guidance proved instrumental in our business growth. Their comprehensive approach and personalized solutions significantly increased our market competitiveness.”', 'ziri') .'</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"40px"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"}},"fontSize":"small"} -->
<h3 class="wp-block-heading has-small-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:500;line-height:1.6">'. esc_html__('Jonathan Anderson', 'ziri').'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('CEO, TechNovo Inc.', 'ziri').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","right":"32px","bottom":"40px","left":"32px"}},"border":{"radius":"32px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group is-style-box-shadow-one has-white-background-color has-background" style="border-radius:32px;padding-top:40px;padding-right:32px;padding-bottom:40px;padding-left:32px"><!-- wp:image {"id":19,"width":64,"height":64,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/people1.webp') ) . '" alt="" class="wp-image-19" style="object-fit:contain;width:64px;height:64px" width="64" height="64"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"24px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="margin-top:24px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('“The expertise of their team transformed our operational efficiency, paving the way for improved profitability and performance. A highly recommended partner for business.”', 'ziri') .'</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"40px"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"}},"fontSize":"small"} -->
<h3 class="wp-block-heading has-small-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:500;line-height:1.6">'. esc_html__('Maria Smith', 'ziri'). '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}}} -->
<p style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('COO, GreenLeaf Corp.', 'ziri') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","right":"32px","bottom":"40px","left":"32px"}},"border":{"radius":"32px"}},"backgroundColor":"white","className":"is-style-box-shadow-one","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group is-style-box-shadow-one has-white-background-color has-background" style="border-radius:32px;padding-top:40px;padding-right:32px;padding-bottom:40px;padding-left:32px"><!-- wp:image {"id":20,"width":64,"height":64,"scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="'. esc_url( get_theme_file_uri('/assets/images/people2.webp') ) . '" alt="" class="wp-image-20" style="object-fit:contain;width:64px;height:64px" width="64" height="64"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"24px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="margin-top:24px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('“They provided exceptional financial advisory services that made a crucial difference in our investment strategy. Their insights and professionalism are second to none.”', 'ziri') .'</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"40px"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"}},"fontSize":"small"} -->
<h3 class="wp-block-heading has-small-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);font-style:normal;font-weight:500;line-height:1.6">'. esc_html__('David Lee', 'ziri').'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}},"typography":{"lineHeight":"1.8"}}} -->
<p style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default);line-height:1.8">'. esc_html__('CFO, PowerDrive Industries', 'ziri').'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"120px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:120px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->' 
);
