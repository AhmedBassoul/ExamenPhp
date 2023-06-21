<?php


require_once('Controller/UserController.php');
require_once('Controller/SalleController.php');
require_once('Controller/AdminController.php');


function isAcces(){

  session_start();
  if(!isset($_SESSION['user'])){
    AuthAction();
    exit;
  }

}


function getRoute(){
  return ($_REQUEST['action'] ?? 'Form') . 'Action';
}
