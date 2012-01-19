<!DOCTYPE html>
<html>
	<head>
		<title>Videos</title>
		<?php
			include ('init.php');
		?>
	</head>
	<body>
		<?php
		include ('header.php');
		?>
		<script type="text/javascript" src="cookies.js"></script>
		<a href="./index.php" data-role="button"  data-theme="a">Retour au menu</a>
		<div data-role="content" data-theme="a">
			<div class="contentZone">
				<h3>
				<div class="videos1" />
				Videos</h3>
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

				// fetch image details

				$path = "medias/videos";
				//$dir = "http://153.109.141.61/videos";
				$images = getImages($path);

				// display on page
				foreach ($images as $img) {
					//echo $img['file'];

					//echo $img;

					// your file
					$file = $img;

					$info = pathinfo($file);
					$file_name = basename($file, '.' . $info['extension']);

					echo "<span class=\"mainTitle\">$file_name</span>";
					// outputs 'image'

					echo "<center><div class=\"videos\"><video width=\"320\" height=\"240\" controls=\"controls\"  poster=\"$path/thumbs/$img\" preload=\"none\">
					<source src=\"$path/$file_name.mp4\" type=\"video/mp4\" />
					<source src=\"$path/$file_name.webm\" type=\"video/webm\" />
					Your browser does not support the video tag.
					</video> </div></center><br/>";

				}
				?>
			</div><!-- /content -->
			<?php
			include ('footer.php');
			?>
		</div>
		</div><!-- /page one -->
	</body>
</html>
