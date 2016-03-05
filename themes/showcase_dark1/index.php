<?php
/*
	Template Name: home
*/
	get_header();
?>

<!-- HOME SLIDER -->
<div id="sliderWrap">
  <!-- slide backgrounds -->
  <div id="sliderBgWrap">
    <div id="slide1_bg" class="slides_bg"></div>
    <div id="slide2_bg" class="slides_bg"></div>
    <div id="slide3_bg" class="slides_bg"></div>
	<div id="slide4_bg" class="slides_bg"></div>
  </div>
  <!-- END slide backgrounds -->
  <!-- slide arrows-->
  <div id="slideArrows"> <a id="nextSlide" class="pngFix">next</a> <a id="previousSlide" class="pngFix">previous</a>
    <!-- slides -->
    <div id="slidesWrap" class="container_12">
      <!-- slide 1 -->
      <div class="slideWrap">
        <div class="slideImage pngFix">
          <div class="safari"><img src="<?php bloginfo('template_url'); ?>/images/slider/slide1.jpg" width="504" height="298" alt="slide 1" /></div>
        </div>
        <div class="slideCopy">
          <h1>Full of features</h1>
          <p>This template is designed for the ultimate user experience, it includes many features here's just a few</p>
          <ul>
            <li>JQuery enhanced features</li>
            <li>3D flash slider</li>
            <li>Light and Dark versions</li>
            <li>Javascript and PHP contact form</li>
            <li>Wide range of page layouts</li>
          </ul>
        </div>
      </div>
      <!-- end slide 1 -->
      <!-- slide 2 -->
      <div class="slideWrap">
        <div class="slideImage pngFix">
          <div class="safari"><img src="<?php bloginfo('template_url'); ?>/images/slider/slide2.jpg" width="504" height="298" alt="slide 2" /></div>
        </div>
        <div class="slideCopy">
          <h1>Feature heading</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sagittis imperdiet lorem quis blandit. Quisque commodo lobortis dolor, sit amet tincidunt elit ultricies eget. Nulla vulputate nisl lorem, ut pulvinar elit. Class aptent taciti sociosqu ad litora torquent.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sagittis imperdiet lorem quis blandit. Quisque commodo lobortis dolor, sit amet tincidunt elit ultricies eget. Nulla vulputate nisl lorem, ut pulvinar elit.</p>
        </div>
      </div>
      <!-- end slide 2 -->
      <!-- slide 3 -->
      <div class="slideWrap">
        <div class="slideImage pngFix">
          <div class="safari"><a rel="prettyPhoto[portfolio]" href="<?php bloginfo('template_url'); ?>/images/portfolio/big1.jpg" class="lightBox"><img src="<?php bloginfo('template_url'); ?>/images/slider/slide3.jpg" width="504" height="298" alt="slide 3" /></a></div>
        </div>
        <div class="slideCopy">
          <h1>It's show time!</h1>
          <p>Showcase your company in style! Tested on browsers old and new, many options to customize and give your site it's own personality!</p>
          <p>A flexible template with many features including jquery slider, lava menu, png support, custom fonts, lightbox, working contact form, and a wide range of layouts!</p>
          <a class="button2 pngFix" onclick="this.blur(); return false;" href="#"><span class="pngFix">Find out more</span></a> <a class="button2 pngFix" onclick="this.blur(); return false;" href="/contact/"><span class="pngFix">Buy now</span></a> </div>
      </div>
      <!-- end slide 3 -->
      <!-- slide 4 -->
      <div class="slideWrap">
        <div class="slideImage pngFix">
          <div class="safari"><img src="<?php bloginfo('template_url'); ?>/images/slider/slide1.jpg" width="504" height="298" alt="slide 4" /></div>
        </div>
        <div class="slideCopy">
          <h1>Joe Mamma</h1>
          <p>This template is designed for the ultimate user experience, it includes many features here's just a few</p>
          <ul>
            <li>Yeppers enhanced features</li>
            <li>3D flash slider</li>
            <li>Light and Dark versions</li>
            <li>Javascript and PHP contact form</li>
            <li>Wide range of page layouts</li>
          </ul>
        </div>
      </div>
      <!-- end slide 4 -->	  
    </div>
    <!-- END slides -->
  </div>
  <!-- END slide arrows -->
  <!-- slider nav -->
  <div id="sliderNavBg">
    <div id="sliderNavWrap" class="container_12">
      <div id="sliderPagerWrap">
        <div id="sliderPager"></div>
      </div>
    </div>
  </div>
  <!-- end slider nav -->
</div>
<!-- END SLIDER -->
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