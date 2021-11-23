<?php
if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action);
}else {
  error("The function that you are trying to call does not exist");
}

function logout(){
session_start();
unset($_SESSION);

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();

header("Location: index.php");
}