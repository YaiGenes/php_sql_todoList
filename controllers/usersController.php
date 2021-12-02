<?php

require_once MODELS . 'usersModel.php';
require_once "./config/constants.php";

session_start();
$_SESSION["info"] = "";
$_SESSION["username"] = "";

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

  public function logout()
  {
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

    $this->view->render('main\\main');
  }
}