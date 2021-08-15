<?php
/**
* step 1
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\xuding_glob\index.php
*        Instantiates Home_ ctr cls - router, dispatcher
* step 1 in Module  U S E R  T B L  C R U D on B12phpfw CRUD code skeleton. 
* see https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
* For more code comments see blog module J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
*/
namespace B12phpfw\xuding_glob ; // because Home_ ctr
use B12phpfw\core\zinc\Autoload as Autoload;

//1. settings - properties - assign global variables to use them in any code part
$module_towsroot = '../../../../../' ;  //to web server doc root or our doc root by ISP
$app_dir_path = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'6.0.4.0 Users', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3 F o r  A u t o l o a d
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
      //, $app_dir_path.'/user/', $app_dir_path.'/post_category/' //two master modules (tbls)
      //, $app_dir_path.'/post/', $app_dir_path.'/post_comment/'  //detail & subdet modules (tbls)
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
// Module autoloader (not used here but may be needed in some modules) :
namespace Model; //FUNCTIONAL NAME SPACING (not dir names ee positional)
//Instead of require 'm.php'; require 'v.php';  require 'c.php'; :
//    ***** namespaced cls name --> cls script path *****
class Autoloader
{
  private static function get_module_cls_script_path($class, $nsprefix) {
    //replace name space backslash to current operating system directory separator
    $DS = DIRECTORY_SEPARATOR ;

    $cls_script_path = __DIR__ .'/'
      . str_replace( [$nsprefix,'\\'] //substrings to replace
                       , ['', '/']    //replacements
                       , $class       //in string
        ).'.php'; //append cls script extension and convert (to Windows) backslash :
   $cls_script_path = str_replace(['/','\\'], [$DS,$DS], $cls_script_path) ;

   return $cls_script_path ;
  }

  public static function autoload($class) //namespaced className
  {
    // ********** 1. module_ cls_ script_ path **********  eg B12phpfw\\clickmeModule
    $cls_script_path1 = self::get_module_cls_script_path($class, $nsprefix1='Model') ;
    $cls_script_path2 = self::get_module_cls_script_path($class, $nsprefix2='Model\\') ;
    $cls_script_path3 = self::get_module_cls_script_path($class, $nsprefix3='ModelMapper\\') ;
    $cls_script_path4 = self::get_module_cls_script_path($class, $nsprefix4='CoreDB\\') ;

    // ********** 2. cls_ script_ path_ external_ module **********
    //$cls_script_path = $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


      // ********** 3. r e q u i r e  cls_ script_ path **********
      switch (true) {
        case file_exists($cls_script_path1): include_once $cls_script_path1 ; break;
        case file_exists($cls_script_path2): include_once $cls_script_path2;  break;
        case file_exists($cls_script_path3): include_once $cls_script_path3;  break;
        case file_exists($cls_script_path4): include_once $cls_script_path4;  break;
        //case file_exists($cls_script_path_external_m): include_once $cls_script_path_external_m; break;
        default:
          if ('1') { echo 'For namespaced class '. $class
            . '<br />Possible CLASS SCRIPTS NAMES derived from functional namespaces,'
            . '<br />ee from vendor name space prefixes :'
            . "<br />\"$nsprefix1\" or \"$nsprefix2\" or \"$nsprefix3\" or \"$nsprefix4\" are :"
            ; 
            echo '<pre>';
            print_r([$cls_script_path1, $cls_script_path2, $cls_script_path3, $cls_script_path4]);
            //print_r('Namespaced class '. $class .' has not class script ?');
            echo '</pre>';
          }
          break;
      }
  }
}
//spl_autoload_register('config\Autoloader::autoload');
*/







/* //            WAS  in index.php (see 03xuding dir) :
//      !!!!!!!!! THIS IS NOW IN Home_ctr.php (B12phpfw) !!!!!!!!!!!!
require_once(__DIR__.'/confglo.php');

require_once __DIR__.'/database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// see J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding
include_once 'hdr.php';

switch (true) {
  case isset($_GET['c']): include 'create.php'; break;
  case isset($_GET['r']): include 'read.php'; break;
  case isset($_GET['u']): include 'update.php'; break;
  case isset($_GET['d']): include 'delete.php'; break;

  default: include_once 'home.php'; break;
}

include_once 'ftr.php';
//e n d      !!!!!!!!! THIS IS IN Home_ctr.php !!!!!!!!!!!!
*/

/* To do :
Add pagination to PHP CRUD grid          - done in Blog module
Implement search function                - done in Blog module
Build image upload                       - done in Blog module
Use custom inputs such as select box/radio box
*/