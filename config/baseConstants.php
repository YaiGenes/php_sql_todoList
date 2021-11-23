<?php

$documentRoot = getcwd();
// $documentRoot = explode('\\', $documentRoot);

// $rootPath = "";
// for ($i=0; $i <= count($documentRoot)-1 ; $i++) { 
//   $rootPath = $rootPath . '/' . $documentRoot[$i];
// }
// $rootPath= substr($rootPath, 1);

//Base path for reference files
define('BASE_PATH', $documentRoot);

//Base URL -> to link css
$uri = $_SERVER['REQUEST_URI'];

if (isset($uri) && $uri !== null) {
  $uri = substr($uri, 1);
  $uri = explode('/', $uri);
  $uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
}else {
  $uri = null;
}

define('BASE_URL', $uri);