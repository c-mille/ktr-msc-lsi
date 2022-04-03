 <?php
require"db.php";
require 'header.php';


$cards=$pdo->query('SELECT * FROM cards ORDER BY id DESC');

?>

<?php

require"db.php";

if(isset($_POST['usernameb'], $_POST['company_nameb'],$_POST['emailb'],$_POST['phoneb']));{
if(!empty($_POST['usernameb']) AND !empty($_POST['emailb'])){
    $username=htmlspecialchars($_POST['usernameb']);
    $company_name=htmlspecialchars($_POST['company_nameb']);
    $email=htmlspecialchars($_POST['emailb']);
    $phone=htmlspecialchars($_POST['telephoneb']);
    $ins=$pdo->prepare('INSERT INTO cards(usernameb,company_nameb,emailb,phoneb)VALUES (?,?,?,?)');
    $ins->execute(array($username,$company_name,$email,$phone));
    $msg="CARD ADDED";
    header ('location :/inc/cards.php');



    }else{
        $msg='Field username and email';
    }

}



?>

        <h1>ADD New CARD</h1>
        
        <?php if(isset($msg)){echo  $msg ;} ?>
        
        <div>
   
 





<form action='home.php' method="POST">
    <div class="form-group">
        <label for="">Pseudo</label>
        <input type="text" name="usernameb" required>

        
    </div>


        <div class="form-group">
        <label for="">Company Name</label>
        <input type="text" name="company_nameb" >
        
        
    </div>
        <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="emailb" >
        
    </div>

    </div>
        <div class="form-group">
        <label for="">Phone</label>
        <input type="text" name="telephoneb" >
        
   
<button type="submit" name="submit">ADD CARD</button>

</form>


<html>
 <head>
  <title>MY CARDS</title>
 </head>
 <body>

<?php while ($a=$cards->fetch( PDO::FETCH_ASSOC)) { ?>
    <li> <?=$a['usernameb'] ?> </li>
     <li> <?=$a['company_nameb'] ?> </li>
      <li> <?=$a['emailb'] ?> </li>
       <li> <?=$a['phoneb'] ?> </li>
   <?php }?>


 </body>
</html>