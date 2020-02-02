<?php
// 4. index.php
// J:\awww\www\fwphp\glomodul4\help_sw\test\01_MVC_learn\02hopkins_2009_clickme\index.php

namespace B12phpfw\clickmeModule ; //FUNCTIONAL NAMESPACING (not dir names ee positional)
// USE is not needed if all scripts have same namespace !

//Instead  require 'm.php'; require 'v.php';  require 'c.php'; :

//           namespaced cls name --> cls script path
spl_autoload_register(function($class) { 
  //for this module :
  require_once __DIR__ .'/'
  . str_replace( ['B12phpfw\\clickmeModule','\\']
                   , ['', '/']
                   , $class
               ).'.php';
});
//require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; //for external modules

$m = new m();
$c = new c($m);
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
