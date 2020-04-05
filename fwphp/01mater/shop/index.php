<?php
//require_once('util/main.php');
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
  , 'module_version'=>'6.0.4.0 Msg', 'vendor_namesp_prefix'=>'B12phpfw'
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