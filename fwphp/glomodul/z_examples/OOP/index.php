<?php
//s=script p=class script

require 'autoload_moj.php';

if (isset($_GET['s'])) { 
  $script = $_GET['s'];
  require $script;
  exit;
}

  $page='Page'; if (isset($_GET['p'])) { $page = $_GET['p']; }
  $view = lcfirst($page).'_view.php';
  
  //require($page.'.php'); // should be autoloader
  
  $page_obj = new $page ; //eg new Page()
  require($view); // assigns $page_obj->content, $page_obj->view_script
  $page_obj->Display($view);
  
  /*
  switch($page) //true
  {
    case 'ServicesPage': require(lcfirst($page).'_view.php'); // home page
    break; //return true

    default: require(lcfirst($page).'_view.php'); 
  }
  */
  
  
  
?>

