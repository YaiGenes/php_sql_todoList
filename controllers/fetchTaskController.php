<?php
require_once MODELS . "fetchTaskModel.php";
session_start();


// $userId = $fetchAllQuery[0]["id"];
// $_SESSION["userId"] = $userId;

class fetchTask extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getUserTodos()
  {
    $username = $_SESSION["username"];
    $todos = $this->model->get($username);
    //here we send the data to the view througth the todos variable
    $this->view->todos = $todos;
    $this->view->render('todos');
  }
}