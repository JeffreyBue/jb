<?php

if(class_exists('AQ_Page_Builder')) {


    //include the block files

    require_once(get_stylesheet_directory() . '/inc/blocks/pp-featured-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-portfolio-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-clients-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-tabs-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-headline-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-social-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-skills-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-alert-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-testimonials-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-notice-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-pricing-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-team-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-image-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-slider-block.php');
    require_once(get_stylesheet_directory() . '/inc/blocks/pp-blog-block.php');

    if(is_woocommerce_activated()){
        require_once(get_stylesheet_directory() . '/inc/blocks/pp-woocommerce-block.php');
        aq_register_block('PP_Woocommerce_Block');
    }
    //register the blocks
    aq_unregister_block('AQ_Tabs_Block');
    aq_register_block('PP_Tabs_Block');
    aq_register_block('PP_Headline_Block');
    aq_register_block('PP_Notice_Block');
    aq_register_block('PP_Featured_Block');
    aq_register_block('PP_Portfolio_Block');
    aq_register_block('PP_Clients_Block');
    aq_unregister_block('AQ_Alert_Block');
    aq_register_block('PP_Alert_Block');
    aq_register_block('PP_Social_Block');
    aq_register_block('PP_Skills_Block');
    aq_register_block('PP_Testimonials_Block');

    aq_register_block('PP_Pricing_Block');
    aq_register_block('PP_Team_Block');
    aq_register_block('PP_Image_Block');
    aq_register_block('PP_Slider_Block');
    aq_register_block('PP_Blog_Block');

}
 ?>