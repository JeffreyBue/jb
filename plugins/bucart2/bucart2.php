<?php
/*
Plugin Name: BUCART2 validation for forms.
Version: 1.5
Plugin URI: http://jeffreybue.com
Description: Adds validation to any form. Options to set Action and Return Url. 
Author: Jeffrey Bue
Author URI: http://jeffreybue.com
*/

add_action('admin_menu', 'bucart_admin_actions');


function bucart_admin_actions() {
	add_options_page('bu-cart', 'BUCART', 'manage_options', __FILE__, 'bucart_admin');
}
	 
function bucart_admin() {

?>
<style>
.wrap p, .wrap ul li{
	font-size: 18px;
	line-height: 22px;
}
</style>
	<div class="wrap">
		<h1>BuCart</h1>
		<p>This plugin provides Client(javascript) and Server(php) side validation.</p>
		<p>To enable Client side Validation you must have a class of BUCART on the form. example: <b>class="BUCART"</b></p>
		<p>To enable Server side validation name the form with BUCART example: <b>name="BUCART"</b> and have a class of BUCART</p>
		<p>If you have an action on the form, the form will submit to that action and not use serverside validation.</p>
		<p>These scripts are enabled:</p>
		<p style="padding-left:20px;">
			validate.js<br/>
			script.js<br/>
			style.css
		</p>
		<p>Use shortcode <b>[buCaptcha]</b> for captcha code and input field.</p>
		<p>With Server side validation enabled, the lead is sent according to the hidden input values provided in the form. You have to create your own form.</p>
		<p>If you have a serverside validation, you'll need to supply a few hidden inputs:</p>
		<ul style="text-indent:20px;">
			<li>
				&lt;input type="hidden" name="whereTo" value="('salesforce or ontraport')" /&gt;<br/>
				<i style="display:block;text-indent:40px;">Where the lead gets sent. These values get set int eh validate.php file</i>
			</li>
			<li>
				&lt;input type="hidden" name="retUrl" value="('any URL')" /&gt;
				<i style="display:block;text-indent:40px;">Where ever you want the user to go if the form is valid and submits, example would be a custom thank you page.</i>
			</li>
		</ul>
		<p>For your error message element use the class of <b>'BU_error'</b></p>
		<p>For your success message element use the class of <b>'BU_ok'</b></p>
		<p>For a loading gif image, use the class of <b>loading</b></p>
	</div>
<?php
};

function theme_name_scripts() {
	wp_enqueue_script( 'scriptVal', plugins_url('validate.js', __FILE__), array(jquery));
	wp_enqueue_script( 'scriptCust', plugins_url('script.js', __FILE__), array(jquery));
	wp_enqueue_style( 'style', plugins_url('style.css', __FILE__) );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


//CAPTCHA SHORTCODE
function buCaptcha_func( $atts ){
					$a = shortcode_atts( array(
						'height' => '80',
						'width' => '240',
					), $atts );
					
					
					$date = date("Ymd");
					$rand = rand(0,9999999999999);
					$height = $a['height'];
					$width  = $a['width'];
					$img    = "$date$rand-$height-$width.jpgx";

					$outputCaptcha = "<input id='imgCode' type='hidden' name='BU_img' value='$img'>";
					$outputCaptcha .= "<img id='imgCap' src='http://www.opencaptcha.com/img/$img' height='$height' alt='captcha' width='$width' border='0' /></a><br/><br />";
					$outputCaptcha .= "<input id='BU_code' type='text' name='BU_code' value='Enter The Code' size='35' /><br/>";
					
					return $outputCaptcha;
}
add_shortcode( 'buCaptcha', 'buCaptcha_func' );

?>