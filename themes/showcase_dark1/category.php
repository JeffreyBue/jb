<?php 
	get_header();
?>
<!-- main -->
<div id="mainWrap">
	<div class="container_12 clearfix" id="main">
		<div class="grid_12" id="pageHeader">
			<h1><?php single_cat_title(); ?></h1>
			<p>Categories of Digital Tip Media's latest</p>
		</div>
		<div class="grid_8" id="left">
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>	
		<div class="post">
			<h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
			<ul class="postMeta clearFix">
				<li>By <?php the_author(); ?></li>
				<li><?php the_date(); ?></li>
				<li><?php the_category(', '); ?></li>
			</ul>
			<a rel="prettyPhoto[blogsthumb]" href="<?php echo $url; ?>" class="lightBox" style="width:200px;float:left;margin-right:10px;"><img src="<?php echo $url; ?>" width="200"/></a>
			<?php the_excerpt(); ?>
			<p class="readMore"><a class="button pngFix" href="<?php echo get_permalink(); ?>">Read More</a></p>
		</div>
		
					<?php 
						endwhile;
						if(function_exists('wp_paginate')) {
							wp_paginate();
						};	
					?>
		
					<?php
								else:
					?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>	  
      <!--pager 
      <ul class="pager">
        <li><a href="#" class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
      </ul>
      <!-- end pager  -->
		</div>
		<?php get_sidebar(); ?>
	</div>

</div>
<!-- end main -->
<?php get_footer(); ?>