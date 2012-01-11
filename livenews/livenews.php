<?php
//get the q parameter from URL
//$q=$_GET["q"];

//find out which feed was selected

  $xml=(dirname(__FILE__) . "/feed/livenews_fr.xml");
  

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
/*echo("<p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br />");
echo($channel_desc . "</p>");
*/
//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
$nodeListLength = $x->length; // this value will also change
echo ("<div class=\"headline\">");
for ($i=0; $i<$nodeListLength; $i++)
  {
  	if ($i%(3)==0&&$i!=0) {
     echo ("</div><div class=\"headline\">");
  }
	
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_pub=$x->item($i)->getElementsByTagName('pubDate')
  ->item(0)->childNodes->item(0)->nodeValue;


  //echo ("<p><a href='" . $item_link
  //. "'>" . $item_title . "</a>");
  //echo ("<br />");
  echo ("<span class=\"feeddate\">" . date('d-m H:i', strtotime($item_pub)). "</span> " . $item_title  . "</br>");
  
  
  }
  echo ("</div>");
?> 