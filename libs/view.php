<?php
require_once 'config/constants.php';

class View
{
  function render($name)
  {
    require_once VIEWS . $name . 'View.php';
  }
}