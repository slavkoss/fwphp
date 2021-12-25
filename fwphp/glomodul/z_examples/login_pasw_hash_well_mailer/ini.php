<?php
// J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\ini.php - bootstrap script
use B12phpfw\core\b12phpfw\Autoload ;
/*  Start S ession, required for S ession-based authentication.
  Remeber to call s ession_start() before sending any output to the remote client.

  Also, make sure to set a proper s ession cookie lifetime in your php.ini,
  this sets the cookie lifetime to 7 days:   s ession.cookie_lifetime=604800
*/
session_start();
define('__CONFIG__', true);    // Allow the config

                      //require './db_inc.php';         /* Include DB conn file */
                      //require './account_class.php';  /* Include the Account class file */



//1. settings - properties - assign global variables to use them in any code part
$module_path = str_replace('\\','/', __DIR__) .'/' ;
$site_path   = dirname(dirname(dirname($module_path))) .'/' ; //to app dir eg "glomodul" dir/app
//to web server doc root or our doc root by ISP :
$wsroot_path = dirname(dirname(dirname(dirname($module_path)))) .'/' ;
               //or $wsroot_path = str_replace('\\','/', realpath('../../')) .'/' ;
$shares_path = $wsroot_path.'vendor/b12phpfw/' ; //includes, globals, commons, reusables

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  , 'module_version'=>'8.0.0.0 LoginTutorial' //, 'vendor_namesp_prefix'=>'B12phpfw'

  // 1p. (Upper) Dirs of clsScriptsToAutoload. With 2p(ath). makes clsScriptToAutoloadPath
  // 2p. Dir name of clsScriptToAutoload is last in namespace and use (not full path !).
  , 'wsroot_path' => $wsroot_path  // to awww/www (or any name)
  , 'shares_path' => $shares_path  // to b12phpfw, which is required dir name
  , 'site_path'   => $site_path    // to fwphp (or any name)
  , 'module_path' => $module_path  // to fwphp/glomodul/blog (or any names)
] ;     
          //echo '<pre>$pp1->module_path_arr='; print_r($pp1->module_path_arr) ; echo '</pre>'; 
//2. global cls loads (includes, bootstrap) classes scripts automatically
require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); //eliminates need to include class scripts

