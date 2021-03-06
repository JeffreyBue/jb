<?php get_header() ?>
	<div id="content">
		<div class="padder">
			<?php if($bp_existed == 'true') : ?>
				<?php do_action( 'bp_before_blog_search' ) ?>
			<?php endif; ?>
			<div class="page" id="blog-search">
					<?php if (have_posts()) : ?>
							<?php locate_template( array( '/library/components/headers.php' ), true ); ?>
										<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
											<?php do_action( 'bp_before_blog_post' ) ?>
											<?php bp_wpmu_excerptloop(); ?>
													<?php do_action( 'bp_after_blog_post' ) ?>
										<?php } else { // if not bp detected..let go normal ?>
												<?php wpmu_excerptloop(); ?>
										<?php } ?>
							<?php locate_template( array( '/library/components/pagination.php' ), true ); ?>
			<?php else: ?>
					<?php locate_template( array( '/library/components/messages.php' ), true ); ?>
			<?php endif; ?>
			</div>
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_after_blog_search' ) ?>
		<?php endif; ?>
		</div><!-- .padder -->
	</div><!-- #content -->
			<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
				<?php get_sidebar('bpblog'); ?>
			<?php } else { // if not bp detected..let go normal ?>
				<?php get_sidebar('blog'); ?>
			<?php } ?>
<?php get_footer() ?>