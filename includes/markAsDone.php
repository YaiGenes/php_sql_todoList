<?php
require_once "dbh_pdo.inc.php";
session_start();

if (isset($_GET["as"], $_GET["item"])) {
  $as = $_GET["as"];
  $item = $_GET["item"];

  switch ($as) {
    case "done":
      $doneQuery = $db->prepare("
        UPDATE task
        SET isdone=1
        WHERE id = :item
        AND userId = :userId
      ");
      $doneQuery->execute([
        "item" => $item,
        "userId" => $_SESSION["userId"]
      ]);
      break;
  }
}

header("Location: ../authorsPanel.php");