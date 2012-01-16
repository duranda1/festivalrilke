<!DOCTYPE html> 
<html> 
	<head> 
	<title>Accès</title> 
	<style type="text/css">


#map, #route {
width: 100%;
height: 50%;
}
#route {
overflow-y:auto;
}
#method {
position: absolute;
left: 75px;
top:15px;
padding:10px;
opacity: .9;
-moz-opacity: .9;
z-index: 10;
background-color:#fff;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;

}
</style>
<?php include('init.php'); ?>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://www.google.com/jsapi"></script>
<script>
var map; //the google map
var directionsService; //service that provides directions to get to our destination
var directionsDisplay; //rendeder that draws directions on map
var destinationName = "Ventorro del Cano, Madrid"; //our destination. Set yours!

function initiate_geolocation(skipHTML5){

if (!skipHTML5 && navigator.geolocation) {
// HTML5 GeoLocation
function getLocation(position) {
document.getElementById("method").innerHTML = "Location obtained using HTML5";
showMapAndRoute({
"lat": position.coords.latitude,
"lng": position.coords.longitude
});
}
navigator.geolocation.getCurrentPosition(getLocation, error);
} else {
// Google AJAX API fallback GeoLocation
if (typeof google == 'object') {
var geocoder = new google.maps.Geocoder();
if (google.loader.ClientLocation) {
document.getElementById("method").innerHTML = "Location obtained using Google Geocoder";
showMapAndRoute({
"lat": google.loader.ClientLocation.latitude,
"lng": google.loader.ClientLocation.longitude
});
} else
{
alert("Google Geocoder was unable to get the client position");
}
}
}
}

function showMapAndRoute(l)
{
var latlng = new google.maps.LatLng(l.lat,l.lng);

var myOptions = {
zoom: 8,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("map"), myOptions);
directionsDisplay = new google.maps.DirectionsRenderer();
directionsDisplay.setMap(map);
directionsDisplay.setPanel(document.getElementById("route"));

var request = {
origin: l.lat + ',' + l.lng ,
destination: destinationName,
travelMode: google.maps.DirectionsTravelMode.DRIVING
};
directionsService = new google.maps.DirectionsService();
directionsService.route(request, function(result, status) {
if (status == google.maps.DirectionsStatus.OK) {
directionsDisplay.setDirections(result);
}
});
}

function error(e)
{
switch(e.code)
{
case e.TIMEOUT:
alert ('Timeout');
break;
case e.POSITION_UNAVAILABLE:
alert ('Position unavailable');
break;
case e.PERMISSION_DENIED:
alert ('Permission denied');
break;
case e.UNKNOWN_ERROR:
alert ('Unknown error');
break;
}

//try to get location using Google Geocoder
initiate_geolocation(true);
}
</script>
</head> 
<body onload="initiate_geolocation()">
<?php include('header.php'); ?>
	<a href="./index.php" data-role="button"  data-theme="a"><span class="retourAuMenu" /></a>
	<script type="text/javascript" src="cookies.js"></script>
	
	<div data-role="content" data-theme="a">	
		<div class="contentZone">
			<div id="method"></div>
<div id="map"></div>
<div id="route"></div>
		</div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
