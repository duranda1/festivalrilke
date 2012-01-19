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
				<div class="reservationTitre">
					Réservation
				</div></h3>
				<span class="mainTitle"> <span style="font-weight:bold" class="reservation0">Merci de remplir le formulaire pour effectuer une réservation</span> </span>
				<?php

				if (isset($_GET['captcha'])) {
					echo "</br><SPAN style=\"color: red\">Desolé, le code de validation n'est pas valide</SPAN>";
				}
				?>

			
			<form action="mailReservations.php" method="post">			
				    <br/>
				     <div class="reservation1">Prénom</div>
				     <input name="prenom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    <br/>
				    <div class="reservation2">Nom</div>
				     <input name="nom" type="text" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    <br/>
				    <div class="reservation3">Email</div>
				     <input name="email" type="email" style="background-color: #999999; color: #000000; width: 200px; height: 15px; font-size: 15px;">	
				    <br/>
				    <div class="reservation4">Cafés littéraires (20.-)</div>
				    <SELECT NAME=cafes>
						<OPTION>Schriftsteller als Gäste in der Region Siders-Leuk </OPTION>
						<OPTION>Rilke, les Elégies et les arts plastiques </OPTION>
						<OPTION>La place de Rilke dans la culture italienne	</OPTION>			
					</SELECT> 
				  <br/>
				    <div class="reservation5">Billets</div>
				    <input name="nb1" type="number" value="0" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
				    <br/>		
				     <br/>
				     <br/>
				    <div class="reservation6">Spectacles et lectures (20.- / 15.-)</div>
				    <SELECT NAME=spectacles>
						<OPTION>Altro viaggio di Rainer Maria Rilke	</OPTION>
						<OPTION>Journal Florentin	</OPTION> 
						<OPTION>Souvenirs de la princesse	</OPTION>
						<OPTION>Dans le regard de Lou	</OPTION>
						<OPTION>Chant d’amour et autres poèmes	</OPTION>
						<OPTION>Duo a tre	</OPTION>	
						<OPTION>Duineser Elegien (samedi)	</OPTION>
						<OPTION>Duineser Elegien (dimanche)	</OPTION>
						<OPTION>Pulcinoelefante revisite les Elégies	</OPTION>
						<OPTION>Abonnement 4 spectacles (70.- ou 50.-)	</OPTION>
					</SELECT> 
					 <br/>
				    <table>
				    	<tr>
				    		<td colspan="3"><div class="reservation5">Billets</div></td>
				    	</tr>
				    	<tr>
				    		<td><div class="reservation7">Adultes </div></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><div class="reservation8">Etudiants/AVS </div></td>
				    	</tr>
				    	<tr>
				    		<td><input name="nb2" type="number" value="0" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><input name="nb3" type="number" value="0" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    	</tr>
				    </table>
				    <br/>
				    <br/>
				     <br/>
				    <div class="reservation85">Balades poétiques (25.-/ 20.-):</div>
				    <SELECT NAME=balades>
						<OPTION>Au Lac souterrain de St-Léonard	</OPTION>
						<OPTION>Balade à Finges 	</OPTION>
						<OPTION>Sur le sentier viticole	</OPTION>
						<OPTION>Balade à Raron	</OPTION>
						<OPTION>Balade botanique	</OPTION>				
					</SELECT> 
				   	 <br/>	
				    <table>
				    	<tr>
				    		<td colspan="3"><div class="reservation5">Billets:</div></td>
				    	</tr>
				    	<tr>
				    		<td><div class="reservation7">Adultes </div></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><div class="reservation8">Etudiants/AVS </div></td>
				    	</tr>
				    	<tr>
				    		<td><input name="nb4" type="number" value="0" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><input name="nb5" type="number" value="0" min="0" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    	</tr>
				    </table>
				    	<br/>
				    	<br/>
				    	<div class="reservation9">Merci de recopier les caractères ci-dessous</div>
				    	 <br/>
				    	 <img src="captchaSecurite.php?width=100&amp;height=40&amp;characters=5" alt="captcha" />
						<input id="security_code" name="security_code" type="text" style="background-color: #999999; color: #000000; width: 87px; height: 11px; font-size: 15px;"/>
						<br/>
				    	<br/>
				    	 <br/>
				    	 <input type="submit" value="Valider">
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
