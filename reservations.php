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
			<form method=POST action=mailReservations.php >
				<fieldset>				  				
				  <label for="mail">Votre email :</label>
				   <textarea name="mail" id="comments" cols="1" rows="1">
				   </textarea>
				</fieldset>
				<input type="submit" value="Envoyer"/>			
			</form>			
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
