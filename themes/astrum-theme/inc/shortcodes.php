<?php
/**
 * Custom shortcodes for astrum theme
 *
 *
 * @package astrum
 * @since astrum 1.0
 */

/**
* Clear shortcode
* Usage: [clear]
*/
if (!function_exists('pp_clear')) {
    function pp_clear() {
     return '<div class="clear"></div>';
 }
 add_shortcode( 'clear', 'pp_clear' );
}

/**
* Dropcap shortcode
* Usage: [dropcap color="gray"] [/dropcap]// margin-down margin-both
*/
if (!function_exists('pp_dropcap')) {
    function pp_dropcap($atts, $content = null) {
        extract(shortcode_atts(array(
            'color'=>''), $atts));
        return '<span class="dropcap '.$color.'">'.$content.'</span>';
    }
    add_shortcode('dropcap', 'pp_dropcap');
}

function pp_accordion( $atts, $content ) {
    extract(shortcode_atts(array(
        'title' => 'Tab'
        ), $atts));
    return '<h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span>'.$title.'</h3><div><p>'.do_shortcode( $content ).'</p></div>';
}
add_shortcode( 'accordion', 'pp_accordion' );

function pp_accordion_wrap( $atts, $content ) {
    extract(shortcode_atts(array(), $atts));
    return '<div class="accordion">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'accordionwrap', 'pp_accordion_wrap' );

function pp_button($atts, $content = null) {
    extract(shortcode_atts(array(
        "url" => '',
        "color" => 'color',  //gray color light
        "customcolor" => '',
        "iconcolor" => 'white',
        "icon" => '',
        "size" => '',
        "target" => '',
        "customclass" => '',
        ), $atts));
    $output = '<a class="button '.$size.' '.$color.' '.$customclass.'" href="'.$url.'" ';
    if(!empty($target)) { $output .= 'target="'.$target.'"'; }
    if(!empty($customcolor)) { $output .= 'style="background-color:'.$customcolor.'"'; }
    $output .= '>';
    if(!empty($icon)) { $output .= '<i class="'.$icon.'  '.$iconcolor.'"></i> '; }
    $output .= $content.'</a>';

    return $output;
}
add_shortcode('button', 'pp_button');

function etdc_tab_group( $atts, $content ) {
    $GLOBALS['pptab_count'] = 0;
    do_shortcode( $content );
    $count = 0;
    if( is_array( $GLOBALS['tabs'] ) ) {
        foreach( $GLOBALS['tabs'] as $tab ) {
            $count++;
            $tabs[] = '<li><a href="#tab'.$count.'">'.$tab['title'].'</a></li>';
            $panes[] = '<div class="tab-content" id="tab'.$count.'">'.$tab['content'].'</div>';
        }
        $return = "\n".'<ul class="tabs-nav">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="tabs-container">'.implode( "\n", $panes ).'</div>'."\n";
    }
    return $return;
}

/**
* Usage: [tab title="" ] [/tab]
*/
function etdc_tab( $atts, $content ) {
    extract(shortcode_atts(array(
        'title' => 'Tab %d',
        ), $atts));

    $x = $GLOBALS['pptab_count'];
    $GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['pptab_count'] ), 'content' =>  do_shortcode( $content ) );
    $GLOBALS['pptab_count']++;
}
add_shortcode( 'tabgroup', 'etdc_tab_group' );

add_shortcode( 'tab', 'etdc_tab' );


/**
* Line shortcode
* Usage: [line]
*/
function pp_line() {
    return '<div class="line" style="margin-top: 25px; margin-bottom: 40px;"></div>';
}
add_shortcode( 'line', 'pp_line' );


/**
* Headline shortcode
* Usage: [headline ] [/headline] // margin-down margin-both
*/
function pp_headline( $atts, $content ) {
  extract(shortcode_atts(array(
    'margintop' => 0,
    'marginbottom' => 35
    ), $atts));
  return '<h3 class="headline" style="margin-top:'.$margintop.'px;">'.do_shortcode( $content ).'</h3><span class="line" style="margin-bottom:'.$marginbottom.'px;"></span><div class="clearfix"></div>';
}
add_shortcode( 'headline', 'pp_headline' );


/**
* Icon shortcode
* Usage: [icon icon="icon-exclamation"]
*/
function pp_icon($atts) {
    extract(shortcode_atts(array(
        'icon'=>''), $atts));
    return '<i class="'.$icon.'"></i>';
}
add_shortcode('icon', 'pp_icon');


