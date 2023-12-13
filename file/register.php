<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <h2>Register</h2>
    <form autocomplete="off" action="" method="post">
      <input type="hidden" id="action" value="register">
      <label for="">Name</label>
      <input type="text" id="name" value=""> <br>
      <label for="">Surname</label>
      <input type="text" id="surname" value=""> <br>
      <label for="">Mail</label>
      <input type="text" id="mail" value=""> <br>
      <label for="">Password</label>
      <input type="password" id="password" value=""> <br>

      <button type="button" onclick="submitData();">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
    <?php require 'script.php'; ?>
  </body>
</html>
