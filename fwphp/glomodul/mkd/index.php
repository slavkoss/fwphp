<?php
/**
* J:\awww\www\fwphp\glomodul4\mkd\index.php   http://dev1:8083/fwphp/glomodul4/mkd/
* http://dev1:8083/fwphp/glomodul4/mkd/?Home/edit/J:/awww/www/readme.md
*
*        M K D  M O D U L E  S I N G L E  E N T R Y  P O I N T
* #c s 0 1. Codeflow Step 1: bootstrap script, single entry point in module mkd
* cs01=bootstraping, 2=INIT, config, routing, 3=dispaching, 4. PROCESSING (model, business logic), 5. OUTPUT (view)
*/
namespace B12phpfw\flatFilesEd\mkd ;
use B12phpfw\core\zinc\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_towsroot = '../../../' ;  //to web server doc root or our doc root by ISP
//$app_glomodul_dir_path = str_replace('\\','/', dirname(__DIR__) ) .'/glomodul';

//MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // or $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'7.0.4.0 Mkd', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3 F o r  A u t o l o a d - dirnames we  i n c  clsscripts from
  , 'module_path_arr'=>[
       str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path
      //dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
      //, $app_glomodul_dir_path.'/some_dirname_we_inc_clsscript_from/'
  ] 
] ;

//2. global cls loads classes scripts automatically
require($pp1->module_towsroot.'zinc/Autoload.php');
new Autoload($pp1);
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }

//3. process request from ibrowser & send response to ibrowser :
//1=autol STEP_2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
//STEP_3=rout/disp is in parent::__construct : fw core calls method in Home_ctr cls
$db = new Home_ctr($pp1) ; //also instatiates all higher cls-es : Config_ allsites


exit(0);
