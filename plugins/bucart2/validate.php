<?php
		$params = '';
		$bodyText = '';
		$uploadPath = '/wp-content/uploads/app/';
		$domain = $_SERVER['HTTP_HOST'];
		
		//WHERE TO ARRAY
		$whereTo = array(
			"salesforce" => "https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
			"ontraport" => "https://forms.ontraport.com/v2.4/form_processor.php"
		);
		
		//MAIL
		$theHost = 'gator3041.hostgator.com';
		$theUsername = 'info@wholesalehempclub.com';
		$thePassword = 'WHC4901dev3';
		$fromEmail = 'info@wholesalehempclub.com';
		$fromName = 'Contact';
		$toName = 'Sales';
		$subject = 'Contact From WholesaleHempClub.com';
		
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
		
		//WHERE TO
		if( isset($_POST['whereTo']) && isset($whereTo) ) {
			foreach($whereTo as $k => $v ){
				if($_POST['whereTo'] == $k){
					$url = $v
				}
			}
			unset($_POST['whereTo']);
		}
		
	
		if(isset($_POST['retUrl'])){
			$return['retUrl'] = $_POST['retUrl'];
			unset($_POST['retUrl']);
		}else{
			$return['retUrl'] = '#';
		}

		$keys = array_keys($_POST);
		foreach($keys as $key){
			$params .= $key.'='.$_POST[$key].'&';
			$bodyText .= '<p>'.$key.': <b>'.$_POST[$key].'</b></p>';
		}

		$return['params'] = $params;
		
		
		// IF UPLOADING A document SAVE IT AND THE IT'S PATH
		if($_FILES['document']['name'] != ''){
			$return['files'] = true;
			$tmp_name = $_FILES["document"]["tmp_name"];
			$mimeType = $_FILES["document"]["type"];
			$name = $_FILES["document"]["name"];
			move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"].$uploadPath.$name);
			
			$picturePath = $_SERVER["DOCUMENT_ROOT"].$uploadPath.$name;
			
			$return['picturePath'] = $picturePath;
			$bodyText .= '<p>Picture Path: <b>'.$domain.$picturePath.'</b></p>';
		}else{
			$return['files'] = false;
		}

//*************************************MAIL TO ************/
		if(isset($mailTo)){
		
			require('class.phpmailer.php');
			$mail = new PHPMailer();
			$mail->IsSMTP();                                      // Set mailer to use SMTP
			$mail->Host = $theHost;  // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = $theUsername;                            // SMTP username
			$mail->Password = $thePassword;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			
			$mail->From = $fromEmail;
			$mail->FromName = $fromName;
			$mail->AddAddress($mailTo, $toName);			// Add a recipient
			
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->IsHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = $subject;
			$mail->Body    = $bodyText;
			$mail->AltBody = $params;
			
			$mail->AddAttachment($picturePath, $name, 'base64', $mimeType); 
			
			if($mail->Send()) {
				$return['mailer'] = 'Email Sent';
			}else{
				$return['mailer'] = $mail->ErrorInfo;
			}
			
		}
//*************************************MAIL TO ************/

//*************************************WHERE TO ************/

		if(isset($url)){
		
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
			curl_close($curl);
		
		}
 
 //*************************************WHERE TO ************/
   
		if ($status == 200 || $status == 302 || $return['mailer'] == 'Email Sent' ) {
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