<?php
require_once CONTROLLERS . '/helpers/dbConnectionProcedural.php';

function get($name)
{
  $fetchAllQuery = db()->prepare("
    SELECT id, title, isdone, isedit
    FROM task
    WHERE userId=(SELECT id FROM user WHERE username= :username)
  ");

  //"SELECT id, title, isdone, isedit FROM task WHERE userId=(SELECT id FROM user WHERE username= 'yaiserar')";
  try {
    $fetchAllQuery->execute([
      'username' => $name
    ]);
    $tasks = $fetchAllQuery->fetchAll();
    return $tasks;
  } catch (PDOException $e) {
    return [];
  }
}