<?php
/**
 * Ziri: Block Patterns
 *
 * Registers block patterns, categories, and type.
 */
function ziri_register_block_patterns() {
	/**
	 * Add Block Pattern Category.
	 */
	$pattern_categories = array(
		
		'ziri-fse-patterns' => array(
			'label'         => __( 'Ziri FSE Patterns', 'ziri' ),
			'description'   => __( 'Patterns for sections and components', 'ziri' ),
			'categoryTypes' => array( 'ziri' ),
		),
		
		'ziri-fse-pages' => array(
			'label'         => __( 'Ziri FSE Pages', 'ziri' ),
			'description'   => __( 'Full Page layouts that can be used as templates', 'ziri' ),
			'categoryTypes' => array( 'ziri' ),
		),
	);
	
	/**
	 * Filters the theme block pattern categories.
	 */
	$pattern_categories = apply_filters( 'ziri_block_pattern_categories', $pattern_categories );

    foreach ( $pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}

	$block_patterns = array(
		'frontpage/banner',
		'frontpage/blog',
		'frontpage/client-logo',
		'frontpage/features',
		'frontpage/services-1',
		'frontpage/services',
		'frontpage/team',
		'frontpage/testimonial',
		'frontpage/who-are-we',
		'frontpage/why-choose-us',

        'about/about-banner',
		'about/about-client',
		'about/about-service-section',
		
		'service/service-three-row',
		'service/service-testimonial',

		'team/team-section',
		'team/team-details',

		'contact/contact-map',

		'templates/single-with-feature-image',
		'templates/home',
		'templates/about',
		'templates/service',
		'templates/team',
		'templates/contact',

		'sidebar/ziri-sidebar',
		'sidebar/ziri-product-sidebar'
		
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @param $block_patterns array List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'ziri_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		register_block_pattern(
			'ziri/' . $block_pattern,
			require get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' )
		);
	}

}
add_action( 'init', 'ziri_register_block_patterns', 9 );