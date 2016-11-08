<?php
include '../config/config.php'; 

$passwd = password_hash($_POST['pwdtext'], PASSWORD_DEFAULT);

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$create =  $pdo->prepare('INSERT INTO users VALUES (0, :username, :password, :email)');
$create->bindValue("username", $_POST['logintext']);
$create->bindValue("password", $passwd);
$create->bindValue("email", $_POST['emailtext']);

if ($create->execute()){

  echo "cool";
  header('Location: add_user_confim.php');

}else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="2; URL=add_user_confim.php"> -->
    <title></title>
  </head>
</html>
<?php
echo "Username already exists, please choose another.";
}

?>
