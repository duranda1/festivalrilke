<!DOCTYPE html> 
<html> 
	<head> 
	<title>Programme</title> 
	<?php include('init.php'); ?>
</head> 
<body> 
<?php include('header.php'); ?>
	<a href="./index.php" data-role="button"  data-theme="a"><div class="retourAuMenu">Retour au menu</div></a>
	<div data-role="content" data-theme="a">	
		<div class="contentZone">
			<h1><div class="programme" />Programme</div></h1>			
			<img src="images/pdf_icon.gif" align="left" style="margin: 0 10px 10px 0; height: 25px; "/>
			<a class="telechargerPdf" href="documents/Programme_2012.pdf" target="_blank">Télécharger le programme complet</a>
			    <h2>Evenements<br /><small>Choisissez un type d'évennement</small></h2>
			    <div data-role="collapsible-set">
           			<div data-role="collapsible" data-content-theme="a">
			        	<h3>Cafés littéraires</h3>
			        	<ul>
			        	<?php
			        		$fichier = './evenements.xml';
							/*on load le fichier xml*/
							$data = new DOMDocument();
							$data->load($fichier);
								
							$cafes = $data->getElementsByTagName('cafeLitteraires')->item(0);
							$cafes = $cafes->getElementsByTagName('evenement');
  							
							echo('<div data-role="collapsible-set">');
							foreach($cafes as $cafe) {
								  $Dates = $cafe->getElementsByTagName("date"); // On prend le nom de chaque noeud.
								  $date = $Dates->item(0)->nodeValue;
								  
								  $Noms = $cafe->getElementsByTagName("nom"); // On prend le nom de chaque noeud.
								  $nom = $Noms->item(0)->nodeValue;
								  
								  $Descriptions = $cafe->getElementsByTagName("description"); // On prend le nom de chaque noeud.
								  $description = $Descriptions->item(0)->nodeValue;
								  
								  $Prix = $cafe->getElementsByTagName("prix"); // On prend le nom de chaque noeud.
								  $prix = $Prix->item(0)->nodeValue;
								  
				           		  echo('<div data-role="collapsible">');
							      echo('<h3>'.$nom.'</h3>');
								  echo('<span style="font-size: .75em;"><ul><br/><b><u>Titre</u></b> : '.$nom);
								  echo('<br/><b><u>Description</u></b> : '.$description);
								  echo('<br/><b><u>Dates</u></b> : '.$date);
								  echo('<br/><b><u>Prix</u></b> : '.$prix);
								  echo('<br/><br/></ul><span></div>');					     
							}
							echo('</div>');
						?>
						</ul>
		            </div>
		            <div data-role="collapsible" data-content-theme="a">
               			<h3>Spectacles et lectures</h3>
               			<ul>
			        	<?php
								
							$spectacles = $data->getElementsByTagName('spectaclesEtLectures')->item(0);
							$spectacles = $spectacles->getElementsByTagName('evenement');
  							
							echo('<div data-role="collapsible-set">');
  
							foreach($spectacles as $spectacle) {
								  $Dates = $spectacle->getElementsByTagName("date"); // On prend le nom de chaque noeud.
								  $date = $Dates->item(0)->nodeValue;
								  
								  $Noms = $spectacle->getElementsByTagName("nom"); // On prend le nom de chaque noeud.
								  $nom = $Noms->item(0)->nodeValue;
								  
								  $Descriptions = $spectacle->getElementsByTagName("description"); // On prend le nom de chaque noeud.
								  $description = $Descriptions->item(0)->nodeValue;
								  
								  $Prix = $spectacle->getElementsByTagName("prix"); // On prend le nom de chaque noeud.
								  $prix = $Prix->item(0)->nodeValue;
								  
				           		  echo('<div data-role="collapsible">');
							      echo('<h3>'.$nom.'</h3>');
								  echo('<span style="font-size: .75em;"><ul><br/><b><u>Titre</u></b> : '.$nom);
								  echo('<br/><b><u>Description</u></b> : '.$description);
								  echo('<br/><b><u>Dates</u></b> : '.$date);
								  echo('<br/><b><u>Prix</u></b> : '.$prix);
								  echo('<br/><br/></ul><span></div>');					     
							}
							echo('</div>');
						?>
			            </ul>
               		</div>
               		<div data-role="collapsible" data-content-theme="a">
               			<h3>Balades poétiques</h3>
               			<ul>
			        	<?php
								
							$balades = $data->getElementsByTagName('baladesPoetiques')->item(0);
							$balades = $balades->getElementsByTagName('evenement');
  							
							echo('<div data-role="collapsible-set">');
  
							foreach($balades as $balade) {
								  $Dates = $balade->getElementsByTagName("date"); // On prend le nom de chaque noeud.
								  $date = $Dates->item(0)->nodeValue;
								  
								  $Noms = $balade->getElementsByTagName("nom"); // On prend le nom de chaque noeud.
								  $nom = $Noms->item(0)->nodeValue;
								  
								  $Descriptions = $balade->getElementsByTagName("description"); // On prend le nom de chaque noeud.
								  $description = $Descriptions->item(0)->nodeValue;
								  
								  $Prix = $balade->getElementsByTagName("prix"); // On prend le nom de chaque noeud.
								  $prix = $Prix->item(0)->nodeValue;
								  
				           		  echo('<div data-role="collapsible">');
							      echo('<h3>'.$nom.'</h3>');
								  echo('<span style="font-size: .75em;"><ul><br/><b><u>Titre</u></b> : '.$nom);
								  echo('<br/><b><u>Description</u></b> : '.$description);
								  echo('<br/><b><u>Dates</u></b> : '.$date);
								  echo('<br/><b><u>Prix</u></b> : '.$prix);
								  echo('<br/><br/></ul><span></div>');					     
							}
							echo('</div>');
						?>
			            </ul>
               		</div>	
		        </div>	
				<br />
				<iframe src="craftmap/demo2.html" height="500" width="100%" scrolling="no" frameborder="0"></iframe>
			</div>	
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
