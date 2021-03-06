<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>



<?php do_action('woocommerce_cart_is_empty'); ?>
<div class="notification closeable notice">
    <p><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?> <a class="button color" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e( '&larr; Return To Shop', 'woocommerce' ) ?></a></p>
</div>