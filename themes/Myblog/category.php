<?php get_header(); ?>
<h1 class="headerH1">
	<?php if ( is_category('Uncategorized')) : ?>
		All Post
	<?php else : ?>
	Latest <?php single_cat_title();  endif; ?>
</h1>
<div id="blogginDiv">
	<?php get_sidebar(); ?>
	<div class="frontDiv">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		    	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small><?php the_time('F j, Y g:i a'); ?></small>
			<br/>
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
					<p>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail(array(200, 200)); ?>
						</a>
					</p>
			<?php }; ?> 
			<div class="frontEntry">
       		         	<?php the_excerpt(); ?>
			</div>
			<p class="postmetadata">
				<?php the_tags('Tags: ', ' ', '<br />'); ?>
                		<?php echo 'Posted In: '.get_the_category_list(', '); ?>
                    		<?php edit_post_link('Edit', '|'); ?>
                	</p>
			<p class="frontMore">
				<small><?php comments_popup_link(); ?></small>
			</p>
		</div>
		<?php 
		endwhile; 
		
		if(function_exists('wp_paginate')) {
			wp_paginate();
		};	
		
		else:
		?>
    		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    	<?php endif; ?>
    </div>
</div>
<?php
	get_footer();
?>