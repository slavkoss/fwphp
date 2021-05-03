<?php
//see https://github.com/ngrt/MVC_todo Code is explained in this article blog 
//2017.12.17: https://medium.com/@noufel.gouirhate/create-your-own-mvc-framework-in-php-af7bd1f0ca19


namespace B12phpfw ;
//$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ; 
$pp1 = (object)
[   'dbg'=>'1', 'module_version'=>'Posts as tasks'
  , 'module_towsroot'=>'../../../../../'
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      //, $dirup_tmp.'/user/', $dirup_tmp.'/post_category/' //two master modules (tbls)
      //, $dirup_tmp.'/post/', $dirup_tmp.'/post_comment/'  //detail & subdet modules (tbls)
  ] , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
] ;

require($pp1->module_towsroot.'zinc/Autoload.php');
new Autoload($pp1); //global cls loads classes scripts automatically
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }
//step 2 (step 3 is parent::__construct : fw core calls method in Home_ctr cls)
$db = new Home_ctr($pp1) ;

exit(0);

/*
            //define('MODULE_RELPATH', str_replace("www/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('MODULE_RELPATH', dirname($_SERVER['REQUEST_URI']).'/');
            //define('MODULE_PATH', str_replace("www/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('MODULE_LEVEL', count(explode('/', MODULE_RELPATH)) -1) ; // +1 level are method params
define('MODULE_PATH', dirname(__DIR__).'/');
define('QS', '?');

require(MODULE_PATH . "Config/db.php");  //require(MODULE_PATH . 'Config/core.php');
require(MODULE_PATH . "Core/Model.php");
require(MODULE_PATH . "Core/Controller.php");

require(MODULE_PATH . 'router.php');
require(MODULE_PATH . 'request.php');
require(MODULE_PATH . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
*/
