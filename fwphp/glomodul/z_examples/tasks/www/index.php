<?php
//see https://github.com/ngrt/MVC_todo Code is explained in this article blog 2017.12.17: https://medium.com/@noufel.gouirhate/create-your-own-mvc-framework-in-php-af7bd1f0ca19

// DIRSITE    WSPATH.MODULE_RELPATH
define('MODULE_RELPATH', str_replace("www/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('MODULE_LEVEL', count(explode('/', MODULE_RELPATH)) -1) ; // +1 level are method params
// PATHWSMODULE_PATH
define('MODULE_PATH', str_replace("www/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('QS', '?');

require(MODULE_PATH . "Config/db.php");  //require(MODULE_PATH . 'Config/core.php');
require(MODULE_PATH . "Core/Model.php");
require(MODULE_PATH . "Core/Controller.php");

require(MODULE_PATH . 'router.php');
require(MODULE_PATH . 'request.php');
require(MODULE_PATH . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>