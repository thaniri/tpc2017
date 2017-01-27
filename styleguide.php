<!DOCTYPE html>
    <head>
        <title>Style Guide</title>
		<meta name="description" content="TPC Ecommerce Home Page">
		<meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="icon" type="image/ico" href="images/logo.ico"/>
    </head>
    <body>
		<div id="leftCol">
			<?php include 'incs/nav.php';?>
		</div>
		<div id="rightCol">
			<?php 
				include 'incs/header.php';
				include 'incs/mainStyleGuide.php';
				include 'incs/footer.php';
			?>
		</div>
    </body>
</html>