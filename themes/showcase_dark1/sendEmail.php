<?php
	
	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$url = $_POST['url'];
	$comments = $_POST['comments'];
	
	$site_owners_email = 'hello@showcase.com'; // Replace this with your own email address
	$site_owners_name = 'Showcase Template'; // replace with your name
	
	  $htmlBody =
	  "<html>
	  <body>
<b>This is a message from the contact form on your website</b>
<p>$url</p> <p>$comments</p>
</body>
</html>";



	
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name";	
	}
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address";	
	}
	
	if (strlen($comments) < 3) {
		$error['comments'] = "Please leave a comment.";
	}
	
	if (!$error) {
		
		require_once('phpMailer/class.phpmailer.php');
		$mail = new PHPMailer();
		
		$mail->From = $email;
		$mail->FromName = $name;
		$mail->Subject = "Website Contact Form";
		$mail->AddAddress($site_owners_email, $site_owners_name);
		$mail->Body = $htmlBody;
		$mail->IsHTML(true);

		
		
		
		
		// GMAIL STUFF
		
		$mail->Mailer = "smtp";
		$mail->Host = "mail.yourdomain.com";
		$mail->Port = 587;
		$mail->SMTPSecure = "tls"; 
		
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "your@email.com"; // SMTP username
		$mail->Password = "yourpassword"; // SMTP password
		
		$mail->Send();
		
		echo 'OK';
		
	} # end if no error
	else {

		$response = (isset($error['name'])) ? "<li>" . $error['name'] . "</li> \n" : null;
		$response .= (isset($error['email'])) ? "<li>" . $error['email'] . "</li> \n" : null;
		$response .= (isset($error['comments'])) ? "<li>" . $error['comments'] . "</li>" : null;
		
		echo $response;
	} # end if there was an error sending

?>