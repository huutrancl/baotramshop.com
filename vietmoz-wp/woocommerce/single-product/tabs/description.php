<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
global $_moz_opts;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Product Description', 'woocommerce' ) ) );

?>
<h3 class="title-section"><span>Chi tiết sản phẩm</span></h3>
<div class="product-content">
<?php the_content(); ?>
</div>
<?php _moz_like(); ?>
<?php if ($_moz_opts['opt_general_fb_comment'] == 1): ?>
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
<?php endif; ?>