<?php
include '../config/config.php';

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$stmt = $pdo->prepare("UPDATE track SET title = :title, artist = :artist, duration = :duration, year = :year WHERE id = :id");
$stmt->bindValue("id", $_POST['id']);
$stmt->bindValue("title", $_POST['title']);
$stmt->bindValue("artist", $_POST['artist']);
$stmt->bindValue("duration", $_POST['duration']);
$stmt->bindValue("year", $_POST['year']);
$stmt->execute();

header('Location: ../index.php');
?>