/**
* Highlight shortcode
* Usage: [highlight style="gray"] [/highlight] // color, gray, light
*/
function pp_highlight($atts, $content = null) {
    extract(shortcode_atts(array(
        'style' => 'gray'
        ), $atts));
    return '<span class="highlight '.$style.'">'.$content.'</span>';
}
add_shortcode('highlight', 'pp_highlight');


/**
* Icon box shortcode
* Usage: [iconbox column="one-third" title="" link="" icon=""] [/iconbox]
*/
function pp_iconbox( $atts, $content ) {
    extract(shortcode_atts(array(
        'title' => '',
        'link' => '',
        'icon' => '',
        'place' => '',
        'width' => 'one-third'
        ), $atts));

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $output = '<div class="columns '.$width.' '.$p.'">';
    $output .= '<div class="featured-box"><div class="circle"><i class="'.$icon.'"></i><span></span></div>';
    $output .= '<div class="featured-desc">';

    if($link) {
        $output .= '<h3><a href="'.$link.'">'.$title.'</a></h3>';
    }
    else {
        $output .= '<h3>'.$title.'</h3>';
    }

    $output .= '<p>'.do_shortcode( $content ).'</p></div></div></div>';
    return $output;
}
add_shortcode( 'iconbox', 'pp_iconbox' );


/**
*  Usage: [iconwrapper] [/iconwrapper]
*/
function pp_iconbox_wrapper( $atts, $content ) {
    $output = '<div class="featured-boxes homepage">'.do_shortcode( $content ).'</div>';
    return $output;
}
add_shortcode( 'iconwrapper', 'pp_iconbox_wrapper' );


/**
* Recent work shortcode
* Usage: [recent_work limit="4" title="Recent Work" orderby="date" order="DESC" filters="" carousel="yes"] [/recent_work]
*/
function pp_recent_work($atts, $content ) {
    extract(shortcode_atts(array(
        'limit'=>'4',
        'title' => 'Recent Work',
        'orderby'=> 'date',
        'order'=> 'DESC',
        'filters' => '',
        'width' => 'sixteen',
        'place' => 'center',
        'exclude_posts' => '',
        ), $atts));

    $output = '';
    $randID = rand(1, 99); // Get unique ID for carousel

    if(empty($width)) { $width = "sixteen"; } //set width to 16 even if empty value

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $output .= '
    <div class="'.$width.' columns '.$p.'">
    <div>
    <h3 class="headline">'.$title.'</h3>
    <span class="line" style="margin-bottom:0;"></span>
    </div>

    <!-- ShowBiz Carousel -->
    <div id="recent-work" class="showbiz-container recent-work ">

    <!-- Navigation -->
    <div class="showbiz-navigation">
    <div id="showbiz_left_'.$randID.'" class="sb-navigation-left"><i class="icon-angle-left"></i></div>
    <div id="showbiz_right_'.$randID.'" class="sb-navigation-right"><i class="icon-angle-right"></i></div>
    </div>
    <div class="clearfix"></div>

    <div class="showbiz" data-left="#showbiz_left_'.$randID.'" data-right="#showbiz_right_'.$randID.'">
    <!-- Portfolio Entries -->
    <div class="overflowholder">
    <ul>';
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $limit,
        'orderby' => $orderby,
        'order' => $order,
        );
    if(!empty($exclude_posts)) {
        $exl = explode(",", $exclude_posts);
        $args['post__not_in'] = $exl;
    }

    if(!empty($filters)) {
        $filters = explode(",", $filters);
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'filters',
                'field' => 'slug',
                'terms' => $filters
                )
            );
    }
    $wp_query = new WP_Query( $args );
    if($wp_query->found_posts > 1) { $mfpclass= "mfp-gallery2"; } else { $mfpclass= "mfp-image"; }
    if ( $wp_query->have_posts() ):
        while( $wp_query->have_posts() ) : $wp_query->the_post();
    $output .= '<li>
    <div class="portfolio-item media">
    <figure>
    <div class="mediaholder">';
    $thumb = get_post_thumbnail_id();
    $img_url = wp_get_attachment_url($thumb);
    $lightbox = get_post_meta($wp_query->post->ID, 'pp_pf_lightbox', true);
    if($lightbox == 'lightbox') {
        $fullsize = wp_get_attachment_image_src($thumb, 'full');
        $output .= '<a href="'.$fullsize[0].'" class="'.$mfpclass.'" title="'.get_the_title().'">';
        $output .= get_the_post_thumbnail($wp_query->post->ID,'portfolio-4col');
        $output .= '
        <div class="hovercover">
        <div class="hovericon"><i class="hoverzoom"></i></div>
        </div>
        </a>';
    } else {
        $output .= '<a href="'.get_permalink().'"  title="'.get_the_title().'">';
        $output .= get_the_post_thumbnail($wp_query->post->ID,'portfolio-4col');
        $output .= '
        <div class="hovercover">
        <div class="hovericon"><i class="hoverlink"></i></div>
        </div>
        </a>';
    }
    $output .= '</div>
    <a href="'.get_permalink().'">
    <figcaption class="item-description">
    <h5>'.get_the_title().'</h5>';
    $terms = get_the_terms( $wp_query->post->ID, 'filters' );
    if ( $terms && ! is_wp_error( $terms ) ) : $output .= '<span>';
    $filters = array();
    $i = 0;
    foreach ( $terms as $term ) {
        $filters[] = $term->name;
        if ($i++ > 0) break;
    }
    $outputfilters = join( ", ", $filters );
    $output .= $outputfilters;
    $output .= '</span>';
    endif;
    $output .= '</figcaption>
    </a>
    </figure>
    </div>
    </li>';
    endwhile;  // close the Loop
    endif;
    $output .= '</ul>
    <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    </div>';
    wp_reset_query();
    return $output;
}

