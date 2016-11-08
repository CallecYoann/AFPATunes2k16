<?php

include '../config/config.php';

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));


$mj = $pdo->prepare("SELECT * FROM playlist;");
$mj->execute();
$donnees = $mj->fetch();
  echo '<img src="'.$donnees['cover'].'">';
 ?>
 <!DOCTYPE html>
 <html>
   <head>

     <meta http-equiv="refresh" content="2; URL=../index.php">
     <title>Your Picture</title>
   </head>
   <body>
   </body>
 </html>
