<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="keywords" content="Jeffrey, Jeff, Bue, Jeff Bue, San Diego, drinking, college area, sdsu, awesometimes, jeffreyey j bue, web, websites, web services, design, development" />

<meta name="author" content="Jeffrey J. Bue" />
<meta property="fb:admins" content="800698813"/>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/postComment.css" type="text/css" rel="stylesheet">
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon">

<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jQuery1.8.3.js"></script>
<script type="text/javascript" src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/transform.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/rotate.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/javascript.js"></script>

</head>
<body>
<div id="wrapper">
	<div id="bigNav">
    	<div id="btn_photo" class="btn"><div class="shimmerPhoto"></div><a href="http://jeffreybue.com/photography/"><span>Photography</span></a></div>
        <div id="btn_video" class="btn"><div class="shimmerPhoto"></div><a href="http://jeffreybue.com/videography/"><span>Videography</span></a></div>
        <div id="btn_web" class="btn"><div class="shimmerPhoto"></div><a href="http://jeffreybue.com/webography/"><span>Webography</span></a></div>
        <div id="btn_contact" class="btn"><div class="shimmerPhoto"></div><a href="http://jeffreybue.com/contact/"><span>Contact</span></a></div>
        </div>
	<div id="mainpic">
	<p id="logInLogOut"><span><?php wp_loginout(); ?></span></p>
	<p id="homeButton"><a href="http://www.jjb.jeffreybue.com" title="Home"><span>Home</span></a></p>
    </div>
    <div id="sm">
		<ul>
            <li id="facebook"><a target="_blank" href="http://www.facebook.com/jeffreyjbue" alt="My Facebook" title="My Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" width="100" height="100" /></a><span class="title">Facebook</span></li>
            <li id="twitter"><a target="_blank" href="http://www.twitter.com/jeffbue" alt="My Twitter" title="My Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" width="100" height="100" /></a><span class="title">Twitter</span></li>
            <li id="google"><a target="_blank" href="https://plus.google.com/103540084219406037522/about" alt="My Google Plus" title="My Google Plus"><img src="<?php bloginfo('template_directory'); ?>/images/google.png" width="100" height="100" /></a><span class="title">Google Plus</span></li>
            <li id="youtube"><a target="_blank" href="http://www.youtube.com/Buebeer" alt="My You Tube" title="My You Tube"><img src="<?php bloginfo('template_directory'); ?>/images/youtube.png" width="100" height="100" /></a><span class="title">You Tube</span></li>
            <li id="myspace"><a target="_blank" href="http://www.myspace.com/jeffbue" alt="My Myspace" title="My Myspace"><img src="<?php bloginfo('template_directory'); ?>/images/myspace.png" width="100" height="100" /></a><span class="title">Myspace</span></li>
            <li id="linkedin"><a target="_blank" href="http://www.linkedin.com/pub/jeffrey-bue/46/952/7a3" alt="LinkedIn" title="LinkedIn"><img src="<?php bloginfo('template_directory'); ?>/images/linkedin.png" width="100" height="100" /></a><span class="title">Linked In</span></li>
            <li id="buepics"><a target="_blank" href="http://www.buepics.info" alt="My Portfolio" title="My Portfolio"><img src="<?php bloginfo('template_directory'); ?>/images/buepics.png" width="100" height="100" /></a><span class="title">BuePics</span></li>
        </ul>        
    </div>  
	<div id="donate">
		<div id="donateText" class="donate">
			<h2>Please Contribute!</h2>
			<p>Please donate $1, I'm a struggling artist in the game of the world and I'm just asking for a little help. If you could just donate $1 it will help me perfect my craft and bring you more powerfull, more amazing, more enjoying content that will enrich your life tremendously!</p>
		</div>
		<div id="donateButton" class="donate">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="LGGMNMJUMGD6C">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
		<p id="donateFooter">Just $1, do it for you, your community, your country, and your life, Lets make this world a better place!!</p>
	</div>