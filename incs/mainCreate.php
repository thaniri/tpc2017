<?php

session_start();
if(isset($_SESSION['loggedin'])){
	header('Location: ./index.php');
    die();
}
elseif(isset($_POST['submit'])){
    createNew($_POST['email'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['wallet']);
}
else{
	displayForm();
}

function createNew($email, $newpass, $fname, $lname, $wallet){
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    mysqli_query($link, 'insert into customer values (null, "'.$email.'", "'.$newpass.'", "'.$fname.'", "'.$lname.'", "'.$wallet.'")');
}

function displayForm(){
	echo '
	<form action="create.php" method="post">
		Email:<input type="textbox" name="email"></input><br/>
		Password:<input type="textbox" name="password"></input><br/>
        First Name:<input type="textbox" name="fname"></input><br/>
        Last Name:<input type="textbox" name="lname"></input><br/>
        Wallet:<input type="textbox" name="wallet"></input><br/>
		<input type="submit" name="submit"></input>
	</form>';
}

?>