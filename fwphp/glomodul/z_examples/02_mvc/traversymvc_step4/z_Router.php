<?php
  /* 
   *  APP CORE CLASS
   *  Creates URL & Loads Core Controller
   *  URL Format - /controller/method/param1/param2
   */
  class Router {
    // Set Defaults
    protected $currentController = 'Pages'; // Default controller
    protected $currentMethod = 'index'; // Default method
    protected $params = []; // Set initial empty params array

    public function __construct(object $pp1)
    {
      $url = $this->getUrl();
      // Look in controllers folder for controller
      if( isset($url[0]) and $url[0] > ''
          and file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 index
        unset($url[0]);
      }

      // Require the current controller  ../app/controllers/
      require_once($this->currentController . '.php');

      // Instantiate the current controller
      $this->currentController = new $this->currentController;

      // Check if second part of url is set (method)
      if(isset($url[1])){
        // Check if method/function exists in current controller class
        if(method_exists($this->currentController, $url[1])){
          // Set current method if it exsists in URL
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params - Any values left over in url are params
      //array_values() returns all (assoc) array values and indexes new arr numerically.
      //array_keys() - Return all the keys or a subset of the keys of an arr
      //array_combine() - Cre an arr by using one arr for keys and another for its values
      $this->params = $url ? array_values($url) : [];
      $pp1->params = $this->params ;

      $ctr = new $this->currentController ; //Pages or Users or Posts or...
      $mtd = $this->currentMethod ;
      //return ( 
        //method_exists($this, $akc) and
        ( is_callable(array($ctr, $mtd)) ) ? $ctr->$mtd($pp1) : '0'
      //) 
      ;
                  // or Call a callback with an array of parameters
                  /* call_user_func_array(
                      //[$this->currentController, $this->currentMethod], $this->params)
                      [$this->currentController, $this->currentMethod], $pp1)
                  ; */
    }

    // Construct URL From $_GET['url']
    public function getUrl(){
        if(isset($_GET['url'])){
          $url = rtrim($_GET['url'], '/');
          $url = filter_var($url, FILTER_SANITIZE_URL);
          $url = explode('/', $url);
          return $url;
        }
    }
  }