<?php
namespace B12phpfw ;
$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ;
$pp1 = (object)[ 'dbg'=>'1', 'module_towsroot'=>'../../../'
  , 'module_version'=>'1.0.1.0 OraEdOOP', 'vendor_namesp_prefix'=>'B12phpfw'
  , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]] //, 'style'=>''

  , 'module_path_arr'=>[
      str_replace('\\','/', __DIR__ ).'/' //=module_cls_script_path (CONVENTION!!)
      // other  m o d u l e s : , $dirup_tmp.'/user/', ...
     ]
] ;

require($pp1->module_towsroot.'zinc/Autoload.php'); 
$autoloader = new Autoload($pp1); //or Composer's autoload cls-es

$db = new Home_ctr($pp1) ;

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