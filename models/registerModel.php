<?php
require_once CONTROLLERS . '/helpers/dbConnection.php';

function checkUser($name, $email){
  $checkQuery = db()->prepare("SELECT id, username, pwd, email FROM user WHERE username=:username OR email=:email");
  try {
  $checkQuery->execute([
    'username' => $name,
    'email' => $email
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $checkQuery;
}

function postUser($name, $email, $pwd){
  $postUserQuery = db()->prepare("INSERT INTO user(username, pwd, email) VALUES (:username, :email, :pwd)");
  try {
  $postUserQuery->execute([
    'username' => $name,
    'email' => $email,
    'pwd' => $pwd
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $postUserQuery;
}