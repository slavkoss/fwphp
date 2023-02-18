<?php
// J:\awww\www\vendor\b12phpfw\Autoload.php
//http://dev1:8083/fwphp/glomodul/adrs/
//http://dev1:8083/fwphp/glomodul/adrs/?i/ex1/
//http://dev1:8083/fwphp/glomodul/adrs/?i/ex2/p1/param1/p2/param2/
//http://dev1:8083/fwphp/glomodul/adrs/?i/rrt/  = read table
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

     $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

      if (strnatcmp(phpversion(),'5.4.0') >= 0) {
            if (session_status() == PHP_SESSION_NONE) { session_start(); }
      } else { if(session_id() == '') { session_start(); } }

     $_SESSION["SuccessMessage"] = [] ;
     $_SESSION["MsgErr"] = [] ;

     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'autoloader'));
     return null ;
   }

  function autoloader(string $nscls) 
  {
    //$nscls is namespaced called cls name eg B12phpfw\module\book\Home_ctr
    
    $this->pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ .', $nscls='. $nscls;

    try {
      $DS = DIRECTORY_SEPARATOR ;
      $nscls_opsys_fmt = str_replace('\\',$DS, $nscls) ; //eg B12phpfw\core\b12phpfw\Config_allsites
      $clsnameNS      = basename($nscls_opsys_fmt) ; //eg Home_ctr, Config_ allsites, Db_allsites
      //dir_of_clsscriptNS :
      $dir_module_from_NS = basename(dirname($nscls_opsys_fmt)) ; //eg b12phpfw or post (unique module name)


    // ***************** CONVENTIONS FOR CLASS SCRIPTS **************************
    switch (true) 
    { 
      // *********************************
      // 1. shared clsses scripts
      // *********************************
      case $dir_module_from_NS === 'b12phpfw':
         $clsscript_path=$this->pp1->shares_path .'/'. $clsnameNS .'.php' ; 
        break;

      default:
         // *********************************************
         // 2. module clsses scripts (in module dirs)
         // *********************************************
         $clsscript_path=$this->pp1->site_path.'/'. $this->pp1->dir_apl
            . '/' . $dir_module_from_NS 
                                //no more because each module is below module group !! :
                                //. ($this->pp1->dir_apl === '' ? '' : '/') . $dir_module_from_NS 
            .'/'. $clsnameNS .'.php' ; 

    } // end  CONVENTIONS FOR CLASS SCRIPTS *****************
                  if ('') {
                  echo '<span style="color: black; font-size: normal; font-weight: bold;">~~~~~ FLOW OF CODE (CONTROL) ~~~~~ '. __METHOD__ .' ln='.__LINE__.' said :</span>';
                  echo '<pre>--- Home_ctr extends utl (Config_allsites), Db_allsites implements Db_allsites_Intf';
                  //echo '<br>$this->pp1->site_path='. $this->pp1->site_path ;
                  //echo '<br>$this->pp1->shares_path='. $this->pp1->shares_path ;
                  //echo '<br>$this->pp1->module_path='. $this->pp1->module_path ;
                  //echo '<br>substr($this->pp1->dbicls,0,11)='. substr($this->pp1->dbicls,0,11) ; 
                  echo '<br>$nscls='. $nscls ;
                  //echo '<br>$nscls_opsys_fmt='. $nscls_opsys_fmt ;
                  //echo '<br>$clsnameNS=***'. $clsnameNS .'***';
                  echo '<br>$this->pp1->dir_apl='. $this->pp1->dir_apl ;
                  echo '<br>$dir_module_from_NS (NS means from namespace)=***'. $dir_module_from_NS .'***';
                  echo '<br>cls script to include:<span style="color: green; font-size: large; font-weight: bold;">clsscript_path</span>='. $clsscript_path 
                       .'~~~~~~~~~~~~~~' ;
                  //echo '<br>$Tbl_crud_obj='. $Tbl_crud_obj ;
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
