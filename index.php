<?php

/*
Juste S'il y a des erreurs : 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

*/


require_once('Library/Auth.php');

try {
  isAcces();
  $action = getRoute();
  if (!is_callable($action))
    throw new Exception('L\'action ( ' . $action . ' ) n\'est pas trouve ');
  $action();
} catch (Exception $e) {
  ErrorAction($e);
}
