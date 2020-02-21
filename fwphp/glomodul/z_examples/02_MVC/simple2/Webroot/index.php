<?php

//       NO NAMESPACES !!!!!!!!!
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

require(ROOT . 'Config/core.php');

require(ROOT . 'router.php');     //require db, mdl, ctr
require(ROOT . 'request.php');    // $this->url = $_SERVER["REQUEST_URI"];
//loadController() : $controller = new...  dispatch() : $controller->$akc(...
require(ROOT . 'dispatcher.php'); 

$dispatch = new Dispatcher();
$dispatch->dispatch(); //'../../../../../..'
?>