<?php
    session_start();
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    displayPastPurchases($link);

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

function displayPastPurchases($link){
    $cID = findUserID($link);
    $result = mysqli_query($link, 'select receipt.rDate, book.bTitle, book.bCover from receipt join receiptBook on receipt.rID = receiptBook.rID join book on receiptBook.bID = book.bID where cID = ' . $cID . ';');
     if($result->num_rows > 0){
        while($row = $result->fetch_array()){
            echo '<div class="smallContent">' . 
                $row["rDate"] . ' ' . $row["bTitle"] . '<img src="./images/bookCovers/' . $row["bCover"] . '"></img>'
            . '</div>';
        }
    }

}

?>