add_shortcode('recent_work', 'pp_recent_work');

/**
* Recent work shortcode
* Usage: [recent_blog limit="4" title="Recent Work" orderby="date" order="DESC"  carousel="yes"] [/recent_blog]
*/
function pp_recent_blog($atts, $content ) {
    extract(shortcode_atts(array(
        'limit'=>'4',
        'title' => 'Recent Posts',
        'orderby'=> 'date',
        'order'=> 'DESC',
        'categories' => '',
        'tags' => '',
        'width' => 'sixteen',
        'place' => 'center',
        'exclude_posts' => '',
        ), $atts));

    $output = '';
    $randID = rand(1, 99); // Get unique ID for carousel

    if(empty($width)) { $width = "sixteen"; } //set width to 16 even if empty value

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $output .= '
    <div class="'.$width.' columns '.$p.'">
    <div>
    <h3 class="headline">'.$title.'</h3>
    <span class="line" style="margin-bottom:0;"></span>
    </div>

    <!-- ShowBiz Carousel -->
    <div id="recent-work" class="showbiz-container recent-work ">

    <!-- Navigation -->
    <div class="showbiz-navigation">
    <div id="showbiz_left_'.$randID.'" class="sb-navigation-left"><i class="icon-angle-left"></i></div>
    <div id="showbiz_right_'.$randID.'" class="sb-navigation-right"><i class="icon-angle-right"></i></div>
    </div>
    <div class="clearfix"></div>

    <div class="showbiz" data-left="#showbiz_left_'.$randID.'" data-right="#showbiz_right_'.$randID.'">
    <!-- Portfolio Entries -->
    <div class="overflowholder">
    <ul>';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $limit,
        'orderby' => $orderby,
        'order' => $order,
        );
    if(!empty($exclude_posts)) {
        $exl = explode(",", $exclude_posts);
        $args['post__not_in'] = $exl;
    }

    if(!empty($categories)) {
        $categories = explode(",", $categories);
        $args['category__in'] = $categories;
    }
    if(!empty($tags)) {
        $tags = explode(",", $tags);
         $args['tag__in'] = $tags;
    }
    $wp_query = new WP_Query( $args );

    if ( $wp_query->have_posts() ):
        while( $wp_query->have_posts() ) : $wp_query->the_post();
    $output .= '<li>
    <div class="blog-item media">
    <figure>
    <div class="mediaholder ';
    if(!has_post_thumbnail()) { $output .= "textholder"; }
    $output .= '">';
    $thumb = get_post_thumbnail_id();
    $img_url = wp_get_attachment_url($thumb);

        if(has_post_thumbnail()){
            $output .= '<a href="'.get_permalink().'"  title="'.get_the_title().'">';
            $output .= get_the_post_thumbnail($wp_query->post->ID,'portfolio-4col');
            $output .= '<div class="hovercover">
                        <div class="hovericon"><i class="hoverlink"></i></div>
                    </div>
                    </a>';
        }
        if(!has_post_thumbnail()){
            $excerpt = get_the_excerpt();
            $short_excerpt = string_limit_words($excerpt,30); $output .= '<p>'.$short_excerpt.'..</p>';
        }

    $output .= '</div>
    <a href="'.get_permalink().'">
    <figcaption class="item-description">
    <h5>'.get_the_title().'</h5>';
    $output .= '<span>';
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        $time_string = sprintf( $time_string,esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );
        $output .=  $time_string;
    $output .= '</span>';
    $output .= '</span>';

    $output .= '</figcaption>
    </a>
    </figure>
    </div>
    </li>';
    endwhile;  // close the Loop
    endif;
    $output .= '</ul>
    <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    </div>';
    wp_reset_query();
    return $output;
}

