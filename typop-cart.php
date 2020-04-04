<?php
/*
  Plugin Name: Typop Cart
  Plugin URI:  https://github.com/8ctopotamus/typop-cart
  Description: A sidebar cart for WooCommerce
  Version:     1.0
  Author:      @8ctopotamus
  Author URI:  https://github.com/8ctopotamus
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define('PLUGIN_SLUG', 'typop-cart');

add_action('wp_enqueue_scripts', 'typop_cart_scripts_styles');
function typop_cart_scripts_styles() {
  wp_register_style('typop_cart', plugin_dir_url( __FILE__ ) . 'css/style.css');
  wp_register_script('typop_cart', plugin_dir_url( __FILE__ ) . 'js/index.js', array('jquery'), '', true);
  if (class_exists( 'WooCommerce' )) {
    wp_enqueue_style('typop_cart');
    wp_enqueue_script('typop_cart');
  }
}

add_filter( 'wp_nav_menu_items', 'add_typop_cart_to_menu', 10, 2 );
function add_typop_cart_to_menu( $items, $args ) {
  if ( $args->theme_location == 'primary' && class_exists( 'WooCommerce' ) ) {
    $items .= '<li>
      <a href="'.site_url("/cart/").'" class="typop-toggle">
        <img src="' . plugin_dir_url( __FILE__ ) . '/img/shopping-cart.svg" style="max-width: 25px;" alt="cart icon" />
      </a>
      <span style="display: none;">Cart</span>
    </li>';
  }
  return $items;
}

add_filter('wp_footer', function() {?>
  <div class="typop-cart">
    <p>You have (1) item in your shopping cart.</p>
    <h3>list of Products w/ image, price, variations, link to product</h3>
    <p>total</p>
    <p>view cart / checkout</p>
  </div>
<?php });