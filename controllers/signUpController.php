<?php
if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action);
}else {
  error("The function that you are trying to call does not exist");
}

function loginSignUp(){
  require_once VIEWS . "signUpView.php";
}