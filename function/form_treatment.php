<?php
include('Track.php');


$Track1 = new Tracks($_POST['id'], $_POST['title'], $_POST['artist'], $_POST['duration'], $_POST['year']);

$Track2 = new Tracks();
$Track2->setId(18);
$Track2->setTitle("kikou");

var_dump($Track2);


echo 'artist:'.$Track1->getArtist();

var_dump($Track1);
