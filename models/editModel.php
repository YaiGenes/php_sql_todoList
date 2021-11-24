<?php
require_once CONTROLLERS . '/helpers/dbConnection.php';

function editTask($id, $title){
  $editQuery = db()->prepare("UPDATE task
    SET isedit= 0,
    isdone= 0,
    title= :title
    WHERE id = :id");
  try {
  $editQuery->execute([
    'id' => $id,
    'title' => $title
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $editQuery;
}