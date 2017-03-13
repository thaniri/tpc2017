<?php
session_start();

echo '<div class="largeContent">';
if (isset($_SESSION['loggedin'])){
	echo $_SESSION['email'];
}
else{
	echo '<br/>not logged in';
	echo '<button id="menuIcon" onclick="myTest()"><img src="./images/icons/ic_menu_black_24px.svg"/></button>';
}
echo '</div>'


?>