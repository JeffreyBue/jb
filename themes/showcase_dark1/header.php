<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'portfoliopress' ), max( $paged, $page ) );

	?></title>
<meta name="Author" content="Solid Studio" />
<meta name="Description" content="Showcase template based on the 960 grid" />
<meta name="Keywords" content="template, html template" />
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon">
<!-- Loads in the stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/text.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/960.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/prettyPhoto.css" type="text/css" media="screen, projection" />
<!-- Loads in the javascript -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery_1.3.2.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.lavalamp.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/nevis_700-nevis_700.font.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/swfobject.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.prettyPhoto.js"></script>

<!-- ie6 png fix -->
<!--[if lte IE 6]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie6.css" type="text/css" media="screen, projection" />
	<script src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script>
  	DD_belatedPNG.fix('img, .pngFix, #footer li a, .slideCopy li, .subNav li a, #main li');
	</script>
	<![endif]-->
<!--[if lte IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" type="text/css" media="screen, projection" /><![endif]-->
<?php wp_head(); ?>
</head>
<body>
<!-- header -->
<div id="headerWrap">
  <div id="header" class="container_12">
    <!-- logo -->
    <div class="clearfix">
      <div id="logo" class="pngFix"><a href="/"><img src="<?php bloginfo('template_url'); ?>/images/GD.png" width="390" height="100" alt="Showcase" /></a></div>
      <h1>Lets Get You A Website</h1>
    </div>
    <!-- end logo -->
    <!-- navbar -->
    <div id="navBar">
	<?php $defaults = array('menu' => '3', 'menu_class' => 'lavaLamp', 'depth' => '0');wp_nav_menu($defaults); ?>
     
 <!-- navigation 
      <ul class="lavaLamp">
        <li><a href="/" class="arrowDown pngFix">Home</a>
          <ul>
            <li><a href="index.html">JQuery Cycle Rotator</a></li>
            <li><a href="index_alt.html">Cub3r 3D Slider</a></li>
            <li><a href="#" class="arrowRight pngFix">Sub Menu</a>
              <ul>
                <li><a href="#">Menu Level 3</a></li>
                <li><a href="#">Menu Level 3</a></li>
                <li><a href="#">Menu Level 3</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="/about/" class="arrowDown pngFix">About</a>
          <ul>
            <li><a href="about.html">2 Column Page</a></li>
            <li><a href="page_fullWidth.html">Full Width Page</a></li>
            <li><a href="#">Menu Level 2</a></li>
            <li><a href="#">Menu Level 2</a></li>
            <li><a href="#">Menu Level 2</a></li>
            <li><a href="#" class="arrowRight pngFix">Submenu</a>
              <ul>
                <li><a href="#">Menu Level 3</a></li>
                <li><a href="#">Menu Level 3</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="/portfolio/">Portfolio</a></li>
        <li><a href="/blog/">Blog</a></li>
        <li><a href="/contact/">Contact</a></li>
		<li><a href="/contact/">Tutorials</a></li>
      </ul>
      <!-- end navigation -->


      <!-- search -->
      <div id="search">
        <form id="searchform" method="get" action="###">
          <input id="s" class="field" type="text" name="s" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}"/>
        </form>
      </div>
      <!-- end search -->
    </div>
    <!-- end navbar -->
  </div>
</div>
<div>

</div>
<!-- end header -->