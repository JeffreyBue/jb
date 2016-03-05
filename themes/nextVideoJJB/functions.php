<?php
 
// LOG IN PICTURE
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('http://jeffreybue.com/wp-content/themes/nextVideoJJB/logInPic.jpg') no-repeat scroll center top transparent;
		height: 420px;
		width: 320px;
	}
	#login {
		padding: 0;
		}
	</style>
	";
}	
?>