<?php
/**
 * J:\awww\www\fwphp\glomodul\z_examples\call_child_fn_from_parent_cls.php  WHY ?
 * DISPATCHING is call method according URL parts (extracted with ROUTING code)
 * BECAUSE MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules,
 * TO AVOID LOT OF SAME CODE IN MODULES (CODE REDUNDANCY) 
 * we assign globals in parent clas, then call child method from parent clas
 */
declare(strict_types=1);
namespace B12phpfw\module\z_examples ;

abstract class utl { // Config_ allsites & global utilities
  // utilities class

  public function __construct(string $called_module_method) {
    echo '<br><b>echo from PARENT CONFIG&UTILS cls :</b> '. __METHOD__ 
    .'<br>MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules !!' ;
    $obj_params = (object)['p1'=>'p1value'] ; //global elements of property pallete 
    return static::$called_module_method($obj_params); // Here comes Late Static Bindings
  }

    public static function call_module_method(string $akc, object $obj_params) {
      echo '<br><b>echo from PARENT CONFIG&UTILS cls :</b> See how is created  m e t h o d  name  $ a k c  in abstract class Config_ allsites, m ethod __c onstruct :<br>
      $this->call_module_method($akc, $pp1) ; //protected fn (in child cls Home_ ctr) calls private fns (in child cls Home_ ctr)
      ' ;
                //static::called_module_method(); // Here comes Late Static Bindings
                //return $this->$akc($pp1) ;
      return static::$akc($obj_params); // Here comes Late Static Bindings
    }
}

class Home_ctr extends utl {
  // module controller

  public function __construct() {
    // Do global configuration because 
    // MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules
    parent::__construct('called_module_method'); 
    //Home_ctr::call_module_method('called_module_method', (object)['p1'=>'p1value']);
  }

    protected static function called_module_method(object $obj_params) {
      // here can be added module dependent parameters
        echo '<br><br><b>echo from child cls :</b> '. __METHOD__ ;
        echo '<pre><b>$obj_params</b>='; print_r($obj_params) ; echo '</pre>';
    }
}


$module_ctr = new Home_ctr(); // instatiated in index.php
//    or :
//Home_ctr::call_module_method('called_module_method', (object)['p1'=>'p1value']);


/*
//outputs : 
echo from PARENT CONFIG&UTILS cls : B12phpfw\module\z_examples\utl::__construct
MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules !!

echo from child cls : B12phpfw\module\z_examples\Home_ctr::called_module_method

$obj_params=stdClass Object
(
    [p1] => p1value
)
*/