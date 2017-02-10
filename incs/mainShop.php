<?php
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }

    $result = mysqli_query($link, 'select bTitle, bPrice, bQty, bCover, bGenre, bYear from book');
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo '<div class="smallContent">Title: '. $row["bTitle"] . '<br/> Cover: ' . $row["bCover"] . '<br/> Price: ' . $row["bPrice"] . '<br/>Quantity: ' . $row["bQty"] . '<br/>Genre: ' . $row["bGenre"] . '<br/>Year: ' . $row["bYear"] . '</div>';
        }
    } 
    else {
        echo "Database Empty";
    }



?>