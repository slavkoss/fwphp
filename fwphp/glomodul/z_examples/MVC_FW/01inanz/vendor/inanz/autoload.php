<?php
//J:\awww\www\fwphp\z_not_ongithub\MVC_FW\01inanz\src\autoload.php
//J:\awww\www\fwphp\z_not_ongithub\MVC_FW\fw_codeholic\vendor\thecodeholic\php-mvc-core\autoload.php
//J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\hcstudio_easy\core\autoloader.php

//require_once __DIR__.'/../vendor/autoload.php';

spl_autoload_register(function ($p_namespacedClassName) {
$className = basename($p_namespacedClassName) ; //eg Application

// classess paths :
//$CORE_PATH = str_replace('\\', '/', __DIR__ ) . '/';
  //eg J:\awww\www\fwphp\z_not_ongithub\MVC_FW\fw_codeholic\models\User.php
$APP_PATH = str_replace( '\\', '/', dirname(dirname(dirname(__DIR__ ))) ) . '/' ;

// class namespace unix shape : 
$clsnsUnix = str_replace('\\', '/', $p_namespacedClassName); //eg thecodeholic/phpmvc/Application
// class dir alias :
$class_dir_alias = dirname($clsnsUnix) ;



// class script path :
switch (true) {

case $class_dir_alias == 'Core' :
  $cls_script_path = CORE_PATH . $className .'.php' ;
  break;

case $class_dir_alias == 'Controller' :
  $cls_script_path = MODULE_PATH . 'src/Controller/'. $className .'.php' ;
  break;

/*
case $class_dir_alias == 'Core' :
  $cls_script_path = CORE_PATH .'db/'. $className .'.php' ;
  break;

case $class_dir_alias == 'app/models' :
  $cls_script_path = $APP_PATH .'models/'. $className .'.php' ;
  break;
*/
default:
  $cls_script_path = '"NOT_KNOWN_CLS_SCRIPT"' ;
  break;
}


// require class script :
    if (file_exists($cls_script_path)) {
        require $cls_script_path;
    } else {
        $error_message = 
           '$p_namespacedClassName='. $p_namespacedClassName
           .'<br>'.
           $className . ' class script '.$cls_script_path.' not found!'
        ;
        //require ERROR_PAGE;
        echo '<h3>'.$error_message.'</h3>';
        //Application class file thecodeholic\phpmvc\Application.php not found!
  //J:\awww\www\fwphp\z_not_ongithub\MVC_FW\fw_codeholic\vendor\thecodeholic\php-mvc-core\Application.php
        exit;
    }
});