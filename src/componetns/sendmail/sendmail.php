<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	$mail->setFrom('from@gmail.com', 'ME'); 

	$mail->addAddress('to@gmail.com'); 

	$mail->Subject = 'Hi';

	
	$body = '<h1>Letter</h1>';

	//if(trim(!empty($_POST['name']))){
		//$body.='';
	//}	
	
	/*
	
	if (!empty($_FILES['image']['tmp_name'])) {
		
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Photo</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;


	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Send!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>
