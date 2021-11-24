<?php

require_once CONTROLLERS . '/helpers/dbConnection.php';

function marked($id){
  $markQuery = db()->prepare("UPDATE task
        SET isdone=1
        WHERE id = :id");
  try {
  $markQuery->execute([
    'id' => $id
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $markQuery;
}