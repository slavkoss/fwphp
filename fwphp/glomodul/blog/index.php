<?php
//J:\awww\www\fwphp\glomodul\blog\index.php, J:\awww\www=WEBSERVER_DOC_ROOT_DIR=../../../
// ?=QS, p=page=1, i=call Home_ctr method 'home()' to include (or call, or jump to) :
//http://dev1:8083/fwphp/glomodul/blog/?p/1/i/home/ 

//c o r e = processing (behavior), z i n c = cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\blog ;
use B12phpfw\core\zinc\Autoload ;

//1.
$module_towsroot = '../../../' ;  //to web server doc root or our doc root by ISP
$dirup_to_app = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1', 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'6.0.4.0 Msg', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //thismodule_cls_dir_path
      //dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
      //two master modules (tbls)
      , $dirup_to_app.'/user/'
      , $dirup_to_app.'/post_category/'
      //detail & subdet modules (tbls)
      , $dirup_to_app.'/post/'
      , $dirup_to_app.'/post_comment/'
  ]
] ;

//2.
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }
//3. process request from ibrowser & send response to ibrowser :
$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1

exit(0);

/**
* Blog module on own php menu & CRUD code skeleton (tiny framework)
* 1. C O N F I G  coding step cs01.
* 1.1 MODULE_LEVEL Yii style (see other style : ...z_examples\tasks\www\index.php)
* 1.2 version: '1site_ or_ allsites_ver.2ddlver.3dml_ or_ scripts_ver.4errcorrection'
* 1.3 Module dirs: this mdle and other mdle`s = array to autoload module clsscripts
*     like properties group "autoload" in J:\awww\www\composer.json :
* 2. C O N F I G  coding step cs02. eliminates need to manually include class scripts
* TODO: (For now) J:\awww\www\zinc\Dbconn_allsites_mysql.php
*                 copy to ...\Dbconn_allsites.php
* 3. C O N F I G  - C R U D  C L A S S E S,  R O U T I N G,  coding step cs03.
*
* http://phporacle.eu5.net/fwphp/www/
* http://phporacle.eu5.net/fwphp/glomodul/blog/?i/read_post/id/20
* 

*         MODULES ARE IN 4 LEVELS (module is like Oracle Forms .fmb)
* J:\awww\www=WEBSERVER_DOC_ROOT_DIR.   '../../../' means 4 LEVELS OF MODULES DIRS:
* 1.module (dir blog) 2.mdlegroup (glomodul), 3.site (fwphp), doc_root (www)
*       MODULE CODE in execution order, eg Blog IS IN 5 OR 6 CODE LEVELS :
*  1.LEVEL5 index.php 2.L3 new Home_ctr($p p1) (3.L4 Home_mdl if needed) extends 4.
*  4.L2 Config_allsites extends 5.L1 Db_allsites, 6.L6: home.php, zinc/h dr.php and ftr
* see http://localhost:8083/pdogridbig_original/demo/pages/
*     http://dev1:8083/fwphp/glomodul/z_examples/05_flex01_2col.php
*/
