<?php
// J:\awww\www\fwphp\glomodul\adrs\index.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//C O N F I G 1 coding step cs01.
$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ;

$pp1 = (object)
[   'dbg'=>'1', 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.MODULE_LEVEL (see ...z_examples\tasks\www\index.php) or better Yii style so :
  , 'module_towsroot'=>'../../../' //to web server doc root or our doc root by ISP
     //  '../../../' means 4 levels of modules (like Oracle forms .fmb-s) : 
     //'from module_dir(blog) to mdlegroup_dir(glomodul)/site_dir(fwphp)/doc_root(www)'

  //2.version: 1site_ or_ allsites_version.2ddlver.3dml_ or_ scripts_ver.4errcorrection :
  , 'module_version'=>'6.0.4.0 Adrs (Mini3)', 'vendor_namesp_prefix'=>'B12phpfw'
  
  //3.This module dir and other mdle dirs for autoload clsscripts
  //  like properties group "autoload" in J:\awww\www\composer.json :
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      //, $dirup_tmp.'/user/', $dirup_tmp.'/post_category/', $dirup_tmp.'/post/'
      //, $dirup_tmp.'/post_comment/'
  ]
] ;

require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); //eliminates need to include class scripts
                    if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                       .', line '. __LINE__ .' SAYS'=>' '
                       ,'where am I'=>'AFTER  A u t o l o a d'
                    ] ) ; }

//                   J:\awww\www\zinc\Dbconn_allsites_mysql_tema.php
//   to be copied to J:\awww\www\zinc\Dbconn_allsites.php
//* C O N F I G 2  - C R U D  C L A S S E S,  R O U T I N G,  coding step cs02.
$db = new Home_ctr($pp1) ; // "inherits" index.php ee inherits $pp1

exit(0);
