<?php
/**
* J:\awww\www\fwphp\glomodul\mkd\   http://sspc2:8083/fwphp/glomodul/mkd/
* http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme.md
*
*        M K D  M O D U L E  S I N G L E  E N T R Y  P O I N T
*/
namespace B12phpfw\flatFilesEd\mkd ;

use B12phpfw\core\b12phpfw\Autoload ; //was B12phpfw\core\z inc\Autoload

//1. settings - properties - assign global variables to use them in any code part
$module_path = str_replace('\\','/', __DIR__) ; // .'/'
//$dbicls = 'Db_allsites' ; //$dbicls = 'Db_allsites_ORA' ;
if (!defined('QS')) define('QS', '?');

$pp1 = (object) [
    'pp1_group01' => '~~~~~ MODULE ELEMENTS IN PROPERTY PALLETE $pp1 : ~~~~~' 
  , 'module_version'=>'ver. 11.0.0.0 Mnu' 
  , 'dbg'=>'1'
  //, 'dbicls' => $dbicls // for MySql DB or ...
  , 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  , 'pp1_group02P' => '~~~~~ ADRESSES : PATHS ~~~~~' 
  , 'module_path' => $module_path 
  //
      //HOME METHOD TO CALL  LINK ALIAS 
      ,'app_glomodul_dir_path' => str_replace('\\','/', dirname(__DIR__) ) .'/glomodul'
      //ALL VIEWS LINKS OF MODULE SHOULD BE HERE (view script knows last part) :
      //$pp1->urlqrystringpart1_name => part1 of urlqrystring (last part is in view script!)
      ,'home_mnu'   => QS.'i/home/'
      //link $pp1->ldd.$id in view script admins.php calls del_row_do method here :
      ,'sitehome'   => QS.'i/sitehome/' //$pp1->sitehome
      // -------------------------
      ,'edit'      => QS.'i/edit/path/'
      ,'showhtml'  => QS.'i/showhtml/path/'

] ;

  //2. global cls loads (includes, bootstrap) classes scripts automatically
  //not  Composer's autoload cls-es :
  require(dirname(dirname(dirname($module_path)))  .'/vendor/b12phpfw/bootstrap.php'); 
  require($pp1->shares_path .'/Autoload.php');
  $autoloader = new Autoload($pp1); //eliminates need to include class scripts

  //3. SAME MODULE DB ADAPTER FOR ANY (NOT HARD CODED) SHARED DBADAPTER
  //   no CRUD in this mkd module

//4. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee inherits $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);
