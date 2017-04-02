<?php
    session_start();
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    displayPastPurchases($link);
    showWallet($link);

function showWallet($link){
    echo '<div class="largeContent">
            <div class="insideLargeContent">
            <p>You have: $';
        displayCustomerWallet($link);
     echo '</div></div>';
}

/**
* This function shows how much money the customer has in their wallet
*/
function displayCustomerWallet($link){
	$result = mysqli_query($link, 'select cWallet from customer where cID = 15;');
    if($result->num_rows > 0) {
		
        while($row = $result->fetch_array()) {
            echo $row[0];
        }
    }
}

/**
* This function adds money to a users account
*/
function addFunds($link){

}

?>