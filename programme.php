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
			<h3><div class="programme" />Programme</div></h3>			
			<img src="images/pdf_icon.gif" align="left" style="margin: 0 10px 10px 0; height: 25px; "/>
			<a class="telechargerPdf" href="documents/Programme_2012.pdf" target="_blank">Télécharger le programme complet</a>
			
			<div id="tabbed_box" class="tabbed_box" style="width: 100%">
			    <h4>Evenements<br /><small>Choisissez un type d'évennement</small></h4>
			    <div class="tabbed_area">   
			    	<script src="jquery/jquery-1.7.1.js" type="text/javascript"></script>
					<script type="text/javascript">
					  $(document).ready(function(){	
						$("a.tab").click(function () {		
							$(".active").removeClass("active");
							$(this).addClass("active");
							$(".content").slideUp();
							var contenu_aff = $(this).attr("title");
							$("#" + contenu_aff).slideDown();	  
						});
					  });
					</script>
			        <ul class="tabs">
			            <li><a href="#" id="tab_1" class="active">Cafés littéraires</a></li>
			            <li><a href="#" id="tab_2">Spectacles et lectures</a></li>
			            <li><a href="#" id="tab_3">Balades poétiques</a></li>
			        </ul>
			
			        <div id="content_1" class="content">        
			            <ul>
			            	<small>Samstag 13.00 Uhr&nbsp;&nbsp;<li></small><a href="">Schriftsteller als Gäste in der Region Siders-Leuk</a></li>
			                <small>Samedi 18h00&nbsp;&nbsp;</small><li><a href="">Rilke, les Elégies et les arts plastiques</a></li>
			                <small>Dimanche 12h30&nbsp;&nbsp;</small><li><a href="">La place de Rilke dans la culture italienne</a></li>
			            </ul>
			        </div>
			        <div id="content_2" class="content">
			            <ul>
			                <li><a href="">HTML / XHTML <small>4 Articles</small></a></li>
			                <li><a href="">Javascript <small>32 Articles</small></a></li>
			                <li><a href="">Autres <small>19 Articles</small></a></li>
			            </ul>
			        </div>
			        <div id="content_3" class="content">
			            <ul>
			                <li><a href="">Conception Web <small>4 Articles</small></a></li>
			                <li><a href="">SEO et Référencement <small>32 Articles</small></a></li>
			                <li><a href="">Programmation <small>2 Articles</small></a></li>
			                <li><a href="">Autres <small>19 Articles</small></a></li>
			            </ul>
			        </div>   
			    </div>
			</div>
					
			<div>
				<br />
				<iframe src="craftmap/carteMercier.html" height="300px" width="320px" scrolling="no" frameborder="0"></iframe>
			</div>	
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
