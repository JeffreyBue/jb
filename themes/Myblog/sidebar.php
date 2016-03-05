<div id="sidebar">
	<div id="postSideBar">
		<h2>Follow Me On Twitter</h2>
			<p style="text-align:center;">
				<a href="https://twitter.com/jeffbue" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @jeffbue</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</p>
		<h2>Recent Posts</h2>
			<?php
					$args = array('post_type'=> 'post');
					$stuff = get_posts($args);
			?>
			
			<table cellspacing="10">
				<?php	foreach($stuff as $post) : setup_postdata($post); ?>
				<tr>
					<td>
						<?php 
				if ( has_post_thumbnail($id) ) {
				echo get_the_post_thumbnail( $id, array(32,32) );//get_avatar( get_the_author_meta('ID'), 32 );
				} else {
				 echo get_avatar(get_the_author_meta('ID'), 32);
				};
				 ?>
					</td>
					<td>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			
						<p><?php the_time('F j, Y g:i a'); ?></p>
					</td>
				</tr>
				<?php endforeach; wp_reset_query();?>    
			</table>
	</div>
	<a href="<?php bloginfo('url'); ?>/category/uncategorized/" title="All Post" class="moreButton"><span class="moreButtonText">All Post</span></a>
	<div id="websiteSideBar">
		<h2>Latest Websites!</h2>
			<?php
					$args = array('category' => '3', 'numberposts' => 2);
					$stuff = get_posts($args);
					foreach($stuff as $post) : setup_postdata($post);
			?>
				<p>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php the_time('F j, Y g:i a'); ?>
				</p>
			<?php	 endforeach; wp_reset_query(); ?>     
	</div>
	<a href="<?php bloginfo('url'); ?>/category/webography/" title="All Websites" class="moreButton"><span class="moreButtonText">All Websites</span></a>
<?php
		dynamic_sidebar();
?>

</div>