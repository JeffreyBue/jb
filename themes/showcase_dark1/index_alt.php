<?php 
/*
Template Name: home3d
*/
	get_header();
?>
<script type="text/javascript">
		var flashvars = {};
		flashvars.xml = "<?php bloginfo('template_url'); ?>/xml/config.xml";
		flashvars.font = "<?php bloginfo('template_url'); ?>/flash/font.swf";
		var attributes = {};
		attributes.wmode = "transparent";
		attributes.id = "slider";
		swfobject.embedSWF("<?php bloginfo('template_url'); ?>/flash/cu3er.swf", "cu3er-container", "960", "400", "9", "<?php bloginfo('template_url'); ?>/flash/expressInstall.swf", flashvars, attributes);
	</script>
<!-- 3d flash-->
<div id="homeFlashWrap">
  <div class="container_12">
    <div id="cu3er-container"> <a href="http://www.adobe.com/go/getflashplayer" style="display:block; text-align:center; margin-top:180px;"> <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /> </a> </div>
  </div>
</div>
<!-- end 3d flash-->
<!-- PROMO ITEMS-->
<div class="container_12 clearfix">
  <div class="grid_4 promo"> <img src="<?php bloginfo('template_url'); ?>/images/promo1.jpg" width="300" height="100" alt="promo" />
    <h3>Promote your services</h3>
    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est.</p>
    <p><a class="button pngFix" href="#">Find out more</a></p>
  </div>
  <div class="grid_4 promo"> <img src="<?php bloginfo('template_url'); ?>/images/promo2.jpg" width="300" height="100" alt="promo" />
    <h3>Full of features</h3>
    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est.</p>
    <p><a class="button pngFix" href="#">Find out more</a></p>
  </div>
  <div class="grid_4 promo"> <img src="<?php bloginfo('template_url'); ?>/images/promo3.jpg" width="300" height="100" alt="promo" />
    <h3>Showcase in style</h3>
    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est.</p>
    <p><a class="button pngFix" href="#">Find out more</a></p>
  </div>
</div>
<!-- END PROMO ITEMS -->
<!-- NEWS TICKER -->
<div class="container_12 tickerWrap">
  <div class="newsticker clearfix"> <a href="#" class="tickerTitle">Latest news</a> <strong>|</strong> <span class="tickerLink"> <a href="#">This is a news ticker that fades your latest news items and acts as a link to the relavant news article</a> <a href="#">A nice area to add quick updates</a> </span> </div>
</div>
<!-- END NEWS TICKER -->
<?php get_footer(); ?>