<!DOCTYPE html> 
<html> 
	<head>
		<title>Reservation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	</head> 
<body> 
	
	<?php

	include_once ("phpqrcode/qrlib.php");
	include ("phpmailer/class.phpmailer.php");

	function smtpmailer($to, $from, $from_name, $subject, $body, $uniqueid) {
		global $error;
		$mail = new PHPMailer();
		// create a new object
		$mail -> IsSMTP();
		// enable SMTP
		$mail -> SMTPDebug = 0;
		// debugging: 1 = errors and messages, 2 = messages only
		$mail -> SMTPAuth = true;
		// authentication enabled
		$mail -> SMTPSecure = 'ssl';
		// secure transfer enabled REQUIRED for GMail
		$mail -> Host = 'smtp.gmail.com';
		$mail -> Port = 465;
		$mail -> Username = "duranda1.hevs@gmail.com";
		$mail -> Password = "festivalrilke";
		$mail -> SetFrom($from, $from_name);
		$mail -> Subject = $subject;
		$mail -> Body = $body;
		
		// generate QRCode and add it as attachment
		
		QRcode::png($uniqueid.':'.$_POST['email'], 'secure/.' .$uniqueid.'.png');		
		$attachment = 'secure/.'.$uniqueid.'.png';
		$mail -> AddAttachment($attachment, 'qrcode.png');
		
		$mail -> AddAddress($to);
		if (!$mail -> Send()) {
			$error = 'Mail error: ' . $mail -> ErrorInfo;
			return false;
		} else {
			$error = 'Message sent!';
			return true;
		}
	}

	$from = "duranda1.hevs@gmail.com";
	$to = $_POST['email'];
	$copy = "duranda1.hevs@gmail.com";
	// //$from= $_POST['nom'].' '.$_POST['prenom'].' '.$_POST['email'];
	// $from= "duranda1.hevs@gmail.com";
	// $subject ="Reservations billets";
	// $message = "Reservation";
	// //$nb = $_POST['nb'];
	// ini_set('SMTP', 'ssl://smtp.gmail.com');
	// ini_set('smtp_port', '465');
	// $succeed = mail($to, $subject, $message, $from);
    $uniqueid= uniqid();
	$succeed = smtpmailer($to, $from, 'Festival Rilke', 'Reservation billet/Tickets buchen', 'Objet', $uniqueid);

	if ($succeed) {
		
		//Get post values
		
		
		
		
		
		
		//Create XML
		
		
		
		
        echo "<form action='confirmReservations.php' method='post' name='frm'>";
		 foreach ($_POST as $a => $b) {
			 echo "<input type='hidden' name='" . $a . "' value='" . $b . "'/>";
		}
		echo "<input type='hidden' value='".$uniqueid."' name='uniqueid' />";
		
		echo "</form>";
	} else {
		echo "Erreur d'envoi";
	}
	?>
	
<script language="JavaScript">document.frm.submit();</script>




</body> 
</html>

