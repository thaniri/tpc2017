<?php

createHeader();

/**
* This function grabs whatever is in the <title> tag of a page
* http://stackoverflow.com/questions/3031973/get-current-page-url-and-title-in-wordpress
* http://stackoverflow.com/questions/399332/fastest-way-to-retrieve-a-title-in-php
*/
function page_title($url) {
	$fp = file_get_contents($url);
	if (!$fp) 
		return null;

	$res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
	if (!$res) 
		return null; 

	$title = preg_replace('/\s+/', ' ', $title_matches[1]);
	$title = trim($title);
	return $title;
}

/**
* This function creates the header
*/
function createHeader(){
	$title = $_SERVER['PHP_SELF'];
	echo'<header><h1>'
		. $title .
		'</h1></header>';
}

?>