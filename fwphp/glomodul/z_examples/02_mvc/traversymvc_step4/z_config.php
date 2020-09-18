<?php

define('SITENAME', 'BLOG PHP MVC');
// DB Params
            //define("DB_HOST", "172.18.0.3"); define("DB_USER", "app");
            //define("DB_PASS", "senha"); define("DB_NAME", "app");
define("DB_HOST", "localhost");
define("DB_USER", "z_blogcms");
define("DB_PASS", "root");
define("DB_NAME", "");

define('DS', DIRECTORY_SEPARATOR);
define('QS', '?');

// ADRESSESS1: App Root = module_root/app = app dir
            //or /webroot/public -> /webroot/app
            //define('$pp1->module_app_path', dirname($_SERVER['DOCUMENT_ROOT']) . DS . 'app');
   $module_path  = str_replace('\\','/', __DIR__ ).'/';

   $module_towsroot = '../../../' ;  //to web server doc root or our doc root by ISP
   $shares_path = str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/' ;

//define('$pp1->module_app_path', $module_path . 'app') ; // dir_app_path

// ADRESSESS2: URL Root
$wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
// http://dev1:8083/    //= 1. U R L_P R O T O C O L :
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
        // URL_DOM AIN = dev1:8083 :
      . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode(QS, $REQUEST_URI) ; 

$module_relpath_requested = rtrim(ltrim(dirname($uri_arr[0]),'/'),'/'); 
              //or rtrim(str_replace($w sroot_path, '', $m odule_path),'/') ;

$module_url = $wsroot_url . $module_relpath_requested.'/';

// Page property pallete :
$pp1['wsroot_path'] = $wsroot_path ;
$pp1['module_app_path']  = $module_path . 'app' ;
$pp1['wsroot_url']  = $wsroot_url ;
$pp1['module_url']  = $module_url ;
$pp1 = (object)$pp1 ;
