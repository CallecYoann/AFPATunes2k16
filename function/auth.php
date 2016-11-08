<?php
include '../config/config.php';

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$log = $_POST["logintext"];
$pwd = $_POST["pwdtext"];
$auth = $pdo->prepare("SELECT * FROM users WHERE username=:username");
$auth->bindValue("username", $log);

$auth->execute();

$user = $auth->fetch();

if(!$user) {

}else{

  if (password_verify($pwd, $user['password']))
//  if($psw==$user['password'])
  {
    session_start();
    $_SESSION["login"] = $log;
    $_SESSION["password"] = $pwd;
    echo $_SESSION['login'];
    header('Location: ../index.php');
  }  else{
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="refresh" content="2; URL=../index.php">
   <title> Wrong Authentification ! </title>
 </head>
  <body>
Wrong Authentification !
  </body>
</html>
