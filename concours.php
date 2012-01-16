<!DOCTYPE html> 
<html> 
	<head> 
	<title>Concours</title> 
	<?php include('init.php'); ?>
</head> 
<body> 
<?php include('header.php'); ?>

<?php
	function getIpClient()
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
			return $ip;
	}

	function hasAlreadyVoted()
	{
		if( isset($_POST['vote']) )
		{
			$ip = getIpClient();			
			if (!$ipstxt = fopen("secure/ips.txt","a+")) {
				echo "Echec de l'ouverture du fichier";
				exit;
			}
			else 
			{
				$tampon = fgets($ipstxt, 4096)	;		
				$data = explode(";",$tampon);  // parsing of datas based on ";"
				$ipcount = count($data)-1; // number of ips
			
				$ok = "true";
				//we read the ips one by one
				for ($i=0;$i<=$ipcount;$i++)
				{
					//we test if the ip already is in memory
					if($data[$i] == $ip)
					{
						$ok = "false";
					}
				}
				fclose($ipstxt);
				return $ok;
			}
		}
	}


	//if not, we take into account the vote, and register the ip
	if(hasAlreadyVoted() == "true") 
	{
		$ip = getIpClient();
		if (!$ipstxt = fopen("secure/ips.txt","a+"))
		{
			echo "Echec de l'ouverture du fichier";
			exit;
		}
		else 
		{
			//we register the ip of the person voting
			fputs($ipstxt, $ip . ";");
			fclose($ipstxt);	
		}
	}
?>


<script type="application/javascript" src="http://jsonip.appspot.com/?callback=getip"></script>

	<script type="text/javascript" src="cookies.js"></script>
	<a href="./index.php" data-role="button"  data-theme="a"><div class="retourAuMenu">Retour au menu</div></a>
	<div data-role="content" data-theme="a">	
		<div class="contentZone">
			<form action="concours.php" method="post">
			
			<!-- bouton de vote -->
			<input type="hidden" name="vote" value="4"></input>
			<?php
				if(hasAlreadyVoted() == "false")
				{
					echo("<input type=\"submit\" disabled=\"true\" value=\"Vous avez déjà voté\"/>");
				}
				else 
				{
					echo("<input type=\"submit\" value=\"voter\"/>");		
				}
			?>
			<!-- fin du bouton de vote -->
			
			</form>
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>