 <?php
require"db.php";
require 'header.php';


$cards=$pdo->query('SELECT * FROM cards ORDER BY id DESC');

?>


<html>
 <head>
  <title>MY CARDS</title>
 </head>
 <body>

<?php while ($a=$cards->fetch( PDO::FETCH_ASSOC)) { ?>
    <li> <?=$a['username'] ?> </li>
     <li> <?=$a['company_name'] ?> </li>
      <li> <?=$a['email'] ?> </li>
       <li> <?=$a['phone'] ?> </li>
   <?php }?>


 </body>
</html>