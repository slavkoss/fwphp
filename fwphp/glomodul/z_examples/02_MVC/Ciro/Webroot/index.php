<?php
//2018.05.16 https://github.com/sherifabdlnaby/Ciro
use App\Core\App;

define('DS',    DIRECTORY_SEPARATOR);
//module path :
define('ROOT',  dirname(dirname(__FILE__))); //J:\xampp\htdocs\Ciro  \Webroot\index.php
define('CONFIG_PATH',     ROOT.DS.'Config');
define('CORE_PATH',       ROOT.DS.'Core');

define('MODEL_PATH',      ROOT.DS.'Models');
define('VIEW_PATH',       ROOT.DS.'Views');
define('CONTROLLER_PATH', ROOT.DS.'Controllers');

define('LAYOUT_VIEW_PATH',VIEW_PATH.DS.'_Layouts');
define('MESSAGE_VIEW_PATH', '_FullMessages');
define('LOG_PATH',      ROOT.DS.'Logs');

//INITIALIZE
require_once(CORE_PATH.DS.'init.php');

//RUN
App::run($_SERVER["REQUEST_URI"]);

/*
// eg : 
$_SERVER['REQUEST_METHOD']   GET
$_SERVER['REQUEST_URI']   /fwphp/glomodul/z_examples/01_phpinfo.php?aaa/111
$_SERVER['SCRIPT_NAME']   /fwphp/glomodul/z_examples/01_phpinfo.php 

$_SERVER['QUERY_STRING']   aaa/111
*/
