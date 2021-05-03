<?php
/*
 *
 */

namespace TodoList;

use \TodoList\Exception\NotFoundException;
use \TodoList\Flash\Flash;

/**
 * Main module class
 */
final class Index 
{
    const DEFAULT_PAGE = 'home'; //home.phtml in page subdir :

    /**
     * System config.
     */
    public function __construct() {
        //err. reporting - all errors for development (set display_errors=On in php.ini file)
        error_reporting(E_ALL | E_STRICT);
                                //mb_internal_encoding('UTF-8');
        set_exception_handler([$this, 'handleException']);
        spl_autoload_register([$this, 'autoLoadClass']);
        session_start();

      define('MODULE_DIR', dirname(__DIR__) .'/');
    }

    /**
     * Run module - router
     */
    public function run() {
      $pge_from_url = self::DEFAULT_PAGE;
      if (array_key_exists('page', $_GET)) { $pge_from_url = $_GET['page']; }
                         //echo __METHOD__ .' 001. SAYS: <pre>$pge_from_url='; print_r($pge_from_url); echo '</pre>';
      $this->runPage($pge_from_url); //dispatch or private fn $this->getPageFromURL()
    }

    private function runPage($pge_from_url, array $extra = []) 
    {
      // M O D E L  = d a t a  for  t e m p l a t e :
      $mdl = MODULE_DIR.$pge_from_url.'.php';  if (file_exists($mdl)) require  $mdl;
      
      // V I E W 1  subtemplate of tplt_ layout.php eg home.phtml ur tbl.phtml:
      $tplt_content = MODULE_DIR . $pge_from_url . '.phtml' ;
      // V I E W 2 = (error) m e s s a g i n g :
      $flashes = null; if (Flash::hasFlashes()) {$flashes = Flash::getFlashes();}
      // V I E W 3  t e m p l a t e  = container for code above : M, V1, V2 :
      require MODULE_DIR.'tplt_layout.phtml';
    }


    /**
     * Exception handler
     */
    public function handleException($ex) {
        $extra = ['message' => $ex->getMessage()];
        if ($ex instanceof NotFoundException) {
            header('HTTP/1.0 404 Not Found');
            $this->runPage('404', $extra);
        } else {
            // TODO log exception
            header('HTTP/1.1 500 Internal Server Error');
            $this->runPage('500', $extra);
        }
    }

    /**
     * Class loader
     */
    public function autoLoadClass($name) {
                        //if (!array_key_exists($name, self::$CLASSES)) {
                        //    die('Class "' . $name . '" not found.');
                        //}
                        //require_once __DIR__ . self::$CLASSES[$name];
      require_once MODULE_DIR . basename($name).'.php';
    }

} //e n d  c l s 

$index = new \TodoList\Index();
//$index->init();
$index->run();
