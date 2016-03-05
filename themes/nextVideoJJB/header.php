<?php global $theme; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php function wp_initialize_the_theme() { if (!function_exists("wp_initialize_the_theme_load") || !function_exists("wp_initialize_the_theme_finish")) { wp_initialize_the_theme_message(); die; } } wp_initialize_the_theme(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php $theme->meta_title(); ?></title>
<?php $theme->hook('meta'); ?>
<link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/reset.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/defaults.css" type="text/css" media="screen, projection" />
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />

<?php if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>
<?php  wp_head(); ?>
<?php $theme->hook('head'); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29327181-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php body_class(); ?>>
<?php $theme->hook('html_before'); ?>




    

    <div id="header">
 
		<?php if($theme->display('menu_primary')) { ?>
			<div id="headNav" class="clearfix">
				<?php $theme->hook('menu_primary'); ?>
			</div>
		<?php } ?>
		
        <div class="logo">
			<div id="logInLogOut"><?php wp_loginout(); ?></div>
		<h2 class="headerInfo">Premium<br/>Photo, Video, & Web Services</h2>
        <?php if ($theme->get_option('themater_logo_source') == 'image') { ?> 
            <a style="float:left;" href="<?php echo home_url(); ?>"><img src="<?php $theme->option('logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
        <?php } else { ?> 
            <?php if($theme->display('site_title')) { ?> 
                <h1 class="site_title"><a href="<?php echo home_url(); ?>"><?php $theme->option('site_title'); ?></a></h1>
            <?php } ?> 
            
            <?php if($theme->display('site_description')) { ?> 
                <h2 class="site_description"><?php $theme->option('site_description'); ?></h2>
            <?php } ?> 
        <?php } ?> 
		<h2 class="headerInfo">Jeffrey J. Bue<br/>(801) 918-8523<br/>San Diego, Ca</h2>
        </div><!-- .logo 

        <div class="header-right">
            <?php $theme->option('header_banner'); ?> 
        </div><!-- .header-right -->
        
    <!-- #header -->
    
    <?php if($theme->display('menu_secondary')) { ?>
        <div class="clearfix">
            <?php $theme->hook('menu_secondary'); ?>
        </div>
    <?php } ?>
	</div>

<div id="container" >	