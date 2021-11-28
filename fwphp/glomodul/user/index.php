<?php
/**
 * J:\awww\www\fwphp\glomodul\user\index.php
 * http://dev1:8083/fwphp/glomodul/blog/?i/admins/  if called from blog module
 * or http://dev1:8083/fwphp/glomodul/user/  if called from ibrowser directly
 * In Home_ ctr :
 * private function login(object $pp1) { utl_module::login($pp1, $pp1->dashboard) ; }
*/

// m o d u l e = processing (behavior) - optional - as we wish,
// u s e r = cls dir (POSITIONAL part of NameSpace, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\b12phpfw\Autoload ; //only b12phpfw is required - see $shares_ path

//if (!isset($_SESSION)) { session_start(); }
//if (strnatcmp(phpversion(),'5.4.0') >= 0) {
   if (session_status() == PHP_SESSION_NONE) { session_start(); }
//} else { if(session_id() == '') { session_start(); } }

//$_SESSION = [] ; //unset($_SESSION) ;

//1. settings - properties - assign global variables to use them in any code part
$module_path = str_replace('\\','/', __DIR__) .'/' ;
$site_path   = dirname(dirname($module_path)) .'/' ; //to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP :
$wsroot_path = dirname(dirname(dirname($module_path))) .'/' ;
               //or $wsroot_path = str_replace('\\','/', realpath('../../')) .'/' ;
$shares_path = $wsroot_path.'vendor/b12phpfw/' ; //includes, globals, commons, reusables

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  , 'module_version'=>'8.0.0.0 Msg' //, 'vendor_namesp_prefix'=>'B12phpfw'

  // 1p. (Upper) Dirs of clsScriptsToAutoload. With 2p(ath). makes clsScriptToAutoloadPath
  // 2p. Dir name of clsScriptToAutoload is last in namespace and use (not full path !).
  , 'wsroot_path' => $wsroot_path  // to awww/www (or any name)
  , 'shares_path' => $shares_path  // to b12phpfw, b12phpfw is required dir name
  , 'site_path'   => $site_path    // to fwphp (or any name)
  , 'module_path' => $module_path  // to fwphp/glomodul/blog (or any names)
] ;     
          //echo '<pre>$pp1->module_path_arr='; print_r($pp1->module_path_arr) ; echo '</pre>'; 
//2. global cls loads (includes, bootstrap) classes scripts automatically
require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); //eliminates need to include class scripts
              //require('Autoload.php'); //module-local or Composer's autoload cls-es
              //$autoloader = new Autoload($pp1); //eliminates need to include class scripts


//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee inherits $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);


