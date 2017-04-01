<?php
//error_reporting(0);
//error reporting needs to be 0 here for the second session session_start
//this second session start needs to be here in order to echo the usenername into the header
session_start();
createHeader();

/**
* This function grabs whatever is in the <title> tag of a page
* http://stackoverflow.com/questions/3031973/get-current-page-url-and-title-in-wordpress
* http://stackoverflow.com/questions/399332/fastest-way-to-retrieve-a-title-in-php
*/
function page_title($url) {
	//i want to do a page_title($_SERVER['PHP_SELF']);)
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

	if(isset($_SESSION['loggedin'])){
		//if the user is already logged include their username in the header
		echo'<header>
			<button id="menuIcon" onclick="toggleMenu()"><img src="./images/icons/hamburger.png"/></button> 
			<h1>'. $title . '</h1>
			<div class="username">Hi '. $_SESSION['email'] .', <a href="./logout.php">Logout</a></div>
		</header>';
	}
	else{
		echo'<header>
			<button id="menuIcon" onclick="toggleMenu()"><img src="./images/icons/hamburger.png"/></button>
			<h1>'. $title . '</h1>
			<span class="username"><a href="./login.php">Login</a> | <a href="./create.php">Create Account</a></span>
		</header>';
	}
}

?>