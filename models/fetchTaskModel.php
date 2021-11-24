<?php
require_once CONTROLLERS . '/helpers/dbConnectionProcedural.php';

function get()
{
  $fetchAllQuery = db()->prepare("
    SELECT id, title, isdone, isedit
    FROM task
    WHERE userId=(SELECT id FROM user WHERE username= :username)
  ");

  //"SELECT id, title, isdone, isedit FROM task WHERE userId=(SELECT id FROM user WHERE username= 'yaiserar')";
  try {
    $fetchAllQuery->execute([
      'username' => 'yaiserar'
    ]);
    $tasks = $fetchAllQuery->fetchAll();
    return $tasks;
  } catch (PDOException $e) {
    return [];
  }
}