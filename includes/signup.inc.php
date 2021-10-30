<?php
include_once "dbh.inc.php";
session_start();

$fullName = $_POST["fullName"];
$email = $_POST["email"];
$password = $_POST["password"];
$_SESSION["info"] = "";

if (isset($_POST["submit"])) {
  $sqlCheckUser="SELECT `username`, `pwd`, `email` FROM `user` WHERE username='$fullName' OR email='$email';";
  $checkingUser = mysqli_query($conn, $sqlCheckUser);
  if (mysqli_num_rows($checkingUser)>0) {
    $_SESSION["info"] = "The username or email already exist";
    header("Location: ../signup.php");
  }
  else{
  $sqlAddUser = "INSERT INTO user(username, pwd, email) VALUES ('$fullName','$password','$email');";
  mysqli_query($conn, $sqlAddUser);
  $_SESSION["info"] = "SignUp process succeful";
  header("Location: ../authorsPanel.php?signup=success");
  }
}