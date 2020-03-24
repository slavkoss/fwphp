<?php

use B12phpfw\core\zinc\Autoload ;   //last is dir name and cls name
use B12phpfw\backend\app\core\App ; //last is dir name and cls name

define('APP_PATH', __DIR__ . '/');
define('APP_DEBUG', true);
//require(APP_PATH . 'core/App.php');
//$config = require(APP_PATH . 'config/config.php'); //db params & default Controller
//(new Core\App($config))->run();


if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
//1.
$module_towsroot = '../../../../../../' ;  //to web server doc root or our doc root by ISP
$dirup_to_app = str_replace('\\','/', __DIR__ ) ; //to app eg glomodul
$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1'
  , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot //to web server doc root or our doc root by ISP
  //1.2
  , 'module_version'=>'1.0.0.0 mvcVue fw'
  , 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3 classMap
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //thismodule_cls_dir_path
      //dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
      //master modules (tbls) or...
      , $dirup_to_app.'/core/'
      , $dirup_to_app.'/app/controllers/'
  ]
] ;

//2.
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                        .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'BEFORE  i n c  A u t o l o a d'
                   ,'require '. $pp1->module_towsroot.'zinc/Autoload.php'
                ] ) ; }

//Request_response::handle($pp1, $_SERVER['REQUEST_URI']); //Route::handle($_SERVER['PHP_SELF']);
//(new App($pp1, $config))->run($pp1, $_SERVER['REQUEST_URI']); // it is Home_ctr
new App($pp1, $config) ; // it is Home_ctr

exit(0);

/*

*/