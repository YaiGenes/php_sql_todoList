<?php
//session_start();
require_once CONTROLLERS . '/helpers/dbConnection.php';

function authUser($name, $password){
  $authQuery = db()->prepare("SELECT id, username, pwd, email FROM user WHERE username=:username AND pwd=:pwd");
  try {
  $authQuery->execute([
    'username' => $name,
    'pwd' => $password
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $authQuery;
}