<?php
session_start();

echo '<div class="largeContent">';
if (isset($_SESSION['loggedin'])){
	echo $_SESSION['email'];
}
else{
	echo '<br/>not logged in';
}
echo '</div>'


?>