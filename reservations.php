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
			
			
					<?php 
					session_start();					
					if( isset($_POST['submit'])) {
					   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
							// Insert your code for processing the form here, e.g emailing the submission, entering it into a database. 
							echo 'Thank you. Your message said "'.$_POST['message'].'"';
							unset($_SESSION['security_code']);
					   } else {
							// Insert your code for showing an error message here
							echo 'Sorry, you have provided an invalid security code';
					   }
					} else {
					?>
			<?php
	// if form is submit
	if(isset($_POST['submit']))
	{
		$response = '<div class="notice">';
		
		if(isset($_POST['iQapTcha']) && empty($_POST['iQapTcha']) && isset($_SESSION['iQaptcha']) && $_SESSION['iQaptcha'])
		{
			$response .= 'Form can be submited';
			unset($_SESSION['iQaptcha']);
		}
		else
			$response .= 'Form can not be submited';
			
		$response .= '</div>';
		
		echo $response;
	}
?>

			
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
				    Cafés littéraires (20.-):
				    <SELECT NAME=cafes>
						<OPTION>Schriftsteller als Gäste in der Region Siders-Leuk 
						<OPTION>Rilke, les Elégies et les arts plastiques 
						<OPTION>La place de Rilke dans la culture italienne				
					</SELECT> 
				  <br/>
				    <div class="reservation1">Billets: </div>
				    <input name="nb1" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;">	
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
				    		<td><div class="reservation4">adultes </div></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><div class="reservation5">étudiants/AVS </div></td>
				    	</tr>
				    	<tr>
				    		<td><input name="nb4" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><input name="nb5" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
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
				    		<td><div class="reservation4">adultes </div></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><div class="reservation5">étudiants/AVS </div></td>
				    	</tr>
				    	<tr>
				    		<td><input name="nb4" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    		<td>&nbsp;&nbsp;</td>
				    		<td><input name="nb5" type="number" style="background-color: #999999; color: #000000; width: 35px; height: 15px; font-size: 14px;"></td>
				    	</tr>
				    </table>
				    	<br/>
				    	<br/>
				    	Merci de recopier les caractères ci-dessous:
				    	 <br/>
				    	 <br/>
				    	 <img src="captchaSecurite.php?width=100&amp;height=40&amp;characters=5" alt="captcha" />
						<input id="security_code" name="security_code" type="text" style="background-color: #999999; color: #000000; width: 87px; height: 11px; font-size: 15px;"/>
						<br/>
				    	<br/>
				    	 <br/>
				<input type="submit" name="submit" value="Ok"/>			
			</form>
			<?php
			}
			?>		
		<br/>
		<br/>
		</div>
	</div><!-- /content -->
	<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
