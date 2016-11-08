<?php
include '../config/config.php';


$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));


$stmt =  $pdo->prepare("DELETE FROM track WHERE id = :id");
$stmt->bindValue("id", $_GET['id']);
$stmt->execute();

header('location: ../index.php');





?>
