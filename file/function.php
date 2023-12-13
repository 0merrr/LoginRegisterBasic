<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db");

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

// REGISTER
function register(){
  global $conn;

  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $mail = $_POST["mail"];     
  $password = $_POST["password"];

  if(empty($name) || empty($surname) || empty($mail) || empty($password)){
    echo "Please Fill Out The Form!";
    exit;
  }

  // Şifreyi hashle
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Database e gönderme
  $query = "INSERT INTO users VALUES('', '$name','$surname', '$mail', '$hashed_password')";
  mysqli_query($conn, $query);
  echo "Kayıt başarılı";  
}

// LOGIN
function login(){
  global $conn;

  $mail = $_POST["mail"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM users WHERE mail = '$mail'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    // Şifreyi doğrula
    if(password_verify($password, $row['password'])){
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
