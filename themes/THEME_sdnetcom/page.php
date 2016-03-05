<?php
	get_header();
?>
<div id="blogginDiv">
        <?php get_sidebar(); ?>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		    	<h2><?php the_title(); ?></h2>
				<div class="entry">
                	<?php the_content('...Read More'); ?>
				</div>
			</div>
		<?php endwhile; ?>
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