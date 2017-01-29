<?php

session_start();

if(isset($_SESSION['loggedin'])){
	header('Location: ./index.php');
    die();
}
elseif(isset($_POST['submit'])){
    login($_POST['email'], $_POST['password']);
}
else{
	displayForm();
}

function displayForm(){
	echo '
	<form action="login.php" method="post">
		Email:<input type="textbox" name="email"></input><br/>
		Password:<input type="textbox" name="password"></input><br/>
		<input type="submit" name="submit"></input>
	</form>';
}

function login($email, $password){
//logs a user in and sets $_SESSION variables
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    $result = mysqli_query($link, 'select cemail, chash from customer where cemail = "'.$email.'"');
    $row = mysqli_fetch_array($result);
    if($_POST['email'] == $row['cemail'] && $_POST['password'] == $row['chash']){
        $_SESSION['email'] = $_POST['email'];
		$_SESSION['loggedin'] = 'yes';
        header('Location: ./index.php');
		die();
	}
	else{
		displayForm();
		echo 'wrong user or password';
	}
}

?>