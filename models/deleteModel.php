<?php
require_once CONTROLLERS . '/helpers/dbConnection.php';

function deleteTask($id){
  $deleteQuery = db()->prepare("DELETE FROM task
    WHERE id= :id");
  try {
  $deleteQuery->execute([
    'id' => $id
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $deleteQuery;
}