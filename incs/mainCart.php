<?php
    session_start();
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    displayCart($link);
    purchaseCartContents($link);
    findUserID($link);

/**
* This function displays anything in the cart
*
* @param $link the handler to connect to the database
*/
function displayCart($link){
    echo '<div class="largeContent">';
    if(isset($_SESSION['loggedin'])){
        $myArr = splitCookie($_COOKIE['cart']);
    for($i = 0; $i < count($myArr); $i++){
        showCartContents($link, $myArr[$i]);
    }

    echo '<form method="post" action="cart.php">
            <input type="submit" name="purchase" value="purchase"></input>
         </form>';

    echo '</div>';
    }
    else{
        echo 'Not logged in';
    }
}

/**
* This function splits a cookie into an array by semicolon
* helper method for showCartContents()
*
* @return an array of book titles
*/
function splitCookie($cookie){
    return preg_split('/;/', $cookie);
}

/**
* This function echos out the first result from the books table where title is equal to the inputed value
*
* @param $link this is the link handler to the database
* @param $input this is the book title to be searched for
*/
function showCartContents($link, $input){
    $result = mysqli_query($link, 'select bTitle, bPrice, bQty, bCover from book where bTitle = "'. $input .'" limit 1');
    if($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo '<span class="titles">' . $row["bTitle"] . '</span><span class="prices"> - Price: $' . $row["bPrice"] .  '</span><br/>';
        }
    }
}

/*
* This function removes a single item from the cart
*/
function removeFromCart(){

}

/**
* This function deletes the cart cookie
*/
function clearCart(){
    if(isset($_POST['clearCart'])){
        setcookie('cart', '1', -1);
        header("Refresh:0");
    }
}

/**
* This function purchases the books in the cart   
* 1 of each book is removed from the books table
* the total price of the cart is removed from the customers wallet
*
* @param $link the handler to the database
* @param $input the book column to be reduced by 1
*/
function purchaseCartContents($link){
    $currentTime = getdate()[0];
	$dt = new DateTime("@$currentTime");
    $dt = $dt->format('Y-m-d H:i:s'); //this is the date in a mysql friendly format
    if(isset($_POST['purchase'])){
        //$link->begin_transaction();
        createReceipt($link, $dt);
        $rID = mysqli_query($link, 'select rID from receipt where cID = "'. findUserID($link) .'" and rDate = "' . $dt .'"')->fetch_array(); //attempting to find
        $myArr = splitCookie($_COOKIE['cart']);
        for($i = 0; $i < count($myArr); $i++){
            mysqli_query($link, 'update book set bQty = bQty-1 where bTitle = "'. $myArr[$i] .'"');
            mysqli_query($link, 'insert into receiptBook (rID, bID) values ( ' . $rID . ', (select bID from book where bTitle = "'. $myArr[$i] .'"))');
            //the problem is with finding $rID, it works it you just substitute in a number
            //mysqli_query($link, 'insert into receiptBook (rID, bID) values (26, (select bID from book where bTitle = "'. $myArr[$i] .'"))');
        }
        //$link->commit();
        setcookie('cart', '1', -1);
        header("Refresh:0");
    }
}

/**
* This function creates a receipt in the database based on a purchase
* helper method for purchaseCartContents()
*
* @param $link the handler to the database
* @param $dt the date
*/
function createReceipt($link, $dt){
    $cID = findUserID($link);
    mysqli_query($link, 'insert into receipt (rID, cID, rDate) values (null, ' . $cID . ', "' . $dt . '")');
}

//insert into receipt (rID, cID, rDate) values (3, 2, "2017-03-30 08:44:20");

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

?>