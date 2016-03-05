<?php get_header(); ?>
<div id="blogginDiv">
    <?php get_sidebar(); ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <small><?php the_time('F j, Y g:i a'); ?> by <?php the_author(); ?></small>
            <div class="entry">
                <?php the_excerpt(); ?>
            </div>
            <p class="postmetadata">
                <?php the_tags('Tags: ', ' ', '<br />'); ?>
                <?php echo 'Posted In: '.get_the_category_list(', '); ?> | 
                <?php edit_post_link('Edit', ''); ?>
            </p>
	<div class="post-meta-comments">
		<?php comments_popup_link( 'No Comments', '1 Comment','% Comments'); ?>
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