add_shortcode('recent_blog', 'pp_recent_blog');


/**
* Tesimonials shortcode
* Usage: [testimonials limit="4" title="Testimonials" ]
*/

function pp_testimonials($atts, $content ) {
    extract(shortcode_atts(array(
        'limit'=>'4',
        'title' => 'Testimonials',
        'orderby' => 'date',
        'width' => 'eight',
        'place' => 'none'
        ), $atts));

    $randID = rand(1, 99);
    if(empty($width)) { $width = "sixteen"; }

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $wp_query = new WP_Query(
        array(
            'post_type' => array('testimonial'),
            'showposts' => $limit,
            'orderby' => $orderby
            )
        );

    $output = '
    <div class="testimonials_wrap showbiz-container '.$width.' '.$p.' columns">
    <h3 class="headline">'.$title.'</h3>
    <span class="line" style="margin-bottom:0;"></span>

    <!-- Navigation -->
    <div class="showbiz-navigation">
    <div id="showbiz_left_'.$randID.'" class="sb-navigation-left"><i class="icon-angle-left"></i></div>
    <div id="showbiz_right_'.$randID.'" class="sb-navigation-right"><i class="icon-angle-right"></i></div>
    </div>
    <div class="clearfix"></div>

    <!-- Entries -->
    <div class="showbiz" data-left="#showbiz_left_'.$randID.'" data-right="#showbiz_right_'.$randID.'">
    <div class="overflowholder">
    <ul>';
    if ( $wp_query->have_posts() ):
        while( $wp_query->have_posts() ) : $wp_query->the_post();

    $id = $wp_query->post->ID;
    $author = get_post_meta($id, 'pp_author', true);
    $link = get_post_meta($id, 'pp_link', true);
    $position = get_post_meta($id, 'pp_position', true);

    $output .= '<li class="testimonial">';
    $output .= '<div class="testimonials">'.get_the_content().'</div><div class="testimonials-bg"></div>';
    if($link) {
        $output .= ' <div class="testimonials-author"><a href="'.$link.'">'.$author.'</a>';
    } else {
        $output .= ' <div class="testimonials-author">'.$author;
    }
    if($position) { $output .= ', <span>'.$position.'</span>'; }
    $output .= '</div></li>';
    endwhile;  // close the Loop
    endif;
    $output .='</ul>
    <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>';
    wp_reset_query();
    return $output;
}

add_shortcode('testimonials', 'pp_testimonials');


/**
* Happy Tesimonials shortcode
* Usage: [happytestimonials limit="4" title="Testimonials" ]
*/

