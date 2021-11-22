<?php
//require_once("../config/constants.php");
require_once("../models/loginModel.php");
session_start();
$_SESSION["info"] = "";
$_SESSION["username"] = "";

$action = "";

if (isset($_POST["submitting"])) {
  $fullName = $_POST["fullName"];
  $password = $_POST["password"];
}

if ((authUser($fullName, $password)->rowCount())>0) {
    $_SESSION["username"] = "$fullName";
    require_once("../views/authorsPanel.php");
  }else{
  $_SESSION["info"] = "You are not registered, please SignUp";
  require_once("../views/signupView.php");
  }

//var_dump($_GET["action"]);

// if (isset($_GET["action"])) {
//   $action = $_GET["action"];
//   call_user_func($action);
// }else {
//   error("The function that you are trying to call does not exist");
// }

// function userLogin($fullName, $password){
//   if ((authUser($fullName, $password)->rowCount())>0) {
//     $_SESSION["username"] = "$fullName";
//     require_once("../views/authorsPanel.php");
//   }else{
//   $_SESSION["info"] = "You are not registered, please SignUp";
//   require_once("../views/signupView.php");
//   }
// }

// function error($errorMsg){
//   require_once("../views/error/error.php");
// }