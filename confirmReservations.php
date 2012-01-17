<!DOCTYPE html> 
<html> 
	<head> 
	<title>Réservations</title> 
	<?php include('init.php'); ?>
</head> 
<body> 
<?php include('header.php'); ?>
	<a href="./index.php" data-role="button"  data-theme="a"><div class="retourAuMenu">Retour au menu</div></a>
	<div data-role="content" data-theme="a">
		<div class="contentZone">	
			<h3><div class="reservationConfirm1">Confirmation</div></h3>
			<span class="mainTitle">
				<span style="font-weight:bold" class="reservationConfirm2">
					
				Votre mail a été envoyé, merci pour votre réservation!
				<br/>
				<br/>
				<?php
				
				$uniqueid= uniqid();
				
				include('phpqrcode/qrlib.php');
				QRcode::png($uniqueid, 'secure/.' .$uniqueid.'.png');
				//$qrcode = QRcode::png('code data text',false);
				//imagepng($qrcode);
				echo "<img src=\"secure/.$uniqueid.png\"></img>";

				if(isset( $_POST['email'])){
				
				QRcode::png(uniqid() . ':' . $_POST['email']); // creates code image and outputs it directly into browser
				//$_POST['nom'];
				//$_POST['prenom'];
				//$_POST['email'];
				//$_POST['nb'];
}
				?>
				</span>
			</span>
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
