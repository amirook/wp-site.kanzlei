<?php
/**
 * Title: Home Page
 * Slug: home
 * Categories: ziri-fse-pages
 * Keywords: home-page
 */

return array(
    'title'  => __('Home Page', 'ziri'),
    'categories' => array( 'ziri-fse-pages' ),
	'keywords'   => array( 'home-page'),
    'content' => '
        <!-- wp:pattern {"slug":"ziri/frontpage/banner"} /-->   
        <!-- wp:pattern {"slug":"ziri/frontpage/client-logo"} /-->   
        <!-- wp:pattern {"slug":"ziri/frontpage/services"} /-->   
        <!-- wp:pattern {"slug":"ziri/frontpage/services-1"} /-->
        <!-- wp:pattern {"slug":"ziri/frontpage/who-are-we"} /-->
        <!-- wp:pattern {"slug":"ziri/frontpage/why-choose-us"} /-->
        <!-- wp:pattern {"slug":"ziri/frontpage/testimonial"} /-->
        <!-- wp:pattern {"slug":"ziri/frontpage/team"} /-->
        <!-- wp:pattern {"slug":"ziri/frontpage/features"} /-->
        <!-- wp:pattern {"slug":"ziri/frontpage/blog"} /-->
    ',
);