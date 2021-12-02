<?php

require_once MODELS . 'usersModel.php';
require_once "./config/constants.php";

session_start();
$_SESSION["info"] = "";
$_SESSION["username"] = "";

// if (isset($_POST["email"])) {
//   $email = $_POST["email"];
// } else {
//   $email = '';
// }
// if (isset($_POST["fullName"])) {
//   $fullName = $_POST["fullName"];
// } else {
//   $fullName = '';
// }
// if (isset($_POST["password"])) {
//   $password = $_POST["password"];
// } else {
//   $password = '';
// }


// if (isset($_GET["action"])) {
//   $action = $_GET["action"];
//   call_user_func($action, $fullName, $email, $password);
// } else {
//   echo "The function that you are trying to call does not exist";
// }

class Users extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }


  public function checkUser($fullName, $password)
  {
    $user = get_object_vars($this->model->login($fullName, $password));
    $isAuth = $user['COUNT(*)'];
    return $isAuth;
  }

  public function register()
  {
    $email = $_POST["email"];
    $fullName = $_POST["fullName"];
    $password = $_POST["password"];
    if ($this->checkUser($fullName, $password) == 1) {
      $_SESSION["info"] = "The username or email already exist";
      $this->view->render("signUp");
    } else {
      $this->model->register($fullName, $email, $password);
      $_SESSION["info"] = "SignUp process succeful";
      $_SESSION["username"] = "$fullName";
      $this->view->render("login");
    }
  }

  public function login()
  {
    $fullName = $_POST["fullName"];
    $password = $_POST["password"];
    if ($this->checkUser($fullName, $password) == 1) {
      $_SESSION["username"] = "$fullName";
      $fetchUser = $this->model->getUserId($fullName, $password);
      $_SESSION["userId"] = $fetchUser;
      header('Location:' . BASE_URL . '\fetchTask\\getUserTodos');
    } else {
      $_SESSION["info"] = "You are not registered, please SignUp";
      $this->view->render('signUp');
    }
  }

  public function loginView()
  {
    $this->view->render("login");
  }

  public function SignUpView()
  {
    $this->view->render("signUp");
  }
}