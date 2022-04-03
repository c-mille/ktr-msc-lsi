<?php
require 'header.php';
require 'db.php';
require_once 'functions.php';

try {
	if(!empty($_POST)){
		$errors=array();
		
		if (empty($_POST['username'])) {
			$errors['username']="Enter username";
			
		}else{
			$req=$pdo->prepare('SELECT id FROM users WHERE username =?');
			$req->execute([$_POST['username']]);
			$user=$req->fetch();
		if ($user) {
			$errors['username']="Name already taken";
		}
		}
		
		
		
		if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
			$errors['email']="Enter email";
		}else{
			$req=$pdo->prepare('SELECT id FROM users WHERE email =?');
			$req->execute([$_POST['email']]);
			$user=$req->fetch();
		if ($user) {
			$errors['email']="Already Register";
		}
		}
		
		
		if (empty($_POST['password'])|| $_POST['password']!=$_POST['password_confirm']){
			$errors['email']="Password don't match";
		debug($errors);
		}
		
		
		if (empty($errors)) 
		{
		
		$req=$pdo->prepare("INSERT INTO users(username,password,email,company_name,telephone) VALUES(?,?,?,?,?)");
		$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
		$company_name=htmlspecialchars($_POST['company_name']);
		$telephone=htmlspecialchars($_POST['telephone']);
		$req->execute([$_POST['username'],$password,$_POST['email'],$_POST['company_name'],$_POST['telephone']]);
		
		die('Account created');
		}
		
		
		}
	} catch (\Exception $e) {
		die($e->getMessage());
	}	
		
		
		
		?>
		<h1>Register</h1>
		
		<?php if(!empty($errors)):?>
		
		<div>
		<p>Form no field correctly</p>
		<ul>
		<?php foreach($errors as $error): ?>
		<li><?=$error; ?></li>
		<?php endforeach;  ?>
		
		</ul>
		</div>
		<?php endif; ?>




<form action='' method="POST">
	<div class="form-group">
		<label for="">Pseudo</label>
		<input type="text" name="username" >

		
	</div>


		<div class="form-group">
		<label for="">Company Name</label>
		<input type="text" name="company_name" >
		
		
	</div>
		<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" required>
		
	</div>

	</div>
		<div class="form-group">
		<label for="">Phone</label>
		<input type="text" name="telephone" >
		
	</div>
		<div class="form-group">
		<label for="">Password</label>
		<input type="password" name="password" required>
		
	</div>
		</div>
		<div class="form-group">
		<label for="">Password Confirmation</label>
		<input type="password" name="password_confirm" required>
		
	</div>
<button type="submit" name="submit">Register</button>

</form>
