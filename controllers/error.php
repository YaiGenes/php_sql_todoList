<?php

class ErrorLoad extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->errorMsg = '404 Not Found';
    $this->view->render('error\\error');
  }
}