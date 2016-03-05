<?php get_header(); ?>
<div id="blogginDiv">
	<?php get_sidebar(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <div class="entry">
                <?php the_content('...Read More'); ?>
            </div>
		</div>
</div>		
<?php
	get_footer();
?>