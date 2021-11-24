<?php
require_once MODELS . "editModel.php";

$id = $_GET['id'];
$title = $_POST['title'];

if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action, $id, $title);
}else {
  error("The function that you are trying to call does not exist");
}

function edit($id, $title){
  if(editTask($id, $title)){
    echo "Post updated succefully";
    header("Location: index.php?controller=fetchTask&action=getUserTodos");
  }
}