<?php 
	get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="mainWrap">
  <div class="container_12 clearfix" id="main">
    <div class="grid_12" id="pageHeader">
      <h1><?php the_title(); ?></h1>
      <p>
		<?php $custom_field = get_post_custom(); $website = $custom_field[url][0]; ?>
		<a href="http://<?php echo $website; ?>" target="_blank" title="<?php echo $website; ?>"><?php echo $website; ?></a>
	  </p>
    </div>
	<div class="grid_8" id="left">
		<?php the_content(); ?>
	 
				<p class="postmetadata2">
					<?php the_tags('Tags: ', ' ', '<br />'); ?>
                	<?php echo 'Posted In: '.get_the_category_list(', '); ?> 
                    <?php edit_post_link('| Edit', ''); ?>
                </p>
                <div id="postNavigation">
					<div class="alignRight"><?php next_post_link('Next Post: %link', '%title') ?></div>
					<div class="alignLeft"><?php previous_post_link('Previous Post: %link', '%title') ?></div>
				</div>	 
    </div>
	<?php get_sidebar('portfolio'); ?>
  </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
