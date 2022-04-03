<?php
session_start();
require 'db.php';
require 'header.php';

if (isset($_POST['submit'])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username=htmlspecialchars($_POST['username']);
		$req= $pdo->prepare('SELECT * FROM users WHERE username=? LIMIT 1');
		$req->execute(array($username));

		if($req->rowCount()>0){
			while($row=$req->fetch(PDO::FETCH_ASSOC)) {
				if (password_verify($_POST['password'], $row['password'])) {
					echo "Hi";
					$_SESSION["logged_user"] = $row;
					header('location:home.php'); 
				}
			}
		} else {
			echo "WRONG ID";
		}
	} else{
		echo "Field the form";
	}
}
?>







<h1>Connection</h1>



<form action='home.php' method="POST">

	<div class="form-group">
		<label for="">Pseudo</label>
		<input type="text" name="username" >
		
	</div>
		<div class="form-group">
		<label for="">Password</label>
		<input type="password" name="password" >
		
	</div>

<button type="submit" name="submit">Log in</button>

</form>

