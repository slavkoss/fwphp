<?php
//            U S E R  T B L  C R U D step 2 on B12phpfw CRUD code skeleton
// https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
// for code comments see blog nodule J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
namespace B12phpfw ;
$pp1 = (object)
[   'dbg'=>'1', 'module_version'=>'6.0.4.0 Users'
  , 'module_towsroot'=>'../../../../../'
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'module_path_arr'=>[ 
        str_replace('\\','/', __DIR__ ).'/'
  ] , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
] ;

require($pp1->module_towsroot.'zinc/Autoload.php');
$autoloader = new Autoload($pp1); 
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }

$db = new Home_ctr($pp1) ;

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