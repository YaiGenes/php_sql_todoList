<?php
require_once MODELS . "doneModel.php";

$id = $_GET["todo"];
if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action, $id);
}else {
  error("The function that you are trying to call does not exist");
}

function markAsDone($id){
  if(marked($id)){
    header("Location: index.php?controller=fetchTask&action=getUserTodos");
  }
}