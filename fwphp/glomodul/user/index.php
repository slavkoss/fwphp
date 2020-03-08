<?php
/**
* STEP_1=AUTOL 2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\index.php
*        Instantiates Home_ ctr cls - router, dispatcher
* step 1 in Module  U S E R  T B L  C R U D on B12phpfw CRUD code skeleton. 
* see https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
* For more code comments see blog module J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
*/
namespace B12phpfw ;

$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ; 
$pp1 = (object)
[   'dbg'=>'1', 'module_version'=>'6.0.4.0 Users'
  , 'module_towsroot'=>'../../../'
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      , $dirup_tmp.'/blog/'
  ] , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
] ;
require($pp1->module_towsroot.'zinc/Autoload.php');
new Autoload($pp1); //global cls loads classes scripts automatically
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }

//1=autol STEP_2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
//STEP_3=rout/disp is in parent::__construct : fw core calls method in Home_ctr cls
$db = new Home_ctr($pp1) ; //also instatiates all higher cls-es : Config_ allsites
            // Db_ allsites.php may be named abstract class AbstractDataMapper.php
            //  - encapsulates AS MUCH MAPPING LOGIC AS POSSIBLE
            //   - couple of generic row object finders (get cursor, not record sets)
            //   - read row objects is in Tblname_crud domain objects so I do not do so :
            //     logic required for pulling in data from a specified table which is then used
            //     for reconstituting domain objects in a valid state. Because reconstitutions
            //     should be delegated down the hierarchy to refined implementations, 
            //     newrow_obj() (createEntity()) method has been DECLARED ABSTRACT.

exit(0);



/*                 // DO NOT DELETE !!!!!!!!!
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

/*
 Graf s 4 vrha (node), 7 bridova(edge, border, boudary). Problem kineskog poštara :
 http://e.math.hr/math_e_article/br14/fosner_kramberger Sedam königsberških mostova
 Kaliningrad izmeðu Poljske i Litve leži na obalama rijeke Pregel.
 Euler dokazao da ne postoji Eulerova šetnja preko svih sedam mostova koji povezuju 
 dva otoka (VRHA) na rijeci Pregel s gornjim i donjim gradom (VRHOVIMA) Königsberga
 takva DA SE SVAKI MOST (BRID) PRIJEÐE TOÈNO JEDANPUT :
 
                              _.-'(S)'-._       Sjever
             4 mosta        .'/          '.
             S-J preko     / /             \
             manjeg       (Z) ------------ (I)  Otoci Mali i Veliki
             otoka        |  \              |
                           \  \            /
                            '. \          .'
                              '-._(J)_.-'       Jug

Zatvorena Eulerova šetnja se može naæi samo u grafovima u kojima je stupanj 
- BROJ BRIDOVA SVAKOG VRHA PARAN. Prema tome se grafovi u kojima su svi vrhovi 
parnog stupnja nazivaju Eulerovim.

Problem trgovaèkog putnika - tražimo šetnju u usmjerenom ili neusmjerenom grafu
tako DA PROÐEMO SVAKI VRH U GRAFU BAREM JEDNOM i vratimo se u poèetni vrh 
na najkraæi moguæi naèin.

Usmjerenim grafom može se riješiti problem kineskog poštara i trgovaèkog putnika.
*/

