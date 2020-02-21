<?php
// http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/simple3/?directories
// $_SERVER['REQUEST_URI']=/fwphp/glomodul/z_examples/02_mvc/simple3/?directories
namespace app\Controllers;
// use BaseController;

class HomeController {
  
  public function index(){
          if ('1') { echo __METHOD__ .', line '. __LINE__ .' SAYS: ';
            echo '<pre>' ;
            echo '<br />$_SERVER[\'REQUEST_URI\']=$REQUEST_URI='; print_r($_SERVER['REQUEST_URI']) ;
            echo '</pre>'; 
          }
    return '<h1>Home</h1>';
  }
}