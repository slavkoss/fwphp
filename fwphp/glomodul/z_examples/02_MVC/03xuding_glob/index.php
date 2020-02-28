<?php
//            U S E R  T B L  C R U D step 2 on B12phpfw CRUD code skeleton
// https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
//use PDO ;
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//1.
//$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ; 
$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1'
  , 'module_version'=>'6.0.4.0 Users'
  , 'module_towsroot'=>'../../../../../' //to web server doc root or our doc root by ISP
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      //, $dirup_tmp.'/user/', $dirup_tmp.'/post_category/' //two master modules (tbls)
      //, $dirup_tmp.'/post/', $dirup_tmp.'/post_comment/'  //detail & subdet modules (tbls)
  ]
  , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
] ;

//2.
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }
//3. process request from ibrowser & send response to ibrowser :
$db = new Home_ctr($pp1) ; // Home_ ctr "inherits" index.php ee $pp1 is Dependency Injected in it

exit(0);


/* //            WAS  in index.php (step 1) :
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