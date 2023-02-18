<?php
/**     
 * J:\awww\www\fwphp\glomodul\adrs\index.php
 */
declare(strict_types=1);

//string before last word is not used but required for names resoluzion. See below **HELPNS
namespace B12phpfw\module\post ; // 'vendor_namesp_prefix'= 'B12phpfw'

use B12phpfw\core\b12phpfw\Autoload ;
//use B12phpfw\core\b12phpfw\Db_allsites_Intf ;
//use B12phpfw\core\b12phpfw\Db_allsites ; //DB MySQL (NOT HARD CODED) SHARED DBADAPTER
use B12phpfw\core\b12phpfw\Config_allsites ;
use B12phpfw\module\post\Home_ctr ;
use B12phpfw\dbadapter\post\Tbl_crud ;


//Self-called anonymous function that creates its own scope and keep the global namespace clean.
(function () {

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      //echo '<b>$pp1</b>='; print_r($pp1);
                      echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }

  //1. settings - properties - assign global variables to use them in any code part
  $module_path = str_replace('\\','/', __DIR__) ; // .'/' ..."adrs" dir
  $dbicls = 'Db_allsites' ; //$dbicls = 'Db_allsites_ORA' ; 

    $pp1 = (object)[ 
        'pp1_group01' => '~~~~~ MODULE ELEMENTS IN PROPERTY PALLETE $pp1 : ~~~~~' 
      , 'module_version'=>'ver. 11.0.0.0 Posts '
          . ($dbicls === 'Db_allsites' ? 'MariaDB' : 'Oracle')
          .', Feb.2023'  
      , 'dbg'=>'1'
      , 'dbicls' => $dbicls // for MySql DB or ...
      , 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
       //
      , 'pp1_group02P' => '~~~~~ ADRESSES : PATHS ~~~~~' 
      , 'module_path' => $module_path 
    ] ;


  //2. global cls loads (includes) classes scripts automatically
  //not  Composer's autoload cls-es :
  require(dirname(dirname(dirname($module_path)))  .'/vendor/b12phpfw/bootstrap.php'); 
  require($pp1->shares_path .'/Autoload.php');
  $autoloader = new Autoload($pp1); //eliminates need to include class scripts

  //3. SAME MODULE DB ADAPTER FOR ANY (NOT HARD CODED) SHARED DBADAPTER
  //$pp1->dbicls = Db_allsites_ORA or Db_allsites for MySql :
  $shared_dbadapter = 'B12phpfw\\core\\b12phpfw\\'. $pp1->dbicls ;
  $pp1->shared_dbadapter_obj = new $shared_dbadapter() ; 
  //module DB adapter IS SAME for Db_allsites_ORA and Db_allsites for MySql !!
  $module_dbadapter_obj = new Tbl_crud($pp1) ; 

  //4. process request from ibrowser (routing) & send response to ibrowser (dispatching)
  //Home_ ctr "inherits" index.php ee "inherits" Dependency Injected array $p p 1
  $module_ctr_obj = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites (utils)
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
                                                       
                                                       
                                                      
                                                       
                                                       
                                                       
                                                       
                                                       