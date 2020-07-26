<?php 

  // If there is no constant defined called __CONFIG__, do not load this file 
  if(!defined('__CONFIG__')) { exit('You do not have a config file'); }

  if(!isset($_SESSION)) { session_start(); }

  $site_relpath = '' ;
  $module_relpath = dirname(
    str_replace( '?', ''
      , str_replace( $_SERVER['QUERY_STRING'], ''
          , $_SERVER['REQUEST_URI']
      ) )
  ) ;

  // Our config is below
  // Allow errors
  error_reporting(-1);
  ini_set('display_errors', 'On');


  include_once "dbconn.php";
  include_once "Filter.php";
  include_once "Page.php";
  include_once "User.php";
  //include_once "functions.php";

  $con = DB::getConnection();

?>
