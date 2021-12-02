<?php
require_once 'config/constants.php';

class App
{
  function __construct()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    if (empty($url[0])) {
      $controllerFile = CONTROLLERS . 'mainController.php';
      require_once $controllerFile;
      $controller = new Main;
      $controller->loadModel('main');
    } else {
      $classController = ucfirst($url[0]);
      $controllerFile = CONTROLLERS . $classController . 'Controller.php';
    }

    if (file_exists($controllerFile)) {
      require_once $controllerFile;
      $controller = new $classController;
      $controller->loadModel($url[0]);
      if (isset($url[1])) {
        $controller->{$url[1]}();
      }
    } else {
      require_once CONTROLLERS . 'error.php';
      $error = new ErrorLoad;
      $errorMsg = '404 Not found';
    }
  }
}