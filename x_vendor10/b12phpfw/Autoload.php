<?php
// J:\awww\www\vendor\b12phpfw\Autoload.php
//http://dev1:8083/fwphp/glomodul/adrs/
//http://dev1:8083/fwphp/glomodul/adrs/?i/ex1/
//http://dev1:8083/fwphp/glomodul/adrs/?i/ex2/p1/param1/p2/param2/
//http://dev1:8083/fwphp/glomodul/adrs/?i/rt/  = read table
//
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
                            //case $clsnameNS === 'Db_allsites_Intf' :
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