function pp_happytestimonials($atts, $content ) {
    extract(shortcode_atts(array(
        'limit'=>'4',
        'title' => 'Clients',
        'orderby' => 'date',
        'width' => 'sixteen',
        'place' => 'none',
        ), $atts));

    $randID = rand(1, 99);
    $wp_query = new WP_Query(
        array(
            'post_type' => array('testimonial'),
            'showposts' => $limit,
            'orderby' => $orderby
            )
        );

    if(empty($width)) { $width = "sixteen"; }

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $output = '<!-- Headline -->
    <div class="'.$width.' '.$p.' columns happywrapper">
    <div style="margin-top: -5px;">
    <h3 class="headline">'.$title.'</h3>
    <span class="line" style="margin-bottom: 20px;"></span>
    </div>

    <!-- Navigation / Left -->
    <div id="showbiz_left_'.$randID.'" class="sb-navigation-left-2 alt"><i class="icon-angle-left"></i></div>

    <!-- ShowBiz Carousel -->
    <div id="happy-clients" class="happy-clients showbiz-container  carousel " >

    <!-- Portfolio Entries -->
    <div class="showbiz our-clients" data-left="#showbiz_left_'.$randID.'" data-right="#showbiz_right_'.$randID.'">
    <div class="overflowholder">
    <ul>';
    if ( $wp_query->have_posts() ):
        while( $wp_query->have_posts() ) : $wp_query->the_post();

    $id = $wp_query->post->ID;
    $author = get_post_meta($id, 'pp_author', true);
    $link = get_post_meta($id, 'pp_link', true);
    $position = get_post_meta($id, 'pp_position', true);
    $output .= '<li>';
    $output .= '<div class="happy-clients-photo">'. get_the_post_thumbnail($wp_query->post->ID,'portfolio-thumb').'</div>';
    $output .= '<div class="happy-clients-cite">'.get_the_content().'</div>';
    if($link) {
        $output .= ' <div class="happy-clients-author"><a href="'.$link.'">'.$author.'</a>';
    } else {
        $output .= ' <div class="happy-clients-author">'.$author;
    }
    $output .= '</li>';
                endwhile;  // close the Loop
                endif;
                $output .='</ul>
                <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                </div>
                </div>
                <div id="showbiz_right_'.$randID.'" class="sb-navigation-right-2 alt"><i class="icon-angle-right"></i></div>
                </div>';
                wp_reset_query();
                return $output;
            }

            add_shortcode('happytestimonials', 'pp_happytestimonials');


/**
* Team members shortcode
* Usage: [team title="Team" ]
*/

function pp_team($atts, $content ) {
    extract(shortcode_atts(array(
        'limit'=>'4',
        'title' => 'Team',
        'members' => '',
        ), $atts));

    $randID = rand(1, 99);

    if(!empty($members)) {
        $members = explode(",", $members);
        $args = array(
            'post_type' => array('team'),
            'showposts' => $limit,
            'post__in' => $members,
            );
    } else {
     $args = array(
        'post_type' => array('team'),
        'showposts' => $limit,

        );
 }
 $wp_query = new WP_Query($args);

 $output = '
 <div class="team showbiz-container">
 <!-- Headline -->
 <h3 class="headline">'.$title.'</h3>
 <span class="line" style="margin-bottom:0;"></span>

 <!-- Navigation -->
 <div class="showbiz-navigation">
 <div id="showbiz_left_'.$randID.'" class="sb-navigation-left"><i class="icon-angle-left"></i></div>
 <div id="showbiz_right_'.$randID.'" class="sb-navigation-right"><i class="icon-angle-right"></i></div>
 </div>
 <div class="clearfix"></div>

 <!-- Entries -->
 <div class="showbiz" data-left="#showbiz_left_'.$randID.'" data-right="#showbiz_right_'.$randID.'">

 <div class="overflowholder">
 <ul>';
 if ( $wp_query->have_posts() ):
    while( $wp_query->have_posts() ) : $wp_query->the_post();

$id = $wp_query->post->ID;
$position = get_post_meta($id, 'pp_position', true);
$social = get_post_meta($id, 'pp_socialicons', true);

$output .= '<li>';
if ( has_post_thumbnail() ) {
    $output .= get_the_post_thumbnail($wp_query->post->ID,'portfolio-3col', array('class' => 'mediaholder team-img'));
}
$output .= '<div class="team-name"><h5>'.get_the_title().'</h5> <span>'.$position.'</span></div>
<div class="team-about"><p>'.get_the_content().'</p></div>';

if(!empty($social)){
    $output .= '<ol class="social-icons">';
    foreach ($social as $icon) {
        $output .= '<li><a class="'.$icon['icons_service'].'" href="'.$icon['icons_url'].'"><i class="icon-'.$icon['icons_service'].'"></i></a></li>';
    }
    $output .= '</ol>';
}

$output .= '<div class="clearfix"></div></li>';
                endwhile;  // close the Loop
                endif;

                $output .='</ul>
                <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                </div>
                </div>';
                wp_reset_query();
                return $output;
            }

            add_shortcode('team', 'pp_team');


/**
* Columns shortcode
* Usage: [column width="eight" place="" custom_class=""] [/column]
*/

