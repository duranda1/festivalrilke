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
				    <br/>
				     Prénom: 
				     <input name="prenom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 11px; font-size: 15px;">	
				    <br/>
				     Nom: 
				     <input name="nom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 11px; font-size: 15px;">	
				    <br/>
				     Email: 
				     <input name="email" type="email" style="background-color: #999999; color: #000000; width: 200px; height: 11px; font-size: 15px;">	
				    <br/>
				    Cafés littéraires (20 CHF):
				    <SELECT NAME=cafes>
						<OPTION>Schriftsteller als Gäste in der Region Siders-Leuk 
						<OPTION>Rilke, les Elégies et les arts plastiques 
						<OPTION>La place de Rilke dans la culture italienne				
					</SELECT> 
				    <br/>
				    <div class="reservation3">Billets: </div>
				    <input name="nb1" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				    <br/>		
				    
				     <br/>
				    Spectacles et lectures (20 CHF/50 CHF (AVS et étudiants)):
				    <SELECT NAME=spectacles>
						<OPTION>Altro viaggio di Rainer Maria Rilke
						<OPTION>Journal Florentin 
						<OPTION>Souvenirs de la princesse
						<OPTION>Dans le regard de Lou
						<OPTION>Chant d’amour et autres poèmes
						<OPTION>Duo a tre	
						<OPTION>Duineser Elegien (samedi)
						<OPTION>Duineser Elegien (dimanche)
						<OPTION>Pulcinoelefante revisite les Elégies
						<OPTION>Abonnement 4 spectacles (70 CHF)
					</SELECT> 
				    <br/>
				    <div class="reservation3">Billets adultes: </div>
				    <input name="nb2" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				     <div class="reservation3">Billets étudiants/AVS: </div>
				    <input name="nb3" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;position: relative;">	
				    <br/>			
				    
				     <br/>
				    Balades poétiques (25 CHF/20 CHF (AVS et étudiants)):
				    <SELECT NAME=balades>
						<OPTION>Au Lac souterrain de St-Léonard
						<OPTION>Balade à Finges 
						<OPTION>Sur le sentier viticole
						<OPTION>Balade à Raron
						<OPTION>Balade botanique				
					</SELECT> 
				    <br/>
				    <div class="reservation3">Billets adultes: </div>
				    <input name="nb4" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				     <div class="reservation3">Billets étudiants/AVS: </div>
				    <input name="nb5" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				    <br/>		
				    
				    	
				<input type="submit" value="Ok"/>			
			</form>			
		<br/>
		<br/>
		</div>
	</div><!-- /content -->
	<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
