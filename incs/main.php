<?php
session_start();

echo '<div class="largeContent"><div class="insideLargeContent">';
if (isset($_SESSION['loggedin'])){
	echo '<p>Welcome to TPC 2017</p>';
}
else{
	echo '<p>not logged in</p>';
}
echo '</div></div>'

?>