<?php

if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
// ********************************************
// Get adresses - paths & relative paths
// ********************************************
// Get web server document root path
$doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);
    //echo '<pre>'.'$doc_ root='; print_r($doc_ root); echo '</pre>';
/*
// Get module (application) relative path from URL
$uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
$dirs = explode('/', $uri);
$module_relpath = '/'.$dirs[1].'/'.$dirs[2].'/'.$dirs[3].'/'.$dirs[4].'/'.$dirs[5].'/';
*/
    //echo '<pre>'.'$dirs below web server doc root='; print_r($dirs); echo '</pre>';
    //          http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/guitar_shop/
    //http://localhost:8083/z_guitar_shop/
    //$dirs=Array                            $dirs=Array
    //(                                      (
    //  [0] =>                                   [0] => 
    //  [1] => z_guitar_shop                     [1] => fwphp
    //  [2] =>                                   [2] => glomodul
    //)                                          [3] => z_examples
    //$module_relpath = ''.'/'.$dirs[1].'/' ;          [4] => 02_mvc
    //                                           [5] => guitar_shop
    //                                           [6] => 
    //                                       )
    //$module_relpath = '/'.$dirs[1].'/'.$dirs[2].'/'.$dirs[3].'/'.$dirs[4].'/'.$dirs[5].'/';
    //

$module_towsroot = '../../../../' ;
$module_path = dirname(__DIR__) . '/' ;
$wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
// http://dev1:8083/    //= 1. U R L_P R O T O C O L :
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
        // 2. URL_DOM AIN = dev1:8083 :
      . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
$uri_arr = explode(QS, $REQUEST_URI) ; 
$module_relpath = '/'.rtrim(ltrim($uri_arr[0],'/'),'/') .'/'; 
        //or rtrim(str_replace($w sroot_path, '', $m odule_path),'/') ;
$module_url = $wsroot_url.$module_relpath.'/';


//J:/awww/www//fwphp/glomodul/z_examples/02_mvc/guitar_shop/catalog/
set_include_path($wsroot_path . $module_relpath);



// ********************************************
// S k i n
// ********************************************
$skin = '01sidebar'; // 'main' = original - NOT USED
$css_url_rel = $module_relpath . '01sidebar.css';
//J:\awww\www\zinc\img\img_big\guitar
$img_dirpath = $wsroot_url . 'zinc/img/img_big/guitar/'; //$doc_ root .



// ********************************************
// Get common code
// ********************************************
require_once($module_path .'util/tags.php');
require_once($module_path. 'model/database.php');

// Define some common functions
function display_db_error($error_message, $caller='') {
    global $module_relpath;
    include $module_path. 'errors/db_error.php';
    exit;
}

function display_error($error_message) {
    global $module_relpath;
    include 'errors/error.php';
    exit;
}

function redirect($url) {
    session_write_close(); // Write session data and end session
          // Session data is usually stored after your script terminated without
          //need to call session_write_close(), but as session datais locked 
          //to prevent concurrent writes only one script may operate on asession
          //at any time. WHEN USING FRAMESETS TOGETHER WITH SESSIONS you will
          //experience the frames loading one by one due to this locking. 
          //You canreduce the time needed to load all the frames by ending 
          //session as soon as all changes to session variables are done. 
    header("Location: " . $url);
    exit;
}


// ********************************************
// Start session to store user and cart data
// ********************************************
session_start();
?>
