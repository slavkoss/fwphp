<?php
//http://dev1:8083/fwphp/www/
// J:\awww\www\fwphp\www\index.php

//string before last word is not used but required for names resoluzion.
namespace B12phpfw\site_home\www ; // 'vendor_namesp_prefix'='B12phpfw'

use B12phpfw\core\b12phpfw\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_path = str_replace('\\','/', __DIR__) ; // .'/'
//$dbicls = 'Db_allsites' ; //$dbicls = 'Db_allsites_ORA' ;

$pp1 = (object) [
    'pp1_group01' => '~~~~~ MODULE ELEMENTS IN PROPERTY PALLETE $pp1 : ~~~~~' 
  , 'module_version'=>'ver. 11.0.0.0 Mnu' 
  , 'dbg'=>'1'
  //, 'dbicls' => $dbicls // for MySql DB or ...
  , 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  , 'pp1_group02P' => '~~~~~ ADRESSES : PATHS ~~~~~' 
  , 'module_path' => $module_path 
] ;


  //2. global cls loads (includes, bootstrap) classes scripts automatically
  //not  Composer's autoload cls-es :
  require(dirname(dirname(dirname($module_path)))  .'/vendor/b12phpfw/bootstrap.php'); 
  require($pp1->shares_path .'/Autoload.php');
  $autoloader = new Autoload($pp1); //eliminates need to include class scripts


  //3. SAME MODULE DB ADAPTER FOR ANY (NOT HARD CODED) SHARED DBADAPTER
  //   no CRUD in this mnu module


//4. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee inherits $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }

exit(0);


/**
* J:\awww\www\fwphp\www\index.php     http://sspc2:8083/fwphp/www/
*
*        M N U  M O D U L E  S I N G L E  E N T R Y  P O I N T
* #c s 0 1. Codeflow Step 1: bootstrap script, single entry point in module mkd
* cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic), cs05. OUTPUT (view)
*/


/*

require('adresses.php');
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .''; 
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '</pre>'; 
                  }

//if(!isset($_SESSION['l ang'])) { include_ once '/b12phpfw/l ang/l ang/hr.php'; }

switch (true) {
case isset($_GET['hlp1']): $title ='FAQ'; include('help.php');
  break;
//...
default: 
  $title = 'HOME'; include('home.php'); 
  break;
} // e n d  s w i t c h    //header("location:f rm.php");


*/

/* 
if (isset($_SESSION["UserId"])) { echo 'Admin'; }


////////////////// in .html :

<!--script type="text/javascript">window.location = "https://notepad-plus-plus.org/downloads/";</script>
<script type="text/javascript">window.location = "https://code.visualstudio.com/";</script>
<script type="text/javascript">window.location = "http://brackets.io/";</script>
<script type="text/javascript">window.location = "https://www.sublimetext.com/";</script-->


*/
