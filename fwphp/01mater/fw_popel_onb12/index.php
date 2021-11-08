<?php
// 
namespace B12phpfw\module\fw_popel_onb12 ;
use B12phpfw\module\fw_popel_onb12\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$wsroot_path   = str_replace('\\','/', realpath('../../../')) .'/' ;
$shares_path   = $wsroot_path.'vendor/b12phpfw/'; //'zinc/' includes,globals,commons,reusables
$autoload_path = $wsroot_path.'vendor/' ; //includes, globals, commons, reusables

$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //app dir eg "01mater" group of modules

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   
    'module_version'=>'Waybill (Otpremnica) 1.0.0.0' //, 'vendor_namesp_prefix'=>'B12phpfw'
  , 'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]

  //1.1
  , 'wsroot_path'  => $wsroot_path
  , 'shares_path'  => $shares_path
  , 'app_dir_path' => $app_dir_path

  //1.2 Dirs paths where are class scripts to autoload. Dir. name is last in namespace and use. 
  //    MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
  , 'module_path_arr'=>[
    $module_dir_path // = waybill dir (fw_popel_onb12) = thismodule_cls_dir_path
    //dir of global clses for all sites :
    ,$shares_path //,str_replace('\\','/',realpath($module_ towsroot.'zinc')) .'/'
    ,$autoload_path
              //master modules (tbls) = blocks in Ora. Forms
              ,$app_dir_path.'book/'
              ,$app_dir_path.'supplier/'
              //detail & subdet module (tbl) = block in Ora. Forms
              ,$app_dir_path.'waybill_itm/'
              //,$app_dir_path.'post_comment/' */
  ]
  //1.3 now we use z_blogcms because of D bconn_allsites.php :
  // J:\awww\www\zinc\Dbconn_allsites.php :
  //      return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
  //     list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
  //    , self::$db_username, self::$db_userpwd) 
  //    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!
  //1.3 To do : this could be better ?
  //, 'Dbconn'=>$Dbconn
] ;

              //2. global cls to load (include, bootstrap) classes scripts automatically
              //require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
              //require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
              //$autoloader = new Autoload($pp1); //eliminates need to include class scripts
require('Autoload.php'); //module-local or Composer's autoload cls-es
$autoloader = new Autoload($pp1); //eliminates need to include class scripts

//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee DI $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);
