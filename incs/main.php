<?php

if(!isset($_Session["username"])){
	echo'<main>
		<form method="POST" action="php/login.php">
			<p>Login:</p><input type="textbox" name="login"></input>
			<p>Password:</p><input type="password" name="password"></input>
			<input type="submit" name="submit"></input>
		</form>
	</main>';
}
else{
	echo 'This is what happens if they have a session already';
}



?>