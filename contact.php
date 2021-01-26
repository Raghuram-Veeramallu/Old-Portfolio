<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	$sender = 'hsrv.portfolio.automatic@gmail.com';
	$senderName = 'Portfolio';

	$errors = '';
	$limit_size=10000000;
	$myemail = 'harisairaghuramv@gmail.com';
	if(empty($_POST['name'])  ||
	   empty($_POST['email']) ||
	   empty($_POST['message']))
	{
	$errors .= "\n Error: Required Field";
	}	

    /*data*/
	// $name = $_POST['name'];
	// $email = $_POST['email'];
	// $message = $_POST['message'];
	// $headers = "From: $email";

	$name = "Raghuram";
	$email = "mightyram99@gmail.com";
	$message = "Sample test message";
	$headers = "From: $email";

	// if (!eregi(
	// "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
	// {
	// $errors .= "\n Error: Invalid Email Address";
	// }

	// if( empty($errors))
	// {
	$to = $myemail;
	$email_subject = "[Portfolio Contact]: $subject";
	$txt = "
			Hi Raghu,\n\n
			
			You have received a new message from your portfolio.\n
			Details are given below.\n
			Name: $name \n
			Email: $email \n
			Message: \n $message
			\n\n
			Best
			";
	$email_subject = "Test Mail";
	$txt = "Checking formatting. \n Thnx";
	
	// preparing attachments
	// $files = array();
    // if($file_one)
    //  {
	// 	 array_push($files,$file_one);
	//  }	  
	 
	//   $semi_rand = md5(time()); 
	//   $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
	//   $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	//   $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $txt . "\n\n"; 
	//   $message .= "--{$mime_boundary}\n";
	  
    //   for($x=0;$x<count($files);$x++){
	// 	  $file = fopen('tmp/'.$files[$x],"rb");
	// 	  $data = fread($file,filesize('tmp/'.$files[$x]));
	// 	  fclose($file);
	// 	  $data = chunk_split(base64_encode($data));
	// 	  $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" . 
	// 	  "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" . 
	// 	  "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
	// 	  $message .= "--{$mime_boundary}\n";
	//   }
 
	$usernameSmtp = 'AKIAS3L3V2MGNJNSXQER';
	$passwordSmtp = 'BGqYziFVcqUtaakhINIg6zSyue5kdy+oOKlR911t3h9C';
	$host = 'email-smtp.us-east-2.amazonaws.com';
	$port = 587;

	// mail($to, $email_subject, $message, $headers);

	$mail = new PHPMailer(true);

	try{
		$mail->isSMTP();
		$mail->setFrom($sender, $senderName);
		$mail->Username   = $usernameSmtp;
		$mail->Password   = $passwordSmtp;
		$mail->Host       = $host;
		$mail->Port       = $port;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = 'tls';
		$mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

		$mail->addAddress($to);
		// You can also add CC, BCC, and additional To recipients here.

		$mail->isHTML(true);
		$mail->Subject    = $email_subject;
		$mail->Body       = $txt;
		$mail->Send();
		echo "Email sent!" , PHP_EOL;
	} catch (phpmailerException $e) {
		echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
	} catch (Exception $e) {
		echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
	}
	// }
?>
