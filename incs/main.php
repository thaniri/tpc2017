<?php
session_start();

echo '<div class="largeContent"><div class="insideLargeContent">';
if (isset($_SESSION['loggedin'])){
	echo '<h1>Welcome to TPC 2017</h1>';
}
else{
	echo '<p>You are not logged in!</p>';
}
echo '</div></div>'

?>