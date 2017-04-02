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
	$result = mysqli_query($link, 'select cWallet from customer where cID = 15;');
    if($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo $row[0];
        }
    }
    echo '</div></div>';
}

/**
* This function adds money to a users account
*/
function addFunds($link){

}

?>