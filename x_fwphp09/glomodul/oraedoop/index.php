<?php
namespace B12phpfw\glomodul\oraedoop ;

use B12phpfw\core\b12phpfw\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_path = str_replace('\\','/', __DIR__) .'/' ;
$site_path   = dirname($module_path) .'/' ; //to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
$wsroot_path = dirname(dirname(dirname($module_path))) .'/' ;
               //or $wsroot_path = str_replace('\\','/', realpath('../../')) .'/' ;
$shares_path = $wsroot_path.'vendor/b12phpfw/' ; //includes, globals, commons, reusables

$pp1 = (object)[ 'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
  , 'module_version'=>'8.0.0.0 OraEdOOP' //, 'vendor_namesp_prefix'=>'B12phpfw'
                             // $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  // 1p. (Upper) Dirs of clsScriptsToAutoload. With 2p(ath). makes clsScriptToAutoloadPath
  // 2p. Dir name of clsScriptToAutoload is last in namespace and use (not full path !).
  , 'wsroot_path' => $wsroot_path  // to awww/www (or any names)
  , 'shares_path' => $shares_path  // to b12phpfw, b12phpfw is required dir name
  , 'site_path'   => $site_path    // to fwphp (or any names)
  , 'module_path' => $module_path  // to fwphp/www (or any names)
] ;

//2. global cls loads classes scripts automatically
require($pp1->shares_path . 'Autoload.php');
new Autoload($pp1);

$module = new Home_ctr($pp1) ;

exit(0);



/**
* J:\awww\www\fwphp\glomodul\oraedoop\index.php,  ../../../ is www dir
* http://dev1:8083/fwphp/glomodul/oraedoop/
*
* https://github.com/tistre/oracleeditor/ Tim Strehle 2006 year
*
* https://github.com/vrana/adminer/  ver 4.7.4
Adminer - Database management in a single PHP file
Adminer Editor - Data manipulation for end-users

https://www.adminer.org/
Supports: MySQL, MariaDB, PostgreSQL, SQLite, MS SQL, Oracle, SimpleDB, Elasticsearch, MongoDB, Firebird
Requirements: PHP 5+
Apache License 2.0 or GPL 2

adminer/index.php - Run development version of Adminer
editor/index.php - Run development version of Adminer Editor
editor/example.php - Example customization
plugins/readme.txt - Plugins for Adminer and Adminer Editor
adminer/plugin.php - Plugin demo
adminer/sqlite.php - Development version of Adminer with SQLite allowed
adminer/designs.php - Development version of Adminer with adminer.css switcher
compile.php - Create a single file version
lang.php - Update translations
tests/katalon.html - Katalon Automation Recorder test suite

If downloaded from Git then run: git submodule update --init
*/