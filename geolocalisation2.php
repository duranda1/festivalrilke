<!DOCTYPE html> 
<html> 
	<head> 
	<title>Accès</title> 

<?php
 include('init.php'); 
 ?>
<style>
		#map-container {
			overflow: hidden;
		}
		#map {
			float: left;
			width: 60%;
			height: 350px;
			margin: 5px auto;
		}
		#map-directions {
			float: right;
			width: 38%;
			padding-left: 2%;
		}
	</style>
<script type="text/javascript" src="http://maps.google.ch/maps/api/js?sensor=false"></script>
<script>
	(function () {
		var directionsService = new google.maps.DirectionsService(),
			directionsDisplay = new google.maps.DirectionsRenderer(),
			createMap = function (start) {
				var travel = {
						origin : (start.coords)? new google.maps.LatLng(start.lat, start.lng) : start.address,
						destination : "Montée du Château 19 - Case postale 403, 3960 Sierre, Suisse",
						travelMode : google.maps.DirectionsTravelMode.DRIVING
						// Exchanging DRIVING to WALKING above can prove quite amusing <img src="http://robertnyman.com/wp-includes/images/smilies/icon_smile.gif" alt=":-)" class="wp-smiley">
					},
					mapOptions = {
						zoom: 10,
						// Default view: downtown Stockholm
						center : new google.maps.LatLng(59.3325215, 18.0643818),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};

				map = new google.maps.Map(document.getElementById("map"), mapOptions);
				directionsDisplay.setMap(map);
				directionsDisplay.setPanel(document.getElementById("map-directions"));
				directionsService.route(travel, function(result, status) {
					if (status === google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(result);
					}
				});
			};

			// Check for geolocation support
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function (position) {
						// Success!
						createMap({
							coords : true,
							lat : position.coords.latitude,
							lng : position.coords.longitude
						});
					},
					function () {
						// Gelocation fallback: Defaults to Stockholm, Sweden
						createMap({
							coords : false,
							address : "1950 Sion, Suisse"
						});
					}
				);
			}
			else {
				// No geolocation fallback: Defaults to Lisbon, Portugal
				createMap({
					coords : false,
					address : "1950 Sion, Suisse"
				});
			}
	})();
</script>
</head> 
<body>
<?php 
include('header.php'); 
?>
	
	

	<a href="./index.php" data-role="button"  data-theme="a"><span class="retourAuMenu" /></a>
	<script type="text/javascript" src="cookies.js"></script>
	
	<div data-role="content" data-theme="a">	
		<div class="contentZone">
			<div id="map"></div>
		<!-- 	<div id="map-directions"></div> -->
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div>

<!-- /page one -->

</body>
</html>
