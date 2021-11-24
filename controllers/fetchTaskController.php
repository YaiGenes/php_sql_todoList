<?php
require_once MODELS . "fetchTaskModel.php";
session_start();
$username = $_SESSION["username"];

// $userId = $fetchAllQuery[0]["id"];
// $_SESSION["userId"] = $userId;

if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action);
} else {
  error("The function that you are trying to call does not exist");
}


function getUserTodos()
{
  $todos = get();
  var_dump(get());
  //require_once(VIEWS . "todosView.php");
}

function error($errorMsg)
{
  //require_once VIEWS . "error/error.php";
}