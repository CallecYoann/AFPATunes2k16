<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Signup - Registration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <style media="screen">
    .addUser {
      text-align: center;
      margin: 5px 0 5px 0;
    }
    .btn-primary {
      margin: 10px 0 5px 0;
    }
    #hide {
      display: none;
    }
  </style>

  <body>

    <form class="addUser" action="function/adduser_ok.php" method="post">
<input class="addUser" type="text" name="logintext" placeholder="Login"><br>
<input class="addUser" type="password" name="pwdtext" placeholder="Password"><br>
<input class="addUser" type="email" name="emailtext" placeholder="Email"><br>
<button type="submit" class="btn btn-primary">Sign up</button>
    </form>

  </body>
</html>
