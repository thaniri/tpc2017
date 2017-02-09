<?php
    include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }

    $result = mysqli_query($link, 'select bTitle from book');
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="smallContent">'. $row["bTitle"] .'</div>';
        }
    } 
    else {
        echo "Database Empty";
    }



?>