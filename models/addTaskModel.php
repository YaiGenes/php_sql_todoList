<?php
require_once CONTROLLERS . '/helpers/dbConnection.php';

function createTask($title, $userId){
  $postQuery = db()->prepare("INSERT INTO task(title, userId) VALUES (:title, :userId)");
  try {
  $postQuery->execute([
    'title' => $title,
    'userId' => $userId
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $postQuery;
}