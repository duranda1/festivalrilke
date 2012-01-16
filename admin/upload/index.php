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
	<link rel="StyleSheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="./js/prototype.js"></script>
    <script type="text/javascript" src="./js/scriptaculous.js"></script>
    <script type="text/javascript" src="./multiupload.js"></script>
	<body onload="init();">
		<div id="header">
			<h1>Festival Rilke</h1>
			<h2>Administration</h2>
		</div>
		<div id="mid">
			<div id="main">
				<div id="upload">
		            <h4>Ajout d'une galerie photos</h4>
		            
		            <div id="fichiers">
		                Aucune photos à uploader
		            </div>
		            <br/>
		            <form id="form" action="upload.php" method="post" enctype="multipart/form-data">
		                Uploader cette photo : 
		                <!-- CE SPAN RECOIT LES DIFFERENTS INPUTS CREES PUIS CACHES UNE FOIS UTILISES -->
		                <span id="input"></span> 
		                <br/>
		                Galerie existante :
		                <?php
			                $dir_nom = '../../medias/photos/images/'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
							$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
							$fichier= array();
							$dossier= array();
							
							while($element = readdir($dir)) {
								if($element != '.' && $element != '..') {
									if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
									else {$dossier[] = $element;}
								}
							}
							
							closedir($dir);
							if(!empty($dossier)) {
								sort($dossier);
								echo "<select name=\"GalerieE\">";
									foreach($dossier as $lien){
										echo '<option value="'.$lien.'">'.$lien.'</option>';
									}
								echo "</select>";
							}
						?>
		                <br/>ou nouvelle galerie : <input type='text' name='galerie' maxlength="20" class='txt'/>
		                <br/>
		                <input class="btn" type="submit" value="Uploader"/>
		            </form>
		        </div>
			</div>
			
			<div id="break"><input type=button onmousedown="window.location='../index.php?op=admin'" value="Retour" class="btn"/></div>
		</div>
		<div id="footer">
			&copy; Festival Rilke - HES-SO Valais
		</div>
		<div id="copy">
			<a href="./index.php?op=kill">Fermer la session</a>
		</div>
	</body>
</html>
