<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\traversymvc_step4\public\index.php
namespace B12phpfw\blog ; // because Home_ ctr
use B12phpfw\core\zinc\Autoload as Autoload;
//  require_once('../bootstrap.php'); // ../app/bootstrap.php
  // Init Core Library
//  $init = new Router($pp1);

$module_towsroot = '../../../../../../' ;  //to web server doc root or our doc root by ISP
$app_dir_path = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'1.0.0.0 blog', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3 F o r  A u t o l o a d
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
      , $app_dir_path.'/user/' //, $app_dir_path.'/post_category/' //two master modules (tbls)
      , $app_dir_path.'/post/' //, $app_dir_path.'/post_comment/' //detail & subdet mdls
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


/**
* Step 4 after Trav. PHP fw is this blog module
* Step 3 after Trav. PHP fw is my z_oopmvc_after_Traversy_step3.zip
* Step 2 is oop-php-mvc on Apr 25, 2019 after TraversyMVC PHP framework is 
*        z_Simple_MVCfw_sistematico_after_Traversy_step2.zip
*    https://github.com/sistematico/oop-php-mvc
* Step 1 TraversyMVC : https://www.udemy.com/object-oriented-php-mvc
*                           z_shareposts_traversymvc_step1.zip
*/