<?php

include '../config/config.php';

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

$editselect = $pdo->prepare('SELECT * FROM track WHERE id = :id');
$editselect->bindValue("id", $_GET['id']);
$editselect->execute();

  $ligne = $editselect->fetch();// boucle sur chaque enregistrement
  ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <form class="center" action="function/edit_ok.php" method="post">
    <input type="hidden" name="id" value="<?php echo $ligne['id']; ?>">
    <input type="text" name="artist" value="<?php echo $ligne['artist']; ?>"><br>
    <input type="text" name="title" value="<?php echo $ligne['title']; ?>"><br>
    <input type="text" name="duration" value="<?php echo $ligne['duration']; ?>"><br>
    <input type="text" name="year" value="<?php echo $ligne['year']; ?>">
    <button type="submit" class="btn btn-success">OK</button>

  </form>

<?php






if(isset(editBtn)){
$class = modal-open
}
else {
  $class=""
}





if (isset(editBtnModal)) {
$class=""
$style=""
}
else {

}
