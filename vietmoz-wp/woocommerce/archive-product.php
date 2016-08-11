<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$termid = get_queried_object()->term_id;
$display_type = get_woocommerce_term_meta( $termid, 'display_type', true );
get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php if ( $display_type === 'both' ): ?>
				<div class="both-product-subcat clear">
				<?php
					$product_categories = get_categories( apply_filters( 'woocommerce_product_subcategories_args', array(
						'parent'       => $termid,
						'menu_order'   => 'ASC',
						'hide_empty'   => 0,
						'hierarchical' => 1,
						'taxonomy'     => 'product_cat',
						'pad_counts'   => 1
					) ) );
					if ( ! apply_filters( 'woocommerce_product_subcategories_hide_empty', false ) ) {
						$product_categories = wp_list_filter( $product_categories, array( 'count' => 0 ), 'NOT' );
					}
					foreach ( $product_categories as $category ) { ?>
					<div class="sub-item">
						<h2>
							<a title="<?php echo $category->name; ?>" href="<?php echo get_term_link($category); ?>">
								<?php echo $category->name; ?>
							</a>
						</h2>
						<?php echo do_shortcode( '[product_category category="'.$category->slug.'" per_page="4" orderby="date" desc="desc"]' ); ?>
					</div>
					<?php }
				?>
				</div>
			<?php else: ?>
			
			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php endif ?>
	
			<?php if ( $display_type !== 'both' ): ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

			<?php endif; ?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
