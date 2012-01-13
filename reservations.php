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
			<form method="POST" action="mailReservations.php" >
				<div data-role="fieldcontain">
					<label for="name">email</label>
					<input type="text" name="email" size="30" style="color: #ffffff;"/>
					<br><input type="submit" value="Envoyer"> 
				</div>
			</form>
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
