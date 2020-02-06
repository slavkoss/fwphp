<?php
class Controller
{
    var $vars = [];
    var $layout = "default";

    // NOT WORKING Location for overloaded data
    private $data = array();

    public $wsroot_url ;
    public $module_url ;

    function _construct() {
      $this->wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
    }

    function set($d)
    {
      $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false)
        {
            $content_for_layout;
        }
        else
        {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value)
        {
            $form[$key] = $this->secure_input($value);
        }
    }




    // Overloading not used on declared properties
    //public $declared = 1;
    // Overloading only used on this when accessed outside the class
    //private $hidden = 2;

    public function __set($name, $value)
    {
        //echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
      //echo "Getting '$name'\n";
      if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
      }

      $trace = debug_backtrace();
      trigger_error(
         'Undefined property via __get(): ' . $name .
         ' in ' . $trace[0]['file'] .
         ' on line ' . $trace[0]['line'],
         E_USER_NOTICE);

      return null;
    }

    //  As of PHP 5.1.0 
    public function __isset($name)
    {
        //echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    // As of PHP 5.1.0 
    public function __unset($name)
    {
        //echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    //  Not a magic method, just here for example
    //public function getHidden() { return $this->hidden; }
}


?>