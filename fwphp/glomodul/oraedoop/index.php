<?php
namespace B12phpfw\glomodul\oraedoop ;

use B12phpfw\core\b12phpfw\Autoload ;

///1. settings - properties - assign global variables to use them in any code part
$module_path = str_replace('\\','/', __DIR__) ; // .'/'
//$dbicls = 'Db_allsites' ; //$dbicls = 'Db_allsites_ORA' ;

$pp1 = (object) [
    'pp1_group01' => '~~~~~ MODULE ELEMENTS IN PROPERTY PALLETE $pp1 : ~~~~~' 
  , 'module_version'=>'ver. 11.0.0.0 oraed' 
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