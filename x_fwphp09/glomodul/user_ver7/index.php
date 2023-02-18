<?php
/**
 * J:\awww\www\fwphp\glomodul\user\index.php
 * http://dev1:8083/fwphp/glomodul/blog/?i/admins/  if called from blog module
 * or http://dev1:8083/fwphp/glomodul/user/  if called from ibrowser directly
 * In Home_ ctr :
 * private function login(object $pp1) { Tbl_crud_admin::login($pp1, $pp1->dashboard) ; }
*/

// m o d u l e = processing (behavior), u s e r = cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;

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


/**
* ALTER TABLE `admins` ADD `email` VARCHAR(100) NULL AFTER `addedby`;
* http://sspc2:8083/fwphp/glomodul/user/
* J:\awww\www\fwphp\glomodul\user\index.php
*        Instantiates Home_ ctr cls - router, dispatcher
*
* step 1 in Module  U S E R  T B L  C R U D on B12phpfw CRUD code skeleton. 
* cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic), cs05. OUTPUT (view)
* see https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\index.php
*/

// Db_ allsites.php may be named abstract class AbstractDataMapper.php
//  - encapsulates AS MUCH MAPPING LOGIC AS POSSIBLE
//   - couple of generic row object finders (get cursor, not record sets)
//   - read row objects is in Tblname_crud domain objects so I do not do so :
//     logic required for pulling in data from a specified table which is then used
//     for reconstituting domain objects in a valid state. Because reconstitutions
//     should be delegated down the hierarchy to refined implementations, 
//     newrow_obj() (createEntity()) method has been DECLARED ABSTRACT.


/*
//**********************************************************************
//         MODULE AUTOLOADER DO NOT DELETE !!!!!!!!!
// (not used here but may be needed in some modules) 
//**********************************************************************
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

