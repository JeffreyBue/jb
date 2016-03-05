<?php 
	get_header();
?>
<div id="mainWrap">
	<div class="container_12 clearfix" id="main">
		<div class="grid_12" id="pageHeader">
			<h1>Portfolio</h1>
			<p>Digital Tip Media's Portfolio</p>
		</div>
<?php
	query_posts( array( 'post_type' => 'portfolio', 'paged' => get_query_var('paged') ) ); 
?>	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	?>
	<div class="grid_3 folioItem"> 
		<a rel="prettyPhoto[portfolio]" href="<?php echo $url; ?>" class="lightBox">
			<img src="<?php echo $url; ?>" width="200" height="125" />
		</a>
		<h4><a style="color:#000;" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
		<p><?php the_excerpt(); ?></p>
		<p class="readMore"><a class="button pngFix" href="<?php echo get_permalink(); ?>">More detail</a></p>
    </div>
					<?php 
						endwhile;
					?>
					<div id="portfolioPage">
					<?php
						if(function_exists('wp_paginate')) {
							wp_paginate();
						};
					?>
					</div>
					<?php
						wp_reset_query();
								else:
					?>

					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>