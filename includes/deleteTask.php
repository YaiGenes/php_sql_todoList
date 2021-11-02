<?php
require_once "dbh_pdo.inc.php";
session_start();

if (isset($_GET["item"])) {
  $item = $_GET["item"];

  $deleteQuery = $db->prepare("
    DELETE FROM task
    WHERE id= :item
    AND userId = :userId
  ");
  $deleteQuery->execute([
    "item"=>$item,
    "userId"=>$_SESSION["userId"]
  ]);
}
header("Location: ../authorsPanel.php");