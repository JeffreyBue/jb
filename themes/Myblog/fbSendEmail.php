<?php
if( empty($_POST) ){ die('wrong'); }else { 
	$url = trim($_POST['href']);
	$commentID = $_POST['commentID'];
	
	$htmlBody =
	"<html>
	<body>
	<h2>This is a message from Jeffrey Bue</h2>
	<p>There was comment posted on: $url</p>
	<p>Comment ID: $commentID</p>
	<p>Thats All</p>
	</body>
	</html>";

		$to = 'bue@jeffreybue.com';
		$subject = 'Comment On Jeffrey Bue dot Com';
		$message = $htmlBody;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($to, $subject, $message, $headers);
		echo 'OK';
}
?>