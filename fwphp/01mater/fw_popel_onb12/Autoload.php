<?php
namespace B12phpfw\module\fw_popel_onb12 ; //Dir name is last in namespace and use 
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
    //$nscls is namespaced cls name eg B12phpfw\module\book\Home_ctr
    $DS = DIRECTORY_SEPARATOR ;
    $nscls_linfmt = str_replace('\\',$DS, $nscls) ; //ON LINUX
    $clsname      = basename($nscls_linfmt) ; //eg Home_ctr, Config_ allsites, Db_allsites

    //Cls scripts paths to autoload from : module_path, shares_path :
    $module_clsscript_path = $this->pp1->module_path_arr[0] . $clsname .'.php' ;
    $shares_clsscript_path = $this->pp1->module_path_arr[1] . $clsname .'.php' ;
    //autoload from : module_path, shares_path :
    switch (true) {
    case (file_exists($module_clsscript_path)): include $module_clsscript_path; break;
    case (file_exists($shares_clsscript_path)): include $shares_clsscript_path; break;
    default: break;
      // not found :
      //return $clsname .'; <--- put_this_in_caller' ;
    }

  }
}

//http://dev1:8083/fwphp/01mater/fw_popel_onb12/index.php?p=b1b2tree&id=1
//http://dev1:8083/fwphp/01mater/fw_popel_onb12/B2_cre_upd.php?bookid=1&authorid=1

                      //not working but : ctrl+u in ibrowser !!!
                      //register_shutdown_function('self::_fatal_error_hndl');
     //$a='hello';  variable variable $$a='world'; is same as $hello='world';
     //   echo "$a ${$a}"; is same as echo "$a $hello";
     //arrays: ${$a[1]} to use $a[1] as a variable 
     //   or ${$a}[1] to use $$a as the variable and then the [1]index from that variable