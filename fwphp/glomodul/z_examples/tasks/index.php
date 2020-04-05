<?php
//see https://github.com/ngrt/MVC_todo Code is explained in this article blog 
//2017.12.17: https://medium.com/@noufel.gouirhate/create-your-own-mvc-framework-in-php-af7bd1f0ca19

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\tasks ;
use B12phpfw\core\zinc\Autoload ;

$module_towsroot = '../../../../' ;  //to web server doc root or our doc root by ISP
//$dirup_to_app = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

//MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  , 'module_version'=>'Posts as tasks', 'vendor_namesp_prefix'=>'B12phpfw'
  , 'module_towsroot'=>$module_towsroot
  , 'module_path_arr'=>[ 
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_dir
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/' //dir of global clses for all sites
      //two master modules (tbls)
      //detail & subdet modules (tbls)
  ] 
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
