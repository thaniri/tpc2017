<?php
session_start();

echo '<div class="largeContent">';
if (isset($_SESSION['loggedin'])){
	echo $_SESSION['email'];
}
else{
	echo '<br/>not logged in
	<img id="menuIcon" src="./images/icons/ic_menu_black_24px.svg"/>';
}
echo '</div>'


?>