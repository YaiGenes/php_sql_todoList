<?php
require_once "dbh_pdo.inc.php";
session_start();

if (isset($_GET["item"])) {
  $item = $_GET["item"];

  $editQuery = $db->prepare("
    UPDATE task
    SET isedit= 1
    WHERE id = :item
    AND userId = :userId
  ");
  $editQuery->execute([
    "item"=>$item,
    "userId"=>$_SESSION["userId"]
  ]);
}
header("Location: ../authorsPanel.php");