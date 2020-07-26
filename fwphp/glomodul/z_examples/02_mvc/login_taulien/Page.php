<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
  exit('You do not have a config file');
}

class Page {
  
  // Force the user to be logged in, or redirect. 
  static function ForceLogin($module_relpath) {
    if(isset($_SESSION['user_id'])) { // user is allowed here  
    } else { // user is not allowed here. 
               //echo 'Location: '. $module_relpath  .'/login_frm.php' ;
      header('Location: '. $module_relpath  .'/login_frm.php'); exit;
    }
  }

  static function ForceDashboard($module_relpath) {
    if(isset($_SESSION['user_id'])) {
      // The user is allowed here but redirect anyway 
               //echo 'Location: '. $module_relpath  .'/dashboard.php' ;
      header('Location: '. $module_relpath  .'/dashboard.php');  exit;
    } else {
      // The user is not allowed here. 
    }
  }
}


?>
