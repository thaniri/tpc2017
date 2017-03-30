<?php
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
    addToCartCookie();
    addToPriceCookie();
    displayBookResults($link);
    
/**
* This function displays all the results when querying the database for books
*/
function displayBookResults($link){
    $result = mysqli_query($link, 'select bTitle, bPrice, bQty, bCover, bGenre, bYear from book');
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo '<div class="smallContent">
            <form method="post" action="shop.php">
                Title: ' . $row["bTitle"] 
                . '<br/> Cover: ' . '<img src="./images/bookCovers/' . $row['bCover'] . '"></img>' 
                . '<br/> Price: $' . $row["bPrice"] 
                . '<br/>Quantity: ' . $row["bQty"] 
                . '<br/>Genre: ' . $row["bGenre"] 
                . '<br/>Year: ' . $row["bYear"] 
                . '<br/><input type="hidden" name="hidden" value="'.$row["bTitle"].'">
                <input type="hidden" name="hiddenPrice" value="'.$row["bPrice"].'">
                </input><input type="submit" name="submit" value="Add to cart"></input>
            </form></div>';
        }
    } 
    else {
        echo "Database Empty";
    }
}

/**
* This function adds a selected book to a users cookies for use in the shopping cart
*/
function addToCartCookie(){
    if(isset($_POST['submit']) && isset($_SESSION['loggedin'])){
        if(isset($_COOKIE['cart'])){
            setcookie('cart', $_COOKIE['cart'] . ';' . $_POST['hidden'], time()+60*60);
        }
        else{
            setcookie('cart', $_POST['hidden'], time()+60*60);
            header("Refresh:0");
        }
    }
}

/**
* This function adds the prices of selected books to a users cookiess for use in the shopping cart
*/
function addToPriceCookie(){
    if(isset($_POST['submit']) && isset($_SESSION['loggedin'])){
        if(isset($_COOKIE['cartPrice'])){
            setcookie('cartPrice', $_COOKIE['cartPrice'] . ';' . $_POST['hiddenPrice'], time()+60*60);
        }
        else{
            setcookie('cartPrice', $_POST['hiddenPrice'], time()+60*60);
            header("Refresh:0");
        }
    }
}

?>