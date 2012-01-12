<!DOCTYPE html> 
<html> 
	<head> 
	<title>Photos</title> 
	<?php include('init.php'); ?>
		<style type="text/css" media="screen">@import "medias/photos/jqtouch/jqtouch.min.css";</style>
        <style type="text/css" media="screen">@import "medias/photos/themes/theme.css";</style>
        <script src="medias/photos/jqtouch/jqtouch.min.js" type="application/x-javascript" charset="utf-8"></script>
        <script type="text/javascript" charset="utf-8">
            var jQT = new $.jQTouch({
                icon		: 'medias/photos/codropsIcon.png',
                cacheGetRequests: true,
                addGlossToIcon	: false,
                startupScreen	: 'medias/photos/codropsSplash.png',
                statusBar	: 'black',
                preloadImages: [
                    'medias/photos/themes/img/back_button.png',
                    'medias/photos/themes/img/back_button_clicked.png',
                    'medias/photos/themes/img/button_clicked.png',
                    'medias/photos/themes/img/grayButton.png',
                    'medias/photos/themes/img/whiteButton.png',
                    'medias/photos/themes/img/loading.gif'
                ]
            });
        </script>
		<script src="medias/photos/jquery.gallery.js" type="application/x-javascript" charset="utf-8"></script>
</head> 
<body> 
<?php include('header.php'); ?>
	<script type="text/javascript" src="cookies.js"></script>
	<a href="./index.php" data-role="button"  data-theme="a"><div class="retourAuMenu">Retour au menu</div></a>
	<div data-role="content" data-theme="a">	
		<!-- The list of albums -->
        <div id="albums_container" class="current">
            <div class="toolbar">
                <h1>Gallerie photos</h1>
            </div>
            <div class="loader" style="display:none;"></div>
            <ul id="albums" class="edgetoedge" style="display:none;">
            </ul>
        </div>
        <!-- The list of images (thumbs) -->
        <div id="thumbs_container">
            <div class="toolbar">
                <h1>Gallerie photos</h1>
                <a class="back" href="#albums_container">Albums</a>
            </div>
            <div class="loader" style="display:none;"></div>
            <ul id="thumbs" class="thumbView" style="display:none;">
            </ul>
        </div>
		<!-- The single image container -->
        <div id="photo_container">
            <div class="toolbar">
                <h1>Gallerie photos</h1>
                <a class="back" href="#albums_container">Albums</a>
            </div>
            <div class="loader" style="display:none;"></div>
            <div id="theimage" class="singleimage"></div>
            <div class="descriptionWrapper">
                <p id="description"></p>
                <div id="prev" style="display:none;"></div>
                <div id="next" style="display:none;"></div>
            </div>
        </div>
	</div><!-- /content -->
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
