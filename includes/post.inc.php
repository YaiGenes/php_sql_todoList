<?php
session_start();
include_once "dbh.inc.php";

$title = $_POST["title"];
$userId = $_SESSION["userId"];

if(isset($_POST["posts"])){
  $sql = "INSERT INTO `task`( `title`, `userId`) VALUES ('$title','$userId');";
  $result = mysqli_query($conn, $sql);
  if ($result) {
      echo "Post created succefully";
      header("Location: ../authorsPanel.php");
    }
  }
?>