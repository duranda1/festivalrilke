
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
    <script type="text/javascript" src="multiupload.js"></script>
	<body onload="init();">
		<div id="header">
			<h1>Festival Rilke</h1>
			<h2>Administration</h2>
		</div>
		<div id="mid">
			<div id="main">
				<div id="upload">
		            <h4>Les photos suivantes ont bien été ajoutée à la galerie <?php echo($_POST['galerie']); ?></h4>
		            
		            <?php
		            	$nom = $_POST['galerie'];
						@mkdir ('test/'.$nom,0777,true);
		            	$dossier = 'test/'.$nom.'/';
					    foreach($_FILES as $fichier)
						{
						    print $fichier['name'] . "<br/>";
							move_uploaded_file($fichier['tmp_name'], $dossier . $fichier['name']);
						}
					?>
		        </div>
			</div>
			
			<div id="break"><input type=button onmousedown="window.location='../index.php?page=ajout_de_photos'" value="Retour" class="btn"/></div>
		</div>
		<div id="footer">
			&copy; Festival Rilke - HES-SO Valais
		</div>
		<div id="copy">
			<a href="./index.php?op=kill">Fermer la session</a>
		</div>
	</body>
</html>