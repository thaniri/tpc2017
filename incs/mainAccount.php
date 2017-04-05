<?php
/*
Todo:
- display wallet contents, name
- allow user to add funds to account
- allow user to delete account
*/
    session_start();
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    displayCustomerInfo($link);

/**
* This function shows how much money the customer has in their wallet
*/
function displayCustomerInfo($link){
    echo '<div class="largeContent"><div class="insideLargeContent">';
        if(isset($_SESSION['loggedin'])){
            $cID = findUserID($link);
            $result = mysqli_query($link, 'select cWallet from customer where cID = ' . $cID . ';');
            if($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                    echo '<p>Your account has $' . $row[0] . '</p>';
                }
            }
        }
        else{
            echo '<p>You are not logged in!</p>';
        }
    echo '</div></div>';
}

/**
* This function finds a user's ID based on their email session
*
* @param $link the handler to the database
*/
function findUserID($link){
    $result = mysqli_query($link, 'select cID from customer where cEmail = "' . $_SESSION['email'] . '" limit 1');
    if($result->num_rows > 0) {
            return $result->fetch_array()[0];
    }
    else{
        echo 'Nothing Found';
    }
}

/**
* This function adds money to a users account
*/
function addFunds($link){

}

?>