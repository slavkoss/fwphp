<?php
//session_start();
if(!isset($_GET['lang'])) { $_GET['lang'] = $pp1->lang ; } ;

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
} //else { unset($_SESSION['lang']); //$_SESSION['lang']=true;
  //  $_SESSION['lang']="hr";  header("Location:index.php"); }

if(isset($_SESSION['lang'])) {
  switch ($_SESSION['lang']) {
  case 'hr' : include_once $all_sites_glo_path.'lang/lang/hr.php'; break ;
  case 'en' : include_once $all_sites_glo_path.'lang/lang/en.php'; break ;
  case 'de' : include_once $all_sites_glo_path.'lang/lang/de.php'; break ;
  default : include_once $all_sites_glo_path.'lang/lang/hr.php'; break ;
  }
} else {include_once $all_sites_glo_path.'lang/lang/hr.php';}

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .''; 
                  echo '<pre>';
                  echo '<b>$_ SESSION</b>='; print_r($_SESSION); 
                  echo '</pre>'; 
                  }