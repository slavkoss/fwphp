<?php
//J:\awww\www\fwphp\glomodul\blog\index.php, J:\awww\www=WEBSERVER_DOC_ROOT_DIR=../../../
// ?=QS, p=page=1, i=call Home_ctr method 'home()' to include (or call, or jump to) :
//http://dev1:8083/fwphp/glomodul/blog/?p/1/i/home/ 

//before blog is not required - see $shares_ path
namespace B12phpfw\module\blog ; //see below **HELPNS

//before zinc is not required - see $shares_ path
use B12phpfw\core\zinc\Autoload ; //see below **HELPNS 

//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
$wsroot_path = str_replace('\\','/', realpath('../../../')) .'/' ;
$shares_path = $wsroot_path.'zinc/' ; //includes, globals, commons, reusables

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]

  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'7.0.0.0 Msg' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs paths where are class scripts to autoload. Dir name is last in namespace and use. 
  , 'module_path_arr'=>[
    //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
    $module_dir_path // = thismodule_cls_dir_path = $pp1->module_path
    //dir of global clses for all sites :
    ,$shares_path //,str_replace('\\','/',realpath($module_ towsroot.'zinc')) .'/'
    //two master modules (tbls) = blocks in Ora. Forms
    ,$app_dir_path.'user/'
    ,$app_dir_path.'post_category/'
    //detail & subdet modules (tbls) = blocks in Ora. Forms
    ,$app_dir_path.'post/'
    ,$app_dir_path.'post_comment/'
  ]
] ;

//2. global cls loads classes scripts automatically
require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); //eliminates need to include class scripts

//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee inherits $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }

exit(0);

/**
*                    **HELPNS
* first namespace part B12phpfw is NOT REQUIRED : vendor's name space's prefix (functional nspart)
* 2nd ns part m o d u l e is NOT REQUIRED : functional ns part = processing (behavior) 
*
* FNSPs (FUNCTIONAL NS PARTS) are ignored by fw, ee we name them as we wish.
*    We use FNSPs as description to depict WHAT CODE DOES (processing, behavior).
*    May be more functional ns parts as we wish - all are ignored !
*
* PNSP (POSITIONALnsPart) CAREFULLY! : LAST ns part (BEFORE CLSNAME IF ANY) eg "src" is DIRNAME.
*    PNSP is actually (de facto, in fact, indeedded) submodule name.
*    Path OF DIRNAME (of PNSP) is in $pp1 array, 
*        used for Autoload class to include classes in dir DIRNAME.
*    Autoload class is include, global, common, reusable.
*/



//https://www.oracle.com/database/technologies/databaseappdev-vm.html
//https://www.oracle.com/virtualization/technologies/vm/downloads/virtualbox-downloads.html
//https://www.oracle.com/database/technologies/databaseappdev-vm.html#license-lightbox

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
*  1.LEVEL5 index.php 2.L3 n ew Home_ctr($p p1) (3.L4 Home_mdl if needed) extends 4.
*  4.L2 Config_allsites extends 5.L1 Db_allsites, 6.L6: home.php, zinc/h dr.php and ftr
* see http://localhost:8083/pdogridbig_original/demo/pages/
*     http://dev1:8083/fwphp/glomodul/z_examples/05_flex01_2col.php


https://supportindeed.com/view.php?id=945785  slavkoss22@gmail.com
Dear sirs !
Links, eg
http://phporacle.eu5.net/fwphp/glomodul/blog/?i/about/
link worked few months ago, but then stopped working.
(Same as on Heliohost)

This link works on my Windows10 64 bit XAMPP development, also on virtual Oracle Linux machine on Windows10 64 bit.

Second, I think that my site http://phporacle.eu5.net/fwphp/www/ 
is very useful for PHP learning so it should not have time limitation, same as my Github page : https://github.com/slavkoss/fwphp


Hello Chris White !

Error is visible if you put this URL in Chrome or Firefox :
   1. http://phporacle.eu5.net/fwphp/glomodul/blog/
   --- blog module home page appears
   2. now click at page top link About Us or Contact Us or This Module 
      (it is link eg http://phporacle.eu5.net/fwphp/glomodul/blog/?i/contact/
       or same error eg phporacle.eu5.net/fwphp/glomodul/blog/index.php?i/about/)
   --- page does not open - we are still in blog module home page

This link works on my Windows10 64 bit XAMPP development, also on virtual Oracle Linux machine on Windows10 64 bit.
On Heliohost is not working (same bug as Freehostingeu). Permissions ?

Clear cache and cookies in Chrome and Firefox does not help.

Second, I think that my site http://phporacle.eu5.net/fwphp/www/
is very useful for PHP learning so it should not have time limitation, same as my Github page : https://github.com/slavkoss/fwphp
*/
