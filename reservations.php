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
			<h3><div class="reservation1">Réservation</div></h3>
			<span class="mainTitle">
						<span style="font-weight:bold" class="reservation2">Envoyez-nous votre adresse mail ainsi que le nombre de billets désirés</span>
				</span>	
			<form method=POST action=mailReservations.php">				
				    </br>
				     Email: 
				     <input name=Nom size=30 style="background-color: #999999; color: #000000; width: 200px; height: 12px">	
				    </br> 
				    <div class="reservation3">Nombre de billets: </div>
				    <input name=Nom size=30 style="background-color: #999999; color: #000000; width: 30px; height: 12px;">	
				    </br>			
				<input type="submit" value="Ok"/>			
			</form>			
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
