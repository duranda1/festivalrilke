<!DOCTYPE html>
<html>
	<head>
		<title>Reservation</title>
		<?php
		include ('init.php');
		?>
	</head>
	<body>
		<?php
		include ('header.php');
		?>
		<a href="./index.php" data-role="button"  data-theme="a">
		<div class="retourAuMenu">
			Retour au menu
		</div></a>
		<div data-role="content" data-theme="a">
			<div class="contentZone">
				<h3>
				<div class="reservationConfirm1">
					Confirmation
				</div></h3>
				<span class="mainTitle"> <span style="font-weight:bold" class="reservationConfirm2"> <?php
				

				//$uniqueid= uniqid();

				//include_once('phpqrcode/qrlib.php');

				if (isset($_POST['email'], $_POST['uniqueid'])) {
					$languageMap;
					if (isset($_COOKIE["langue"])) {
						$languageMap = $_COOKIE["langue"];
					} else {
						$languageMap = "fr";
					}

					$imgid = $_POST['uniqueid'];
					$email = $_POST['email'];
					//QRcode::png($uniqueid.':'.$_POST['email'], 'secure/.' .$uniqueid.'.png');
					//$qrcode = QRcode::png('code data text',false);
					//imagepng($qrcode);

					if ($languageMap = "de") {
						echo "Eine Bestätigung per E-Mail hat sich auf $email. versandt. Vielen Dank für Ihre Buchung!<br/><br/>Zur Erleichterung der Entfernung von Tickets, legen Sie bitte die qrcode unten an der Kasse. Es ist auch in Ihrer E-Mail Resevation enthalten";
					} else {
						echo "Un mail de confirmation à été envoyé à $email. Merci pour votre réservation!<br/><br/>Afin de faciliter le retrait de vos billets, veuillez présenter le QRcode ci-dessous à la caisse. Celui-ci est également inclus dans votre email de résevation";
					}

					echo "
				<br/>
				<br/>";

					echo "<img src=\"secure/.".$imgid.".png\"></img>";

					//QRcode::png(uniqid() . ':' . $_POST['email']); // creates code image and outputs it directly into browser
					//$_POST['nom'];
					//$_POST['prenom'];
					//$_POST['email'];
					//$_POST['nb'];
				}
						?></span> </span>
			</div>
		</div><!-- /content -->
		<?php
		include ('footer.php');
		?>
		</div><!-- /page one -->
	</body>
</html>
