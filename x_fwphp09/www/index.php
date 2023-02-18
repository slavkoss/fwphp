<?php
//http://dev1:8083/fwphp/www/
// J:\awww\www\fwphp\www\index.php
namespace B12phpfw\site_home\www ;

use B12phpfw\core\b12phpfw\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_path = str_replace('\\','/', __DIR__) .'/' ;
$site_path   = dirname($module_path) .'/' ; //to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
$wsroot_path = dirname(dirname($module_path)) .'/' ;
               //or $wsroot_path = str_replace('\\','/', realpath('../../')) .'/' ;
$shares_path = $wsroot_path.'vendor/b12phpfw/' ; //includes, globals, commons, reusables

$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
  , 'module_version'=>'9.0.0.0 Mnu' //, 'vendor_namesp_prefix'=>'B12phpfw'
                             // $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  // 1p. (Upper) Dirs of clsScriptsToAutoload. With 2p(ath). makes clsScriptToAutoloadPath
  // 2p. Dir name of clsScriptToAutoload is last in namespace and use (not full path !).
  , 'wsroot_path' => $wsroot_path  // to awww/www (or any names)
  , 'shares_path' => $shares_path  // to b12phpfw, b12phpfw is required dir name
  , 'site_path'   => $site_path    // to fwphp (or any names)
  , 'module_path' => $module_path  // to fwphp/www (or any names)
  //
  , 'glomodul_path' => $site_path .'glomodul/'
  , 'examples_path' => $site_path .'glomodul/z_examples/'
] ;

//2. global cls loads classes scripts automatically
require($pp1->shares_path . 'Autoload.php');
new Autoload($pp1);

//3. process request from ibrowser & send response to ibrowser :
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
