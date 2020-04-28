<?php
  //ob_start(); // turn on output buffering
  //session_start(); // turn on sessions if needed
  define('PRIVATE_PATH', __DIR__ .'/');
            //define("SHARED_ PATH", __DIR__ . '/shared');
            //define("PUBLIC_ PATH", dirname(__DIR__) . '/public');
            //define("MODULE_ PATH", dirname(__DIR__)); //PROJECT_ PATH
                  // * Can set a hardcoded value:
                  // define("PUBLIC_ REL_ PATH", '/~kevinskoglund/chain_gang/public');
                  // define("PUBLIC_ REL_ PATH", '');
  // * everything in URL up to "/public" :
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  define('PUBLIC_REL_PATH', substr($_SERVER['SCRIPT_NAME'], 0, $public_end) .'/');

  require_once('functions.php');





  // Load class script manually

  // -> Individually
  // require_once('classes/bicycle.class.php');

  // -> All classes scripts in directory
  foreach(glob('classes/*.class.php') as $file) {
    require_once($file);
  }

  // Autoload class definitions
  function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
      include('classes/' . $class . '.class.php');
    }
  }
  spl_autoload_register('my_autoload');

?>
