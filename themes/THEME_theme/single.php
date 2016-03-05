<?php get_header(); ?>
<div id="blogginDiv">
    <?php get_sidebar(); ?>
	<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <small><?php the_time('F j, Y g:i a'); ?> by <?php the_author(); ?></small>
            <div class="entry">
                <?php the_content('...Read More'); ?>
            </div>
            <p class="postmetadata">
                <?php the_tags('Tags: ', ' ', '<br />'); ?>
                <?php echo 'Posted In: '.get_the_category_list(', '); ?> | 
                <?php edit_post_link('Edit', ''); ?>
            </p>
            <div class="navigation">
                <div class="alignright"><?php next_post_link('Next Post: %link', '%title') ?></div>
                <div class="alignleft"><?php previous_post_link('Previous Post: %link', '%title') ?></div>
            </div>
        </div>
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