<?php 
	get_header();
?>
<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
<div id="mainWrap">
	<div class="container_12 clearfix" id="main">
		<div class="grid_12" id="pageHeader">
			<h1><?php the_title(); ?></h1>
			<?php $custom_field = get_post_custom(); $tag_line = $custom_field['Tag Line'][0]; ?>
			<p><?php echo $tag_line; ?></p>
		</div>	
		<div class="grid_8" id="left">
			<?php the_content(); ?>
		</div>
			<?php 
			if(is_page('about')){
				get_sidebar('about');
				}else{
				get_sidebar(); 
			}
			?>
	</div>
</div>
		<?php endwhile; ?>
<?php endif ?>

<?php get_footer(); ?>