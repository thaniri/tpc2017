<!DOCTYPE html>
    <head>
        <title>Homepage</title>
		<meta name="description" content="TPC Ecommerce Home Page">
		<meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<script src="scripts/toggleMenu.js"></script>
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
					include 'incs/main.php';
					echo '</main>';
					include 'incs/footer.php';
				?>
			</div>
		</div>
    </body>
</html>