<!DOCTYPE html> 
<html> 
	<head> 
	<title>Accès</title> 
<?php include('init.php'); ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
</head> 
<body> 
<?php include('header.php'); ?>
	<a href="./index.php" data-role="button"  data-theme="a"><span class="retourAuMenu" /></a>
	<script type="text/javascript" src="cookies.js"></script>
	<div data-role="content" data-theme="a">	
		<div class="contentZone">
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.ch/maps/ms?msa=0&amp;msid=212454625913148090469.0004b6a1099faa97ea23f&amp;hl=fr&amp;ie=UTF8&amp;t=m&amp;vpsrc=0&amp;ll=46.29411,7.527539&amp;spn=0.010378,0.018239&amp;z=15&amp;output=embed"></iframe><br /><small>Afficher <a href="http://maps.google.ch/maps/ms?msa=0&amp;msid=212454625913148090469.0004b6a1099faa97ea23f&amp;hl=fr&amp;ie=UTF8&amp;t=m&amp;vpsrc=0&amp;ll=46.29411,7.527539&amp;spn=0.010378,0.018239&amp;z=15&amp;source=embed" style="color:#0000FF;text-align:left">Fondation Château Mercier</a> sur une carte plus grande</small>
			<script type="text/javascript">

		      if ( navigator.geolocation ) {
		        navigator.geolocation.getCurrentPosition( function(position) {
		          var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		            var myOptions = {
		            zoom: 16,
		            center: myLatlng,
		            mapTypeId: google.maps.MapTypeId.ROADMAP
		          }
		          var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		          var marker = new google.maps.Marker({
		            position: myLatlng, 
		            map: map,
		            title:"Ma position"
		          });   
		        }, function (msg) {
		          alert( 'Localisation impossible' );
		        }
		       );
		      } else {
		        alert('Votre navigateur ne supporte pas l\'API de geolocalisation');
		      }
		
		    </script>
		    <div id="map_canvas" style="border: 2px dashed lightgray; width:100%; height:400px"></div> 
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
