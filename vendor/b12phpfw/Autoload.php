<?php
// J:\awww\www\vendor\b12phpfw\Autoload.php
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
      $clsname      = basename($nscls_linfmt) ; //eg Home_ctr, Config_ allsites, Db_allsites
      $module_dir   = basename(dirname($nscls_linfmt)) ; //eg post is unique module name
                          if ('') { echo '<pre>'; 
                          echo __METHOD__ .' ln='.__LINE__.' said: ' ;
                          echo '<br>SHARED (GLOBAL) CLS TO LOAD $clsname=<b>'. $clsname .'</b>'; 
                          echo ' $module_dir='; print($module_dir) ;
                            if ($clsname==='Home_ctr'): echo '<br><b>Home_ctr extends Config_allsites (alias, nickname is utl)</b>'; endif;
                            if (substr($clsname,0,11) === 'Db_allsites'): ?>
                        <br>     instantiated in index.php so :
                  //3. SAME MODULE DB ADAPTER FOR ANY shared DB adapter
                  //<b>$pp1->dbicls</b> = Db_allsites_ORA or Db_allsites for MySql :
                  $tmp = 'B12phpfw\\core\\b12phpfw\\'. $pp1->dbicls ;
                  //shared DB adapter :
                  $AllTbl_crud_obj = new $tmp() ; 
                  //module DB adapter IS SAME for Db_allsites_ORA and Db_allsites for MySql !!
                  $Tbl_crud_obj = new Tbl_crud(<b>$AllTbl_crud_obj</b>) ; <?php
                            endif;
                            if ($clsname === 'Tbl_crud'): ?>
                  <br>has constructor to achieve SAME MODULE DB ADAPTER FOR ANY shared DB adapter :
                  public function __construct(<b>Interf_Tbl_crud $utldb</b>) { 
                     self::$utldb = $utldb;
                  } <?php
                            endif;
                            if ($clsname === 'Interf_Tbl_crud'): ?>
                  <br>PHP Interface is a list of methods as a <b>package</b> in oracle plsql. PHP class is like <b>package body</b> in oracle plsql. Reasons for using Interface: 1. mandatory form of method call, 2. same module db adapter for any shared db adapter. <?php
                            endif;
                          echo '<br>namespaced class $nscls='; print($nscls) ; 
                          echo '</pre>'; 
                          }
      switch (true) { 
      // *********************************
      // 1. shared clsses scripts
      // *********************************
      case  substr($clsname,0,11) === 'Db_allsites':
        $clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
        //goto krajswitch ;
        break;
      case  $clsname === 'Interf_Tbl_crud' or $clsname === 'Config_allsites' : 
        $clsscript_path=$this->pp1->shares_path .'/'. $clsname .'.php' ; 
        //goto krajswitch ;
        break;
      // *********************************************
      // 2. module clsses scripts (in module dirs)
      // *********************************************
      case  $clsname === 'Tbl_crud': //for compound module eg blog may be in different nodules
        //switch ($module_dir) { // unique module name from namespace
        switch (basename($this->pp1->module_path)) { //compound module eg blog - no own Tbl_crud !
        case 'blog': //it's modules (dirs) post, post_comment, category are here :
          $clsscript_path=$this->pp1->site_path .'/glomodul/'.$module_dir.'/'. $clsname .'.php' ; 
          break;
        default: //own Tbl_crud ee in module dir (case 'adrs':)
          $clsscript_path=$this->pp1->module_path .'/'. $clsname .'.php' ; 
          break;
        }
        break;
      default: // other clsses in module dir :
        $clsscript_path=$this->pp1->module_path .'/'. $clsname .'.php' ; 
        break;

      }
                  if ('') {
                  echo '<pre>'. __METHOD__ .' ln='.__LINE__.' said:';
                  echo '<br>--------------------------------------------------------------';
                  echo '<br>$this->pp1->site_path='. $this->pp1->site_path ;
                  echo '<br>$this->pp1->shares_path='. $this->pp1->shares_path ;
                  echo '<br>$this->pp1->module_path='. $this->pp1->module_path ;
                  echo '<br>substr($this->pp1->dbicls,0,11)='. substr($this->pp1->dbicls,0,11) ; 
                  echo '<br>$nscls='. $nscls ;
                  echo '<br>$nscls_linfmt='. $nscls_linfmt ;
                  echo '<br>$clsname='. $clsname ;
                  echo '<br>$module_dir='. $module_dir ;
                  echo '<br>$clsscript_path='. $clsscript_path ;
                  //echo '<br>$Tbl_crud_obj='. $Tbl_crud_obj ;
                  if ($clsname === 'utldb'): echo '<br>stack_trace:<br>'; print_r($this->pp1->stack_trace) ; endif ;
                  //if ($clsname === 'Tbl_crud'): echo '<br>stack_trace:<br>'; print_r($this->pp1->stack_trace) ; endif ;
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



      /*case $module_dir === 'b12phpfw': 
        $clsscript_path=dirname($this->pp1->shares_path).'/'.$module_dir.'/'.$clsname .'.php' ; 
        echo '<p>'. __METHOD__ .' ln='.__LINE__.' said: SHARED CLS TO LOAD '. '$clsname='. $clsname .'</p>'; 
        break; */
      /*case $clsname === 'utldb':
      //case substr($this->pp1->dbicls,0,11) === 'Db_allsites'
           //and $clsname !== 'Interf_Tbl_crud' :
        $clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
        break; */
      /*default: // module cls eg $module_dir=adrs
        if ($clsname === 'utldb'):
          echo '<p>'. __METHOD__ .' ln='.__LINE__.' said: SHARED DB CLS TO LOAD, '. '$clsname='. //$clsname .'</p>'; 
          //$module_dir = 'b12phpfw' ;
          $clsname = $this->pp1->dbicls ;
          $clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
        elseif (substr($this->pp1->dbicls,0,11) === 'Db_allsites'):
          echo '<p>'. __METHOD__ .' ln='.__LINE__.' said: SHARED DB CLS TO LOAD, '. '$clsname='. //$clsname .'</p>'; 
          //$module_dir = 'b12phpfw' ;
          $clsname = $this->pp1->dbicls ;
          $clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
        else :
          echo '<p>'. __METHOD__ .' ln='.__LINE__.' said: DEFAULT TO LOAD eg adrs module cls, '. '$clsname='. $clsname .'</p>'; 
          $clsscript_path=dirname($this->pp1->module_path).'/'.$module_dir.'/'.$clsname .'.php' ; 
        endif ;

        break; */