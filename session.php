
<?php
$user_id=$_GET['id'];
require'db.php'
$req=$pdo->prepare('SELECT * FROM users WHERE id=?');
$req->execute(['$user_id']);
$user=$req->fetch();

if($user==1){
	sess


}





?>