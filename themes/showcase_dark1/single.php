<?php 
	get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="mainWrap">
  <div class="container_12 clearfix" id="main">
    <div class="grid_12" id="pageHeader">
      <h1><?php the_title(); ?></h1>
	  <?php $custom_field = get_post_custom(); $tag_line = $custom_field['Tag Line'][0]; ?>
      <p><?php echo $tag_line; ?></p>
    </div>
    <div class="grid_8" id="left">
      <div class="post">
        <h4><a href="#">This is a blog single post</a></h4>
        <ul class="postMeta clearFix">
		  <li>By <?php the_author_link(); ?></li>
          <li><?php the_date(); ?></li>
          <li><?php the_category(', '); ?></li>
        </ul>
		<?php the_content(); ?>
      </div>
				<p class="postmetadata">
					<?php the_tags('Tags: ', ' ', '<br />'); ?>
                	<?php echo 'Posted In: '.get_the_category_list(', '); ?> 
                    <?php edit_post_link('| Edit', ''); ?>
                </p>
                <div id="postNavigation">
					<div class="alignRight"><?php next_post_link('Next Post: %link', '%title') ?></div>
					<div class="alignLeft"><?php previous_post_link('Previous Post: %link', '%title') ?></div>
				</div>
    </div>
	<?php get_sidebar(); ?>
  </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
