<?php
//Fetching the task description and title from the task table in the db
  include_once "dbh_pdo.inc.php";
  include_once "userId_fetching.inc.php";
  $username = $_SESSION["username"];
  $val = $_SESSION["userId"];
  $tasksQuery=$db->prepare("
        SELECT `id`, `title`, `isdone`, `isedit`
        FROM task WHERE userId=:userId
      ");
      $tasksQuery->execute([
        "userId"=>$val
      ]);

      $items = $tasksQuery->rowCount()?$tasksQuery:[];