<?php
$main_nav = wp_nav_menu( array('theme_location' => 'primary',
							'echo'=>'0',
							'container' => false,
							'fallback_cb'=>'menu_mymenu',
							'menu_class' => 'sf-menu'));

if( $main_nav != ''){
?>
	<div id="page-navigation">
		<?php echo $main_nav; ?>
		<div class="clear"></div>
	</div>
	<div class="shadow-spacer"></div>
<?php } ?>