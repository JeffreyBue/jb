<?php
if(!empty($_POST)){

	if( isset( $_POST['BU_code']) ){
		$validate = file_get_contents("http://www.opencaptcha.com/validate.php?ans=".$_POST['BU_code']."&img=".$_POST['BU_img']);
	
		$date = date("Ymd");
		$rand = rand(0,9999999999999);
		$height = "80";
		$width  = "240";
		$img    = "$date$rand-$height-$width.jpgx";

		if($validate == 'pass'){
			$return['val'] = true;
			$return['img'] = $img;
			$return['catpchaTrue'] = 'checked';
		}
		
	}
		
	if( $return['val'] == true || !isset( $_POST['BU_code'] ) ) {
		
		switch( $_POST['whereTo'] ){
			case 'salesforce':
				$url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
			break;
			case 'ontraport':
				$url = 'https://forms.ontraport.com/v2.4/form_processor.php';
			case 'mailchimp':
				$url = 'jeffreybue.us6.list-manage.com/subscribe/post?u=3bc47cf8806b932bf08089091&amp;id=17f57af2b9';
			break;
		}
		unset($_POST['whereTo']);
		
	
		if(isset($_POST['retUrl'])){
			$return['retUrl'] = $_POST['retUrl'];
			unset($_POST['retUrl']);
		}else{
			$return['retUrl'] = '#';
		}

		$keys = array_keys($_POST);
		$params = '';
		$bodyText = '';
		foreach($keys as $key){
			$params .= $key.'='.$_POST[$key].'&';
			$bodyText .= '<p>'.$key.': <b>'.$_POST[$key].'</b></p>';
		}

		$return['params'] = $params;
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		//WARNING: this would prevent curl from detecting a 'man in the middle' attack
		//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$json_response = curl_exec($curl);


		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$return['status'] = $status;
		$return['json_response'] = $json_response;
   
		if ($status == 200 || $status == 302) {
			curl_close($curl);
			require('class.phpmailer.php');
			$mail = new PHPMailer();
			$mail->IsSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.jeffreybue.com';  // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'bue@jeffreybue.com';                            // SMTP username
			$mail->Password = 'Backl7ght';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 587;                            
			
			$mail->From = 'bue@jeffreybue.com';
			$mail->FromName = 'Contact';
			$mail->AddAddress('jeffbue@yahoo.com', 'Jeff Bue');			// Add a recipient
			$mail->AddAddress('8019188523@vtext.com', 'My Phone');			// Add a recipient
			$mail->AddReplyTo('bue@jeffreybue.com', 'Information');
			
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->IsHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = 'Contact From JeffreyBue.com';
			$mail->Body    = $bodyText;
			$mail->AltBody = $params;
			
			if($mail->Send()) {
				$return['mailer'] = 'Email Sent';
			}else{
				$return['mailer'] = $mail->ErrorInfo;
			}

			$return['img'] = $img;
			$return['val'] = true;
			

		}else{
			$return['val'] = false;
			$return['img'] = $img;
		};
		

	}else{
		$return['val'] = false;
		$return['img'] = $img;
	};

	echo json_encode($return);
    
}
?>
