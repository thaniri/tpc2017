<?php

session_start();
checkForLogin();

/**
* This method checks for a loggedin session variable
*/
function checkForLogin(){
    if(isset($_SESSION['loggedin'])){
        //if the user is logged in redirect to homepage
        header('Location: ./index.php');
        die();
    }
    elseif(isset($_POST['submit'])){
        //if the submit button is pressed on the create account form, validate it and go ahead or display the form again
        include './sql/validateCrud.php';
        if(validateServerSide($_POST['email'] == false) && validateServerSide($_POST['password'] == false) && validateServerSide($_POST['fname'] == false) && validateServerSide($_POST['lname'] == false) && validateServerSide($_POST['wallet'] == false)){
            //this giant logic is just checking every single input
            createNew($_POST['email'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['wallet']);
            header('Location: ./login.php');
            die();
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
* This method grabs all entries from the create account form and inserts them into the database
*
* @param $email //users email to login
* @param $oldpass //users password to be hashed into a new password
* @param $fname
* @param $lname
* @param $wallet //for now user can arbitrarily decide wallet size
*/
function createNew($email, $oldpass, $fname, $lname, $wallet){
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    $saltHash = hashSalt($oldpass);
    mysqli_query($link, 'insert into customer values (null, "'.$saltHash[1].'", "'.$saltHash[0].'", "'.$email.'", "'.$fname.'", "'.$lname.'", "'.$wallet.'")');
}

/**
* This method creates a create account form
*/
function displayForm(){
	echo '
    <div class="largeContent">
        <form name="createForm" onsubmit="return validateCreate()" action="create.php" method="post">
            Email:<input type="textbox" name="email"></input><br/>
            Password:<input type="password" name="password"></input><br/>
            First Name:<input type="textbox" name="fname"></input><br/>
            Last Name:<input type="textbox" name="lname"></input><br/>
            Wallet:<input type="textbox" name="wallet"></input><br/>
            <input type="submit" name="submit"></input>
            <div id="inputErrors"></div>
        </form>
    </div>';
}

function displayFormInvalid(){
    echo '
    <div class="largeContent">
        <form name="createForm" onsubmit="return validateCreate()" action="create.php" method="post">
            Email:<input type="textbox" name="email"></input><br/>
            Password:<input type="textbox" name="password"></input><br/>
            First Name:<input type="textbox" name="fname"></input><br/>
            Last Name:<input type="textbox" name="lname"></input><br/>
            Wallet:<input type="textbox" name="wallet"></input><br/>
            <input type="submit" name="submit"></input>
            <div id="inputErrors"></div>
        </form>
        <p class="errorMessage">Invalid Input</p>
    </div>';
}
/**
* This method changes $oldpass into a hashed and salted $newpass
* Helper method of createNew()
*/

function hashSalt($oldpass){
    //cost is how much we care about security
    $cost = 10;
    //create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    //make a hash with the salt from above
    $hash = crypt($oldpass, $salt);
    $saltHash = array($salt, $hash);
    return $saltHash;
}

?>