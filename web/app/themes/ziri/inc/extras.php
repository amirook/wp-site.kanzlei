<?php 
/**
 * Query WooCommerce activation
 */
function ziri_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Check if Ziri Pro is activated
 */
function ziri_pro_is_activated() {
    return function_exists('ziri_pro_load_extensions') ? true : false;
}
/**
 * Add Dynamic SVG
 *
 * @return void
 */
function ziri_dynamic_other_css(){
    echo "<style id='ziri-dynamic-css' type='text/css' media='all'>"; ?>
        .single.single-post .post-navigation-link__label::after {
			-webkit-mask-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.8334 10.0003H4.16675M4.16675 10.0003L10.0001 15.8337M4.16675 10.0003L10.0001 4.16699' stroke='%23212728' stroke-width='1.66667' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
			mask-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.8334 10.0003H4.16675M4.16675 10.0003L10.0001 15.8337M4.16675 10.0003L10.0001 4.16699' stroke='%23212728' stroke-width='1.66667' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
		}
		.single.single-post .comment-form .form-submit.wp-block-button::after {
			-webkit-mask-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M4.16699 10.0003H15.8337M15.8337 10.0003L10.0003 4.16699M15.8337 10.0003L10.0003 15.8337' stroke='%23212728' stroke-width='1.66667' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
			mask-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M4.16699 10.0003H15.8337M15.8337 10.0003L10.0003 4.16699M15.8337 10.0003L10.0003 15.8337' stroke='%23212728' stroke-width='1.66667' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
		}
        .wp-block-quote p::before {
            -webkit-mask-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M45.3333 29.3333C43.2237 29.3333 41.1614 28.7077 39.4073 27.5357C37.6531 26.3636 36.286 24.6977 35.4786 22.7486C34.6713 20.7996 34.4601 18.6548 34.8716 16.5857C35.2832 14.5166 36.2991 12.616 37.7909 11.1242C39.2826 9.63244 41.1832 8.61654 43.2524 8.20496C45.3215 7.79339 47.4662 8.00462 49.4153 8.81196C51.3644 9.61929 53.0303 10.9865 54.2023 12.7406C55.3744 14.4947 56 16.557 56 18.6667C56 22.5947 52.4453 35.04 45.3333 56H40L45.3333 29.3333ZM18.6667 29.3333C16.557 29.3333 14.4947 28.7077 12.7406 27.5357C10.9865 26.3636 9.61929 24.6977 8.81196 22.7486C8.00462 20.7996 7.79339 18.6548 8.20496 16.5857C8.61654 14.5166 9.63244 12.616 11.1242 11.1242C12.616 9.63244 14.5166 8.61654 16.5857 8.20496C18.6548 7.79339 20.7996 8.00462 22.7486 8.81196C24.6977 9.61929 26.3636 10.9865 27.5357 12.7406C28.7077 14.4947 29.3333 16.557 29.3333 18.6667C29.3333 22.5947 25.7787 35.04 18.6667 56H13.3333L18.6667 29.3333Z' fill='%23212728'/%3E%3C/svg%3E%0A");
            mask-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M45.3333 29.3333C43.2237 29.3333 41.1614 28.7077 39.4073 27.5357C37.6531 26.3636 36.286 24.6977 35.4786 22.7486C34.6713 20.7996 34.4601 18.6548 34.8716 16.5857C35.2832 14.5166 36.2991 12.616 37.7909 11.1242C39.2826 9.63244 41.1832 8.61654 43.2524 8.20496C45.3215 7.79339 47.4662 8.00462 49.4153 8.81196C51.3644 9.61929 53.0303 10.9865 54.2023 12.7406C55.3744 14.4947 56 16.557 56 18.6667C56 22.5947 52.4453 35.04 45.3333 56H40L45.3333 29.3333ZM18.6667 29.3333C16.557 29.3333 14.4947 28.7077 12.7406 27.5357C10.9865 26.3636 9.61929 24.6977 8.81196 22.7486C8.00462 20.7996 7.79339 18.6548 8.20496 16.5857C8.61654 14.5166 9.63244 12.616 11.1242 11.1242C12.616 9.63244 14.5166 8.61654 16.5857 8.20496C18.6548 7.79339 20.7996 8.00462 22.7486 8.81196C24.6977 9.61929 26.3636 10.9865 27.5357 12.7406C28.7077 14.4947 29.3333 16.557 29.3333 18.6667C29.3333 22.5947 25.7787 35.04 18.6667 56H13.3333L18.6667 29.3333Z' fill='%23212728'/%3E%3C/svg%3E%0A");
        }
    <?php echo "</style>";
}
add_action( 'wp_head', 'ziri_dynamic_other_css', 99 );

/**
 * Add filter only if function exists
 * @return string
 */
if (function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_api_url',
        function () {
            return 'https://fsedemo.com/';
        }
    );
}

/**
 * Add filter only if function exists
 * @return string
 * 
 */
if (function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_api_id',
        function () {
            return array( '16' );
        }
    );
}