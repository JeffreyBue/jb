<?php 

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
		padding-bottom: 50px;
	}
	</style>
	";
}

//MENU
	register_nav_menus( array(
			'primary' => 'Primary Menu',
			'side_navigation' => 'Side Navigation'
		) );
//SIDEBAR
	register_sidebar( array(
		'name' => 'Dynamic Sidebar 1',
		'id' => 'ds-1',
		'description' => "Widetized sidebar",
		'before_widget' => '<div id="%1$s" class="widget-container %2$s rightBox clearfix">',
		'after_widget' => '</div></div>',
		'before_title' =>'<h3>',
		'after_title' => '</h3><div class="subNav">' 
		)
	);
//FOOTER	
	register_sidebar( array(
		'name' => 'Footer 1',
		'id' => 'footer-1',
		'description' => "Widetized Footer",
		'before_widget' => '<div class="widget-container grid_3">',
		'after_widget' => '</div></div>',
		'before_title' =>'<h4>',
		'after_title' => '</h4><div class="subNav">' 
		)
	);



?>