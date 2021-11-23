<?php
//session_start();
require_once CONTROLLERS . '/helpers/dbConnection.php';

function authUser($name, $password){
  $authQuery = db()->prepare("SELECT username, pwd, email FROM user WHERE username=:username AND pwd=:pwd");
  try {
  $authQuery->execute([
    'username' => $name,
    'pwd' => $password
  ]);
  } catch (PDOException $errorMsg) {
    $errorMsg->getMessage();
    require_once VIEWS . "error/error.php";
  }
  return $authQuery;
}

// $fullName = $_POST["fullName"];
// $email = $_POST["email"];
// $password = $_POST["password"];
// $_SESSION["info"] = "";
// $_SESSION["username"] = "";

// if (isset($_POST["submitting"])) {
//   $authQuery="SELECT `username`, `pwd`, `email` FROM `user` WHERE username='$fullName' AND pwd='$password';";
//   $userAuth = mysqli_query($conn, $authQuery);
// }