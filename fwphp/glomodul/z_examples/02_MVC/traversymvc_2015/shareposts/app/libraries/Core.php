<?php
  /* 
   *  APP CORE CLASS
   *  Creates URL & Loads Core Controller
   *  URL Format - /controller[/method/param1/param2]
   *      default method is index 
   */
  class Core {
    // Set Defaults
    protected $currentController = 'Pages'; // Default controller
    protected $currentMethod = 'index';     // Default method
    protected $params = [];                 // Set initial empty params array

    public function __construct()
    {
      $url = $this->getUrl();
      // Look in controllers folder for controller
      if ( isset($url[0])
           and file_exists(
            '../app/controllers/'.ucwords($url[0]).'.php'
          )
      )
      {
        //Notice: Trying to access array offset on value of type null in \shareposts\app\libraries\Core.php on line 16
        
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 index
        unset($url[0]);
      }

      // Require the current controller
      require_once('../app/controllers/' . $this->currentController . '.php');

      // Instantiate the current controller
      $this->currentController = new $this->currentController;

      // Check if second part of url is set (method)
      if(isset($url[1])){
        // Check if method/function exists in current controller class
        if(method_exists($this->currentController, $url[1])){
          // Set current method if it exsists
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params - Any values left over in url are params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with an array of parameters
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Construct URL From $_GET['url']
    public function getUrl(){
        if(isset($_GET['url']))
        {
          $url = rtrim($_GET['url'], '/');
          $url = filter_var($url, FILTER_SANITIZE_URL);
          $url = explode('/', $url);
                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '<b>$_POST</b>='; print_r($_POST); 
                  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
                  echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']); 
                  echo '<br /><b>$url='; print_r($url);
                  echo '</pre>'; 
                  }
          return $url;
        }
    }
  }