<?php
/**
 * Woocommerce tweak and extra functions
 *
 * @package moztheme
 */
Redux::init('_moz_opts');
global $_moz_opts;
//Change vietnam dong symbol
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
 
function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'VND': $currency_symbol = 'VNĐ'; break;
     }
     return $currency_symbol;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Remove default WooCommerce breadcrumbs and add Yoast ones instead
// remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
// add_action( 'woocommerce_before_main_content','my_yoast_breadcrumb', 20, 0);
// if (!function_exists('my_yoast_breadcrumb') ) {
// 	function my_yoast_breadcrumb() {
// 		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
// 	}
// }

if( $_moz_opts['opt_banhang_show_preview'] == 1) {
	function vietmoz_woocommerce_preview_on_hover() {
		printf(
			'<div class="hidden img-preview">%s</div>',
			woocommerce_get_product_thumbnail('large')
		);
	}
	add_action( 'woocommerce_before_shop_loop_item_title', 'vietmoz_woocommerce_preview_on_hover', 11 );
}
