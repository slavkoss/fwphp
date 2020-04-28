<?php
  // Load Config
  require_once 'config/config.php';
  require_once 'helpers/url_helpers.php';
  require_once 'helpers/session_helper.php';

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
