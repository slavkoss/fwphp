<?php
// J:\awww\www\fwphp\z_not_ongithub\MVC_FW\01inanz\app\config.php
// http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01inanz/
    define('MODULE_NAME', 'Simple MVC');
    //define('QS', '?'); // URLquerySeparator

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'z_blogcms'); //tema
    define('DB_USER', 'root');
    define('DB_PASS', '');

    // APP_ INNER_ DIRECTORY
    //module relative path (below web server doc root) eg /mix/mvc or :
    define('MODULE_RELPATH', '/fwphp/z_not_ongithub/MVC_FW/01inanz');
                /*$REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
                $uri_arr = explode(QS, $REQUEST_URI) ; 
                $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/');
                define('MODULE_RELPATH', $module_relpath); */

    define('MODULE_PATH', dirname(__DIR__) .'/' ); 
                              //define('MODULE_PATH', realpath(__DIR__.'/..') .'/' );
    define('CORE_PATH', MODULE_PATH .'vendor/inanz/');

    //define('MODULE_DOMAIN', 'http://192.168.5.101');
    //define('MODULE_DOMAIN', 'http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01inanz');
    define('MODULE_DOMAIN', 'http://dev1:8083/fwphp/z_not_ongithub/MVC_FW/01inanz');
     
    define('MODULE_CTR_NAMESPACE',      'Controller\\');
    define('MODULE_CTR_DEFAULT',        'Home');
    define('MODULE_CTR_DEFAULT_METHOD', 'index');
    define('MODULE_CTR_METHOD_SUFFIX',  'Method');
