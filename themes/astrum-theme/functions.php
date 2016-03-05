<?php
/**
 * Astrum functions and definitions
 *
 * @package Astrum
 * @since Astrum 1.0
 */

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
include_once( 'theme-options.php' );
include_once( 'meta-boxes.php' );

require_once("inc/class-pixelentity-theme-update.php");

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
}

/**
 * Set default background properties
 *
 * @since Astrum 1.0
 */

$bgargs = array(
    'default-color' => 'ffffff',
    'default-image' => get_template_directory_uri() . '/images/bg/noise.png',
    );
add_theme_support( 'custom-background', $bgargs );

/**
 * Execute shortcodes in widgets
 *
 * @since Astrum 1.0
 */

add_filter('widget_text', 'do_shortcode');


global $fontawesome;
$fontawesome = array ( 'icon-glass' => 'glass', 'icon-music' => 'music', 'icon-search' => 'search', 'icon-envelope-alt' => 'envelope-alt', 'icon-heart' => 'heart', 'icon-star' => 'star', 'icon-star-empty' => 'star-empty', 'icon-user' => 'user', 'icon-film' => 'film', 'icon-th-large' => 'th-large', 'icon-th' => 'th', 'icon-th-list' => 'th-list', 'icon-ok' => 'ok', 'icon-remove' => 'remove', 'icon-zoom-in' => 'zoom-in', 'icon-zoom-out' => 'zoom-out', 'icon-off' => 'off', 'icon-signal' => 'signal', 'icon-cog' => 'cog', 'icon-trash' => 'trash', 'icon-home' => 'home', 'icon-file-alt' => 'file-alt', 'icon-time' => 'time', 'icon-road' => 'road', 'icon-download-alt' => 'download-alt', 'icon-download' => 'download', 'icon-upload' => 'upload', 'icon-inbox' => 'inbox', 'icon-play-circle' => 'play-circle', 'icon-repeat' => 'repeat', 'icon-refresh' => 'refresh', 'icon-list-alt' => 'list-alt', 'icon-lock' => 'lock', 'icon-flag' => 'flag', 'icon-headphones' => 'headphones', 'icon-volume-off' => 'volume-off', 'icon-volume-down' => 'volume-down', 'icon-volume-up' => 'volume-up', 'icon-qrcode' => 'qrcode', 'icon-barcode' => 'barcode', 'icon-tag' => 'tag', 'icon-tags' => 'tags', 'icon-book' => 'book', 'icon-bookmark' => 'bookmark', 'icon-print' => 'print', 'icon-camera' => 'camera', 'icon-font' => 'font', 'icon-bold' => 'bold', 'icon-italic' => 'italic', 'icon-text-height' => 'text-height', 'icon-text-width' => 'text-width', 'icon-align-left' => 'align-left', 'icon-align-center' => 'align-center', 'icon-align-right' => 'align-right', 'icon-align-justify' => 'align-justify', 'icon-list' => 'list', 'icon-indent-left' => 'indent-left', 'icon-indent-right' => 'indent-right', 'icon-facetime-video' => 'facetime-video', 'icon-picture' => 'picture', 'icon-pencil' => 'pencil', 'icon-map-marker' => 'map-marker', 'icon-adjust' => 'adjust', 'icon-tint' => 'tint', 'icon-edit' => 'edit', 'icon-share' => 'share', 'icon-check' => 'check', 'icon-move' => 'move', 'icon-step-backward' => 'step-backward', 'icon-fast-backward' => 'fast-backward', 'icon-backward' => 'backward', 'icon-play' => 'play', 'icon-pause' => 'pause', 'icon-stop' => 'stop', 'icon-forward' => 'forward', 'icon-fast-forward' => 'fast-forward', 'icon-step-forward' => 'step-forward', 'icon-eject' => 'eject', 'icon-chevron-left' => 'chevron-left', 'icon-chevron-right' => 'chevron-right', 'icon-plus-sign' => 'plus-sign', 'icon-minus-sign' => 'minus-sign', 'icon-remove-sign' => 'remove-sign', 'icon-ok-sign' => 'ok-sign', 'icon-question-sign' => 'question-sign', 'icon-info-sign' => 'info-sign', 'icon-screenshot' => 'screenshot', 'icon-remove-circle' => 'remove-circle', 'icon-ok-circle' => 'ok-circle', 'icon-ban-circle' => 'ban-circle', 'icon-arrow-left' => 'arrow-left', 'icon-arrow-right' => 'arrow-right', 'icon-arrow-up' => 'arrow-up', 'icon-arrow-down' => 'arrow-down', 'icon-share-alt' => 'share-alt', 'icon-resize-full' => 'resize-full', 'icon-resize-small' => 'resize-small', 'icon-plus' => 'plus', 'icon-minus' => 'minus', 'icon-asterisk' => 'asterisk', 'icon-exclamation-sign' => 'exclamation-sign', 'icon-gift' => 'gift', 'icon-leaf' => 'leaf', 'icon-fire' => 'fire', 'icon-eye-open' => 'eye-open', 'icon-eye-close' => 'eye-close', 'icon-warning-sign' => 'warning-sign', 'icon-plane' => 'plane', 'icon-calendar' => 'calendar', 'icon-random' => 'random', 'icon-comment' => 'comment', 'icon-magnet' => 'magnet', 'icon-chevron-up' => 'chevron-up', 'icon-chevron-down' => 'chevron-down', 'icon-retweet' => 'retweet', 'icon-shopping-cart' => 'shopping-cart', 'icon-folder-close' => 'folder-close', 'icon-folder-open' => 'folder-open', 'icon-resize-vertical' => 'resize-vertical', 'icon-resize-horizontal' => 'resize-horizontal', 'icon-bar-chart' => 'bar-chart', 'icon-twitter-sign' => 'twitter-sign', 'icon-facebook-sign' => 'facebook-sign', 'icon-camera-retro' => 'camera-retro', 'icon-key' => 'key', 'icon-cogs' => 'cogs', 'icon-comments' => 'comments', 'icon-thumbs-up-alt' => 'thumbs-up-alt', 'icon-thumbs-down-alt' => 'thumbs-down-alt', 'icon-star-half' => 'star-half', 'icon-heart-empty' => 'heart-empty', 'icon-signout' => 'signout', 'icon-linkedin-sign' => 'linkedin-sign', 'icon-pushpin' => 'pushpin', 'icon-external-link' => 'external-link', 'icon-signin' => 'signin', 'icon-trophy' => 'trophy', 'icon-github-sign' => 'github-sign', 'icon-upload-alt' => 'upload-alt', 'icon-lemon' => 'lemon', 'icon-phone' => 'phone', 'icon-check-empty' => 'check-empty', 'icon-bookmark-empty' => 'bookmark-empty', 'icon-phone-sign' => 'phone-sign', 'icon-twitter' => 'twitter', 'icon-facebook' => 'facebook', 'icon-github' => 'github', 'icon-unlock' => 'unlock', 'icon-credit-card' => 'credit-card', 'icon-rss' => 'rss', 'icon-hdd' => 'hdd', 'icon-bullhorn' => 'bullhorn', 'icon-bell' => 'bell', 'icon-certificate' => 'certificate', 'icon-hand-right' => 'hand-right', 'icon-hand-left' => 'hand-left', 'icon-hand-up' => 'hand-up', 'icon-hand-down' => 'hand-down', 'icon-circle-arrow-left' => 'circle-arrow-left', 'icon-circle-arrow-right' => 'circle-arrow-right', 'icon-circle-arrow-up' => 'circle-arrow-up', 'icon-circle-arrow-down' => 'circle-arrow-down', 'icon-globe' => 'globe', 'icon-wrench' => 'wrench', 'icon-tasks' => 'tasks', 'icon-filter' => 'filter', 'icon-briefcase' => 'briefcase', 'icon-fullscreen' => 'fullscreen', 'icon-group' => 'group', 'icon-link' => 'link', 'icon-cloud' => 'cloud', 'icon-beaker' => 'beaker', 'icon-cut' => 'cut', 'icon-copy' => 'copy', 'icon-paper-clip' => 'paper-clip', 'icon-save' => 'save', 'icon-sign-blank' => 'sign-blank', 'icon-reorder' => 'reorder', 'icon-list-ul' => 'list-ul', 'icon-list-ol' => 'list-ol', 'icon-strikethrough' => 'strikethrough', 'icon-underline' => 'underline', 'icon-table' => 'table', 'icon-magic' => 'magic', 'icon-truck' => 'truck', 'icon-pinterest' => 'pinterest', 'icon-pinterest-sign' => 'pinterest-sign', 'icon-google-plus-sign' => 'google-plus-sign', 'icon-google-plus' => 'google-plus', 'icon-money' => 'money', 'icon-caret-down' => 'caret-down', 'icon-caret-up' => 'caret-up', 'icon-caret-left' => 'caret-left', 'icon-caret-right' => 'caret-right', 'icon-columns' => 'columns', 'icon-sort' => 'sort', 'icon-sort-down' => 'sort-down', 'icon-sort-up' => 'sort-up', 'icon-envelope' => 'envelope', 'icon-linkedin' => 'linkedin', 'icon-undo' => 'undo', 'icon-legal' => 'legal', 'icon-dashboard' => 'dashboard', 'icon-comment-alt' => 'comment-alt', 'icon-comments-alt' => 'comments-alt', 'icon-bolt' => 'bolt', 'icon-sitemap' => 'sitemap', 'icon-umbrella' => 'umbrella', 'icon-paste' => 'paste', 'icon-lightbulb' => 'lightbulb', 'icon-exchange' => 'exchange', 'icon-cloud-download' => 'cloud-download', 'icon-cloud-upload' => 'cloud-upload', 'icon-user-md' => 'user-md', 'icon-stethoscope' => 'stethoscope', 'icon-suitcase' => 'suitcase', 'icon-bell-alt' => 'bell-alt', 'icon-coffee' => 'coffee', 'icon-food' => 'food', 'icon-file-text-alt' => 'file-text-alt', 'icon-building' => 'building', 'icon-hospital' => 'hospital', 'icon-ambulance' => 'ambulance', 'icon-medkit' => 'medkit', 'icon-fighter-jet' => 'fighter-jet', 'icon-beer' => 'beer', 'icon-h-sign' => 'h-sign', 'icon-plus-sign-alt' => 'plus-sign-alt', 'icon-double-angle-left' => 'double-angle-left', 'icon-double-angle-right' => 'double-angle-right', 'icon-double-angle-up' => 'double-angle-up', 'icon-double-angle-down' => 'double-angle-down', 'icon-angle-left' => 'angle-left', 'icon-angle-right' => 'angle-right', 'icon-angle-up' => 'angle-up', 'icon-angle-down' => 'angle-down', 'icon-desktop' => 'desktop', 'icon-laptop' => 'laptop', 'icon-tablet' => 'tablet', 'icon-mobile-phone' => 'mobile-phone', 'icon-circle-blank' => 'circle-blank', 'icon-quote-left' => 'quote-left', 'icon-quote-right' => 'quote-right', 'icon-spinner' => 'spinner', 'icon-circle' => 'circle', 'icon-reply' => 'reply', 'icon-github-alt' => 'github-alt', 'icon-folder-close-alt' => 'folder-close-alt', 'icon-folder-open-alt' => 'folder-open-alt', 'icon-expand-alt' => 'expand-alt', 'icon-collapse-alt' => 'collapse-alt', 'icon-smile' => 'smile', 'icon-frown' => 'frown', 'icon-meh' => 'meh', 'icon-gamepad' => 'gamepad', 'icon-keyboard' => 'keyboard', 'icon-flag-alt' => 'flag-alt', 'icon-flag-checkered' => 'flag-checkered', 'icon-terminal' => 'terminal', 'icon-code' => 'code', 'icon-reply-all' => 'reply-all', 'icon-mail-reply-all' => 'mail-reply-all', 'icon-star-half-empty' => 'star-half-empty', 'icon-location-arrow' => 'location-arrow', 'icon-crop' => 'crop', 'icon-code-fork' => 'code-fork', 'icon-unlink' => 'unlink', 'icon-question' => 'question', 'icon-info' => 'info', 'icon-exclamation' => 'exclamation', 'icon-superscript' => 'superscript', 'icon-subscript' => 'subscript', 'icon-eraser' => 'eraser', 'icon-puzzle-piece' => 'puzzle-piece', 'icon-microphone' => 'microphone', 'icon-microphone-off' => 'microphone-off', 'icon-shield' => 'shield', 'icon-calendar-empty' => 'calendar-empty', 'icon-fire-extinguisher' => 'fire-extinguisher', 'icon-rocket' => 'rocket', 'icon-maxcdn' => 'maxcdn', 'icon-chevron-sign-left' => 'chevron-sign-left', 'icon-chevron-sign-right' => 'chevron-sign-right', 'icon-chevron-sign-up' => 'chevron-sign-up', 'icon-chevron-sign-down' => 'chevron-sign-down', 'icon-html5' => 'html5', 'icon-css3' => 'css3', 'icon-anchor' => 'anchor', 'icon-unlock-alt' => 'unlock-alt', 'icon-bullseye' => 'bullseye', 'icon-ellipsis-horizontal' => 'ellipsis-horizontal', 'icon-ellipsis-vertical' => 'ellipsis-vertical', 'icon-rss-sign' => 'rss-sign', 'icon-play-sign' => 'play-sign', 'icon-ticket' => 'ticket', 'icon-minus-sign-alt' => 'minus-sign-alt', 'icon-check-minus' => 'check-minus', 'icon-level-up' => 'level-up', 'icon-level-down' => 'level-down', 'icon-check-sign' => 'check-sign', 'icon-edit-sign' => 'edit-sign', 'icon-external-link-sign' => 'external-link-sign', 'icon-share-sign' => 'share-sign', 'icon-compass' => 'compass', 'icon-collapse' => 'collapse', 'icon-collapse-top' => 'collapse-top', 'icon-expand' => 'expand', 'icon-eur' => 'eur', 'icon-gbp' => 'gbp', 'icon-usd' => 'usd', 'icon-inr' => 'inr', 'icon-jpy' => 'jpy', 'icon-cny' => 'cny', 'icon-krw' => 'krw', 'icon-btc' => 'btc', 'icon-file' => 'file', 'icon-file-text' => 'file-text', 'icon-sort-by-alphabet' => 'sort-by-alphabet', 'icon-sort-by-alphabet-alt' => 'sort-by-alphabet-alt', 'icon-sort-by-attributes' => 'sort-by-attributes', 'icon-sort-by-attributes-alt' => 'sort-by-attributes-alt', 'icon-sort-by-order' => 'sort-by-order', 'icon-sort-by-order-alt' => 'sort-by-order-alt', 'icon-thumbs-up' => 'thumbs-up', 'icon-thumbs-down' => 'thumbs-down', 'icon-youtube-sign' => 'youtube-sign', 'icon-youtube' => 'youtube', 'icon-xing' => 'xing', 'icon-xing-sign' => 'xing-sign', 'icon-youtube-play' => 'youtube-play', 'icon-dropbox' => 'dropbox', 'icon-stackexchange' => 'stackexchange', 'icon-instagram' => 'instagram', 'icon-flickr' => 'flickr', 'icon-adn' => 'adn', 'icon-bitbucket' => 'bitbucket', 'icon-bitbucket-sign' => 'bitbucket-sign', 'icon-tumblr' => 'tumblr', 'icon-tumblr-sign' => 'tumblr-sign', 'icon-long-arrow-down' => 'long-arrow-down', 'icon-long-arrow-up' => 'long-arrow-up', 'icon-long-arrow-left' => 'long-arrow-left', 'icon-long-arrow-right' => 'long-arrow-right', 'icon-apple' => 'apple', 'icon-windows' => 'windows', 'icon-android' => 'android', 'icon-linux' => 'linux', 'icon-dribbble' => 'dribbble', 'icon-skype' => 'skype', 'icon-foursquare' => 'foursquare', 'icon-trello' => 'trello', 'icon-female' => 'female', 'icon-male' => 'male', 'icon-gittip' => 'gittip', 'icon-sun' => 'sun', 'icon-moon' => 'moon', 'icon-archive' => 'archive', 'icon-bug' => 'bug', 'icon-vk' => 'vk', 'icon-weibo' => 'weibo', 'icon-renren' => 'renren' );

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Astrum 1.0
 */

