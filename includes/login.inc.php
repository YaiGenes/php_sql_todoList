<?php
session_start();
include_once "dbh.inc.php";

$fullName = $_POST["fullName"];
$email = $_POST["email"];
$password = $_POST["password"];
$_SESSION["info"] = "";
$_SESSION["username"] = "";

if (isset($_POST["submitting"])) {
  $sqlCheckUser="SELECT `username`, `pwd`, `email` FROM `user` WHERE username='$fullName' OR email='$email';";
  $checkingUser = mysqli_query($conn, $sqlCheckUser);
  if (mysqli_num_rows($checkingUser)>0) {
    $_SESSION["username"] = "$fullName";
    header("Location: ../authorsPanel.php");
  }
  else{
  $_SESSION["info"] = "You are not registered, please SignUp";
  header("Location: ../signup.php");
  }
}