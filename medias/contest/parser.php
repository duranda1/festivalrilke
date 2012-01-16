<?php
//    
   // function addVote($id)
// {
$fichier = 'private/votes.xml';
	
					// the root node is <info/> so we load it into $info
$root = simplexml_load_file('private/votes.xml');

$video = $root->xpath('//video[@id="1"]');
if(isset($video[0])){
	$video[0]++;
}
else {
	$newMov   = $root->addChild('video', 1);
	$increment = $root->xpath('//video[not(../video/@id > @id)]');
	$newMov->addAttribute('id', 'stars');
}
// update
//$votes->video->name->nameCoordinate->xName = $xPostName;
//$info->user->name->nameCoordinate->yName = $yPostName;

//print_r($video);
//print_r($votes);
print($video[0]);
print_r($increment = $root->xpath('//video[not(//video/@id > @id)]'));
// save the updated document
//$info->asXML('test.xml');

//$xml_string .= $node->asXML();
//$xml_string='newlastname';
// }
 


   
					
				
?>