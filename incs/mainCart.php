<?php
    session_start();
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    displayCart($link);
    clearCart();

/**
* This function displays anything in the cart
*
* @param $link the handler to connect to the database
*/
function displayCart($link){
    echo '<div class="largeContent">';
    
    $myArr = splitCookie($_COOKIE['cart']);
    for($i = 0; $i < count($myArr); $i++){
        showCartContents($link, $myArr[$i]);
    }

    echo '<form method="post" action="cart.php">
            <input type="submit" name="clearCart" value="Clear cart"></input>
         </form>';

    echo '</div>';
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
            echo $row["bTitle"] . ' Price: $' . $row["bPrice"] .  '<br/>';
        }
    }
    else{
        echo 'Nothing here';
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

/*
* This function purchases the books in the cart   
* 1 of each book is removed from the books table
* the total price of the cart is removed from the customers wallet
*/
function purchaseCartContents(){

}

?>