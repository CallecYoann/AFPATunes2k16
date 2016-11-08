<?php
include '../config/config.php';

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

$add =  $pdo->prepare('INSERT INTO track VALUES (0, :title, :artist, :duration, :year)');
$add->bindValue("title", $_POST['title']);
$add->bindValue("artist", $_POST['artist']);
$add->bindValue("duration", $_POST['duration']);
$add->bindValue("year", $_POST['year']);

$add->execute();

header('location: ../index.php');
?>
