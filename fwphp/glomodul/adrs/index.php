<?php
/**     
 * J:\awww\www\fwphp\glomodul\adrs\index.php
 */
declare(strict_types=1);

//string before adrs, b12phpfw... is not required. See below **HELPNS
namespace B12phpfw\module\adrs ;

use B12phpfw\core\b12phpfw\Autoload ;
//use B12phpfw\core\b12phpfw\Db_allsites_Intf ;
//use B12phpfw\core\b12phpfw\Db_allsites ; //DB MySQL (NOT HARD CODED) SHARED DBADAPTER
use B12phpfw\dbadapter\adrs\Tbl_crud ;

use B12phpfw\core\b12phpfw\Config_allsites ;
use B12phpfw\module\adrs\Home_ctr ;


//Self-called anonymous function that creates its own scope and keep the global namespace clean.
(function () {
  //1. settings - properties - assign global variables to use them in any code part
  $module_path = str_replace('\\','/', __DIR__) ; // .'/' 
  $site_path = dirname(dirname($module_path)) ; //to app dir eg "glomodul" dir and app
  $wsroot_path = str_replace('\\','/', realpath('../../../'))  ;
  $shares_path = $wsroot_path.'/vendor/b12phpfw' ; //includes, globals, commons, reusables

  //$Dbconn = [ null, 'mysql', 'localhost', 'z_adrs', 'root', ''] ;

  $pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
  [  
      'module_version'=>'Adrs (Mini3) MySQL ver. 10.0.3.0 Feb.2023' //, 'vendor_namesp_prefix'=>'B12phpfw'
    , 'dbg'=>'1'
    , 'dbicls' => 'Db_allsites' // for MySql DB or ...
    //, 'dbicls' => 'Db_allsites_ORA' //for Oracle DB or ...
    , 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]

    , 'dir_apl'     => 'glomodul'  // application (group of modules) folder name
    , 'wsroot_path' => $wsroot_path  // to awww/www (or any name)
    , 'shares_path' => $shares_path  // to b12phpfw, b12phpfw is required dir name
    , 'site_path'   => $site_path    // to fwphp (or any name)
    , 'module_path' => $module_path  // to fwphp/glomodul/blog (or any names)
  ] ;

  //2. global cls loads (includes, bootstrap) classes scripts automatically
  require($pp1->shares_path .'/Autoload.php'); //or Composer's autoload cls-es
  $autoloader = new Autoload($pp1); //eliminates need to include class scripts

  //3. SAME MODULE DB ADAPTER FOR ANY (NOT HARD CODED) SHARED DBADAPTER
  //$pp1->dbicls = Db_allsites_ORA or Db_allsites for MySql :
  $shared_dbadapter = 'B12phpfw\\core\\b12phpfw\\'. $pp1->dbicls ;
  $pp1->shared_dbadapter_obj = new $shared_dbadapter() ; 
  //module DB adapter IS SAME for Db_allsites_ORA and Db_allsites for MySql !!
  $module_dbadapter_obj = new Tbl_crud($pp1) ; 
  //$module_dbadapter_obj = new Tbl_crud($pp1->shared_dbadapter_obj) ; 

  //4. process request from ibrowser & send response to ibrowser
  //Home_ ctr "inherits" index.php ee DI $p p 1
  $module_obj = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
          if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
             .', line '. __LINE__ .' said'=>'where am I'
             ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
          ] ) ; }

})();
exit(0);


// https://riptutorial.com/php/example/17980/php-cli

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

/** 
 *         ns (NAMESPACES) we use in clses script autoloading.
 * vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
 * eg B12phpfw is vendor_namesp_prefix  ; //FUNCTIONAL, NOT POSITIONAL
 *     FUNCTIONAL parts are not requirad, we use them to better understand script purpose.
 *eg clsdir - only this part of namespace is POSITIONAL, CAREFULLY ! 
 */

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
                                                       
                                                       
                                                      
                                                       
                                                       
                                                       
                                                       
                                                       