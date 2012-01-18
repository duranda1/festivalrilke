<!DOCTYPE html>
<html>
	<head>
		<title>Réservations</title>
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
				<div class="reservation1">
					Réservation
				</div></h3>
				<span class="mainTitle"> <span style="font-weight:bold" class="reservation2">Merci de remplir le formulaire pour effectuer une réservation</span> </span>
				<?php

				if (isset($_GET['captcha'])) {
					echo "</br><SPAN style=\"color: red\">Desolé, le code de validation n'est pas valide</SPAN>";
				}
				?>

			
			<form action="mailReservations.php" method="post">			
				    <br/>
				     Prénom: 
				     <input name="prenom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    <br/>
				     Nom: 
				     <input name="nom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    <br/>
				     Email: 
				     <input name="email" type="email" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    <br/>
				    Cafés littéraires (20.-):
				    <SELECT NAME=cafes>
						<OPTION>Schriftsteller als Gäste in der Region Siders-Leuk 
						<OPTION>Rilke, les Elégies et les arts plastiques 
						<OPTION>La place de Rilke dans la culture italienne				
					</SELECT> 
				  <br/>
				    <div class="reservation1">Billets: </div>
				    <input name="nb1" type="number" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				    <br/>		
				     <br/>
				     <br/>
				    Spectacles et lectures (20.- / 15.-):
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
						<OPTION>Abonnement 4 spectacles (70.- ou 50.-)
					</SELECT> 
					 <br/>
				    <table>
				    	<tr>
				    		<td colspan="3">Billets:</td>
				    	</tr>
				    	<tr>
				    		<td><div class="reservation4">Adultes </div></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><div class="reservation5">Etudiants/AVS </div></td>
				    	</tr>
				    	<tr>
				    		<td><input name="nb2" type="number" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><input name="nb3" type="number" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    	</tr>
				    </table>
				    <br/>
				    <br/>
				     <br/>
				    Balades poétiques (25.-/ 20.-):
				    <SELECT NAME=balades>
						<OPTION>Au Lac souterrain de St-Léonard
						<OPTION>Balade à Finges 
						<OPTION>Sur le sentier viticole
						<OPTION>Balade à Raron
						<OPTION>Balade botanique				
					</SELECT> 
				   	 <br/>	
				    <table>
				    	<tr>
				    		<td colspan="3">Billets:</td>
				    	</tr>
				    	<tr>
				    		<td><div class="reservation4">Adultes </div></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><div class="reservation5">Etudiants/AVS </div></td>
				    	</tr>
				    	<tr>
				    		<td><input name="nb4" type="number" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><input name="nb5" type="number" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    	</tr>
				    </table>
				    	<br/>
				    	<br/>
				    	Merci de recopier les caractères ci-dessous:
				    	 <br/>
				    	 <img src="captchaSecurite.php?width=100&amp;height=40&amp;characters=5" alt="captcha" />
						<input id="security_code" name="security_code" type="text" style="background-color: #999999; color: #000000; width: 87px; height: 11px; font-size: 15px;"/>
						<br/>
				    	<br/>
				    	 <br/>
				    	 <INPUT type="submit" value="Ok">
				<!-- <input type="submit" name="submit" value="true"/>		 -->	
			</form>
				
		<br/>
		<br/>
		</div>
	</div><!-- /content -->
	<?php
		include ('footer.php');
					?>
			</div><!-- /page one -->
	</body>
</html>
