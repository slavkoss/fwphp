<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_MVC\02hopkins_2009_clickme\index.php
// M-V DATA FLOW based on Callum Hopkins https://github.com/kenirwin/BasicMVC_PHP
//         https://www.sitepoint.com/the-mvc-pattern-and-php-1/ and 2

namespace B12phpfw\clickmeModule ; //FUNCTIONAL NAME SPACING (not dir names ee positional)
// USE is not needed if all scripts have same name space !
//use B12phpfw\clickmeModule\Autoloader as Autoloader ;

require_once __DIR__ . "/Autoloader.php";
//spl_autoload_register('config\Autoloader::autoload');
spl_autoload_register('B12phpfw\\clickmeModule\\Autoloader::autoload'); //B12phpfw\clickmeModule\
//spl_autoload_register('Autoloader::autoload');

$m = new m();
$c = new c($m); //includes m
$v = new v($m); //$v = new v($c, $m); // $c is not needed in v ? (bad logic ?)

  /**
  * code flow STEP 2. R O U T E R
  * we added functionality (ee link) to C, thereby adding INTERACTIVITY to app. 
  * NOT NEEDED IF NO USER INTERACTIONS (ee link) :
  */
  $ctrakcmethod = 'clicked';
  if ( isset($_GET['action']) and !empty($_GET['action']) )   {
    $c->{$_GET['action']}(); //call c.clicked()
    $ctrakcmethod = '';
  } 
  // E N D  code STEP 2.
  
echo $v->out($ctrakcmethod);


// J:\awww\apl\dev1\aplw\tests\L1hopkins_2009_clickme\index.php
// http://dev1:8083/aplw/tests/L1hopkins_2009_clickme/
                //if no spl_autoload_register : aplw\tests dir must be in composer.json !


/*
spl_autoload_register( function($class) { 
  $ns_vendor_module = 'B12phpfw\\clickmeModule' ;

  //$cls_script_path_external_m = $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

  $cls_script_path_module = __DIR__ .'/'
    . str_replace( [$ns_vendor_module,'\\'] //substrings to replace
                     , ['', '/']            //replacements
                     , $class               //in string
      ).'.php';                             //append cls script extension


  switch (true) {
    //case file_exists($cls_script_path_external_m):
    //  include_once $cls_script_path_external_m ;
    //  break;
    case file_exists($cls_script_path_module):
      include_once $cls_script_path_module ;
      break;
    default:
      echo '<pre>'; print_r('Namespaced class '. $class .' does not exist'); echo '</pre>';
      break;
  }


});
//require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; //for external modules
*/
