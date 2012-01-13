<?php

function make_thumb($src,$dest,$desired_width, $desired_height)
{

  /* read the source image */
  $source_image = imagecreatefromjpeg($src);
  $width = imagesx($source_image);
  $height = imagesy($source_image);
  
  /* find the "desired height" of this thumbnail, relative to the desired width  */
  //$desired_height = floor($height*($desired_width/$width));
  
  /* create a new, "virtual" image */
  $virtual_image = imagecreatetruecolor($desired_width,$desired_height);
  
  /* copy source image at a resized size */
  imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
  
  /* create the physical thumbnail image to its destination */
  imagejpeg($virtual_image,$dest);
}


?>

<?php
$img_src_chemin = "http://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg/200px-Tour_Eiffel_Wikimedia_Commons.jpg";
$img_dst_chemin = "../medias/photos/thumbs/Rilke/exemple.jpg";
make_thumb($img_src_chemin, $img_dst_chemin, 75, 75);

?>

