<!DOCTYPE html> 
<html> 
	<head> 
	<title>Concours</title> 
	<?php include('init.php'); ?>
</head> 
<body> 
<?php include('header.php'); ?>

<?php
	if( isset($_POST['vote']) )
	{
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }
		
		
		//we register the ip of the person voting
		$iptxt = fopen("secure/ips.txt", "a");
		fputs($iptxt, $ip . ";");
		fclose($iptxt);
		
		//we register the vote
		$votestxt = fopen("secure/votes.txt", "a");
		fputs($votestxt, $_POST["vote"] . ';');
		fclose($votestxt);
	}
?>


<script type="application/javascript" src="http://jsonip.appspot.com/?callback=getip"></script>

	<script type="text/javascript" src="cookies.js"></script>
	<a href="./index.php" data-role="button"  data-theme="a"><div class="retourAuMenu">Retour au menu</div></a>
	<div data-role="content" data-theme="a">	
		<div class="concours">Vous pourrez gagner un abonnement de saison au FC Fully</div>
		<form action="concours.php" method="post">
		<input type="hidden" name="vote" value="4"></input>
		<input type="submit" value="voter"/>
		</form>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
