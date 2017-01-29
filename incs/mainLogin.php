<?php

session_start();

if(isset($_SESSION['loggedin'])){
	header('Location: ./index.php');
    die();
}

elseif(isset($_POST['submit'])){
    if($_POST['email'] == 'thaniri@gmail.com' && $_POST['password'] == '1'){
        login($_POST['email'], $_POST['password']);
    }
    else{
       displayForm();
    }
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
   /* include 'configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    $result = mysqli_query($link, 'select email, password from a2 where email = "'.$email.'"');
    $row = mysqli_fetch_array($result);*/
    if($_POST['email'] == 'thaniri@gmail.com' && $_POST['password'] == '1'){
    //interesting problem here, the $password argument is not giving any data
    //ideally i would do if($email == && $password ==){}...
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