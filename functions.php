<?php


require_once get_theme_file_path() .'/inc/codestar-framework-master/codestar-framework.php';
require_once('inc/codestar.php');
require_once('inc/class-tgm-plugin-activation.php');
require_once('inc/zyan-activation.php');
require_once('inc/demo-data.php');
function zyan_setup(){

       add_theme_support( 'woocommerce' );
       add_theme_support( 'title-tag' );
     

       register_nav_menus(array(
              'primary-menu'=> __('Primary Menu', 'zyan'),
              'footer-menu1'=> __('Footer Menu1', 'zyan'),
              'footer-menu2'=> __('Footer Menu2', 'zyan'),
       ));
       
}
add_action( 'after_setup_theme', 'zyan_setup');

function zyan_scripts() {
       wp_enqueue_style( 'style-name', get_stylesheet_uri() );
       wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all');
       wp_enqueue_style( 'template-css', get_template_directory_uri() . '/assets/css/templatemo.css', array(), '1.0.0', 'all');
       wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0', 'all');
       wp_enqueue_style( 'font', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '1.0.0', 'all');
       wp_enqueue_style( 'apple', get_template_directory_uri() . '/assets/img/apple-icon.png', array(), '1.0.0', 'all');
       wp_enqueue_style( 'fevi', get_template_directory_uri() . '/assets/img/favicon.ico', array(), '1.0.0', 'all');
       wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap', array(), '1.0.0', 'all');


       wp_enqueue_script( 'min', get_template_directory_uri() . '/assets/js/jquery-1.11.0.min.js', array(), '1.0.0', true);
       wp_enqueue_script( 'migrate', get_template_directory_uri() . 'assets/js/jquery-migrate-1.2.1.min.js', array(), '1.0.0', true);
       wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '1.0.0', true);
       wp_enqueue_script( 'template', get_template_directory_uri() . '/assets/js/templatemo.js', array(), '1.0.0', true);
       wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true);
   }
   add_action( 'wp_enqueue_scripts', 'zyan_scripts' );



// Function to return user count
function wpb_user_count() { 
       $usercount = count_users();
       $result = $usercount['total_users']; 
       return $result; 
       } 
       // Creating a shortcode to display user count
       add_shortcode('user_count', 'wpb_user_count');
   

    /**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

//------add-to-cart-plus-minus-button-function-----///
/**
 * @snippet       Plus Minus Quantity Buttons @ WooCommerce Product Page & Cart
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// -------------
// 1. Show plus minus buttons
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus">-</button>';
}
  
// -------------
// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
}



     

