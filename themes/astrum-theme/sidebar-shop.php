<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Nevia
 * @since Nevia 1.0
 */
?>
 <div class="four columns sb">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if (!dynamic_sidebar('shop')) : ?>

	<?php endif; ?>
</div>
