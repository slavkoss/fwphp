<?php

namespace B12phpfw\backend\app\core ; //last is dir name

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\backend\app\controllers\MenusController ; //last is dir name and cls name

defined('CORE_PATH') or define('CORE_PATH', __DIR__);

//this is Home_ctr cls
class App extends Config_allsites
{
    protected $config = [];

    public function __construct($pp1, $config)
    {
      //$this->config = $config;
      $this->allowedCors();
      $this->setReporting();

      // R O U T I N G  T A B L E  - module links, (IS OK FOR MODULES IN OWN DIR)
      $pp1_module = [] ;

      parent::__construct($pp1, $pp1_module);

    }

      //           **** D I S P A T C H I N G
              //$accessor = "get" . ucfirst(strtolower($akc));
      public function callf(string $akc, object $pp1)  //fnname, params
      {
        return ( 
          ( //method_exists($this, $akc) and
          is_callable(array($this, $akc)) ) ? $this->$akc($pp1) : '0'
        ) ;
      }



    public function allowedCors()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With");
    }

    public function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
        }
    }


          //******************************************
          //       DISPATCH  M E T H O D S
          // they call other methods or include script
          // CALLED FROM Config_ allsites __c onstruct
          // and from here : public function callf(string $akc, object $pp1)  //fnname, params
          //******************************************

  /**
       1. S E S S I O N  M E T H O D S
  */
  // ...


  /**
        2. C R U D  M E T H O D S
  */

  /**
      2.1 I N C L U D E D  P A G E  S C R I P T S
  */

  private function home(object $pp1) //DI page prop.palette   
  {
    //As of PHP5, object variable doesn't contain object itself as value. It only contains object identifier. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a copy of the identifier, which points to same object.

    $uriq = $pp1->uriq ;

      $title = 'MSG HOME';

      require $pp1->wsroot_path . 'zinc/hdr.php';

      //require("navbar.php");
      //require $pp1->module_path . 'home.php';
      (new MenusController)->index(); // it is like home.php

      require $pp1->wsroot_path . 'zinc/ftr.php';
  }










    // all this should be in global classes hierarchy, not in this Home_ctr !!! :
    /*
    public function run($pp1, $REQUEST_URI)
    {
      // spl_autoload_register(
      //   [ 
      //     callable $autoload_function[, bool $throw = TRUE[, bool $prepend = FALSE]]
      //   ]
      // ) : bool
      //spl_autoload_register([$this, 'loadClass']);
        $this->allowedCors();
        $this->setReporting();
        //$this->setDbConfig();
        //$this->filterRequest();
        //$this->route($pp1, $REQUEST_URI);
    }
    */

    /*
    // this is in global Dbconn_allsites
    public function setDbConfig()
    {
        if ($this->config['db']) {
            define('DB_HOST', $this->config['db']['host']);
            define('DB_NAME', $this->config['db']['dbname']);
            define('DB_USER', $this->config['db']['username']);
            define('DB_PASS', $this->config['db']['password']);
        }
    }
    */
    /*
    public function route($pp1, $REQUEST_URI)
    {
        // defaults :
        $controllerName = $this->config['defaultController'];
        $actionName     = $this->config['defaultAction'];
        $param = [];

               /////////// B A D /////////////
        $url = $this->getCleanUrl();

        if ($url) {
            $urlArray = explode('/', $url);
            $urlArray = array_filter($urlArray);

            $controllerName = ucfirst($urlArray[0]);
            array_shift($urlArray);

            $actionName = $urlArray ? $urlArray[0] : $actionName;
            array_shift($urlArray);

            $param = $urlArray ? $urlArray : [];
        }

        $controller = 'App\\Controllers\\' . $controllerName .'\\'. 'Controller';
        if (!class_exists($controllerName)) {
            exit(__METHOD__ .' SAYS : '. $controllerName . ' Controller does not exist');
        }
        if (!method_exists($controller, $actionName)) {
            exit($actionName . ' Method does not exist');
        }

        $dispatch = new $controller($controllerName, $actionName);

        call_user_func_array([$dispatch, $actionName], $param);


    } //e n d  f n  r o u t e
    */

    /*
    private function getCleanUrl()
    {
        $url = $_SERVER['REQUEST_URI'];
        $position = strpos($url, '?');
        $url = $position === false ? $url : substr($url, 0, $position);
        return trim($url, '/');
    }
    */

    /*
    // this is in global Autoload cls
    public function loadClass($className)
    {
        $classMap = $this->classMap();

        if (isset($classMap[$className])) {
            $file = $classMap[$className];
        } elseif (strpos($className, '\\') !== false) {
            // Include application file
            $file = APP_PATH . str_replace('\\', '/', $className) . '.php';
            if (!is_file($file)) {
                return;
            }
        } else {
            return;
        }

        include $file;
    }

    // this is in index.php 1.3 because global cls Autoload($pp1) needs it ! 
    protected function classMap()
    {
        return [
            'core\base\Controller' => CORE_PATH . '/base/Controller.php',
            'core\base\Model' => CORE_PATH . '/base/Model.php',
            'core\base\View' => CORE_PATH . '/base/View.php',
            'core\db\Db' => CORE_PATH . '/db/Db.php',
            'core\db\Sql' => CORE_PATH . '/db/Sql.php',
        ];
    }
    */


}