<?php
/**
 * Single Product Image
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.14
* @modified    purethemes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

?>
<div class="six columns alpha">
    <div class="images shop-item">
       <?php
        if ( has_post_thumbnail() ) {

            $image_title        = esc_attr( get_the_title( get_post_thumbnail_id() ) );
            $image_link         = wp_get_attachment_url( get_post_thumbnail_id() );
            $image              = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
            $attachment_ids = $product->get_gallery_attachment_ids();
            $attachment_count   = count( $product->get_gallery_attachment_ids() );

            if ( $attachment_count > 0 ) { // many images, use flexslider

                 $classes = array( 'zoom','mediaholder' );
                 $gallery = '-gallery';
            ?>

            <section class="flexslider">
                <div class="media">
                    <ul class="slides mediaholder">

                    <?php
                $hover = get_post_meta($post->ID, 'pp_featured_hover', TRUE);
                $gallery = '';
                $output = '';
                if($hover) {
                    $hoverid = pn_get_attachment_id_from_url($hover);
                    $hoverimage = wp_get_attachment_image_src($hoverid, 'shop_single');
                    $hoverimagefull = wp_get_attachment_image_src($hoverid, 'full');
                    $output = '<li><a href="'.$hoverimagefull[0].'" class="mfp-gallery"><img src="'.$hoverimage[0].'"  width="428" height="394" /></a></li>';
                }
                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="woocommerce-main-image mediaholder mfp-gallery" title="%s"  rel="fancybox' . $gallery . '">%s</a></li>'.$output, $image_link, $image_title, $image ), $post->ID );


                    foreach ( $attachment_ids as $attachment_id ) {
                        $image_link = wp_get_attachment_url( $attachment_id );

                        if ( ! $image_link )
                            continue;

                        $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
                        $image_class = esc_attr( implode( ' ', $classes ) );
                        $image_title = esc_attr( get_the_title( $attachment_id ) );

                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li><a href="%s" class="%s mfp-gallery" title="%s" ">%s</a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
                    }?>
                    </ul>
                </div>
            </section>
            <?php
            } else { // just one image
                $hover = get_post_meta($post->ID, 'pp_featured_hover', TRUE);
                $gallery = '';
                $output = '';
                if($hover) {
                    $hoverid = pn_get_attachment_id_from_url($hover);
                    $hoverimage = wp_get_attachment_image_src($hoverid, 'shop_single');
                    $hoverimagefull = wp_get_attachment_image_src($hoverid, 'full');
                    ?>

                    <section class="flexslider">
                        <div class="media">
                            <ul class="slides mediaholder">
                    <?php

                    $output = '<li><a href="'.$hoverimagefull[0].'" class="mfp-gallery"><img src="'.$hoverimage[0].'"  width="428" height="394" /></a></li>';
                    echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="woocommerce-main-image mediaholder mfp-gallery" title="%s"  rel="fancybox' . $gallery . '">%s</a></li>'.$output, $image_link, $image_title, $image ), $post->ID );
                    ?>
                            </ul>
                        </div>
                    </section>
                    <?php

                } else {
                    echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image mediaholder mfp-image" title="%s"  rel="fancybox' . $gallery . '">%s</a>'.$output, $image_link, $image_title, $image ), $post->ID );
                }

            }
        } else {
            echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );
        }
        do_action('woocommerce_product_thumbnails'); ?>
    </div>
</div>