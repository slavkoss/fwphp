<?php
// J:\awww\www\vendor\b12phpfw\Autoload.php
// http://dev1:8083/fwphp/glomodul/blog/index.php?i/posts/ 
// http://dev1:8083/fwphp/glomodul/blog/index.php?i/read_post/id/54
// http://dev1:8083/fwphp/glomodul/blog/index.php
declare(strict_types=1);

namespace B12phpfw\core\b12phpfw ; //Dir name is last in namespace and use 

//use B12phpfw\dbadapter\post\Tbl_crud ; //         as Tbl_crud_post ;

class Autoload
{
   protected $pp1 ; //M O D U L E PROPERTIES PALLETE like in Oracle Forms

   public function __construct(object &$pp1) {

      if (strnatcmp(phpversion(),'5.4.0') >= 0) {
            if (session_status() == PHP_SESSION_NONE) { session_start(); }
      } else { if(session_id() == '') { session_start(); } }

     $_SESSION["SuccessMessage"] = [] ;
     $_SESSION["ErrorMessage"] = [] ;

     $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ .' ('. __METHOD__ .')';
     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'autoloader'));
     return null ;
   }

  function autoloader(string $nscls) 
  {
    try {
      //$nscls is namespaced called cls name eg B12phpfw\module\book\Home_ctr
      $DS = DIRECTORY_SEPARATOR ;
      $nscls_linfmt = str_replace('\\',$DS, $nscls) ; //ON LINUX
      $clsnameNS      = basename($nscls_linfmt) ; //eg Home_ctr, Config_ allsites, Db_allsites
      $module_dirNS   = basename(dirname($nscls_linfmt)) ; //eg post is unique module name


    // ***************** CONVENTIONS FOR CLASS SCRIPTS **************************
    switch (true) 
    { 
      // *********************************
      // 1. shared clsses scripts
      // *********************************
      case $module_dirNS === 'b12phpfw':
                            //case  substr($clsnameNS,0,11) === 'Db_allsites': //also ok
                            //case $clsnameNS === 'Interf_Tbl_crud' :
                            //case $clsnameNS === 'Config_allsites' : 
         $clsscript_path=$this->pp1->shares_path .'/'. $clsnameNS .'.php' ; 
                       //$clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
         //goto krajswitch ;
        break;

      default:
         // *********************************************
         // 2. module clsses scripts (in module dirs)
         // *********************************************
         $clsscript_path=$this->pp1->site_path.'/'.$this->pp1->dir_apl.'/'
             . $module_dirNS .'/'. $clsnameNS .'.php' ; 

    } // end  CONVENTIONS FOR CLASS SCRIPTS *****************
                  if ('') {
                  echo '<pre>'. __METHOD__ .' ln='.__LINE__.' said:';
                  echo '<br>--------------------------------------------------------------';
                  echo '<br>$this->pp1->site_path='. $this->pp1->site_path ;
                  echo '<br>$this->pp1->shares_path='. $this->pp1->shares_path ;
                  echo '<br>$this->pp1->module_path='. $this->pp1->module_path ;
                  echo '<br>substr($this->pp1->dbicls,0,11)='. substr($this->pp1->dbicls,0,11) ; 
                  echo '<br>$nscls='. $nscls ;
                  echo '<br>$nscls_linfmt='. $nscls_linfmt ;
                  echo '<br>$this->pp1->dir_apl=***'. $this->pp1->dir_apl .'***';
                  echo '<br>$module_dirNS=***'. $module_dirNS .'***';
                  echo '<br>$clsnameNS=***'. $clsnameNS .'***';
                  echo '<br>$clsscript_path='. $clsscript_path ;
                  //echo '<br>$Tbl_crud_obj='. $Tbl_crud_obj ;
                  if ($clsnameNS === 'Posts'): echo '<br>stack_trace:<br>'; print_r($this->pp1->stack_trace) ; endif ;
                  //if ($clsnameNS === 'Tbl_crud'): echo '<br>stack_trace:<br>'; print_r($this->pp1->stack_trace) ; endif ;
                  echo '</pre>';
                  } //J:\awww\www\fwphp\glomodul\blog\Tbl_crud.php

         require_once $clsscript_path ;


      krajswitch:
        null;

   } catch (Throwable $e) {
       //echo 'Very nice way to catch Exception and Error exceptions';
       echo '<pre>***error class Autoload said : ';
   }


  }
}


      // *********************************
      // 1. shared clsses scripts
      // *********************************
       // $nscls_linfmt=B12phpfw\core\b12phpfw\Interf_Tbl_crud
       // $nscls=       B12phpfw\core\b12phpfw\Interf_Tbl_crud
       // $this->pp1->dir_apl=***glomodul***
       // $module_dirNS=***b12phpfw***
       // $clsnameNS=***Interf_Tbl_crud***


       // $nscls_linfmt=B12phpfw\dbadapter\post\Tbl_crud
       // $nscls=       B12phpfw\dbadapter\post\Tbl_crud
       // $this->pp1->dir_apl=***glomodul***
       // $module_dirNS=***post***
       // $clsnameNS=***Tbl_crud***
      //$this->pp1->site_path=J:/awww/www/fwphp
      //$this->pp1->shares_path=J:/awww/www/vendor/b12phpfw
      //$this->pp1->module_path=J:/awww/www/fwphp/glomodul/blog
      //substr($this->pp1->dbicls,0,11)=Db_allsites

       // *********************************************
       // 2. module clsses scripts (in module dirs)
       // *********************************************
       //case  $clsnameNS === 'Tbl_crud': //for compound module eg blog may be in different modules
       //switch ($module_dirNS) { // unique module name from namespace
      /* switch (basename($this->pp1->module_path))  // module (dir) name from index.php
      {
        //COMPOUND MODULES eg blog - no own Tbl_crud ! : 
        case 'blog': 
          //it's modules (dirs) post, post_comment, category are here :
          switch ($clsnameNS)
          { 
            case 'Tbl_crud': // CRUD (model) cls
            case 'Posts': // view cls
            case 'User':  // view cls
              // Tbl_ crud-s clss are in different modules - subdirs from namespaces
              // below dir glomodul which is our choice (may be apl or ...)
              $clsscript_path=$this->pp1->site_path.'/glomodul/'.$module_dirNS.'/'.$clsnameNS.'.php';
              break;
              // P ost cls (unique name) is in same-named subdir from namespace
              // below dir glomodul which is our choice (may be apl or ...)

            default: //own Tbl_crud ee in module dir (case 'adrs':)
              $clsscript_path=$this->pp1->module_path .'/'. $clsnameNS .'.php' ; 
                break;
          }


        default: //own Tbl_crud ee in module dir (case 'adrs':)
           $clsscript_path=$this->pp1->module_path .'/'. $clsnameNS .'.php' ; 
           break;
      } // end 2. module clsses scripts (in module dirs)
      */





