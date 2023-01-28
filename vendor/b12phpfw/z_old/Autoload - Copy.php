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
      $module_dir   = basename(dirname($nscls_linfmt)) ; //eg Home_ctr, Config_ allsites, Db_allsites
      //echo '<pre>$nscls='; print($nscls) ; echo ' $module_dir='; print($module_dir) ; echo '</pre>'; 

    //[dbicls] => Db_allsites_ora
    //[wsroot_path] => J:/awww/www/
    //[shares_path] => J:/awww/www/vendor/b12phpfw/
    //[site_path] => J:/awww/www/fwphp/glomodul/
    //[module_path] => J:/awww/www/fwphp/glomodul/adrs/
      //switch ($module_dir) {  
      switch (true) { // shared (global) class
      case $module_dir === 'b12phpfw': 
        $clsscript_path=dirname($this->pp1->shares_path).'/'.$module_dir.'/'.$clsname .'.php' ; 
        echo '<p>'. __METHOD__ .' ln='.__LINE__.' SAYS: SHARED CLS TO LOAD '. '$clsname='. $clsname .'</p>'; 
        break;
      /*case $clsname === 'utldb':
      //case substr($this->pp1->dbicls,0,11) === 'Db_allsites'
           //and $clsname !== 'Interf_Tbl_crud' :
        $clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
        break; */
      default: // module cls eg $module_dir=adrs
        if ($clsname === 'utldb'):
          echo '<p>'. __METHOD__ .' ln='.__LINE__.' SAYS: SHARED DB CLS TO LOAD, '. '$clsname='. //$clsname .'</p>'; 
          //$module_dir = 'b12phpfw' ;
          $clsname = $this->pp1->dbicls ;
          $clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
        elseif (substr($this->pp1->dbicls,0,11) === 'Db_allsites'):
          echo '<p>'. __METHOD__ .' ln='.__LINE__.' SAYS: SHARED DB CLS TO LOAD, '. '$clsname='. //$clsname .'</p>'; 
          //$module_dir = 'b12phpfw' ;
          $clsname = $this->pp1->dbicls ;
          $clsscript_path=$this->pp1->shares_path .'/'. $this->pp1->dbicls .'.php' ; 
        else :
          echo '<p>'. __METHOD__ .' ln='.__LINE__.' SAYS: DEFAULT TO LOAD eg adrs module cls, '. '$clsname='. $clsname .'</p>'; 
          $clsscript_path=dirname($this->pp1->module_path).'/'.$module_dir.'/'.$clsname .'.php' ; 
        endif ;

        break; 
      }
                  if ('1') {echo '<pre>'. __METHOD__ .' ln='.__LINE__.' SAYS:';
                  echo '<br>substr($this->pp1->dbicls,0,11)='. substr($this->pp1->dbicls,0,11) ; 
                  echo '<br>$nscls_linfmt='. $nscls_linfmt ;
                  echo '<br>$clsname='. $clsname ;
                  echo '<br>$module_dir='. $module_dir ;
                  echo '<br>$clsscript_path='. $clsscript_path ;
                  echo '</pre>';
                  }
                      /*B12phpfw\core\b12phpfw\Autoload::autoloader ln=42 SAYS:
                      substr($this->pp1->dbicls,0,11)=Db_allsites
                      $clsname=Home_ctr
                      $module_dir=adrs

                      B12phpfw\core\b12phpfw\Autoload::autoloader ln=42 SAYS:
                      substr($this->pp1->dbicls,0,11)=Db_allsites
                      $clsname=Interf_Tbl_crud
                      $module_dir=b12phpfw */
      require $clsscript_path;

   } catch (Throwable $e) {
       //echo 'Very nice way to catch Exception and Error exceptions';
       echo '<pre>**** class Autoload SAYS : ';
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