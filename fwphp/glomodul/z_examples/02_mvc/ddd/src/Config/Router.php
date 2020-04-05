<?php

namespace App\Config;

use App\Config\Message\Request;
use B12phpfw\core\zinc\Config_allsites ;

/**
 * Class Router
 */
class Router extends Config_allsites
{

  public function __construct(object $pp1)
  {
                            if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           //,'self::$d bi'=>self::$dbi
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

    // R O U T I N G  T A B L E  (IS OK FOR MODULES IN OWN DIR)
    $pp1_module = [ 
            'P P 1 _ M O D U L E' => '~~~~~~~~~~~~~~~~~' ,
    'gallery_images'        => QS.'i/gallery_images/' , 
    //'loginfrm'        => QS.'i/loginfrm/' , 
    //'login'           => QS.'i/login/' , 
    //e n d  R O U T I N G  T A B L E
        ] ;

    parent::__construct($pp1, $pp1_module);
    //$pp1->module_path = dirname(dirname($pp1->module_path)) .'/';

    //$pp1 = $this->getp('pp1') ;



  } // e n d  f n  __ c o n s t r u c t


  //           **** D I S P A T C H I N G
          //$accessor = "get" . ucfirst(strtolower($akc));
  public function callf(string $akc, object $pp1)  //fnname, params
  {
    return ( 
      ( //method_exists($this, $akc) and
      is_callable(array($this, $akc)) ) ? $this->$akc($pp1) : '0'
    ) ;
  }


  private function home(object $pp1) //DI page prop.palette   
  {
    //As of PHP5, object variable doesn't contain object itself as value. It only contains object identifier. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a copy of the identifier, which points to same object.

    $uriq = $pp1->uriq ;
    $pp1->module_path = dirname(dirname($pp1->module_path)) .'/';
      $title = 'img HOME';

      /*echo '<h2>Router.php home(object $pp1) SAYS :</h2>'; 
      echo '<pre>'; 
        echo '<br />'.'$pp1->caller=' ; print_r($pp1->caller) ; 
        echo '<br />'.'$pp1->module_path=' ; print_r($pp1->module_path) ; 
      echo '</pre>'; 
      */
      require $pp1->module_path . 'templates/home.php';
      /* require $pp1->wsroot_path . 'zinc/hdr.php';
      require_once("navbar.php");
      require $pp1->module_path . 'home.php';
      require $pp1->wsroot_path . 'zinc/ftr.php'; */
  }


  private function gallery_images(object $pp1) //DI page prop.palette   
  {
    $uriq = $pp1->uriq ;
    $pp1->module_path = dirname(dirname($pp1->module_path)) .'/';
      $title = 'img HOME';

      //echo '<h2>Router.php gallery_images(object $pp1) SAYS :</h2>'; 

      require $pp1->module_path . 'templates/gallery.php';
      /* require $pp1->wsroot_path . 'zinc/hdr.php';
      require_once("navbar.php");
      require $pp1->module_path . 'home.php';
      require $pp1->wsroot_path . 'zinc/ftr.php'; */
  }

    /**
     * @param string $route
     * @param callable $callback
     */
    /* public static function get(
         string $route       
         //echo ((new HomeController($request, $config))->index()); :
       , callable $callback  // function (Request $request) use ($config) {...
    ): void
    {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'GET') !== 0) {
            return;
        }
        self::on($route, $callback);
    } */

    /**
     * @param string $route
     * @param callable $callback
     */
    /* public static function post(string $route, callable $callback): void
    {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') !== 0) {
            return;
        }
        self::on($route, $callback);
    } */

    /**
     * @param $regex
     * @param callable $cb
     */
    /* public static function on($regex, callable $cb): void
    {
        $params = strtok($_SERVER["REQUEST_URI"],'?');

        $params = (stripos($params, "/") !== 0) ? "/" . $params : $params;
        $regex = str_replace('/', '\/', $regex);
        $is_match = preg_match('/^' . ($regex) . '$/', $params, $matches, PREG_OFFSET_CAPTURE);
                       echo '<pre>Router.php  $params='; print_r($params) ; echo '</pre>'; 
        if ($is_match) {
            // first value is normally the route, lets remove it
            array_shift($matches);
            // Get the matches as parameters
            $params = array_map(function ($param) {
                return $param[0];
            }, $matches);

            $cb(new Request($params));
        }
    } */


}
