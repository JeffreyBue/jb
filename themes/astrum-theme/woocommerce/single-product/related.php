<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 * @modified    purethemes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

$related = $product->get_related();

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related,
	'post__not_in'			=> array($product->id)
	) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] 	= 99;
$randID = rand(1, 99);
if ( $products->have_posts() ) : ?>



<div class="">
	<h3 class="headline"><?php _e('Related Products', 'woocommerce'); ?></h3>
	<span class="line" style="margin-bottom:0;"></span>
</div>

<!-- ShowBiz Carousel -->
<div class="showbiz-container recent-work">

	<!-- Navigation -->
	<div class="showbiz-navigation">
		<div id="showbiz_left_<?php echo $randID; ?>" class="sb-navigation-left"><i class="icon-angle-left"></i></div>
		<div id="showbiz_right_<?php echo $randID; ?>" class="sb-navigation-right"><i class="icon-angle-right"></i></div>
	</div>
	<div class="clearfix"></div>
	<div class="showbiz" data-left="#showbiz_left_<?php echo $randID; ?>" data-right="#showbiz_right_<?php echo $randID; ?>">
		<div class="overflowholder">
			<ul>
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<?php woocommerce_get_template_part( 'content', 'product' ); ?>
			<?php endwhile; // end of the loop. ?>
		</ul>
	</div>
	<div class="clearfix"></div>

</div>
</div>
<?php endif;

wp_reset_postdata();
