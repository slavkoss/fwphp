<?php
//define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('MODULEDIR', dirname(__DIR__) .'/');
//define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

//require(ROOT . 'Config/core.php');
require(MODULEDIR . "Config/db.php");
require(MODULEDIR . "Core/Model.php");
require(MODULEDIR . "Core/Controller.php");

require(MODULEDIR . 'router.php');
require(MODULEDIR . 'request.php');
require(MODULEDIR . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>