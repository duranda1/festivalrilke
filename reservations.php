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
				<span style="font-weight:bold" class="reservation2">Merci de remplir le formulaire pour effectuer une réservation</span>
			</span>	
			<form name="formulaire" action="mailReservations.php" method="post" onSubmit="return verification()">			
				    </br>
				     Prénom: 
				     <input name="prenom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    </br> 
				    </br>
				     Nom: 
				     <input name="nom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    </br> 
				    </br>
				     Email: 
				     <input name="email" type="email" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    </br> 
				    <div class="reservation3">Nombre de billets: </div>
				    <input name="nb" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				    </br>			
				<input type="submit" value="Ok"/>			
			</form>			
		</br>
		</br>
		</div>
	</div><!-- /content -->
	<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
