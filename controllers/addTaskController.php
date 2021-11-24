<?php
require_once MODELS . "addTaskModel.php";
session_start();

$title = $_POST["title"];
$userId = $_SESSION["userId"];

if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action, $title, $userId);
}else {
  error("The function that you are trying to call does not exist");
}

function addTask($title, $userId){
if (createTask($title, $userId)) {
      echo "Post created succefully";
      header("Location: index.php?controller=fetchTask&action=getUserTodos");
    }
}