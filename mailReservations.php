<?php
				session_start();
						
						if(!isset($_SESSION['security_code']) OR !isset($_POST['security_code'])){
							Header('Location: ./reservations.php?captcha=false');	
						}
						elseif ($_SESSION['security_code'] != $_POST['security_code']) {
							Header('Location: ./reservations.php?captcha=false');
						}
						
						unset($_SESSION['security_code']);
							
				
?>


<!DOCTYPE html> 
<html> 
	<head>
		<title>Reservation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	</head> 
<body> 
	
	<?php
// session_start();
         // echo $_SESSION['security_code'];
		// echo $_POST['security_code'];
	
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

		//Get post values
		$firstname = $_POST['prenom'];
		$lastname =$_POST['nom'];
		$email =$_POST['email'];
		//------------
		$event1name=$_POST['cafes'];
		$event1cat1num=$_POST['nb1'];
		//------------
		$event2name=$_POST['spectacles'];
		$event2cat1num=$_POST['nb2'];
		$event2cat2num=$_POST['nb3'];
		//------------
		$event3name=$_POST['balades'];
		$event3cat1num=$_POST['nb4'];
		$event3cat2num=$_POST['nb5'];


	$from = "duranda1.hevs@gmail.com";
	$to = $_POST['email'];
	$copy = "duranda1.hevs@gmail.com";


    $uniqueid= uniqid();
	
	$body="Reservation billet/Tickets buchen - $firstname $lastname ($email)\r-------\r\r";
	
	if($event1cat1num>0)
		$body=$body.$event1cat1num."x ".$event1name." - Adulte/Erwachsene\r";
	
	if($event2cat1num>0)
		$body=$body.$event2cat1num."x ".$event2name." - Adulte/Erwachsene\r";
	
	if($event2cat2num>0)
		$body=$body.$event2cat2num."x ".$event2name." - Enfant/Kind - AVS\r";
	
	if($event3cat1num>0)
		$body=$body.$event3cat1num."x ".$event3name." - Adulte/Erwachsene\r";
	
	if($event3cat2num>0)
		$body=$body.$event3cat2num."x ".$event3name." - Enfant/Kind - AVS\r";
	
	
	$succeed = smtpmailer($email, $from, 'Festival Rilke', 'Reservation billet/Tickets buchen', $body, $uniqueid);

	if ($succeed) {
		

		
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

