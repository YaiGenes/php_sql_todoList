<?php
require_once("config/db.php");

function db(){
  try {
    $connection = 'mysql:host=' . HOST . ';'
                  .'dbname=' . DB . ';'
                  .'charset=' . CHARSET . ';';
    
    $options = [
      PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => FALSE,
    ];

    $pdo=new PDO($connection, USER, PASSWORD, $options);
    return $pdo;
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once(VIEWS . '/error/error.php');
  }
}