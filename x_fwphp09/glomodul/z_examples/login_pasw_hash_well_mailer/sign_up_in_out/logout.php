<?php
  require_once('session.php');

  //define('__CONFIG__', true); 
  //require_once('class.user.php');
  //$ousr = new USER();

  if($ousr->is_loggedin()!="")
  {
    $ousr->redirect('home.php');
  }
  if(isset($_GET['logout']) && $_GET['logout']=="true")
  {
    $ousr->doLogout();
    $ousr->redirect('index.php');
  }
