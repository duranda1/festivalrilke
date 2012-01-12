<!DOCTYPE html>
<html>
	<head>
		<title>Videos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="jquery/jquery.mobile-1.0.css" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<script type="text/javascript" src="jquery/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="jquery/jquery.mobile-1.0.js"></script>
	</head>
	<body>
		<?php
		include ('header.php');
		?>
		<script type="text/javascript" src="cookies.js"></script>
		<a href="./index.php" data-role="button"  data-theme="a">Retour au menu</a>
		<div data-role="content" data-theme="a">
			<?php
			function getImages($path) {
				$dir = opendir(dirname(__FILE__) . "/$path/thumbs");
				$files = array();
				while (false !== ($file = readdir($dir))) {
					if (strpos($file, '.gif', 1) || strpos($file, '.jpg', 1)) {
						$files[] = $file;
					}
				}
				closedir($dir);

				return $files;
			}
			?>

			<?PHP
// fetch image details

$path = "medias/videos";
//$dir = "http://153.109.141.61/videos";
$images = getImages($path);

// display on page
foreach($images as $img) {
//echo $img['file'];

echo $img;

// your file
$file = $img;

$info = pathinfo($file);
$file_name =  basename($file,'.'.$info['extension']);

echo $file_name; // outputs 'image'

echo"<center><div class=\"videos\"><video width=\"320\" height=\"240\" controls=\"controls\"  poster=\"$path/thumbs/$img\" preload=\"none\">
<source src=\"$path/$file_name.mp4\" type=\"video/mp4\" />
<source src=\"$path/$file_name.webm\" type=\"video/webm\" />
Your browser does not support the video tag.
</video> </div></center>";

}
			?>

			<!-- <center>
				<div class="videos">
					<video width="320" height="240" controls="controls"  poster="medias/videos/thumbs/Rainer Maria Rilke - Der Panther(360p).jpg" preload="none">
						<source src="medias/videos/Rainer Maria Rilke - Der Panther(360p).mp4" type="video/mp4" />
						<source src="medias/videos/Rainer Maria Rilke - Der Panther(360p).webm" type="video/webm" />
						Your browser does not support the video tag.
					</video>
				</div>
			</center> -->
		</div><!-- /content -->
		<?php
			include ('footer.php');
		?>
		</div><!-- /page one -->
	</body>
</html>
