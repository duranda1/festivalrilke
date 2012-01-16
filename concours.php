<!DOCTYPE html> 
<html> 
	<head> 
	<title>Concours</title> 
	<?php include('init.php'); ?>
</head> 
<body> 
<?php include('header.php'); ?>

<script type="text/javascript" language="javascript">
	 function saveIp() {
		<?php 
		echo ' Client IP: '; 
		if ( isset($_SERVER["REMOTE_ADDR"]) )    { 
		    echo '' . $_SERVER["REMOTE_ADDR"] . ' '; 
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    { 
		    echo '' . $_SERVER["HTTP_X_FORWARDED_FOR"] . ' '; 
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    { 
		    echo '' . $_SERVER["HTTP_CLIENT_IP"] . ' '; 
		} 
		?>
	}
</script>

	<script type="text/javascript" src="cookies.js"></script>
	<a href="./index.php" data-role="button"  data-theme="a"><div class="retourAuMenu">Retour au menu</div></a>
	<div data-role="content" data-theme="a">	
		<div class="concours">Vous pourrez gagner un abonnement de saison au FC Fully</div>
		<button onclick="saveIp">voter</button>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
