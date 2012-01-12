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
				<h4>L'actualité a été enregistrée avec succès</h4>
				<table>
					<tr>
						<td><b>Titre</b></td>
						<td>
							: <?php echo($_POST['titre']); ?>
						</td>
					</tr>
					<tr>
						<td><b>Description</b></td>
						<td>
							: <?php echo($_POST['description']); ?>
						</td>
					</tr>
					<tr>
						<td><b>Liens</b></td>
						<td>
							: <?php echo($_POST['lien']); ?>
						</td>
					</tr>
					<tr>
						<td><b>Date</b></td>
						<td>
							: <?php echo($_POST['jour'].'.'.$_POST['mois'].'.'.$_POST['annee'].' '.$_POST['heure']); ?>
						</td>
					</tr>
				</table>
				<?php
					$fichier = '../livenews/feed/livenews_fr.xml';
					$dom = new DOMDocument('test1');
			        $dom->load($fichier);
			        /*nouvelle balise <item>*/
			        $new_item = $dom->createElement('item');			
			        /*nouvelle balise <title>*/			
			        $new_title = $dom->createElement('title');			
			        $title_content = $dom->createTextNode($_POST['titre']);			
			        $letitle = $new_title->appendChild($title_content);			
			        $leitem = $new_item->appendChild($new_title);	
					/*nouvelle balise <description>*/			
			        $new_description = $dom->createElement('description');			
			        $description_content = $dom->createTextNode($_POST['description']);			
			        $ledescription = $new_description->appendChild($description_content);			
			        $leitem = $new_item->appendChild($new_description);	
					/*nouvelle balise <pubDate>*/			
			        $new_pubDate = $dom->createElement('pubDate');	
					$jour = date('D', strtotime($_POST['jour'].'-'.$_POST['mois'].'-'.$_POST['annee'])); 		
			        $pubDate_content = $dom->createTextNode($jour.', '.$_POST['jour'].' '.$_POST['mois'].' '.$_POST['annee'].' '.$_POST['heure'].':00 GMT');			
			        $lepubDate = $new_pubDate->appendChild($pubDate_content);			
			        $leitem = $new_item->appendChild($new_pubDate);	
					/*nouvelle balise <link>*/			
			        $new_link = $dom->createElement('link');			
			        $link_content = $dom->createTextNode($_POST['lien']);			
			        $lelink = $new_link->appendChild($link_content);			
			        $leitem = $new_item->appendChild($new_link);			
			        /*on rattache tout le <file> au DOM*/	
			        
			        $channel = $dom->getElementsByTagName("channel")->item(0);
  					$channel->appendChild($new_item);
  						
					/*on enregistre dans un fichier*/					
					$dom->save($fichier);
				?>
			</div>
			
			<div id="break"><input type=button onmousedown="window.location='./index.php?page=ajout_de_news'" value="Retour" class="submit"/></div>
		</div>
		<div id="footer">
			&copy; Festival Rilke - HES-SO Valais
		</div>
		<div id="copy">
			<a href="./index.php?op=kill">Fermer la session</a>
		</div>
	</body>
</html>
