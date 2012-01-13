<!DOCTYPE html> 
<html> 
	<head> 
	<title>Réservations</title> 
	<?php include('init.php'); ?>
		<script type="text/javascript" language="Javascript" >
			<!--
			function verification()
			{
				if(document.formulaire.email.value == "") {
  					alert("Veuillez entrer votre adresse mail svp");
  					document.formulaire.email.focus();
  					return false;
 				}
 				else 
 					if(document.formulaire.email.value.indexOf('@') == -1) 
 					{
  						alert("Ce n'est pas une adresse électronique, verifiez-la svp");
  						document.formulaire.email.focus();
  						return false;
 					}
 				else 
 					if(document.formulaire.nb.value == "")
 					{
  						alert("Veuillez entrer votre un nombre de billets svp");
  						document.formulaire.nb.focus();
  						return false;
 					}
  				else
					return true;
			}
			//-->
		</script>
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
				     <input name="document.formulaire.prenom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    </br> 
				    </br>
				     Nom: 
				     <input name="document.formulaire.nom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    </br> 
				    </br>
				     Email: 
				     <input name="document.formulaire.email" type="email" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    </br> 
				    <div class="reservation3">Nombre de billets: </div>
				    <input name="document.formulaire.nb" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				    </br>			
				<input type="submit" value="Ok"/>			
			</form>			
		</div>
	</div><!-- /content -->
</div><!-- /page one -->
</body>
</html>
