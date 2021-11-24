<?php
require_once MODELS . "deleteModel.php";

echo $_GET['id'];
$id = $_GET['id'];

if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action, $id);
}else {
  error("The function that you are trying to call does not exist");
}

function delete($id){
if (deleteTask($id)) {
      echo "Post deleted succefully";
      header("Location: index.php?controller=fetchTask&action=getUserTodos");
    }
}