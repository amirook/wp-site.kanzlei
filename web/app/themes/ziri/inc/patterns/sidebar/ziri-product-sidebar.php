<?php
/**
 * Title: Ziri Product Sidebar
 * Slug: ziri-product-sidebar
 * Categories: ziri-fse-patterns
 * Keywords: product-sidebar
 */
return array(
	'title'      => __( 'Ziri Product Sidebar', 'ziri' ),
	'categories' => array( 'ziri-fse-patterns' ),
	'keywords'   => array( 'product-sidebar'),
	'content' => '<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"56px"},"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="margin-top:0px;margin-bottom:56px"><!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter"} -->
    <div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"},"margin":{"top":"0px","right":"0px","bottom":"24px","left":"0px"}}},"backgroundColor":"primary-accent","fontSize":"small-medium"} -->
    <h3 class="wp-block-heading has-text-align-center has-primary-accent-background-color has-background has-small-medium-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:24px;margin-left:0px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;font-style:normal;font-weight:600">'. esc_html__('Filter by price', 'ziri').'</h3>
    <!-- /wp:heading -->
    
    <!-- wp:woocommerce/price-filter {"showFilterButton":true,"heading":"","lock":{"remove":true},"textColor":"primary"} -->
    <div class="wp-block-woocommerce-price-filter is-loading has-primary-color has-text-color"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
    <!-- /wp:woocommerce/price-filter --></div>
    <!-- /wp:woocommerce/filter-wrapper --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"0px","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:56px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"},"margin":{"top":"0px","right":"0px","bottom":"24px","left":"0px"}}},"backgroundColor":"primary-accent","fontSize":"small-medium"} -->
<h2 class="wp-block-heading has-text-align-center has-primary-accent-background-color has-background has-small-medium-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:24px;margin-left:0px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('Popular Products', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":0,"query":{"perPage":"5","pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"__woocommerceStockStatus":["instock","outofstock","onbackorder"]},"namespace":"woocommerce/product-query"} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":2}} -->
<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"20px","left":"24px"},"margin":{"bottom":"24px"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile" style="margin-bottom:24px"><!-- wp:column {"verticalAlignment":"center","width":"26%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:26%"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfQueryLoop":true,"width":"80px","height":"80px"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"74%","style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:74%"><!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0px","right":"0px","left":"0px"},"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.8"}},"fontSize":"small","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"style":{"spacing":{"margin":{"bottom":"0rem","right":"0px","left":"0px","top":"4px"}}}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|default","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--default);margin-bottom:56px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"},"margin":{"top":"0px","right":"0px","bottom":"24px","left":"0px"}}},"backgroundColor":"primary-accent","fontSize":"small-medium"} -->
<h2 class="wp-block-heading has-text-align-center has-primary-accent-background-color has-background has-small-medium-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:24px;margin-left:0px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;font-style:normal;font-weight:600;line-height:1.5">'. esc_html__('Featured Product', 'ziri') .'</h2>
<!-- /wp:heading -->

<!-- wp:cover {"url":"'. esc_url( get_theme_file_uri('/assets/images/shop.webp') ) .'","id":33702,"dimRatio":0,"minHeight":360,"isDark":false,"style":{"border":{"radius":"32px"},"spacing":{"blockGap":"56px","margin":{"top":"24px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:32px;margin-top:24px;margin-bottom:0px;min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-33702" alt="" src="'. esc_url( get_theme_file_uri('/assets/images/shop.webp') ) .'" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:site-logo {"align":"center"} /-->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"40px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"textColor":"white","fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-large-font-size" style="margin-top:40px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default)">'. esc_html__('Journey of Ziri', 'ziri').'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"spacing":{"margin":{"top":"4px","right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default"}}},"textColor":"white","fontSize":"small"} -->
<p class="has-text-align-center has-white-color has-text-color has-small-font-size" style="margin-top:4px;margin-right:var(--wp--preset--spacing--default);margin-bottom:var(--wp--preset--spacing--default);margin-left:var(--wp--preset--spacing--default)">'. esc_html__('New Block Theme', 'ziri').'</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"24px"}}}} -->
<div class="wp-block-buttons" style="margin-top:24px"><!-- wp:button {"backgroundColor":"white","textColor":"heading","style":{"spacing":{"padding":{"left":"40px","right":"40px","top":"14px","bottom":"14px"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"border":{"radius":"16px"}},"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size" style="font-style:normal;font-weight:500;line-height:1.2"><a class="wp-block-button__link has-heading-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:16px;padding-top:14px;padding-right:40px;padding-bottom:14px;padding-left:40px">'. esc_html__('SHOP NOW', 'ziri').'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->' 
);