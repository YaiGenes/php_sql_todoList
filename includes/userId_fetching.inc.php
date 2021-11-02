<?php
  session_start();
  include_once "dbh_pdo.inc.php";
  $username = $_SESSION["username"];

  $itemsQuery =$db->prepare("
    SELECT `id` 
    FROM user 
    WHERE username= :username
  ");

  $itemsQuery->execute([
    "username"=>$username
  ]);

  $allItems = $itemsQuery->fetchAll(PDO::FETCH_ASSOC);
  $userId = $allItems[0]["id"];
  $_SESSION["userId"] = $userId;