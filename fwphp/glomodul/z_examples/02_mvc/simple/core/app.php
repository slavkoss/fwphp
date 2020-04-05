<?php

/*
 *   Date: 2017-06-01
 * Author: Dawid Yerginyan
 */

class App {

    private $config = [];

    public $db;

    function __construct () {

      if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
      if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

      define("URI", $_SERVER['REQUEST_URI']);
      //define("MODULEDIR_PATH", $_SERVER['DOCUMENT_MODULEDIR_PATH']);
      define("MODULEDIR_PATH", dirname(__DIR__));

      $ws_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
           . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
      define("WS_URL", $ws_url);

      $uri_arr = explode(QS, URI) ;  //script relpath : (with "/01_phpinfo.php")
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/'); 
              //or rtrim(str_replace($w sMODULEDIR_PATH_path, '', $m odule_path),'/') ;
      $module_url = $ws_url.$module_relpath.'/';
      define("MODULEURL", $module_url);
    }

    function autoload () {

        spl_autoload_register(function ($class) {

            $class = strtolower($class);
            if (file_exists(MODULEDIR_PATH . '/core/classes/' . $class . '.php')) {

                require_once MODULEDIR_PATH . '/core/classes/' . $class . '.php';

            } else if (file_exists(MODULEDIR_PATH . '/core/helpers/' . $class . '.php')) {

                require_once MODULEDIR_PATH . '/core/helpers/' . $class . '.php';

            }

        });

    }

    function config () {

        $this->require('/core/config/session.php');
        $this->require('/core/config/database.php');      

        try {

            $this->db = new PDO('mysql:host=' . $this->config['database']['hostname'] . ';dbname=' . $this->config['database']['dbname'],
                                $this->config['database']['username'], 
                                $this->config['database']['password']);

            $this->db->query('SET NAMES utf8');
            $this->db->query('SET CHARACTER_SET utf8_unicode_ci');
            
            // TODO: Remove for production
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            echo 'Błąd połączenia: ' . $e->getMessage();

        }

    }




    function require ($path) {
        //if MODULEDIR_PATH is J:/awww/www/
        //J:/awww/www//core/config/session.php
        //require dirname(__DIR__) . $path;
        require MODULEDIR_PATH . $path;

    }

    function start () {

        session_name($this->config['sessionName']);
        session_start();

        $route = explode('/', URI);

        $route[1] = strtolower($route[1]);

        if (file_exists(MODULEDIR_PATH . '/app/controllers/' . $route[1] . '.php')) {
            $this->require('/app/controllers/' . $route[1] . '.php');
            $controller = new $route[1]();
        } else {
            $this->require('/app/controllers/main.php');
            $main = new Main();
        }

    }
    
}

?>