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
<<<<<<< HEAD
			<form method=POST action=mailReservations.php >
				<fieldset>				  				
				  <label for="mail">Votre email :</label>
				   <textarea name="mail" id="comments" cols="1" rows="1">
				   </textarea>
				</fieldset>
				<input type="submit" value="Envoyer" />
			</form>			
=======
			<form method="POST" action="mailReservations.php" >
				<input type="hidden" name="subject" value="formmail">
				<table>
					<tr>
						<td>Votre Email:</td>
						<td><input type="text" name="email" size="30" style="color: #ffffff;"></td>
					</tr>
				</table>
				<br> <input type="submit" value="Envoyer"> 
			</form>
			<a href="./contact.php" data-role="button"><span class="bouttonEnvoi">Envoyer</span></a>
>>>>>>> 6310eb570fa4a48fb567086508cdac35c91c1758
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
