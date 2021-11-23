<?php
require_once MODELS . "authModel.php";

session_start();

$_SESSION["info"] = "";
$_SESSION["username"] = "";

if (isset($_POST["submitting"])) {
  $fullName = $_POST["fullName"];
  $password = $_POST["password"];
}

if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action, $fullName, $password);
}else {
  error("The function that you are trying to call does not exist");
}

function authLogin($fullName, $password){
if ((authUser($fullName, $password)->rowCount())>0) {
    $_SESSION["username"] = "$fullName";
    header("Location: index.php?controller=fetchTask&action=getUserTodos");
  }else{
  $_SESSION["info"] = "You are not registered, please SignUp";
  header("Location: index.php?controller=signUp&action=loginSignUp");
  }
}

function error($errorMsg){
  require_once VIEWS . "error/error.php";
}