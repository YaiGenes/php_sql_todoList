<?php
require_once 'libs/app.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';

$app = new App();







// require_once "config/constants.php";
// require_once "config/db.php";

// if (isset($_GET['controller'])) {
//   $controller = getControllerPath($_GET['controller']);
//   $fileExists = file_exists($controller);

//   if ($fileExists) {
//     require_once $controller;
//   }else {
//     $errorMsg = "The page that you are trying to access does not exists.";
//     require_once VIEWS . "error/error.php";
//   }
// }else {
//   require_once VIEWS ."main/main.php";
// }

// function getControllerPath($controller): string{
//   return CONTROLLERS . $_GET['controller']. "Controller.php";
// }