<?php
session_start();

echo '<div class="largeContent">';
 include './sql/configure.php';
    if(!$link){
        echo mysqli_connect_error();
        die();
    }
if (isset($_SESSION['loggedin'])){
	 /*works
	 $rID = 20;
	 $b = "The Art of War";
	 mysqli_query($link, 'insert into receiptBook (rID, bID) values ('.$rID.', (select bID from book where bTitle = "'.$b.'"))');
	 //mysql> insert into receiptBook (rID, bID) values (18, (select bID from book where bTitle = "The Art of War"));*/

	 $currentTime = getdate()[0];
	 $dt = new DateTime("@$currentTime");
     $dt = $dt->format('Y-m-d H:i:s');
	 echo $dt . '<br/>';
     $rID = mysqli_query($link, 'select rID from receipt where cID = "2" and rDate = "2017-03-30 09:37:52"')->fetch_array();
	 echo $rID[0];
}
else{
	echo '<br/>not logged in';
}
echo '</div>'


?>