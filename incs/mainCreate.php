<?php

session_start();
if(isset($_SESSION['loggedin'])){
	header('Location: ./index.php');
    die();
}
elseif(isset($_POST['submit'])){
    createNew($_POST['email'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['wallet']);
    header('Location: ./login.php');
    die();
}
else{
	displayForm();
}

function createNew($email, $oldpass, $fname, $lname, $wallet){
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    $newpass = hashSalt($oldpass);
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

function hashSalt($oldpass){
    //cost is how much we care about security
    $cost = 10;
    //create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    //make a hash with the salt from above
    $hash = crypt($oldpass, $salt);
    return $hash;
}

?>