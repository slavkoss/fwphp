<?php
/**
* J:\awww\www\fwphp\glomodul\mkd\   http://sspc2:8083/fwphp/glomodul/mkd/
* http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme.md
*
*        M K D  M O D U L E  S I N G L E  E N T R Y  P O I N T
*/
namespace B12phpfw\flatFilesEd\mkd ;

use B12phpfw\core\zinc\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
$wsroot_path = str_replace('\\','/', realpath('../../../')) .'/' ;
$shares_path = $wsroot_path.'/zinc/' ; //includes, globals, commons, reusables
//$dirup_to_app = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // or $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'7.0.4.0 Mkd' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs paths where are class scripts to autoload. Dir name is last in namespace and use. 
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
       $module_dir_path // = thismodule_cls_dir_path = $pp1->module_path
      //dir of global clses for all sites :
      , $shares_path //,str_replace('\\','/',realpath($module_ towsroot.'zinc')) .'/'
  ]
] ;

//2. global cls loads classes scripts automatically
require($pp1->shares_path.'Autoload.php');
new Autoload($pp1);


//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee inherits $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);
