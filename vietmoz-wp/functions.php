<?php
/**
 * moztheme functions and definitions
 *
 * @package moztheme
 */


/**
 * Add Redux Framework & extras
 */
require get_template_directory() . '/admin/admin-init.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'moztheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function moztheme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on moztheme, use a find and replace
	 * to change 'moztheme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'moztheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'moztheme' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	/*
	 * Enable support for Featured Image.
	 */
	add_theme_support( 'post-thumbnails' ); 

}
endif; // moztheme_setup
add_action( 'after_setup_theme', 'moztheme_setup' );

//Add image size
add_image_size( 'archive-thumb', 360, 240, true );

//Suport shortcodes for text widget
add_filter('widget_text', 'do_shortcode');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function moztheme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'moztheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'moztheme' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'moztheme' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ft-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'moztheme' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ft-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'moztheme' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ft-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'moztheme' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ft-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Padding Bottom', 'moztheme' ),
		'id'            => 'footer-padding-bottom',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="padft-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'moztheme_widgets_init' );


function moztheme_scripts() {
	wp_enqueue_script('jquery');

	wp_enqueue_style( 'moztheme-bootstrap-css', get_template_directory_uri() . '/framework/resources/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'moztheme-slick-css', get_template_directory_uri() . '/framework/resources/slick/slick.css' );

	wp_enqueue_style( 'moztheme-fontawesome', get_template_directory_uri() . '/framework/resources/fontawesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'moztheme-style', get_template_directory_uri() . '/style.css' );

	wp_enqueue_script( 'moztheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'moztheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'moztheme-bootstrap-js', get_template_directory_uri() . '/framework/resources/bootstrap/js/bootstrap.min.js', array(), '20141010', true );

	wp_enqueue_script( 'moztheme-slick-js', get_template_directory_uri() . '/framework/resources/slick/slick.min.js', array(), '20141010', false );

	wp_enqueue_script( 'moztheme-custom-js', get_template_directory_uri() . '/js/moztheme.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'moztheme_scripts' );

/* Custom funcions */
function moztheme_rand_str( $prefix ) {
	$length = 8;
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	return $prefix."-".substr( str_shuffle( $chars ), 0, $length );
}


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/framework/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/framework/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/framework/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/framework/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/framework/jetpack.php';

/**
 * Register Post Type
 */
// require get_template_directory() . '/framework/register-post-type.php';

/**
 * Load Bootstrap Walker
 *
 * @package moztheme
 *
 */
require get_template_directory() . '/framework/bootstrap-wp-navwalker.php';

/**
 * Load Woocommerce extra functions
 *
 * @package moztheme
 *
 */
require get_template_directory() . '/framework/woo-scripts.php';

/**
 * Load Shortcode
 *
 * @package moztheme
 *
 */
foreach (glob( get_template_directory()."/framework/shortcodes/*.php") as $filename)
{
    include $filename;
}

/**
 * Load Widget
 *
 * @package moztheme
 *
 */
foreach (glob( get_template_directory()."/framework/widgets/*.php") as $filename)
{
    include $filename;
}

/**
 * Load Menu Item plugin
 *
 * @package moztheme
 *
 */
require get_template_directory() . '/framework/plugins/tocka-menu-items/tocka-menu-items.php';
require get_template_directory() . '/framework/plugins/use-child-theme.php';
require get_template_directory() . '/framework/plugins/theme-update-checker.php';
$MyThemeUpdateChecker = new ThemeUpdateChecker(
	'vietmoz-wp', //Theme slug. Usually the same as the name of its directory.
	'http://support.vietmoz.info/updates/?action=get_metadata&slug=vietmoz-wp' //Metadata URL.
);

/** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );

function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

// function fb_comment_count( $posturl = null ) {
// 	$url = 'https://graph.facebook.com/';
// 	if( ! $posturl ) {
// 		global $post;
// 		$posturl = get_permalink($post->ID);
// 	}
// 	$url .= $posturl;

// 	$filecontent = wp_remote_retrieve_body(wp_remote_get($url, array('sslverify'=>false)));
// 	$json = json_decode($filecontent);
// 	$count = $json->comments;
// 	if ($count == 0 || !isset($count)) {
// 	    $count = 0;
// 	}

// 	return $count;
// }

if ( class_exists( 'WooCommerce' ) ) :
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash()
{
    return false;
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text() {
    return __( '<i class="fa fa-check-square"></i> Mua ngay', 'woocommerce' );
}
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_before_main_content', 'woocommerce_category_image', 21 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img src="' . $image . '" alt="" class="archive-img" />';
		}
	}
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    // unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action( 'woocommerce_single_product_summary', 'custom_sku', 7 );

function custom_sku() {
    global $product, $_moz_opts;
    if( $product->get_sku() && $_moz_opts['opt_banhang_sku_show'] == 1 ) :
    echo '<p style="font-weight: bold;">Mã SP: '. $product->get_sku() . '</p>';
    endif;
}

// Change the number of related products displayed
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'child_after_single_product_summary', 20 );
 
function child_after_single_product_summary() {
  woocommerce_related_products(  array( 'posts_per_page' => 8, 'columns' => 4 ));
}

/* Remove checkout fields */
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    // unset($fields['billing']['billing_first_name']);
    // unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    // unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    // unset($fields['billing']['billing_email']);
    // unset($fields['billing']['billing_phone']);
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    // unset($fields['account']['account_username']);
    // unset($fields['account']['account_password']);
    // unset($fields['account']['account_password-2']);
    // unset($fields['order']['order_comments']);
    return $fields;
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
endif; // if ( class_exists( 'WooCommerce' ) )

/**
 * Option call shorthand
 */
function moz_opt($option_name = '', $sub_option = '') {
	if ($option_name != '') {
		global $_moz_opts;
		if( is_array( $_moz_opts[$option_name] ) ) {
			if($sub_option != '') {
				echo $_moz_opts[$option_name][$sub_option];
			}
			else {
				return;
			}
		}
		else {
			echo $_moz_opts[$option_name];
		}
	}
	else {
		return;
	}
}

function get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

function upload_file($image_url) {
	if( ! $image_url || $image_url === NULL || $image_url == '' ) {
		return;
	}
	$upload_dir = wp_upload_dir(); // Set upload folder
	$image_data = file_get_contents($image_url); // Get image data
	$filename   = basename($image_url); // Create image file name

	// Check folder permission and define file location
	if( wp_mkdir_p( $upload_dir['path'] ) ) {
	$file = $upload_dir['path'] . '/' . $filename;
	}
	else {
	$file = $upload_dir['basedir'] . '/' . $filename;
	}

	// Create the image  file on the server
	file_put_contents( $file, $image_data );

	// Check image file type
	$wp_filetype = wp_check_filetype( $filename, null );

	// Set attachment data
	$attachment = array(
	  'post_mime_type' => $wp_filetype['type'],
	  'post_title'     => sanitize_file_name( $filename ),
	  'post_content'   => '',
	  'post_status'    => 'inherit'
	);

	// Create the attachment
	$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	// Include image.php
	require_once(ABSPATH . 'wp-admin/includes/image.php');

	// Define attachment metadata
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	// Assign metadata to attachment
	wp_update_attachment_metadata( $attach_id, $attach_data );

	return $attach_id;
}

if ( !function_exists( 'wbc_extended' ) ) {
	function wbc_extended( $demo_active_import , $demo_directory_path ) {
		reset( $demo_active_import );
		$current_key = key( $demo_active_import );
		/************************************************************************
		* Setting Menus
		*************************************************************************/
		$wbc_menu_array = array( 'demo1', 'demo2', 'demo3' );
		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$top_menu = get_term_by( 'name', 'Main menu', 'nav_menu' );
			if ( isset( $top_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'primary' => $top_menu->term_id,
					)
				);
			}
		}
		/************************************************************************
		* Set HomePage
		*************************************************************************/
		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'demo1' => 'Home Page v1',
			'demo2' => 'Home Page v2',
			'demo3' => 'Home Page v3',
		);
		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

		wp_delete_post(1);

	    // global $wp_rewrite;
	    // $wp_rewrite->set_permalink_structure( '/%postname%/' );
	    if( class_exists( 'Woocommerce' ) ) :
	  //   	$permalink = array (
			//   'category_base' => 'danh-muc',
			//   'tag_base' => 'tu-khoa',
			//   'attribute_base' => '',
			//   'product_base' => '/san-pham',
			// );
	  //   	update_option( 'woocommerce_permalinks', $permalink );

			$img_base_url = get_template_directory_uri();
			$img_base_url .= '/woocommerce/thumb/';
			$catargs = array(
				'hide_empty' => false,
			);
			$arr_img = array();
			$img_num = 5;
			$img_num_plus = $img_num + 1;
			for ($i=1; $i < $img_num_plus; $i++) { 
				$img = $img_base_url . $i . '.jpg';
				$img_id = upload_file($img);
				$arr_img[$i] = $img_id;
				// echo $img;
			}
			$counter = 0;
			$product_cats = get_terms( 'product_cat', $catargs );
			foreach ($product_cats as $cat) {
				if( $counter < $img_num ) {
		    		$counter++;
				} else {
					$counter = 1;
				}
				update_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', $arr_img[$counter] );
			}
	    endif;
	}

	// Uncomment the below
	add_action( 'wbc_importer_after_content_import', 'wbc_extended', 10, 2 );
}

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
    add_action('admin_footer','removed_widgets');
}


function removed_widgets(){
    //get all registered sidebars
    global $wp_registered_sidebars;
    //get saved widgets
    $widgets = get_option('sidebars_widgets');
    //loop over the sidebars and remove all widgets
    foreach ($wp_registered_sidebars as $sidebar => $value) {
        unset($widgets[$sidebar]);
    }
    //update with widgets removed
    update_option('sidebars_widgets',$widgets);
}