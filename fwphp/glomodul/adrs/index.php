<?php
/**     
 * J:\awww\www\fwphp\glomodul\adrs\index.php
 * DISPATCHING is calling method according URL parts (extracted with ROUTING code).    
 * Because MODULE METHODS PARAMS ARE MOSTLY GLOBAL (same for all modules), eg paths,      
 * to avoid lot of same code in modules (code redundancy) :    
 * 1. WE ASSIGN GLOBALS IN PARENT CONF&UTL CLS METHOD
 *    (not knowing which module is going to use them)        
 * 2. THEN, FROM PARENT CLS WE CALL METHOD IN CHILD MODULE CLS. 
 *    Module method knows how to use globals 
 *    and what module needs for parameters beside globals.       
 */

declare(strict_types=1);

/** 
 *         ns (NAMESPACES) we use in clses script autoloading.
 * vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
 * eg B12phpfw is vendor_namesp_prefix  ; //FUNCTIONAL, NOT POSITIONAL
 *     FUNCTIONAL parts are not requirad, we use them to better understand script purpose.
 *eg clsdir - only this part of namespace is POSITIONAL, CAREFULLY ! 
 */
namespace B12phpfw\module\adrs ;
use B12phpfw\core\zinc\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
$wsroot_path = str_replace('\\','/', realpath('../../../')) .'/' ;
$shares_path = $wsroot_path.'zinc/' ; //includes, globals, commons, reusables

//$Dbconn = [ null, 'mysql', 'localhost', 'z_adrs', 'root', ''] ;

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]

  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'7.0.0.0 Adrs (Mini3)' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs paths where are class scripts to autoload. Dir name is last in namespace and use. 
  , 'module_path_arr'=>[
    //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
    $module_dir_path // = thismodule_cls_dir_path = $pp1->module_path
    //dir of global clses for all sites :
    ,$shares_path //,str_replace('\\','/',realpath($module_ towsroot.'zinc')) .'/'
              /* //two master modules (tbls) = blocks in Ora. Forms
              ,$app_dir_path.'user/'
              ,$app_dir_path.'post_category/'
              //detail & subdet modules (tbls) = blocks in Ora. Forms
              ,$app_dir_path.'post/'
              ,$app_dir_path.'post_comment/' */
  ]
  //1.4
  //     list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
  //    , self::$db_username, self::$db_userpwd) 
  //    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!
  // Dbconn_allsites.php : return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
  //, 'Dbconn'=>$Dbconn
] ;

//2. //2. global cls loads (includes, bootstrap) classes scripts automatically
require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); //eliminates need to include class scripts

//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee DI $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);


/**
 *                    **HELPNS
 * first namespace part B12phpfw is NOT REQUIRED : vendor's name NS's prefix (FUNCTIONAL NSPART)
 * 2nd ns part m o d u l e is NOT REQUIRED : FUNCTIONAL NSPART = processing (behavior) 
 *
 * FNSPs (FUNCTIONAL NS PARTS) are ignored by fw, ee we name them as we wish.
 *    We use FNSPs as description to depict WHAT CODE DOES (processing, behavior).
 *    May be more functional ns parts as we wish - all are ignored !
 *
 * PNSP (POSITIONAL NS Part) CAREFULLY! : LAST NS part (BEFORE CLSNAME IF ANY) eg "blog" is DIRNAME.
 *    PNSP is actually (de facto, in fact, indeedded) DIRNAME and module name.
 *    Path OF DIRNAME (of PNSP) is in $pp1 array,       
 *        used for Autoload class to include classes from dir DIRNAME.
 *    Autoload class is include, global, common, reusable.
*/                                                     
                                                       
                                                       
                                                      
                                                       
                                                       
                                                       
                                                       
                                                       