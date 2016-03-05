<div class="grid_4 clearfix">
    <div id="right">
	
		<div class="rightBox clearfix">
			<h3>related projects</h3>
			<?php
					$args = array('post_type'=> 'portfolio');
					$stuff = get_posts($args);
			?>
			<div class="rpBlocks">
				<?php	foreach($stuff as $post) : setup_postdata($post); ?>
				<div>
					<a href="<?php the_permalink(); ?>">
						<span>
							<?php 
					if ( has_post_thumbnail($id) ) {
					echo get_the_post_thumbnail( $id, array(32,32) );//get_avatar( get_the_author_meta('ID'), 32 );
					} else {
					 echo get_avatar(get_the_author_meta('ID'), 32);
					};
					 ?>
						</span>
					</a>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<br/>
					<?php the_time('F j, Y g:i a'); ?>
				</div>
				<?php endforeach; wp_reset_query();?>    
			</div>
		</div>
		
		<div class="rightBox clearfix">
			<h3>Recent Posts</h3>
			<?php
					$args = array('post_type'=> 'post');
					$stuff = get_posts($args);
			?>
			<div class="rpBlocks">
				<?php	foreach($stuff as $post) : setup_postdata($post); ?>
				<div>
					<a href="<?php the_permalink(); ?>">
						<span>
							<?php 
					if ( has_post_thumbnail($id) ) {
					echo get_the_post_thumbnail( $id, array(32,32) );//get_avatar( get_the_author_meta('ID'), 32 );
					} else {
					 echo get_avatar(get_the_author_meta('ID'), 32);
					};
					 ?>
						</span>
					</a>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<br/>
					<?php the_time('F j, Y g:i a'); ?>
				</div>
				<?php endforeach; wp_reset_query();?>    
			</div>
		</div>
		
		<div class="rightBox clearfix">
			<h3>Categories</h3>
			<div class="subNav">
				<ul>
					<?php
						$args=array(
							'orderby' => 'name',
							'order' => 'ASC'
						);
						$categories=get_categories($args);
						foreach($categories as $category) { 
							echo '<li> <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li> ';
						};
					?> 
				</ul>
          </div>
        </div>
<?php
		dynamic_sidebar();
?>
	</div>
</div>