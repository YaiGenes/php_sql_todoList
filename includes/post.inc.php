<?php
session_start();
include_once "dbh.inc.php";

$title = $_POST["title"];
$description = $_POST["description"];
$date = $_POST["date"];
$userId = $_SESSION["userId"];

if(isset($_POST["posts"])){
  $sql = "INSERT INTO `task`( `title`, `description`, `pubdate`, `userId`) VALUES ('$title','$description','$date','$userId');";
  $result = mysqli_query($conn, $sql);
  if ($result) {
      echo "Post created succefully";
      header("Location: ../authorsPanel.php");
    }
  }
?>