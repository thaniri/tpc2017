<!DOCTYPE html>
    <head>
        <title>Receipts</title>
		<meta name="description" content="TPC Ecommerce Home Page">
		<meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="icon" type="image/ico" href="images/logo.ico"/>
   </head>
    <body>
        <div id="wrapper">
			<div id="leftCol">
				<?php include 'incs/nav.php';?>
			</div>
			<div id="rightCol">
				<?php 
					include 'incs/header.php';
					echo '<main>';
					include 'incs/mainReceipt.php';
					echo '</main>';
					include 'incs/footer.php';
				?>
			</div>
		</div>
    </body>
</html>