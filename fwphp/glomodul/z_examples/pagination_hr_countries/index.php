<?php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//1. C O N F I G  coding step cs01. -- in Config_ allsites c l s 
//2. I N C L U D E  C L S  SCRIPTS  coding step cs02.
$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ;
$pp1 = (object)[ 'dbg'=>'1', 'module_towsroot'=>'../../../../'
    //site_or_allsites_version.ddlver.dml_or_scripts_ver.errcorrection :
  , 'module_version'=>'1.0.1.0 Pagination', 'vendor_namesp_prefix'=>'B12phpfw'
    //this module dir and other mdledirs for autoload clsscripts :
  , 'dbi_obj'=>(object)[ 'db_new_instance'=>'db_new_instance' //'' or 'db_new_instance' or '1'
        , 'dbi'=>'oracle'
        , 'host'=>'define  h o s t  in Config_ allsites.php'
        //,'host'=>getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8'
        //,'host'=>'sspc2/XE:pooled;charset=UTF8'
        //,'host'=>'localhost/XE:pooled;charset=UTF8'
        , 'dbnm'=>'NOT USED','user'=>'hr', 'pass'=>'hr']
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=module_cls_script_path (CONVENTION!!)
            // other  m o d u l e s :
          //, $dirup_tmp.'/user/', ...
     ]
  , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]] //, 'style'=>''
] ;

require($pp1->module_towsroot.'zinc/Autoload.php'); 
$autoloader = new Autoload($pp1); //or Composer's autoload cls-es

//* 3. C O N F I G 2  - C R U D  C L A S S E S,  R O U T I N G,  coding step cs03.
//*    L I N K S, module attributes and methods  //cmsakram or tema... //$xxx = n ew xxx;
$db = new Home_ctr($pp1) ; // "inherits" index.php by means  $ p p 1

exit(0);

/**
* J:\awww\www\fwphp\glomodul\z_examples\pagination_hr_countries\index.php
* http://dev1:8083/fwphp/glomodul/z_examples/pagination_hr_countries/?p/1/i/home/
* J:\wamp64\www\fwphp\glomodul\help_sw\test\pdooci_autoload_zodiac\index.php
*
* 1. C O N F I G  coding step cs01. -- is in Config_ allsites c l s
*    from PHP's viewpoint all code 1. - 5. could be in index.php :
*      1. index.php script is "inherited (extended)" by :
*      2. Home_ ctr inherits (extends) Home_ mdl cls (if we have one)
*      3. Home_ mdl cls inherits Config_ allsites cls
*      4. Config_ allsites cls inherits Db_ allsites cls
*      5. Db_ allsites cls contains 4 methods: C, R, U, D for all tables !!
* Why 4 or 5 levels code flow (why not all code 1. - 5. in index.php) ? 
*    1. To reduce settings/methods in module scripts placing them as many as 
*       possible in (all) SITES GLOBAL SCRIPTS (for all modules) which NEVER CHANGE
*       (except during developing).
*    2. Eg Home_ mdl cls is needed to reduce size of Home_ ctr for clearer code
*       (separating concerns C and M but for simpler modules is not needed)
*/
