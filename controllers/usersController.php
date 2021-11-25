<?php

require_once MODELS . 'usersModel.php';

session_start();
$_SESSION["info"] = "";
$_SESSION["username"] = "";

if (isset($_POST["email"])) {
  $email = $_POST["email"];
} else {
  $email = '';
}
if (isset($_POST["fullName"])) {
  $fullName = $_POST["fullName"];
} else {
  $fullName = '';
}
if (isset($_POST["password"])) {
  $password = $_POST["password"];
} else {
  $password = '';
}


if (isset($_GET["action"])) {
  $action = $_GET["action"];
  call_user_func($action, $fullName, $email, $password);
} else {
  error("The function that you are trying to call does not exist");
}

class Users
{

  private $userModel;

  public function __construct()
  {
    $this->userModel = new User;
  }

  public function register($fullName, $email, $password)
  {
    if ($this->userModel->checkUser($fullName, $password)) {
      $_SESSION["info"] = "The username or email already exist";
      require_once VIEWS . "signUpView.php";
    }

    if ($this->userModel->register($fullName, $email, $password)) {
      $_SESSION["info"] = "SignUp process succeful";
      $_SESSION["username"] = "$fullName";
      require_once VIEWS . "loginView.php";;
    }
  }

  public function login($fullName, $password)
  {
    if (!$this->userModel->login($fullName, $password)) {
      $_SESSION["username"] = "$fullName";
      $fetchUser = $this->userModel->getUserId($fullName, $password);
      $_SESSION["userId"] = $fetchUser;
      header("Location: index.php?controller=fetchTask&action=getUserTodos");
    } else {
      $_SESSION["info"] = "You are not registered, please SignUp";
      require_once VIEWS . "signUpView.php";
    }
  }

  public function loginView()
  {
    require_once VIEWS . "loginView.php";
  }

  public function SignUpView()
  {
    require_once VIEWS . "signUpView.php";
  }
}

function loginSystem($fullName, $email, $password)
{

  $init = new Users;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
      case 'register':
        $init->register($fullName, $email, $password);
        break;
      case 'login':
        $init->login($fullName, $password);
        break;
    }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    switch ($_GET['type']) {
      case 'register':
        $init->loginView();
        break;
      case 'login':
        $init->SignUpView();
        break;
    }
  }
}