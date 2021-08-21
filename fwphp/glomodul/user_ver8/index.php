<?php
/**
 * J:\awww\www\fwphp\glomodul\user\index.php
 * http://dev1:8083/fwphp/glomodul/blog/?i/admins/  if called from blog module
 * or http://dev1:8083/fwphp/glomodul/user/  if called from ibrowser directly
 * In Home_ ctr :
 * private function login(object $pp1) { utl_module::login($pp1, $pp1->dashboard) ; }
*/

// m o d u l e = processing (behavior) - optional - as we wish,
// u s e r = cls dir (POSITIONAL part of NameSpace, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\b12phpfw\Autoload ; //only b12phpfw is required - see $shares_ path

//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
$wsroot_path = str_replace('\\','/', realpath('../../../')) .'/' ;
//includes, globals, commons, reusables (centralized code does not know about caller)
$shares_path = $wsroot_path.'vendor/b12phpfw/' ; 

$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // or $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'7.0.0.0 Users' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs where are CLASS SCRIPTS TO INCLUDE AUTOMATICALLY (A u t o l o a d)
  //    MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
  , 'module_path_arr'=>[
    $module_dir_path
    ,$shares_path //dir of global (common) clses for all sites
    ,$app_dir_path.'/blog/'
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