/*
                          if ('') { echo '<pre>'; 
                          echo __METHOD__ .' ln='.__LINE__.' said: ' ;
                          echo '<br>SHARED (GLOBAL) CLS TO LOAD $clsnameNS=<b>'. $clsnameNS .'</b>'; 
                          echo ' $module_dirNS='; print($module_dirNS) ;
                            if ($clsnameNS==='Home_ctr'): echo '<br><b>Home_ctr extends Config_allsites (alias, nickname is utl)</b>'; endif;
                            if (substr($clsnameNS,0,11) === 'Db_allsites'): ?>
                        <br>     instantiated in index.php <?php
                            endif;
                            if ($clsnameNS === 'Tbl_crud'): ?>
                  <br>has constructor to achieve SAME MODULE DB ADAPTER FOR ANY shared DB adapter :
                  public function __construct(<b>Interf_Tbl_crud $utldb</b>) { 
                     self::$utldb = $utldb;
                  } <?php
                            endif;
                            if ($clsnameNS === 'Interf_Tbl_crud'): ?>
                  <br>PHP Interface is a list of methods as a <b>package</b> in oracle plsql. PHP class is like <b>package body</b> in oracle plsql. Reasons for using Interface: 1. mandatory form of method call, 2. same module db adapter for any shared db adapter. <?php
                            endif;
                          echo '<br>namespaced class $nscls='; print($nscls) ; 
          if ($clsnameNS === 'Posts'): echo '<br>stack_trace:<br>'; print_r($this->pp1->stack_trace) ; endif ;
                          echo '</pre>'; 
                          }
*/







//URL example: http://dev1:8083/fwphp/01mater/fw_popel_onb12/index.php?p=b1b2tree&id=1
//    http://dev1:8083/fwphp/01mater/fw_popel_onb12/B2_cre_upd.php?bookid=1&authorid=1

/*

                      //not working but : ctrl+u in ibrowser !!!
                      //register_shutdown_function('self::_fatal_error_hndl');
     //$a='hello';  variable variable $$a='world'; is same as $hello='world';
     //   echo "$a ${$a}"; is same as echo "$a $hello";
     //arrays: ${$a[1]} to use $a[1] as a variable 
     //   or ${$a}[1] to use $$a as the variable and then the [1]index from that variable
*/



