<?php

//$module_towsroot = '../../../../../';

if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting


/*
// Database
define('DB_HOST', 'localhost');
define('DB_NAME', 'z_blogcms'); //vanilla
define('DB_USER', 'root');
define('DB_PASSWORD', '');
*/


/**
 * Base URL of the site
 * 
 * Note: Place website's entry point URL if it's being hosted from subdirectory in the server
 */
/*
define('BASE_URL', url());
// Gets BASE URL :
function url()
{
    $currentPath = $_SERVER['PHP_SELF'];
    $pathInfo = pathinfo($currentPath);
    $hostName = $_SERVER['HTTP_HOST'];
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
                              if ('1') { echo basename(__FILE__) .', fn '. __METHOD__ .', line '. __LINE__ .' SAYS: ';
                                echo '<pre>'; 
                                echo '<br />$currentPath = $_SERVER[\'PHP_SELF\']='; print_r($currentPath) ;
                                echo '<br />$pathInfo='; print_r($pathInfo) ;
                                echo '<br />$protocol='; print_r($protocol) ;
                                echo '<br />$hostName='; print_r($hostName) ;
                                echo '</pre>';
                              }
    return $protocol.$hostName;
}
*/