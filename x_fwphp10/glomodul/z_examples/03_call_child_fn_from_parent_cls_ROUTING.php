<?php
/**
 * J:\awww\www\fwphp\glomodul\z_examples\03_call_child_fn_from_parent_cls_ROUTING.php  WHY ?
 * DISPATCHING is call method according URL urlqry_parts (extracted with ROUTING code)
 * BECAUSE MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules,
 * TO AVOID LOT OF SAME CODE IN MODULES (CODE REDUNDANCY) 
 * we assign globals in parent clas, then call child method from parent clas
 */
//http://dev1:8083/fwphp/glomodul/z_examples/03_call_child_fn_from_parent_cls_ROUTING.php?i/home/k2/v2
declare(strict_types=1);
namespace B12phpfw\module\z_examples ;

abstract class utl { // Config_ allsites contains global utilities
  // utilities class

  public function __construct(object &$pp1) { 

    $site_path   = dirname(dirname($pp1->module_path)) ; //to app dir eg "glomodul" dir
    $wsroot_path = dirname($site_path) ;
                //or $wsroot_req_uri = str_replace('\\','/', realreq_uri('../../../'))  ;
    $shares_path = $wsroot_path.'/vendor/b12phpfw' ; //includes,globals,shares,commons,reusables

    // Routing :
    $req_uri  = mb_strtolower($_SERVER['REQUEST_URI']); 
    $url_parts = explode('?', $req_uri);
    $urlqry_parts = explode('/', $url_parts[1]??'no urlqry_parts');

    $pp1->site_path    = $site_path ;
    $pp1->wsroot_path  = $wsroot_path ;
    $pp1->shares_path  = $shares_path ;
    //
    $pp1->pp1_group02 = '~~~~~ ROUTING (URL QUERY) : ~~~~~' ;
    $pp1->req_uri = $req_uri ;
    $pp1->pp1_help01 = '~~~ Element 1 of url_parts is URL query :' ;
    $pp1->url_parts = $url_parts ;
    $pp1->urlqry_parts = $urlqry_parts ;

  ?>

    <br><b>echo from PARENT CONFIG-UTILS cls :</b> <?= __METHOD__  ?>  
    <br>MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules, eg adresses, URL urlqry_parts !!
    <?php

    $this->dispatcher($pp1); // Here comes Late Static Bindings
  }

} // e n d  c l a s s  Config_ allsites

class Home_ctr extends utl {
  //module controller, extends means the same as if the entire parent code were here (in child)

  public function __construct(object &$pp1) {
    // Do global bootstrap - configuration because 
    // MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules
    parent::__construct($pp1); 
  }

    // Dispatching ;
    protected function dispatcher(object $pp1) { //static
            // CALLED FROM Config_ allsites __c onstruct
            // so: return static::$dispatcher($pp1); // Here comes Late Static Bindings
      //this fn calls method in this Home_ ctr which has parameters in  $ p p 1
      // here can be added in $pp1 module dependent parameters
      //$ a k c  is  m o d u l e  method (in Home_ ctr, not global method)
      $akc = $pp1->urlqry_parts[1] ; // 'B12phpfw\\module\\z_examples\\'.
      if ( is_callable($this->$akc($pp1)) ) { // and method_exists($this, $akc)
        //return 
        $this->$akc($pp1) ; //self::$akc($pp1) ;
        echo '<h2>'.__METHOD__ .'(object $pp1) '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
      } else {
        echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
        echo 'Home_ ctr method "<b>'. $akc .'</b>" is not callable.' ;
        echo ' See how is created method name in Config_ allsites code snippet c s 0 2. R O U T I N G."' ;
        return '0' ;
      }
    }


    protected function home(object $pp1)  // static
    {
        echo '<h2>'.__METHOD__ .'(object $pp1) '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
        echo '<b>echo from CHILD HOME CTR cls :</b> '. __METHOD__ ;
        echo '<pre><b>Property palette assigned globaly $pp1</b>='; 
          print_r($pp1) ; 
        echo '</pre>';
    }


} // e n d  c l a s s  H o m e _ c t r

// ------------------- index.php :
    //module elements of property pallete :
    $module_path = str_replace('\\','/', __DIR__) ; // .'/' 
    $pp1 = (object)[ 'pp1_group01' => '~~~~~ ADRESSES : ~~~~~' 
       , 'module_path'=>$module_path
    ] ;


$module_ctr = new Home_ctr($pp1); // instatiated in index.php


/*
//outputs : 

B12phpfw\module\z_examples\Home_ctr::home(object $pp1) , line 84 SAYS:
echo from CHILD HOME CTR cls : B12phpfw\module\z_examples\Home_ctr::home

Property palette assigned globaly $pp1=stdClass Object
(
    [pp1_group01] => ~~~~~ ADRESSES : ~~~~~
    [module_path] => J:/awww/www/fwphp/glomodul/z_examples
    [site_path] => J:/awww/www/fwphp
    [wsroot_path] => J:/awww/www
    [shares_path] => J:/awww/www/vendor/b12phpfw
    [pp1_group02] => ~~~~~ ROUTING (URL QUERY) : ~~~~~
    [req_uri] => /fwphp/glomodul/z_examples/03_call_child_fn_from_parent_cls_routing.php?i/home/k2/v2
    [pp1_help01] => ~~~ Element 1 of url_parts is URL query :
    [url_parts] => Array
        (
            [0] => /fwphp/glomodul/z_examples/03_call_child_fn_from_parent_cls_routing.php
            [1] => i/home/k2/v2
        )

    [urlqry_parts] => Array
        (
            [0] => i
            [1] => home
            [2] => k2
            [3] => v2
        )

)


*/







      //also works : public static function call_module_method(string $akc, object $pp1) {
      //echo '<br><b>echo from PARENT CONFIG&UTILS cls :</b> See how is created  m e t h o d  //name  $ a k c  in abstract class Config_ allsites, m ethod __c onstruct :<br>
      //$this->call_module_method($akc, $pp1) ; //protected fn (in child cls Home_ ctr) calls //private fns (in child cls Home_ ctr)
      //' ;
      //          //static::dispatcher(); // Here comes Late Static Bindings
      //          //return $this->$akc($pp1) ;
      //return static::$akc($pp1); // Here comes Late Static Bindings
      //} 
       //Home_ctr::call_module_method('called_module_method', (object)['p1'=>'p1value']);

    /*
include '../src/bootstrap.php';                              // Setup file

$path  = mb_strtolower($_SERVER['REQUEST_URI']);             // Get path in lowercase
$path  = substr($path, strlen(DOC_ROOT));                    // Remove up to DOC_ROOT
$parts = explode('/', $path);                                // Split into array at /

if ($parts[0] != 'admin') {                                  // If an admin page
    $page = $parts[0] ?: 'index';                            // Page name (or use index)
    $id   = $parts[1] ?? null;                               // Get ID (or use null)
} else {                                                     // If not an admin page
    $page = 'admin/' . ($parts[1] ?? '');                    // Page name
    $id   = $parts[2] ?? null;                               // Get ID
}
$id = filter_var($id, FILTER_VALIDATE_INT);                  // Validate ID

$php_page = APP_ROOT . '/src/pages/' . $page . '.php';       // Path to PHP page

if (!file_exists($php_page)) {                               // If page not in array
    $php_page = APP_ROOT . '/src/pages/page-not-found.php';  // Include page not found
}
include $php_page; 
    */