function pp_column($atts, $content = null) {
    extract( shortcode_atts( array(
        'width' => 'eight',
        'place' => '',
        'custom_class' => ''
        ), $atts ) );

    switch ( $width ) {
        case "1/3" :
        $w = "column one-third";
        break;

        case "2/3" :
        $w = "column two-thirds";
        break;

        case "one" : $w = "one columns"; break;
        case "two" : $w = "two columns"; break;
        case "three" : $w = "three columns"; break;
        case "four" : $w = "four columns"; break;
        case "five" : $w = "five columns"; break;
        case "six" : $w = "six columns"; break;
        case "seven" : $w = "seven columns"; break;
        case "eight" : $w = "eight columns"; break;
        case "nine" : $w = "nine columns"; break;
        case "ten" : $w = "ten columns"; break;
        case "eleven" : $w = "eleven columns"; break;
        case "twelve" : $w = "twelve columns"; break;
        case "thirteen" : $w = "thirteen columns"; break;
        case "fourteen" : $w = "fourteen columns"; break;
        case "fifteen" : $w = "fifteen columns"; break;
        case "sixteen" : $w = "sixteen columns"; break;

        default :
        $w = 'columns eight';
    }

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $column ='<div class="'.$w.' '.$custom_class.' '.$p.'">'.do_shortcode( $content ).'</div>';
    if($place=='last') {
        $column .= '<br class="clear" />';
    }
    return $column;
}

add_shortcode('column', 'pp_column');


/**
* Notice shortcode
* Usage: [noticebox title="Notice" icon="" link=""] [/noticebox]
*/
function pp_noticebox( $atts, $content ) {
    extract(shortcode_atts(array(
        'title' => 'Notice',
        'icon' => '',
        'link' => ''
        ), $atts));
    $output = '';
    if($link) {
        $output .= '<a href="'.$link.'">';
    }

    $output .= '<div class="notice-box"><h3>'.$title.'</h3>';
    if($icon) {
        $output .= '<i class="'.$icon.'"></i>';
    }
    $output .= '<p>'.do_shortcode( $content ).'</p></div>';
    if($link) {
        $output .= '</a>';
    }
    return $output;
}

add_shortcode( 'noticebox', 'pp_noticebox' );


/**
* Tooltip shortcode
* Usage: [tooltip title="" url=""] [/tooltip] // color, gray, light
*/
function pp_tooltip($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => '',
        'url' => '',
        'side' => 'top'
        ), $atts));
    return '<a href="'.$url.'" class="tooltip '.$side.'" title="'.$title.'">'.$content.'</a>';
}

add_shortcode('tooltip', 'pp_tooltip');


/**
* Skillbars shortcode
* Usage: [skillbars] [/skillbars]
*/

function pp_skillbars( $atts, $content ) {
    extract(shortcode_atts(array(), $atts));
    return '<div id="skillzz">'.do_shortcode( $content ).'</div>';
}

add_shortcode( 'skillbars', 'pp_skillbars' );


/**
* Usage: [skillbar title="Web Design 80%" value="80"]
*/
function pp_skillbar( $atts, $content ) {
    extract(shortcode_atts(array(
        'title' => 'Web Design',
        'value' => '80',
        'icon' => ''
        ), $atts));
    return '<div class="skill-bar"><span class="skill-title"><i class="'.$icon.'"></i> '.$title.' </span><div class="skill-bar-value" style="width: '.$value.'%;"></div></div>';
}

add_shortcode( 'skillbar', 'pp_skillbar' );


/**
* Pricing table shortcode
* Usage: [pricing_table featured="no" color="" header="" price="" per=""] [/pricing_table]
*/


function pp_pricing_table($atts, $content) {
    extract(shortcode_atts(array(
        "type" => '',
        "width" => 'four',
        "title" => '',
        "currency" => '$',
        "price" => '',
        "per" => '',
        "buttonstyle" => '',
        "buttonlink" => '',
        "buttontext" => 'Sign Up',
        "place" =>''
        ), $atts));

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $output ='
    <div class="'.$type.' plan '.$width.' '.$p.' columns">
    <h3>'.$title.'</h3>
    <div class="plan-price">
    <span class="plan-currency">'.$currency.'</span>
    <span class="value">'.$price.'</span>
    <span class="period">'.$per.'</span>
    </div>
    <div class="plan-features">'.do_shortcode( $content );
    if($buttonlink) {
        $output .=' <a class="button '.$buttonstyle.'" href="'.$buttonlink.'">'.$buttontext.'</a>';
    }
    $output .=' </div>
    </div>';
    return $output;
}

