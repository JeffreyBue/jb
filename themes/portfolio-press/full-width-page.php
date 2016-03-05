<?php
/**
 * Template Name: Full-width Page
 * Description: A full-width template with no sidebar
 *
 * @package WordPress
 * @subpackage Portfolio Press
 */

get_header(); ?>

	<div id="primary" class="full-width">
		<div id="content" role="main">

			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'portfoliopress' ) . '&after=</div>' ); ?>
					<?php edit_post_link( __( 'Edit', 'portfoliopress' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

			
<!-- Jeff's Edit for posting more post -->
			<?php
				if( is_page('photography') ){$whichPage = 6;}
				else if( is_page('videography') ){ $whichPage = 9;}
				else if( is_page('webography') ){ $whichPage = 10;}
if($whichPage){				
				query_posts( array( 'cat' => $whichPage, 'paged' => get_query_var('paged') ) ); 
			?>
			<div class="frontDiv">
					<?php 	// set $more to 0 in order to only get the first part of the post
						global $more;
						$more = 0;
						if(function_exists('wp_paginate')) {
							wp_paginate();
						};	
					?>
			        <?php 
						if ( have_posts() ) : while ( have_posts() ) : the_post();
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
						endwhile;
						if(function_exists('wp_paginate')) {
							wp_paginate();
						};	
						wp_reset_query();
								else:
					?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
			</div>
<?php }; ?>			
<!-- END Jeff's Edit for posting more post -->			
			
			
			<?php comments_template( '', true ); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>