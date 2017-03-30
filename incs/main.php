<?php
session_start();

echo '<div class="largeContent">';
 include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
if (isset($_SESSION['loggedin'])){
	echo 'hi';
}
else{
	echo '<br/>not logged in';
}
echo '</div>'


?>