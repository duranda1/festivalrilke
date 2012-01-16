<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML>
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
	<!-- PHP Nanomus 2010 by Cyril Levert - Mini CMS without database XHTML 1.0 Strict valide -->

	<title>New ajoutée</title>
    <meta http-equiv="content-type" content="text/html; charset='UTF-8'" />
	<meta http-equiv="content-script-type" content="text/javascript" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta name="resource-type" content="document" />
	<meta name="distribution" content="global" />
	<meta name="author" content="HES-SO Valais" />
	<meta name="copyright" content="Copyright (c) Festival Rilke" />
	<meta name="owner" content="http://www.hevs.ch" />
	<meta name="language" content="fr" />
	<meta http-equiv="content-language" content="en-en, fr, fr-be, fr-ca, fr-lu, fr-ch" />
	<meta name="Publisher" content="HES-SO Valais" />
	<meta name="Date-Creation-yyyymmdd" content="20120111" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="templates/style.css" type="text/css" />
	<body>
		<div id="header">
			<h1>Festival Rilke</h1>
			<h2>Administration</h2>
		</div>
		<div id="mid">
			<div id="main">
				<h4>Suppression de photos</h4>
				<form action="supprimerPhotos.php" method="get">
				<?php			
					
					if(isset($_GET['Gallerie'])){
						$gallerie = $_GET['Gallerie'];
						$dir_nom = '../medias/photos/images/'.$_GET['Gallerie']; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
						$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
						$fichier= array(); // on déclare le tableau contenant le nom des fichiers
						$dossier= array(); // on déclare le tableau contenant le nom des dossiers
						
						while($element = readdir($dir)) {
							if($element != '.' && $element != '..') {
								if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
								else {$dossier[] = $element;}
							}
						}
						
						closedir($dir);
					    if(!empty($fichier)){
							sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
							echo "Liste des photos de la gallerie $gallerie : \n\n";
							echo "<select name=\"Image\">";
								foreach($fichier as $lien){
									echo '<option value="'.$dir_nom.'/'.$lien.'">'.$lien.'</option>';
								}
							echo "</select>";
						}
						echo'<input class="submit" type="submit" value="Valider"/>';
					}
					else if(isset($_GET['Image'])){
						$image = $_GET['Image'];
						echo '<input type="hidden"  name="ImageSupp"  value="'.$image.'"/>';
						echo"Voulez-vous vraiment supprimer l'image suivante ?";
						echo'<br/><br/><img src="'.$image.'"/ width="120px">';
						echo'<br/><br/><input class="submit" type="submit" value="Oui"/>';
					}
					else if(isset($_GET['ImageSupp'])){
						$image = $_GET['ImageSupp'];
						echo"l'image $image a été supprimée avec succès";
						unlink($image);
					}
					else{
						$dir_nom = '../medias/photos/images/'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
						$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
						$fichier= array(); // on déclare le tableau contenant le nom des fichiers
						$dossier= array(); // on déclare le tableau contenant le nom des dossiers
						
						while($element = readdir($dir)) {
							if($element != '.' && $element != '..') {
								if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
								else {$dossier[] = $element;}
							}
						}
						
						closedir($dir);
						if(!empty($dossier)) {
							sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
							echo "Liste des Galleries : \n\n";
							echo "<select name=\"Gallerie\">";
								foreach($dossier as $lien){
									echo '<option value="'.$lien.'">'.$lien.'</option>';
								}
							echo "</select>";
						}
						echo'<input class="submit" type="submit" value="Valider"/>';
					}
				?>
				
				</form>
			</div>
			
			<div id="break"><input type=button onmousedown="window.location='./index.php?op=admin'" value="Retour" class="submit"/></div>
		</div>
		<div id="footer">
			&copy; Festival Rilke - HES-SO Valais
		</div>
		<div id="copy">
			<a href="./index.php?op=kill">Fermer la session</a>
		</div>
	</body>
</html>
