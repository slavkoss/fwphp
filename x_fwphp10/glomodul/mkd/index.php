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
$module_path = str_replace('\\','/', __DIR__) .'/' ;
$site_path   = dirname(dirname($module_path)) ; // .'/'  to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
$wsroot_path = dirname(dirname(dirname($module_path)))  ;
               //or $wsroot_path = str_replace('\\','/', realpath('../../')) .'/' ;
$shares_path = $wsroot_path.'/vendor/b12phpfw' ; //includes, globals, commons, reusables

$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // or $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  , 'dir_apl'     => 'glomodul'  // application (group of modules) folder name
  , 'wsroot_path' => $wsroot_path  // to awww/www (or any names)
  , 'shares_path' => $shares_path  // to b12phpfw, b12phpfw is required dir name
  , 'site_path'   => $site_path    // to fwphp (or any names)
  , 'module_path' => $module_path  // to fwphp/www (or any names)
  //
  , 'glomodul_path' => $site_path .'glomodul/'
  , 'examples_path' => $site_path .'glomodul/z_examples/'
] ;

//2. global cls loads classes scripts automatically
require($pp1->shares_path.'/Autoload.php');
new Autoload($pp1);


//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee inherits $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);
