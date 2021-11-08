<?php
// J:\awww\www\vendor\b12phpfw\Autoload.php
namespace B12phpfw\core\b12phpfw ; //Dir name is last in namespace and use 
//use B12phpfw\dbadapter\post\Tbl_crud ; //         as Tbl_crud_post ;

class Autoload
{
   protected $pp1 ; //M O D U L E PROPERTIES PALLETE like in Oracle Forms

   public function __construct(object &$pp1) {
     $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ .' ('. __METHOD__ .')';
     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'autoloader'));
     return null ;
   }

  function autoloader(string $nscls) 
  {
    //$nscls is namespaced called cls name eg B12phpfw\module\book\Home_ctr
    $DS = DIRECTORY_SEPARATOR ;
    $nscls_linfmt = str_replace('\\',$DS, $nscls) ; //ON LINUX
    $clsname      = basename($nscls_linfmt) ; //eg Home_ctr, Config_ allsites, Db_allsites
    $module_dir   = basename(dirname($nscls_linfmt)) ; //eg Home_ctr, Config_ allsites, Db_allsites
    //echo '<pre>$nscls='; print($nscls) ; echo ' $module_dir='; print($module_dir) ; echo '</pre>'; 

    switch ($module_dir) {
    case 'b12phpfw': 
      $clsscript_path=dirname($this->pp1->shares_path).'/'.$module_dir.'/'.$clsname .'.php' ; 
      break;
    default:
      $clsscript_path=dirname($this->pp1->module_path).'/'.$module_dir.'/'.$clsname .'.php' ; break;
      break; 
    }
        //echo '<p>$clsscript_path='; print($clsscript_path) ; echo ' SAYS: '. __METHOD__ .'</p>'; 

    require $clsscript_path;


  }
}


//http://dev1:8083/fwphp/01mater/fw_popel_onb12/index.php?p=b1b2tree&id=1
//http://dev1:8083/fwphp/01mater/fw_popel_onb12/B2_cre_upd.php?bookid=1&authorid=1

/*

                      //not working but : ctrl+u in ibrowser !!!
                      //register_shutdown_function('self::_fatal_error_hndl');
     //$a='hello';  variable variable $$a='world'; is same as $hello='world';
     //   echo "$a ${$a}"; is same as echo "$a $hello";
     //arrays: ${$a[1]} to use $a[1] as a variable 
     //   or ${$a}[1] to use $$a as the variable and then the [1]index from that variable
*/