<?php
  session_start();
  include_once "dbh.inc.php";
  
  $username = $_SESSION["username"]
  $sql = "SELECT `id` FROM user WHERE username='$username';";
  $result = mysqli_query($conn, $sql);

  //Fetching the userId from user table in the database

    if ($result !== false) {
    $value = mysqli_fetch_object($result);
    $_SESSION['tempIdObj'] = get_object_vars($value);
    $arrId = $_SESSION['tempIdObj'];
    $val = $arrId["id"];
    $_SESSION["userId"] = $val;
  }