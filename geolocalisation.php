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
