<?php

session_start();
checkForLogin();

/**
* This method checks for a loggedin session variable and redirects
* This method deals with the submit button
*/
function checkForLogin(){
	if(isset($_SESSION['loggedin'])){
		//if the user is already logged in redirect them to the homepage
		header('Location: ./index.php');
		die();
	}
	elseif(isset($_POST['submit'])){
		include './sql/validateCrud.php';
		if(validateServerSide($_POST['email'] == false) && validateServerSide($_POST['password'] == false)){
			//if the submit button is pressed on the create account form, validate it and go ahead or display the form again
			login($_POST['email'], $_POST['password']);
		}
		else{
			displayFormInvalid();
		}
	}
	else{
		displayForm();
	}
}

/**
* This method creates a login form
*/
function displayForm(){
	echo '<div class="largeContent">
		<form name="loginForm" onsubmit="return validateLogin()" action="login.php" method="post">
			Email:<input type="textbox" name="email"></input><br/>
			Password:<input type="textbox" name="password"></input><br/>
			<input type="submit" name="submit"></input>
			<div id="inputErrors"></div>
		</form>
	</div>';
}

/**
* This method makes a form after an invalid input has been detected
*/
function displayFormInvalid(){
	echo '<div class="largeContent">
		<form name="loginForm" onsubmit="return validateLogin()" action="login.php" method="post">
			Email:<input type="textbox" name="email"></input><br/>
			Password:<input type="textbox" name="password"></input><br/>
			<input type="submit" name="submit"></input>
			<div id="inputErrors"></div>
		</form>
		<p class="errorMessage">Invalid Input</p>
	</div>';
}

/**
* This method takes the $_POST login details and checks them against the database
*
* @param $email
* @param $password
*/
function login($email, $password){
//logs a user in and sets $_SESSION variables
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    $result = mysqli_query($link, 'select cemail, csalt, chash from customer where cemail = "'.$email.'"');
    $row = mysqli_fetch_array($result);
	$hash = crypt($_POST['password'], $row['csalt']);
	if($_POST['email'] == $row['cemail'] && $hash == $row['chash']){
        $_SESSION['email'] = $_POST['email'];
		$_SESSION['loggedin'] = 'yes';
        header('Location: ./index.php');
		die();
	}
	else{
		displayFormInvalid();
	}
}

?>