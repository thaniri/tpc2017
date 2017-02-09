<?php

$title = $_SERVER['PHP_SELF'];

function page_title($url) {
	$fp = file_get_contents($url);
	if (!$fp) 
		return null;

	$res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
	if (!$res) 
		return null; 

	// Clean up title: remove EOL's and excessive whitespace.
	$title = preg_replace('/\s+/', ' ', $title_matches[1]);
	$title = trim($title);
	return $title;
}

//$title = page_title($_SERVER['PHP_SELF']);
	
echo'<header><h1>'
. $title . 
'</h1></header>';

?>