add_shortcode('pricing_table', 'pp_pricing_table');


/**
* Box shortcodes
* Usage: [box type=""] [/box]
*/

function pp_box($atts, $content = null) {
    extract(shortcode_atts(array(
        "type" => ''
        ), $atts));
    return '<div class="notification closeable '.$type.'"><p>'.do_shortcode( $content ).'</p><a class="close" href="#"></a></div>';
}

add_shortcode('box', 'pp_box');


/**
* Social icons shortcodes
*
*/

function pp_social_icon($atts) {
    extract(shortcode_atts(array(
        "service" => 'facebook',
        "url" => ''
        ), $atts));
    $output = '<li><a class="'.$service.'" href="'.$url.'"><i class="icon-'.$service.'"></i></a></li>';
    return $output;
}

add_shortcode('social_icon', 'pp_social_icon');


function pp_social_icons($atts,$content ) {
 extract(shortcode_atts(array( 'title'=>"Social Icons"), $atts));
 $output = '<ul class="social-icons clearfix">'.do_shortcode( $content ).'</ul>';
 return $output;
}

add_shortcode('social_icons', 'pp_social_icons');


/**
* Toggle shortcodes
* Usage: [toggle title="" open="no"] [/toggle]
*/

function pp_toggle( $atts, $content ) {
    extract(shortcode_atts(array(
        'title' => '',
        'open' => 'no'
        ), $atts));
    if($open != 'no') { $opclass = "opened"; } else { $opclass = ''; }
    return ' <div class="toggle-wrap"><span class="trigger '.$opclass.'"><a href="#"><i class="toggle-icon"></i> '.$title.'</a></span><div class="toggle-container"><p>'.do_shortcode( $content ).'</p></div></div>';
}

add_shortcode( 'toggle', 'pp_toggle' );


/**
* List style shortcode
* Usage: [list type="check"] [/list] // check, arrow, checkbg, arrowbg
*/
function pp_liststyle($atts, $content = null) {
    extract(shortcode_atts(array(
        "type" => 'check'
        ), $atts));

    switch ($type) {
        case 'check':
        $list = 'list-1';
        break;
        case 'arrow':
        $list = 'list-2';
        break;
        case 'checkbg':
        $list = 'list-3';
        break;
        case 'arrowbg':
        $list = 'list-4';
        break;
        default:
        $list = 'list-1';
        break;
    }
    return '<div class="'.$list.'">'.$content.'</div>';
}

add_shortcode('list', 'pp_liststyle');


/**
* Google map shortcodes
* Usage: [googlemap width="100%" height="250px" address="New York, United States"]
*/

function fn_googleMaps($atts, $content = null) {
    extract(shortcode_atts(array(
      "width" => '100%',
      "height" => '250px',
      "address" => 'New York, United States',
      "zoom" => 13
      ), $atts));
    $output ='<section class="google-map-container"><div id="googlemaps" class="google-map google-map-full" style="height:'.$height.'; width:'.$width.'"></div>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="'.get_template_directory_uri().'/js/jquery.gmaps.min.js"></script>
    <script type="text/javascript">
    jQuery("#googlemaps").gMap({
        maptype: "ROADMAP",
        scrollwheel: false,
        zoom: '.$zoom.',
        markers: [
        {
            address: \''.$address.'\',
            html: "",
            popup: false,
        }
        ],
    });
</script></section>';
return $output;
}

add_shortcode("googlemap", "fn_googleMaps");

/**
* Recent work shortcode
* Usage: [clients_carousel title="Recent Work" ] [/clients_carousel]
*/
function pp_clients_carousel($atts, $content ) {
    extract(shortcode_atts(array(
        'title' => 'Clients',
        'subtitle' => 'Check for who we worked!',
        'width' => 'sixteen',
        'place' => 'center'
        ), $atts));

    $output = '';
    $width_arr = array(
        'sixteen' => 16, 'fifteen' => 15, 'fourteen' => 14, 'thirteen' => 13, 'twelve' => 12, 'eleven' => 11, 'ten' => 10, 'nine' => 9,
        'eight' => 8, 'seven' => 7, 'six' => 6, 'five' => 5, 'four' => 4, 'three' => 3
        );

    if(empty($width)) { $width = "sixteen"; }

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }

    $carousel_width = $width_arr[$width] - 2;
    $carousel_key_width = array_search ($carousel_width, $width_arr);
    $output .= '
    <div class="'.$width.' columns '.$p.'">
    <div>
    <h3 class="headline">'.$title.'</h3>
    <span class="line" style="margin-bottom:0;"></span>
    </div>

    <!-- Navigation / Left -->
    <div class="one carousel column alpha"><div id="showbiz_left_2" class="sb-navigation-left-2"><i class="icon-angle-left"></i></div></div>

    <!-- ShowBiz Carousel -->
    <div id="our-clients" class="our-clients-cont showbiz-container '.$carousel_key_width.' carousel columns" >

    <!-- Portfolio Entries -->
    <div class="showbiz our-clients" data-left="#showbiz_left_2" data-right="#showbiz_right_2">
    <div class="overflowholder">';
    $output .= do_shortcode( $content );
    $output .='<div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    <!-- Navigation / Right -->
    <div class="one carousel column omega"><div id="showbiz_right_2" class="sb-navigation-right-2"><i class="icon-angle-right"></i></div></div></div>';
    return $output;
}

