<?php
//    
   // function addVote($id)
// {
$fichier = 'private/votes.xml';
	
					// the root node is <info/> so we load it into $info
$root = simplexml_load_file('private/votes.xml');

$video = $root->xpath('//video[@id="3"]');
if(isset($video[0])){
	$video[0]=25;
}
else {
	$newMov   = $root->addChild('video', 1);
	$highest = $root->xpath('//video[not(../video/@id > @id)]');
	$increment = $highest[0]->getAttribute('id');
	$newMov->addAttribute('id', $increment+1);
}
// update
//$votes->video->name->nameCoordinate->xName = $xPostName;
//$info->user->name->nameCoordinate->yName = $yPostName;

//print_r($video);
//print_r($votes);
//print($video[0]);


$highest = $root->xpath('//video[not(../video/@id > @id)]');
print_r($highest[0]);
print(gettype($highest));

// save the updated document
print_r($root);
$root->asXML('private/votes.xml');

//$xml_string .= $node->asXML();
//$xml_string='newlastname';
// }
 


   
					
				
?>