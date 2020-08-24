<?php

/**
 * Front controller
 * PHP version 7.0
 * bootstrap/3.3.7  jquery-3.1.1.min.js
 http://localhost:8083/z_Hollingworth/login/public/ working
 http://localhost:8083/z_Hollingworth/login/public/login working
 http://localhost:8083/z_Hollingworth/login/public/logout NOT working !!!???
 */

/**
 * Composer
 */
                       ?><script>//alert("<?=str_replace('\\','/', __FILE__) . ', ln='. __LINE__ ?>");</script><?php
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Sessions
 */
session_start();

/**
 * Routing
 */
$router = new Core\Router();
// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login',  ['controller' => 'Login', 'action' => 'new']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);
$router->add('password/reset/{token:[\da-f]+}', ['controller' => 'Password', 'action' => 'reset']);
$router->add('signup/activate/{token:[\da-f]+}', ['controller' => 'Signup', 'action' => 'activate']);
$router->add('{controller}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);



/*
 - Removing twig/twig (v2.1.0)
  - Removing symfony/polyfill-mbstring (v1.3.0)
  - Removing php-http/guzzle6-adapter (v1.1.1)
  - Removing guzzlehttp/guzzle (6.2.2)
  - Removing guzzlehttp/psr7 (1.3.1)
  - Removing guzzlehttp/promises (v1.3.1)
  - Removing mailgun/mailgun-php (v2.1.2)
  - Removing php-http/httplug (v1.1.0)
  - Removing php-http/promise (v1.0.0)
  - Removing php-http/multipart-stream-builder (0.1.4)
  - Removing php-http/message (v1.4.1)
  - Removing php-http/message-factory (v1.0.2)
  - Removing psr/http-message (1.0.1)
  - Removing clue/stream-filter (v1.3.0)
  - Removing php-http/discovery (v1.1.1)


Fatal error

Uncaught exception: 'ErrorException'

Message: 'include(J:\xampp\htdocs\z_Hollingworth\App\Views\base.html): failed to open stream: No such file or directory'

Stack trace:

iV #0 J:\xampp\htdocs\z_Hollingworth\login\App\Views\Home\index.html(15): Core\Error::errorHandler(2, 'include(J:\\xamp...', 'J:\\xampp\\htdocs...', 15, Array)
iV #1 J:\xampp\htdocs\z_Hollingworth\login\App\Views\Home\index.html(15): include()

V #2 J:\xampp\htdocs\z_Hollingworth\login\Core\View.php(28): require('J:\\xampp\\htdocs...')

H #3 J:\xampp\htdocs\z_Hollingworth\login\App\Controllers\Home.php(23): Core\View::render('Home/index.html')
H #4 [internal function]: App\Controllers\Home->indexAction()
C #5 J:\xampp\htdocs\z_Hollingworth\login\Core\Controller.php(51): call_user_func_array(Array, Array)

R #6 J:\xampp\htdocs\z_Hollingworth\login\Core\Router.php(121): Core\Controller->__call('index', Array)

i #7 J:\xampp\htdocs\z_Hollingworth\login\public\index.php(42): Core\Router->d ispatch('')
#8 {main}

Thrown in 'J:\xampp\htdocs\z_Hollingworth\login\App\Views\Home\index.html' on line 15
because hardcoded must be: include 'J:\xampp\htdocs\z_Hollingworth\login\App\Views\base.html' ;

*/