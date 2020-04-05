<?php
//session_start();
if(isset($_GET['lang'])) {
  switch ($_GET['lang']) {
  case 'hr' : unset($_SESSION['lang']); //$_SESSION['lang']=true;
    $_SESSION['lang']="hr";  header("Location:index.php"); break ;
  case 'en' : unset($_SESSION['lang']); //$_SESSION['lang']=true;
    $_SESSION['lang']="en";  header("Location:index.php"); break ;
  case 'de' : unset($_SESSION['lang']); //$_SESSION['lang']=true;
    $_SESSION['lang']="de";  header("Location:index.php");break ;
  default : break ;
  }
}

if(isset($_SESSION['lang'])) {
  switch ($_SESSION['lang']) {
  case 'hr' : include_once 'lang/hr.php'; break ;
  case 'en' : include_once 'lang/en.php'; break ;
  case 'de' : include_once 'lang/de.php'; break ;
  default : include_once 'lang/hr.php'; break ;
  }
} else {include_once 'lang/hr.php';}
