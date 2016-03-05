<?php 
// SIDEBAR
if ( function_exists('register_sidebar') ) {
   register_sidebar();
};

// POST THUMBNAILS
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}

// EXCERPT LENGTH
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// EXCERPT ENDING STRING
function new_excerpt_more($excerpt) {
global $post;
$readMore = '<a href="'.get_permalink($post->ID).'" rel="bookmark" title="'.get_the_title($post->title).'">...READ MORE</a>';
	return str_replace('[...]', $readMore, $excerpt);
}
add_filter('wp_trim_excerpt', 'new_excerpt_more');

// LOG IN PICTURE
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login {
		padding: 30px 0 0 0;
	}
	body.login #login h1 a {
		background: url('http://fasttrac.jeffreybue.com/wp-content/gallery/main-slide-show/1.png') no-repeat scroll center top transparent;
		height: 290px;
		width: 320px;
	}
	</style>
	";
}



?>