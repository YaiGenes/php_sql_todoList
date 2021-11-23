<?php
require_once MODELS . 'registerModel.php';

session_start();
  $fullName = $_POST["fullName"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $_SESSION["info"] = "";
  $_SESSION["username"] = "";


if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action, $fullName, $email, $password);
}else {
  error("The function that you are trying to call does not exist");
}

function register($fullName, $email, $password){
  if (checkUser($fullName, $email)->rowCount()>0) {
    $_SESSION["info"] = "The username or email already exist";
    header("Location: index.php?controller=signUp&action=loginSignUp");
  }
  else{
  postUser($fullName, $email, $password);
  $_SESSION["info"] = "SignUp process succeful";
  $_SESSION["username"] = "$fullName";
  header("Location: index.php?controller=login&action=loginUser");
  }
}