
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
	<body>
		<?php
			function make_thumb($src,$dest,$desired_width, $desired_height)
			{
			
			  /* read the source image */
			  $source_image = imagecreatefromjpeg($src);
			  $width = imagesx($source_image);
			  $height = imagesy($source_image);
			  
			  /* find the "desired height" of this thumbnail, relative to the desired width  */
			  //$desired_height = floor($height*($desired_width/$width));
			  
			  /* create a new, "virtual" image */
			  $virtual_image = imagecreatetruecolor($desired_width,$desired_height);
			  
			  /* copy source image at a resized size */
			  imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
			  
			  /* create the physical thumbnail image to its destination */
			  imagejpeg($virtual_image,$dest);
			}
		?>
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
		            	$chemin = '../../medias/photos/images/'.$nom;
						@mkdir ($chemin,0777,true);
		            	$dossier = $chemin.'/';
					    foreach($_FILES as $photos)
						{
						    print $photos['name'] . "<br/>";
							move_uploaded_file($photos['tmp_name'], $dossier . $photos['name']);
							$img_src_chemin = $dossier.$photos['name'];
							@mkdir ('../../medias/photos/thumbs/'.$nom,0777,true);
							$img_dst_chemin = '../../medias/photos/thumbs/'.$nom.'/'.$photos['name'];
							make_thumb($img_src_chemin, $img_dst_chemin, 75, 75);
							$fichier = '../../medias/photos/thumbs/'.$nom.'/desc.xml';
							$dom = new DOMDocument('test1');
							if(file_exists($fichier)==false){
								//touch($fichier);
								$leFichier = fopen($fichier, "wb");
								$contenu = '<?xml version="1.0" encoding="ISO-8859-1" ?>';
								$contenu .= '<descriptions>';
								$contenu .= '</descriptions>';
								
								fwrite($leFichier,$contenu);
								fclose($leFichier);
	
							}
					        $dom->load($fichier);
					        /*nouvelle balise <image>*/
					        $new_image = $dom->createElement('image');			
					        /*nouvelle balise <name>*/			
					        $new_name = $dom->createElement('name');			
					        $name_content = $dom->createTextNode($photos['name']);			
					        $lename = $new_name->appendChild($name_content);			
					        $leimage = $new_image->appendChild($new_name);	
							/*nouvelle balise <name>*/			
					        $new_text = $dom->createElement('text');			
					        $text_content = $dom->createTextNode('Nouvelle image '.$photos['name']);			
					        $letext = $new_text->appendChild($text_content);			
					        $leimage = $new_image->appendChild($new_text);	
					        /*on rattache tout le <file> au DOM*/	
					        
					        $channel = $dom->getElementsByTagName("descriptions")->item(0);
		  					$channel->appendChild($new_image);
		  						
							/*on enregistre dans un fichier*/					
							$dom->save($fichier);
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
