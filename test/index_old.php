<?php
session_start();
echo "Bonjour Jean " . $_SESSION['login'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<title>Votre Playlist</title>
	</head>
<body>

<?php

include 'config/config.php'; 

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

$stmt = $pdo->query("SELECT * FROM track;");
?>

<form action="add_track.php">
	<div id="adddiv"><input id="addbtn" class="btn btn-primary" type="submit" value="+" /></div>
</form>
<form id="login" action="auth.php" method="post">
	<input type="text" name="logintext" placeholder="LOGIN">
	<input type="text" name="pwdtext" placeholder="MDP">
	<input class="btn btn-info btn-sm" type="submit" name="loginBtn" value="Se connecter">
</form>
<form id="logtext" action="adduser.php" method="post">
	<input class="btn btn-default btn-sm" type="submit" name="addUserBtn"value="Créer un compte">
</form>
<table class="table table-hover">
<thead>
<tr>
<th>Artist</th>
<th>Title</th>
<th>Duration</th>
<th>Year</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php
while( $ligne = $stmt->fetch() ) // boucle sur chaque enregistrement
{
		echo "<tr><td>" . $ligne['artist']  . "</td>";
		echo "<td>" . $ligne['title']  . "</td>";
		echo "<td>" . $ligne['duration']  . "</td>";
		echo "<td>" . $ligne['year']  . "</td>";
		echo '<td><a class="btn btn-warning btn-sm" href=edit.php?id=' . $ligne['id']  . '>edit</a></td>';
		echo '<td><a class="btn btn-danger btn-sm" href=del.php?id=' . $ligne['id']  . '>del</a></td></tr>';
}
echo "</tbody>";
echo "</table>";

?>

</body>
</html>
<!-- <a href="add_track.php">Ajouter un morceau</a> -->
