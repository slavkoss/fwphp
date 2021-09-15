<?php
namespace B12phpfw\module\shop ;

use B12phpfw\core\zinc\Autoload ; //only zinc is required - see $shares_ path

//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
$wsroot_path = str_replace('\\','/', realpath('../../../')) .'/' ;
$shares_path = $wsroot_path.'/zinc/' ; //includes, globals, commons, reusables

$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // or $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'7.0.0.0 Guitarshop' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs where are CLASS SCRIPTS TO INCLUDE AUTOMATICALLY (A u t o l o a d)
  //    MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
  , 'module_path_arr'=>[
      $module_dir_path
    , $module_dir_path.'/model/'
    , $shares_path //dir of global (common) clses for all sites
    //,$app_dir_path.'/blog/'
  ] 
] ;

//2. global cls loads classes scripts automatically
require($pp1->shares_path .'Autoload.php');
new Autoload($pp1);

//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee inherits $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);


/*
//require_once('util/m ain.php');
// Display h ome page
//include('h ome.php');

namespace B12phpfw\module\shop ;
use B12phpfw\core\zinc\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_towsroot = '../../../' ;  //to web server doc root or our doc root by ISP
$dirup_to_app = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'5.0.0.0 Guitarshop', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3 F o r  A u t o l o a d
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //thismodule_cls_dir_path
      //dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
      //two master modules (tbls)
      //, $dirup_to_app.'/user/'
      //, $dirup_to_app.'/post_category/'
      //detail & subdet modules (tbls)
      //, $dirup_to_app.'/post/'
      //, $dirup_to_app.'/post_comment/'
  ]
] ;

require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }

$db = new Home_ctr($pp1) ; //H ome_ ctr "inherits" index.php ee inherits $p p1

exit(0);
*/