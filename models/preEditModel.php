<?php
require_once CONTROLLERS . '/helpers/dbConnection.php';

function preEditTask($id){
  $preEditQuery = db()->prepare("UPDATE task
    SET isedit= 1
    WHERE id = :id");
  try {
  $preEditQuery->execute([
    'id' => $id
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $preEditQuery;
}