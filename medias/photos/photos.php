<!DOCTYPE html> 
<html> 
	<head> 
	<title>Concours</title> 
	<?php include('init.php'); ?>
</head> 
<body> 
<?php include('header.php'); ?>
	<script type="text/javascript" src="cookies.js"></script>
	<a href="./index.php" data-role="button"  data-theme="a"><div class="retourAuMenu">Retour au menu</div></a>
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
<?php include('footer.php'); ?>
</div><!-- /page one -->
</body>
</html>
