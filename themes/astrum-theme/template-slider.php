<?php
/**
 * Template Name: Page with Revolution Slider
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage purepress
 * @since purepress 1.0
 */

$htype = ot_get_option('pp_header_menu');
get_header($htype);

$slider = get_post_meta($post->ID, 'pp_page_layer', true);
if($slider) {
        echo '<section class="slider">';    putRevSlider($slider); echo "</section>";
}
while ( have_posts() ) : the_post();
$layout  = get_post_meta($post->ID, 'pp_sidebar_layout', true);
switch ($layout) {
    case 'full-width':
        get_template_part( 'content', 'page' );
        break;
    case 'left-sidebar':
        get_template_part( 'content', 'pageleft' );
        break;
    case 'right-sidebar':
        get_template_part( 'content', 'pageright' );
        break;
    default:
        get_template_part( 'content', 'page' );
        break;
}


endwhile; // end of the loop.


get_footer(); ?>