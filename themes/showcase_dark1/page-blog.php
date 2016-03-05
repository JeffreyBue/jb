<?php 
/*
Template Name: Blog_Temp
*/
	get_header();
?>
<div id="mainWrap">
	<div class="container_12 clearfix" id="main">
		<div class="grid_12" id="pageHeader">
			<h1>Blog</h1>
			<p>Digital Tip Media's latest Blogs</p>
		</div>
		<div class="grid_8" id="left">
<?php
	query_posts( array( 'post_type' => 'post', 'paged' => get_query_var('paged') ) ); 
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
								wp_reset_query();
								else:
					?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>	  
		</div>
		<?php get_sidebar(); ?>
	</div>

</div>
<?php get_footer(); ?>