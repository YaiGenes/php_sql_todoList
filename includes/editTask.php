<?php
require_once "dbh_pdo.inc.php";
session_start();

if (isset($_POST["edit"])) {
  $item = $_GET["item"];
  $title = $_POST["title"];

  $editQuery = $db->prepare("
    UPDATE task
    SET title= :title
    WHERE id = :item
    AND userId = :userId
  ");
  $editQuery->execute([
    "item"=>$item,
    "userId"=>$_SESSION["userId"],
    "title"=>$title
  ]);
}
header("Location: ../authorsPanel.php");