add_shortcode('clients_carousel', 'pp_clients_carousel');


//woocommerce custom shortcodes


/**
 * Recent Products shortcode
 *
 * @access public
 * @param array $atts
 * @return string
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    function astrum_woocommerce_recent_products( $atts, $content ) {
        extract(shortcode_atts(array(
            'title' => 'Recent Products',
            'orderby'=> 'date',
            'order'=> 'DESC',
            'per_page'  => '12',
            'width' => 'sixteen',
            'place' => 'center',
            ), $atts));

    $randID = rand(1, 99); // Get unique ID for carousel

    if(empty($width)) { $width = "sixteen"; } //set width to 16 even if empty value

    switch ( $place ) {
        case "last" :
        $p = "omega";
        break;

        case "center" :
        $p = "alpha omega";
        break;

        case "none" :
        $p = " ";
        break;

        case "first" :
        $p = "alpha";
        break;
        default :
        $p = ' ';
    }
    $args = array(
        'suppress_filters' => false,
        'post_type' => 'product',
        'post_status' => 'publish',
        'ignore_sticky_posts'   => 1,
        'posts_per_page' => $per_page,
        'orderby' => $orderby,
        'order' => $order,
        'meta_query' => array(
            array(
                'key' => '_visibility',
                'value' => array('catalog', 'visible'),
                'compare' => 'IN'
                )
            )
        );
    $output = '
    <div class="'.$width.' columns '.$p.'">
    <div>
    <h3 class="headline">'.$title.'</h3>
    <span class="line" style="margin-bottom:0;"></span>
    </div>
    <!-- ShowBiz Carousel -->
    <div id="recent-work" class="showbiz-container recent-work ">

    <!-- Navigation -->
    <div class="showbiz-navigation">
    <div id="showbiz_left_'.$randID.'" class="sb-navigation-left"><i class="icon-angle-left"></i></div>
    <div id="showbiz_right_'.$randID.'" class="sb-navigation-right"><i class="icon-angle-right"></i></div>
    </div>
    <div class="clearfix"></div>

    <div class="showbiz" data-left="#showbiz_left_'.$randID.'" data-right="#showbiz_right_'.$randID.'">
    <!-- Portfolio Entries -->
    <div class="overflowholder">
    <ul>';
    $products = get_posts( $args );
    if ( $products ) :
        foreach( $products as $productshop ) : setup_postdata($productshop);
    $output .= '
    <li>
    <div class="portfolio-item media">
    <figure>
    <div class="mediaholder">';
    if ( has_post_thumbnail($productshop->ID)) {
        $output .=  '<a href="'.get_permalink($productshop->ID).'" >';
        $output .= get_the_post_thumbnail($productshop->ID,'portfolio-4col');
        $output .=  '
        <div class="hovercover">
        <div class="hovericon"><i class="hoverlink"></i></div>
        </div>
        </a>';
    }
    $output .= '
    </div>
    <a href="'.get_permalink($productshop->ID).'" >
    <figcaption class="item-description">
    <h5>'.get_the_title($productshop->ID).'</h5>';
    $product = get_product( $productshop->ID );
    $output .=  $product->get_price_html();
    $output .= '
    </figcaption>
    </a>
    </figure>
    </div>
    </li>';
    endforeach; // end of the loop.
    endif;
    $output .='</ul>
    <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    </div>';
    return $output;
}
add_shortcode('astrum_recent_products', 'astrum_woocommerce_recent_products');

    } ?>