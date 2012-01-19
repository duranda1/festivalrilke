<!DOCTYPE html>
<html>
	<head>
		<title>Concours</title>
		<?php
		include ('init.php');
		?>
	</head>
	<body>
		<?php
		include ('header.php');
		?>

		<?php
		function getIpClient() {
			if (!empty($_SERVER['HTTP_CLIENT_IP']))//check ip from share internet
			{
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))//to check ip is pass from proxy
			{
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return $ip;

		}

		function hasAlreadyVoted() {

			$ip = getIpClient();
			if (!$ipstxt = fopen("secure/ips.txt", "a+")) {
				echo "Echec de l'ouverture du fichier";
				exit ;
			} else {
				$tampon = fgets($ipstxt, 4096);
				$data = explode(";", $tampon);
				// parsing of datas based on ";"
				$ipcount = count($data) - 1;
				// number of ips

				$ok = true;
				//we read the ips one by one
				for ($i = 0; $i <= $ipcount; $i++) {
					//we test if the ip already is in memory
					if ($data[$i] == $ip) {
						$ok = false;
					}
				}
				fclose($ipstxt);
				return !$ok;

			}

		}

		//if not, we take into account the vote, and register the ip
		if (hasAlreadyVoted() == false) {
			if (isset($_POST['vote'])) {
				$ip = getIpClient();
				if (!$ipstxt = fopen("secure/ips.txt", "a+")) {
					echo "Echec de l'ouverture du fichier";
					exit ;
				} else {
					//we register the ip of the person voting
					fputs($ipstxt, $ip . ";");
					fclose($ipstxt);
					$nomVideo = $_POST['vote'];
					$fichier = './medias/contest/private/votes.xml';
					/*on load le fichier xml*/
					$data = new DOMDocument();
					$data -> load($fichier);

					$videos = $data -> getElementsByTagName('video');

					foreach ($videos as $video) {
						$Noms = $video -> getElementsByTagName("name");
						// On prend le nom de chaque noeud.
						$nom = $Noms -> item(0) -> nodeValue;

						$NbVotes = $video -> getElementsByTagName("votes");
						// On prend le nom de chaque noeud.
						$nbvote = $NbVotes -> item(0) -> nodeValue;

						if ($nom == $nomVideo) {
							//$element = $img;
							$NbVotes -> item(0) -> nodeValue = $NbVotes -> item(0) -> nodeValue + 1;
						}
					}
					//$racine = $data->documentElement;
					//$suppr = $racine->removeChild($element);

					/*on enregistre dans un fichier*/
					$data -> save($fichier);
				}
			}
		}
		?>

		<script type="application/javascript" src="http://jsonip.appspot.com/?callback=getip"></script>
		<script type="text/javascript" src="cookies.js"></script>
		<a href="./index.php" data-role="button"  data-theme="a">
		<div class="retourAuMenu">
			Retour au menu
		</div></a>
		<div data-role="content" data-theme="a">
			<div class="contentZone">
				<?php
				function getImages($path) {
					$dir = opendir(dirname(__FILE__) . "/$path/thumbs");
					$files = array();
					while (false !== ($file = readdir($dir))) {
						if (strpos($file, '.gif', 1) || strpos($file, '.jpg', 1)) {
							$files[] = $file;
						}
					}
					closedir($dir);

					return $files;
				}
				
				if (hasAlreadyVoted() == true) {
					echo('<center><h1>Merci d\'avoir voté</h1>');
					echo('<h2>Résultat actuel des votes</h2>');
					$fichier = './medias/contest/private/votes.xml';
					/*on load le fichier xml*/
					$data = new DOMDocument();
					$data -> load($fichier);

					$videos = $data -> getElementsByTagName('video');

					foreach ($videos as $video) {
						$Noms = $video -> getElementsByTagName("name");
						// On prend le nom de chaque noeud.
						$nom = $Noms -> item(0) -> nodeValue;

						$NbVotes = $video -> getElementsByTagName("votes");
						// On prend le nom de chaque noeud.
						$nbvote = $NbVotes -> item(0) -> nodeValue;

						if ($nbvote >0)
							echo ($nom.' : <b>'.$nbvote.' votes</b><br/>');
						else
							echo ($nom.' : <b>'.$nbvote.' vote</b><br/>');
							
					}
					echo('<br/></center>');
				}

				// fetch image details

				$path = "medias/videos";
				//$dir = "http://153.109.141.61/videos";
				$images = getImages($path);

				// display on page
				foreach ($images as $img) {
					//echo $img['file'];

					//echo $img;

					// your file
					$file = $img;

					$info = pathinfo($file);
					$file_name = basename($file, '.' . $info['extension']);

					echo "<center><span class=\"mainTitle\">$file_name</span></center>";
					// outputs 'image'

					echo "<center><div class=\"videos\"><video width=\"320\" height=\"240\" controls=\"controls\"  poster=\"$path/thumbs/$img\" preload=\"none\">
						<source src=\"$path/$file_name.mp4\" type=\"video/mp4\" />
						<source src=\"$path/$file_name.webm\" type=\"video/webm\" />
						Your browser does not support the video tag.
						</video> </div></center>";
					echo "<form action=\"concours.php\" method=\"post\">";
					echo "<input type=\"hidden\" name=\"vote\" value=\"$file_name\"></input>";

					if (hasAlreadyVoted() == false) 
						echo("<input type=\"submit\" value=\"voter\"/><br/>");

					echo "</form>";
				}
				?>

				<!-- bouton de vote -->
				<!-- fin du bouton de vote -->
			</div>
		</div><!-- /content -->
		<?php
		include ('footer.php');
		?>
		</div><!-- /page one -->
	</body>
</html>