<?php
    define('APP_INNER_DIRECTORY', '/fwphp/glomodul/z_examples/01_MVC_learn/01inanz');

    define('APP_NAME', 'Simple MVC');
    define('APP_DOMAIN', 'http://192.168.5.101');
    //module relative path (below web server doc root) eg /mix/mvc or :
    define('APP_ROOT', __DIR__.'/..'); //module dir
     
    define('APP_CONTROLLER_NAMESPACE', 'Controller\\');
    define('APP_DEFAULT_CONTROLLER', 'Home');
    define('APP_DEFAULT_CONTROLLER_METHOD', 'index');
    define('APP_CONTROLLER_METHOD_SUFFIX', 'Method');
     
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'tema');
    define('DB_USER', 'root');
    define('DB_PASS', '');