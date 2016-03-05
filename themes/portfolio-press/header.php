<?php
/**
 * @package WordPress
 * @subpackage Portfolio Press
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
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
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta property="fb:admins" content="145110692202190"/>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29327181-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php wp_head(); ?>
<script type="text/javascript" src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/b_code.js"></script>
</head>

<body <?php body_class(); ?>>
<!-- b_code FACEBOOK JAVASCRIPT SDK INT. -->	
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- b_code END FACEBOOK JAVASCRIPT SDK INT. -->
<div id="wrapper">
	<header id="branding">
    	<div class="col-width">
        <?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<hgroup id="logo">
				<<?php echo $heading_tag; ?> id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <?php if ( of_get_option('logo', false) ) { ?>
					<img src="<?php echo of_get_option('logo'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
				<?php } else {
					bloginfo( 'name' );
				}?>
                </a>
                </<?php echo $heading_tag; ?>>
				<?php if ( !of_get_option('logo', false) ) { ?>
                	<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php } ?>
			</hgroup>
      
			<nav id="navigation">
				<h3 class="screen-reader-text"><?php _e( 'Main menu', 'portfoliopress' ); ?></h3>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'portfoliopress' ); ?>"><?php _e( 'Skip to content', 'portfoliopress' ); ?></a></div>
		
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
			</nav><!-- #access -->
			<div id="myDescription">
				<p id="myTagLine"><?php bloginfo( 'description' ); ?></p>
				<p class="mDT">If you need a photo taken, or a video to post, or even a quick blogging website, Digital Tip Media can guarantee 100% satisfaction with what ever project you have in mind.</p>
				<p class="mDT">If you have any question or comments or would like a quote please visit our <a href="http://digitaltipmedia.com/contact/" title="Contact">Contact</a> page.</p>
				<br/>
				<a href="https://twitter.com/digitaltipmedia" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @digitaltipmedia</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</div>
	</header>
	<div id="fbtwCase">
		<div id="fbtwIcon">
			<a target="_blank" href="http://www.facebook.com/digitaltipmedia/" title="Facebook for Digital Tip Media"><img src="<?php bloginfo( 'template_directory' ); ?>/images/fb.png" alt="FaceBook" width="60"/></a>
			<a target="_blank" href="http://www.twitter.com/digitaltipmedia/" title="Twitter for Digital Tip Media"><img src="<?php bloginfo( 'template_directory' ); ?>/images/tw.png" alt="Twitter" width="60"/></a>
		</div>
		<div id="fbtwArrow">
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/fbArrow.png" alt="Facebook Arrow" />
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/twArrow.png" alt="Twitter Arrow" />
		</div>
	</div>
	<!-- #branding -->
	<div id="main">
		<div class="col-width">
			<div id="donateText" class="donate">
				<h2>Please Contribute!</h2>
				<p>Please donate $1, As Digital Tip Media is taking it first steps into the public arena, a little help is needed. If you could just donate $1 it will help us get on our feet and bring to you more powerfull, more amazing, a more enjoyable product that will set your business apart and enrich your life tremendously!</p>
			</div>
			<div id="donateButton" class="donate">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="QXYM5LNRHU7UW">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
			<p id="donateFooter">Just $1, do it for your business, your community, your country, and your life, Lets make this world a better place and get you what you need!!</p>
		