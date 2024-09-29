<?php
/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function ziri_register_block_styles(){
	register_block_style(
		'core/button',
		array(
			'name'  => 'ziri-button-1',
			'label' => esc_html__('Button BG Primary', 'ziri'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'  => 'ziri-button-3',
			'label' => esc_html__('Button Outline', 'ziri'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'  => 'ziri-button-4',
			'label' => esc_html__('Button Style no Background', 'ziri'),
		)
	);
	
	register_block_style(
		'core/post-author',
		array(
			'name'  => 'img-small',
			'label' => esc_html__('Small Image', 'ziri'),
		)
	);
	register_block_style(
		'core/post-author',
		array(
			'name'  => 'small-font',
			'label' => esc_html__('Small Font', 'ziri'),
		)
	);
	register_block_style(
		'core/post-author',
		array(
			'name'  => 'large-font',
			'label' => esc_html__('Large Font', 'ziri'),
		)
	);
	register_block_style(
		'core/post-excerpt',
		array(
			'name'  => 'show-two-lines',
			'label' => esc_html__('Show two lines', 'ziri'),
		)
	);
	register_block_style(
		'core/post-excerpt',
		array(
			'name'  => 'show-three-lines',
			'label' => esc_html__('Show three lines', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'box-shadow-one',
			'label' => esc_html__('Box Shadow One', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'box-shadow-two',
			'label' => esc_html__('Box Shadow Two', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'services-bg-hover',
			'label' => esc_html__('Service Bg Color', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'hover-animation',
			'label' => esc_html__('Hover Animation', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-up-fade-in',
			'label' => esc_html__('Slide Up Fade In Animation', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-down-fade-in',
			'label' => esc_html__('Slide Down Fade In Animation', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-left-fade-in',
			'label' => esc_html__('Slide Left Fade In Animation', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-right-fade-in',
			'label' => esc_html__('Slide Right Fade In Animation', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'search-404',
			'label' => esc_html__('Style for 404 Search', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'quote-testimonial',
			'label' => esc_html__('Testimonials Blocquote', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'team-style',
			'label' => esc_html__('Team Detail', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'image-style',
			'label' => esc_html__('Expert Image', 'ziri'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'testimonials-image',
			'label' => esc_html__('Testimonials Image', 'ziri'),
		)
	);

	register_block_style(
		'core/post-template',
		array(
			'name'  => 'hover-animation',
			'label' => esc_html__('Hover Animation', 'ziri'),
		)
	);

	register_block_style(
		'core/post-title',
		array(
			'name'  => 'on-hover',
			'label' => esc_html__('Hover Animation', 'ziri'),
		)
	);

	register_block_style(
		'core/columns',
		array(
			'name'  => 'mob-2-cols',
			'label' => esc_html__('Mob 2 Col', 'ziri'),
		)
	);

	register_block_style(
		'core/columns',
		array(
			'name'  => 'mob-3-cols',
			'label' => esc_html__('Mob 3 Col', 'ziri'),
		)
	);

	register_block_style(
		'core/column',
		array(
			'name'  => 'justify-right',
			'label' => esc_html__('Mobile Justify Right', 'ziri'),
		)
	);

	register_block_style(
		'core/column',
		array(
			'name'  => 'justify-left',
			'label' => esc_html__('Mobile Justify Left', 'ziri'),
		)
	);

	register_block_style(
		'core/column',
		array(
			'name'  => 'hide-mb',
			'label' => esc_html__('Hide in Mobile', 'ziri'),
		)
	);

	register_block_style(
		'core/buttons',
		array(
			'name'  => 'justify-right',
			'label' => esc_html__('Mobile Justify Right', 'ziri'),
		)
	);

	register_block_style(
		'core/buttons',
		array(
			'name'  => 'justify-left',
			'label' => esc_html__('Mobile Justify Left', 'ziri'),
		)
	);
	
	register_block_style(
		'core/navigation',
		array(
			'name'  => 'justify-right',
			'label' => esc_html__('Mobile Justify Right', 'ziri'),
		)
	);
	register_block_style(
		'core/navigation',
		array(
			'name'  => 'justify-left',
			'label' => esc_html__('Mobile Justify Left', 'ziri'),
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'  => 'nounderline',
			'label' => esc_html__('Unstyled view', 'ziri'),
		)
	);

	register_block_style(
		'core/social-links',
		array(
			'name'  => 'social-square',
			'label' => esc_html__('Square Shape', 'ziri'),
		)
	);

	register_block_style(
		'core/post-terms',
		array(
			'name'  => 'bg-color-terms',
			'label' => esc_html__('With Background Color', 'ziri'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-20',
			'label' => esc_html__('Mob Gap-20px', 'ziri'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-30',
			'label' => esc_html__('Mob Gap-30px', 'ziri'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-40',
			'label' => esc_html__('Mob Gap-40px', 'ziri'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-50',
			'label' => esc_html__('Mob Gap-50px', 'ziri'),
		)
	);

	register_block_style(
		'core/image',
		array(
			'name'  => 'clipIn',
			'label' => esc_html__('ClipIn Animation', 'ziri'),
		)
	);
}
add_action( 'init', 'ziri_register_block_styles' );

/**
 * Include conditional assets
 * 
 * @since 1.0.0
 */
function ziri_theme_conditional_assets( $html, $block ){
	$block_style = '';

	if (!is_admin()) { //prevent loading conditional assets in admin
		//We use checking by class name until WordPress will have proper inline style registration for block styles
		if (isset($block['blockName'])) {
			if (!empty($block['attrs']['className'])) {
				if ($block['blockName'] == 'core/post-excerpt') {
					if (str_contains($block['attrs']['className'], 'is-style-show-two-lines') !== false) {
						$block_style .= '.is-style-show-two-lines>p{display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;  overflow: hidden; margin:0} .wp-block-post-excerpt.is-style-show-two-lines .wp-block-post-excerpt__more-text{ margin-top: 24px;}';
					} else if (str_contains($block['attrs']['className'], 'is-style-show-three-lines') !== false) {
						$block_style .= '.is-style-show-three-lines>p{display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;  overflow: hidden; margin:0} .wp-block-post-excerpt.is-style-show-three-lines .wp-block-post-excerpt__more-text{ margin-top: 24px;}';
					}
				}
			}
		}

		if ($block_style) {
			$html =  $html . '<style scoped>' . $block_style . '</style>';
		}
	}
	return $html;
}
add_filter( 'render_block', 'ziri_theme_conditional_assets', 10, 2 );

/**
 * Enqueue the block styles
 *
 * @since 1.0.0
 */
function ziri_register_editor_styles(){
	$suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'ziri-block-style',
		get_theme_file_uri( 'assets/css/style' . $suffix . '.css' ),
		array(),
		ZIRI_VERSION
	);

	if ( ziri_is_woocommerce_activated() )
		wp_enqueue_style('ziri-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce' . $suffix . '.css', array(), ZIRI_VERSION);

	wp_enqueue_script(
		'ziri-custom-scripts',
		get_theme_file_uri( 'assets/js/custom' . $suffix . '.js' ),
		array(),
		ZIRI_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'ziri_register_editor_styles' );

/**
 * Enqueue admin scripts
 *
 * @since 1.0.0
 */
function ziri_register_admin_scripts( $hook ){
	
	// Load styles only on our page
	if( 'appearance_page_ziri-dashboard' != $hook ) return;
	
	wp_register_style(
		'ziri-admin',
		get_theme_file_uri( 'build/admin.css' ),
		array(),
		ZIRI_VERSION
	);

	$admin_assets_file    = get_template_directory() . '/build/admin.asset.php';
	if ( file_exists( $admin_assets_file ) ) {
        $components_assets = require $admin_assets_file;
        $components_js_dependencies = ( ! empty( $components_assets['dependencies'] ) ) ? $components_assets['dependencies'] : [];
        $com_version                = ( ! empty( $components_assets['version'] ) ) ? $components_assets['version'] : ZIRI_VERSION;
        wp_register_script(
            'ziri-admin',
            get_theme_file_uri( 'build/admin.js' ),
            $components_js_dependencies,
            $com_version,
            true
        );

		// Add Translation support for Dashboard 
        wp_set_script_translations( 'ziri-admin', 'ziri' );

		$installed_plugins 	= get_plugins();
		$data_action  = '';
		$button_label = esc_html__( 'Browse Ziri Starter Templates', 'ziri' );

		if ( ! defined( 'DEMO_IMPORTER_PLUS_VER' ) ) {
			if ( ! isset( $installed_plugins['demo-importer-plus/demo-importer-plus.php'] ) ) {
				$button_label = esc_html__( 'Install Ziri Starter Templates', 'ziri' );
				$data_action  = 'install';
			} elseif ( ! ziri_active_plugin_check( 'demo-importer-plus/demo-importer-plus.php' ) ) {
				$button_label = esc_html__( 'Activate Ziri Starter Templates', 'ziri' );
				$data_action  = 'activate';
			}
		}

        wp_localize_script( 'ziri-admin', 'ziri_dashboard', array(
			'ajaxUrl'              => admin_url( 'admin-ajax.php' ),
			'siteEditor'           => admin_url( 'site-editor.php' ),
			'proActivated'         => ziri_pro_is_activated(),
			'ThemeVersion'         => ZIRI_VERSION,
			'status'           	   => $data_action,
			'starterLabel' 	       => $button_label,
			'ajax_nonce' 	   	   => wp_create_nonce( 'ziri-ajax-verification' ),
			'starterURL' 	   	   => esc_url( admin_url( 'themes.php?page=demo-importer-plus' ) ),
			'starterTemplates' 	   => defined( 'DEMO_IMPORTER_PLUS_VER' ),
		));
    }

}
add_action( 'admin_enqueue_scripts', 'ziri_register_admin_scripts' );

if( ! function_exists( 'ziri_active_plugin_check' ) ) :
/**
 * Active Plugin Check
 *
 * @param string $plugin_base_name is plugin folder/filename.php.
 */
function ziri_active_plugin_check( $plugin_base_name ) {

	$active_plugins = (array) get_option( 'active_plugins', array() );

	if ( is_multisite() ) {
		$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
	}

	return in_array( $plugin_base_name, $active_plugins, true ) || array_key_exists( $plugin_base_name, $active_plugins );
}
endif;

/**
 * Add Menu Page
 *
 * @return void
 */
function ziri_add_menu_page() {

	add_theme_page(
		__( 'Ziri', 'ziri' ),
		__( 'Ziri', 'ziri' ),
		'edit_themes',
		'ziri-dashboard',
		'ziri_render_menu_page',
		'2'
	);
}
add_action( 'admin_menu', 'ziri_add_menu_page' ) ;

/**
 * Render Menu Page
 *
 * @return void
 */
function ziri_render_menu_page(){
	wp_enqueue_style( 'ziri-admin' );
	wp_enqueue_script( 'ziri-admin' );
	?>
	<div class="wrapper">
		<div id="ziri-dashboard" class="ziri-dashboard"></div>
	</div>
	<?php
}