if ( ! isset( $content_width ) )
	$content_width = 1180; /* pixels */

if ( ! function_exists( 'astrum_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Astrum 1.0
 */
function astrum_setup() {

    $apikey = ot_get_option('pp_api_key');
    if($apikey) {
        $username = ot_get_option('pp_username');
        PixelentityThemeUpdate::init($username,$apikey,'purethemes');
    }

    $catalogmode = ot_get_option('pp_woo_catalog');
    if ($catalogmode == "yes") {
        remove_filter( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30 );
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
    }

    /* Change number of items */
    $wooitems = ot_get_option('pp_wooitems','9');
    add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$wooitems.';' ), 20 );

    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom blocks for Aqua Page Builder.
	 */
	require( get_template_directory() . '/inc/pagebuilder.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tgmpa.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

    /**
     * Shortcodes
     */
    require( get_template_directory() . '/inc/shortcodes.php' );

    /**
	 * Widgets
	 */
    require( get_template_directory() . '/inc/widgets.php' );

    /**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Astrum, use a find and replace
	 * to change 'purepress' to the name of your theme in all the template files
	 */
    load_theme_textdomain( 'purepress', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
    add_theme_support( 'post-thumbnails' );


    set_post_thumbnail_size(860, 0, true); //size of thumbs
    add_image_size('blog-medium', 320, 0, true);  //4col

    //set to 472
    add_image_size('portfolio-wide', 1180, 0, true);     //slider
    add_image_size('portfolio-half', 775, 0, true); //2col
    add_image_size('portfolio-3col', 380, 271, true);  //3col
    add_image_size('portfolio-4col', 280, 200, true);  //4col
    add_image_size('square-thumb', 130, 130, true);  //4col
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'purepress' ),
       ) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'image', 'video', 'gallery' ) );

    /**
     * Enable support for WooCommerce
     */
    add_theme_support( 'woocommerce' );
    //define( 'WOOCOMMERCE_USE_CSS', false );
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );

}
endif; // astrum_setup
add_action( 'after_setup_theme', 'astrum_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Astrum 1.0
 */
function astrum_widgets_init() {
 register_sidebar(array(
    'id' => 'sidebar',
    'name' => 'Sidebar',
    'before_widget' => '<div id="%1$s" class="widget  %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="headline">',
    'after_title' => '</h3><span class="line"></span><div class="clearfix"></div>',
    ));

 register_sidebar(array(
    'id' => 'shop',
    'name' => 'Shop',
    'before_widget' => '<div id="%1$s" class="widget  %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="headline">',
    'after_title' => '</h3><span class="line"></span><div class="clearfix"></div>',
    ));

 register_sidebar(array(
    'id' => 'footer1st',
    'name' => 'Footer 1st Column',
    'description' => '1st column for widgets in Footer.',
    'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
 register_sidebar(array(
    'id' => 'footer2nd',
    'name' => 'Footer 2nd Column',
    'description' => '2nd column for widgets in Footer.',
    'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
 register_sidebar(array(
    'id' => 'footer3rd',
    'name' => 'Footer 3rd Column',
    'description' => '3rd column for widgets in Footer.',
    'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
 register_sidebar(array(
    'id' => 'footer4th',
    'name' => 'Footer 4th Column',
    'description' => '4th column for widgets in Footer.',
    'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

     //custom sidebars:
 if (ot_get_option('incr_sidebars')):
    $pp_sidebars = ot_get_option('incr_sidebars');
    foreach ($pp_sidebars as $pp_sidebar) {
        register_sidebar(array(
            'name' => $pp_sidebar["title"],
            'id' => $pp_sidebar["id"],
            'before_widget' => '<div id="%1$s" class="widget  %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="headline">',
            'after_title' => '</h3><span class="line"></span><div class="clearfix"></div>',
            ));
    }
endif;

}
add_action( 'widgets_init', 'astrum_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function astrum_scripts() {

    $color = get_theme_mod('astrum_main_color','#73b819');  //E.g. #FF0000
    $custom_css = "a, a:visited{ color: {$color}; }";
    wp_add_inline_style( 'style', $custom_css );

    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_style('woocommerce', get_stylesheet_directory_uri() .'/css/woocommerce.css');


    wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'tpplugins', get_template_directory_uri() . '/js/jquery.themepunch.plugins.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'showbizpro', get_template_directory_uri() . '/js/jquery.themepunch.showbizpro.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'tooltips', get_template_directory_uri() . '/js/jquery.tooltips.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '' );
    wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'twitter', get_template_directory_uri() . '/js/jquery.twitter.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'jpanelmenu', get_template_directory_uri() . '/js/jquery.jpanelmenu.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), '', true );

    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
  }

  if ( is_singular() && wp_attachment_is_image() ) {
      wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
  }

  wp_localize_script( 'custom', 'astrum',
    array(
        'ajaxurl'=>admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce'),
        'flexslidespeed' => ot_get_option('pp_flex_slideshowspeed',7000),
        'flexanimspeed' => ot_get_option('pp_flex_animationspeed',600),
        'flexanimationtype' => ot_get_option('pp_flex_animationtype','fade'),
        'breakpoint' => ot_get_option('pp_menu_breakpoint','767'),
        'sticky' => ot_get_option('pp_sticky_menu','true')
        )
    );
}
add_action( 'wp_enqueue_scripts', 'astrum_scripts' );


function astrum_admin_script() {
    global $pagenow;
    if (is_admin() && $pagenow == 'post-new.php' OR $pagenow == 'post.php') {
        if ( ! did_action( 'wp_enqueue_media' ) )
            wp_enqueue_media();

        wp_register_style('astrum-css', get_template_directory_uri() . '/css/astrum.admin.css');
        wp_register_script('astrum-scripts', get_template_directory_uri() . '/inc/script.js');
        wp_enqueue_style('astrum-css');
        wp_enqueue_script('astrum-scripts');
    }
}
add_action('admin_enqueue_scripts', 'astrum_admin_script');





/* ----------------------------------------------------- */
/* Portfolio Custom Post Type */
/* ----------------------------------------------------- */

if (!function_exists('register_cpt_portfolio')) {
    add_action( 'init', 'register_cpt_portfolio' );
    function register_cpt_portfolio() {

        $labels = array(
            'name' => __( 'Portfolio','purepress'),
            'singular_name' => __( 'Portfolio','purepress'),
            'add_new' => __( 'Add New','purepress' ),
            'add_new_item' => __( 'Add New Work','purepress' ),
            'edit_item' => __( 'Edit Work','purepress'),
            'new_item' => __( 'New Work','purepress'),
            'view_item' => __( 'View Work','purepress'),
            'search_items' => __( 'Search Portfolio','purepress'),
            'not_found' => __( 'No portfolio found','purepress'),
            'not_found_in_trash' => __( 'No works found in Trash','purepress'),
            'parent_item_colon' => __( 'Parent work:','purepress'),
            'menu_name' => __( 'Portfolio','purepress'),
            );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'description' => __('Display your works by filters','purepress'),
            'supports' => array( 'title', 'editor', 'excerpt', 'revisions', 'thumbnail' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array( 'slug' => 'portfolio'),
            'capability_type' => 'post'
            );

        register_post_type( 'portfolio', $args );
    }
}
/* ----------------------------------------------------- */
/* Filter Taxonomy */
/* ----------------------------------------------------- */
if (!function_exists('register_taxonomy_filters')) {
    add_action( 'init', 'register_taxonomy_filters' );

    function register_taxonomy_filters() {

        $labels = array(
            'name' => __( 'Filters', 'purepress' ),
            'singular_name' => __( 'Filter', 'purepress' ),
            'search_items' => __( 'Search Filters', 'purepress' ),
            'popular_items' => __( 'Popular Filters', 'purepress' ),
            'all_items' => __( 'All Filters', 'purepress' ),
            'parent_item' => __( 'Parent Filter', 'purepress' ),
            'parent_item_colon' => __( 'Parent Filter:', 'purepress' ),
            'edit_item' => __( 'Edit Filter', 'purepress' ),
            'update_item' => __( 'Update Filter', 'purepress' ),
            'add_new_item' => __( 'Add New Filter', 'purepress' ),
            'new_item_name' => __( 'New Filter', 'purepress' ),
            'separate_items_with_commas' => __( 'Separate Filters with commas', 'purepress' ),
            'add_or_remove_items' => __( 'Add or remove Filters', 'purepress' ),
            'choose_from_most_used' => __( 'Choose from the most used Filters', 'purepress' ),
            'menu_name' => __( 'Filters', 'purepress' ),
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'show_in_nav_menus' => true,
                'show_ui' => true,
                'show_tagcloud' => false,
                'hierarchical' => true,
                'rewrite' => true,
                'query_var' => true
                );
            register_taxonomy( 'filters', array('portfolio'), $args );
    }
}


/* ----------------------------------------------------- */
/* Testimonials Custom Post Type */
/* ----------------------------------------------------- */

if (!function_exists('register_cpt_testimonials')) {
    add_action( 'init', 'register_cpt_testimonials' );

    function register_cpt_testimonials() {

        $labels = array(
            'name' => __( 'Testimonials','purepress'),
            'singular_name' => __( 'testimonial','purepress'),
            'add_new' => __( 'Add New','purepress' ),
            'add_new_item' => __( 'Add New Testimonial','purepress' ),
            'edit_item' => __( 'Edit Testimonial','purepress'),
            'new_item' => __( 'New Testimonial','purepress'),
            'view_item' => __( 'View Testimonial','purepress'),
            'search_items' => __( 'Search Testimonials','purepress'),
            'not_found' => __( 'No testimonials found','purepress'),
            'not_found_in_trash' => __( 'No testimonials found in Trash','purepress'),
            'parent_item_colon' => __( 'Parent testimonial:','purepress'),
            'menu_name' => __( 'Testimonials','purepress'),
            );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'description' => __('Display your works by filters','purepress'),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,

        //'menu_icon' => TEMPLATE_URL . 'work.png',
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array( 'slug' => 'testimonial'),
            'capability_type' => 'post'
            );

        register_post_type( 'testimonial', $args );
    }
}


/* ----------------------------------------------------- */
/* Team Custom Post Type */
/* ----------------------------------------------------- */

if (!function_exists('register_cpt_team')) {
    add_action( 'init', 'register_cpt_team' );

    function register_cpt_team() {

        $labels = array(
            'name' => __( 'Team','purepress'),
            'singular_name' => __( 'Team','purepress'),
            'add_new' => __( 'Add New','purepress' ),
            'add_new_item' => __( 'Add New Team Member','purepress' ),
            'edit_item' => __( 'Edit Team Member','purepress'),
            'new_item' => __( 'New Team Member','purepress'),
            'view_item' => __( 'View Team Member','purepress'),
            'search_items' => __( 'Search Team Members','purepress'),
            'not_found' => __( 'No Team Members found','purepress'),
            'not_found_in_trash' => __( 'No Team Members found in Trash','purepress'),
            'parent_item_colon' => __( 'Parent member:','purepress'),
            'menu_name' => __( 'Team','purepress'),
            );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
        //'menu_icon' => TEMPLATE_URL . 'work.png',
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array( 'slug' => 'team'),
            'capability_type' => 'post'
            );
        register_post_type( 'team', $args );
    }
}
if (!function_exists('astrum_custom_taxonomy_post_class')) {
/*
 * Adds terms from a custom taxonomy to post_class
 */
add_filter( 'post_class', 'astrum_custom_taxonomy_post_class', 10, 3 );

    function astrum_custom_taxonomy_post_class( $classes, $class, $ID ) {
        $taxonomy = 'filters';
        $terms = get_the_terms( (int) $ID, $taxonomy );
        if( !empty( $terms ) ) {
            foreach( (array) $terms as $order => $term ) {
                if( !in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }
        return $classes;
    }
}

/*
** WOOCOMMERCE
*/

remove_action( 'woocommerce_before_main_content',    'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'astrum_woocommerce_image_dimensions', 1 );

/**
 * Define image sizes
 */
function astrum_woocommerce_image_dimensions() {
    $catalog = array(
        'width'     => '280',   // px
        'height'    => '280',   // px
        'crop'      => 1        // true
        );

    $single = array(
        'width'     => '600',   // px
        'height'    => '600',   // px
        'crop'      => 1        // true
        );

    $thumbnail = array(
        'width'     => '130',   // px
        'height'    => '130',   // px
        'crop'      => 0        // false
        );

    // Image sizes
    update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
    update_option( 'shop_single_image_size', $single );         // Single product image
    update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
}

/**
 * Custom Add To Cart Messages
 *
 **/
add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message() {
    global $woocommerce;

    // Output success messages
    if (get_option('woocommerce_cart_redirect_after_add')=='yes') :
        $return_to  = get_permalink(woocommerce_get_page_id('shop'));
    $message    = sprintf('<div class="notification closeable success"><p id="added_cart_info">%s <a href="%s" class="button color">%s</a></p></div>', __('Product successfully added to your cart.', 'purepress'), $return_to, __('Continue Shopping &rarr;', 'purepress') );
    else :
        $message  = sprintf('<div class="notification closeable success"><p id="added_cart_info">%s <a href="%s" class="button color">%s</a></p></div>', __('Product successfully added to your cart.', 'purepress'), get_permalink(woocommerce_get_page_id('cart')), __('View Cart &rarr;', 'purepress') );
    endif;

    return $message;
}



/*remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
*/
/**
 * WooCommerce Loop Product Thumbs
 **/

 if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    }
 }


/**
 * WooCommerce Product Thumbnail
 **/
 if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $woocommerce;

        if ( ! $placeholder_width )
            $placeholder_width = $woocommerce->get_image_size( 'shop_catalog_image_width' );
        if ( ! $placeholder_height )
            $placeholder_height = $woocommerce->get_image_size( 'shop_catalog_image_height' );

            $output = '';
            $hover = get_post_meta($post->ID, 'pp_featured_hover', TRUE);
            if($hover) {
                $hoverid = pn_get_attachment_id_from_url($hover);
                $hoverimage = wp_get_attachment_image_src($hoverid, $size);
                $output .= '<img src="'.$hoverimage[0].'" class="on-hover" width="'.$hoverimage[1].'" height="'.$hoverimage[2].'" />';
            }

            if ( has_post_thumbnail() ) {

                $output .= get_the_post_thumbnail( $post->ID, $size );

            } else {

                $output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';

            }
            return $output;
    }
 }
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();
    ?>
    <a class="cart-contents" title="<?php _e('View your shopping cart', 'woothemes'); ?>"> <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_content_fragment');

function woocommerce_header_add_to_cart_content_fragment( $fragments ) {
    global $woocommerce;

    ob_start();?>

        <ul>
        <?php
        if (sizeof($woocommerce->cart->cart_contents)>0) :
            foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
                $_product = $cart_item['data'];
                if ($_product->exists() && $cart_item['quantity']>0) :
                   echo '<li class="cart_list_product"><a href="' . esc_url( get_permalink( intval( $cart_item['product_id'] ) ) ) . '">';
                   echo $_product->get_image();
                   echo apply_filters( 'woocommerce_cart_widget_product_title', $_product->get_title(), $_product ) . '</a>';
                   if($_product instanceof woocommerce_product_variation && is_array($cart_item['variation'])) :
                       echo woocommerce_get_formatted_variation( $cart_item['variation'] );
                     endif;
                   echo '<span class="quantity">' . $cart_item['quantity'] . ' &times; ' . woocommerce_price( $_product->get_price() ) . '</span></li>';
                endif;
            endforeach;
        else:
            echo '<li class="empty">' . __( 'No products in the cart.', 'woothemes' ) . '</li>';
        endif; ?>
        </ul>

    <?php $fragments['div.cart_products ul'] = ob_get_clean();
    return $fragments;
}


function astrum_add_to_wishlist($label) {
    $label = '<i class="icon-star"></i>';
    return $label;
}
add_filter( 'yith_wcwl_button_label', 'astrum_add_to_wishlist',1 );
add_filter( 'yith-wcwl-browse-wishlist-label', 'astrum_add_to_wishlist',1 );

function astrum_yith_wcwl_wishlist_title($title) {
    $wishlist_title = get_option( 'yith_wcwl_wishlist_title' );
    $title ='<h3 class="headline">' . $wishlist_title . '</h3><span class="line" style="margin-bottom:35px;"></span><div class="clearfix"></div>';
    return $title;
}
add_filter('yith_wcwl_wishlist_title','astrum_yith_wcwl_wishlist_title');

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
function add_wishlisht_button() {
    if (is_plugin_active('yith-woocommerce-wishlist/init.php')) {
        echo do_shortcode('[yith_wcwl_add_to_wishlist]');
    }
}
add_filter( 'astrum_wishlist', 'add_wishlisht_button' );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
?>