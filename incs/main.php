<?php
session_start();

echo 'hi ';
if (isset($_SESSION['loggedin'])){
	echo $_SESSION['email'];
}
else{
	echo '<br/>not logged in';
}



?>