<!DOCTYPE html> 
<html> 
	<head> 
	<title>Accès</title> 
<?php
include('init.php');
?>
<style>
		#map-container {
			/*overflow: hidden;*/
		}
		#map {
			/*float: left;*/
			width: 96%;
			height: 350px;
			margin: 0px auto;
		}
		#map-directions {
			/*float: right;*/
			width: 90%;
			padding-left: 2%;
			background-color: #999;
			margin : auto;
		}
	</style>

</head>
<?php
	$languageMap = $_COOKIE["langue"];
	echo("<script type=\"text/javascript\" src=\"http://maps.google.ch/maps/api/js?sensor=false&language=" . $languageMap . "\"></script>");
?>
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
						// Default view: Sion
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
						// Gelocation fallback: Defaults to Sion, Switzerland
						createMap({
							coords : false,
							address : "1950 Sion, Suisse"
						});
					}
				);
			}
			else {
				// No geolocation fallback: Defaults to Sierre, Switzerland
				createMap({
					coords : false,
					address : "3960 Sierre, Suisse"
				});
			}
	})();
</script>	
<body> 
	
<?php 
include('header.php');
?>

	<a href="./index.php" data-role="button" data-theme="a"><span class="retourAuMenu" ></span></a>
			

			
	<script type="text/javascript" src="cookies.js"></script>
	
	
	<div data-role="content" data-theme="a">	
		
		<div class="contentZone">
						<h3>	
							<div class="acces1" />Accès</div>
							</h3>
						<span class="mainTitle"><span class="acces2" style="font-weight: bold"></span></span>	
						
					
				
						
		<!-- 	<div id="map-directions"></div> -->
						<!-- <img src="images/acces1.JPG" align="left" style="width:100%"/> -->
						
						<br/>
			
		</div>
	</div>
	<br/>
	<div id="map"></div>
	<br/>
	<div id="map-directions"></div>
	<br/>
	<!-- /content -->
<?php include('footer.php'); ?>
<!-- /page one -->
</body>
</html>
