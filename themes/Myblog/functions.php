<?php 

// SIDEBAR
if ( function_exists('register_sidebar') ) {
    register_sidebar();
};

//COMMENT THEME
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
		<?php 
			echo get_avatar( get_comment_author_email(), 46  ).'<br />';
			comment_time('F j, g:i a');
			comment_text() 
		?>
     </div>
   </li>
<?php
        }

// POST THUMBNAILS
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}

// LOG IN PICTURE
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/screenshot.jpg') no-repeat scroll center top transparent;
		height: 420px;
		width: 320px;
	}
	</style>
	";
}

// META TAG

// PORTFOLIO PRESS FOOTER REGIONS
function portfoliopress_widgets_init() {
	
	register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'portfoliopress' ),
		) );

	register_sidebar( array(
		'name' => __( 'Footer 1', 'portfoliopress' ),
		'id' => 'footer-1',
		'description' => __( "Widetized footer", 'portfoliopress' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>','before_title' =>
		'<h3>','after_title' => '</h3>' )
	);
	
	register_sidebar( array( 'name' => __( 'Footer 2', 'portfoliopress' ),'id' => 'footer-2', 'description' => __( "Widetized footer", 'portfoliopress' ), 'before_widget' => '<div id="%1$s" class="widget-container %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>' ) );
	register_sidebar( array( 'name' => __( 'Footer 3', 'portfoliopress' ),'id' => 'footer-3', 'description' => __( "Widetized footer", 'portfoliopress' ), 'before_widget' => '<div id="%1$s" class="widget-container %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>' ) );
	register_sidebar( array( 'name' => __( 'Footer 4', 'portfoliopress' ),'id' => 'footer-4', 'description' => __( "Widetized footer", 'portfoliopress' ), 'before_widget' => '<div id="%1$s" class="widget-container %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>' ) );
}

add_action( 'init', 'portfoliopress_widgets_init' );

?>