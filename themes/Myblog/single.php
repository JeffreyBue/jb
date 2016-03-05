<?php get_header(); ?>
<div id="blogginDiv">
<div id="fb-root"></div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		    	<h2><a id="postTitle" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="postDateTime"><small><?php the_time('F j, Y g:i a'); ?></small></p>
				<div class="entry">
                	<?php the_content('...Read More'); ?>
				</div>
				<div class="fb-like" data-href="<?php echo get_permalink($post->ID); ?>" data-send="true" data-width="450" data-show-faces="true"></div>				
				<p class="postmetadata">
					<?php the_tags('Tags: ', ' ', '<br />'); ?>
                	<?php echo 'Posted In: '.get_the_category_list(', '); ?> 
                    <?php edit_post_link('| Edit', ''); ?>
                </p>
                <div class="navigation">
					<div class="alignright"><?php next_post_link('Next Post: %link', '%title') ?></div>
					<div class="alignleft"><?php previous_post_link('Previous Post: %link', '%title') ?></div>
				</div>
			</div>
                <hr />

		<!-- b_code: facebook comment plug in with comment count -->
			<iframe src="http://www.facebook.com/plugins/comments.php?href=<?php the_permalink(); ?>&permalink=1" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:16px;" allowTransparency="true"></iframe>  
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="1000"></div>
		<!-- end-b_code -->
				
		<?php endwhile; comments_template();?>
        
		<?php 
			if(function_exists('wp_paginate')) {
				    wp_paginate();
			} 
		?>
		<?php else : ?>
		<?php get_search_form(); ?>
		<?php endif ?>
</div>
<?php
	get_footer();
?>