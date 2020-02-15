<?php 
//https://github.com/ssnigdho/vanilla-php-framework
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
//require 'vendor/autoload.php';

//1.
$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ; 
$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1', 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>'../../../../../' //to web server doc root or our doc root by ISP
  //1.2
  , 'module_version'=>'1.0.0.0 Vanilla php fw', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      //, $dirup_tmp.'/user/', $dirup_tmp.'/post_category/' //two master modules (tbls)
      //, $dirup_tmp.'/post/', $dirup_tmp.'/post_comment/'  //detail & subdet modules (tbls)
  ]
] ;

//2.
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('1') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                        .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'BEFORE  i n c  A u t o l o a d'
                   ,'require '. $pp1->module_towsroot.'zinc/Autoload.php'
                ] ) ; }

//require 'config.php';

//3. process request from ibrowser & send response to ibrowser :
//$db = n ew Home_ctr($pp1) ; // "inherits" index.php ee inherits $pp1

// Handle  r o u t e s  in  R o u t e  helper class :
//use App\Helpers\R oute;
Request_response::handle($pp1, $_SERVER['REQUEST_URI']); //Route::handle($_SERVER['PHP_SELF']);

exit(0);

