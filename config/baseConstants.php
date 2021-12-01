<?php

$documentRoot = getcwd();
define('BASE_PATH', $documentRoot);

//Base URL -> to link css
$uri = $_SERVER['REQUEST_URI'];

if (isset($uri) && $uri !== null) {
  $uri = substr($uri, 1);
  $uri = explode('/', $uri);
  $uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
} else {
  $uri = null;
}

define('BASE_URL', $uri);