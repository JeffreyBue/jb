<?php get_header(); ?>
<div id="blogginDiv">
	<?php get_sidebar(); ?>
	<div class="frontDiv">
		<h1 class="headerh1">Latest Media</h1>
		<?php
			$args = array('category' => '7', 'numberposts'=> 2, 'order'=>'DESC');
        	        $web = get_posts($args);
			foreach($web as $post) : setup_postdata($post); 
		?>
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
			endforeach;
		?>
	    <a href="<?php bloginfo('url'); ?>/category/media/" title="More Media" class="moreButton"><span class="moreButtonText">More Media</span></a>
	</div>

	<div class="frontDiv">
		<h1 class="headerh1">Latest Tech</h1>
		<?php
			$args = array('category' => '6', 'numberposts'=> 2, 'order'=>'DESC');
   		        $web = get_posts($args);
			foreach($web as $post) : setup_postdata($post); 
		?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	    	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small><?php the_time('F j, Y g:i a'); ?></small>
			<br/>				
			<div>
				<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
					<p>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail(array(200, 200)); ?>
						</a>
					</p>
				<?php }; ?> 
			</div>
			<div class="frontEntry">
               	<?php the_excerpt(); ?>
			</div>
			<p class="postmetadata">
				<?php the_tags('Tags: ', ' ', '<br />'); ?>
                <?php echo 'Posted In: '.get_the_category_list(', '); ?>
                <?php edit_post_link('Edit', '|'); ?>
            </p>
			<p class="frontMore">
				<small><?php comments_popup_link( 'No comments yet', '1 comment', '% comments') ?></small>
			</p>
		</div>
		<?php
			endforeach;
		?>
    	<a href="<?php bloginfo('url'); ?>/category/tech/" title="More Tech" class="moreButton"><span class="moreButtonText">More Tech</span></a>
	</div>

	<div class="frontDiv">
		<h1 class="headerh1">Blah Blah Blog</h1>
		<?php
			$args = array('category' => '4', 'numberposts'=> 2, 'order'=>'DESC');
            $web = get_posts($args);
			foreach($web as $post) : setup_postdata($post); 
		?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	    	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small><?php the_time('F j, Y g:i a'); ?></small>
			<br/>				
			<div>
				<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
					<p>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail(array(200, 200)); ?>
						</a>
					</p>
				<?php }; ?> 
			</div>
			<div class="frontEntry">
               	<?php the_excerpt(); ?>
			</div>
			<p class="postmetadata">
				<?php the_tags('Tags: ', ' ', '<br />'); ?>
                <?php echo 'Posted In: '.get_the_category_list(', '); ?>
                <?php edit_post_link('Edit', '|'); ?>
            </p>
			<p class="frontMore">
				<small><?php comments_popup_link( 'No comments yet', '1 comment', '% comments') ?></small>
			</p>
		</div>
		<?php
			endforeach;
		?>
    	<a href="<?php bloginfo('url'); ?>/category/blahblog/" title="More Blah" class="moreButton"><span class="moreButtonText">More Blah</span></a>
	</div>
	
</div>
<?php	get_footer(); ?>