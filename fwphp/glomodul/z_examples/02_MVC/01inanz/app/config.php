<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\01inanz\app\config.php
// http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01inanz/
    define('APP_NAME', 'Simple MVC');

    // APP_ INNER_ DIRECTORY
    define('MODULE_RELPATH', '/fwphp/glomodul/z_examples/02_mvc/01inanz');
    //module relative path (below web server doc root) eg /mix/mvc or :

    define('APP_ROOT', realpath(__DIR__.'/..')); //module dir
    //define('APP_DOMAIN', 'http://192.168.5.101');
                  /*
                  chdir('/var/www/');
                  echo realpath('./../../etc/passwd') . PHP_EOL;
                  echo realpath('/tmp/') . PHP_EOL;
                  // The above example will output:
                  /etc/passwd
                  /tmp
                  */

    define('APP_DOMAIN', 'http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01inanz');
     
    define('APP_CONTROLLER_NAMESPACE', 'Controller\\');
    define('APP_DEFAULT_CONTROLLER', 'Home');
    define('APP_DEFAULT_CONTROLLER_METHOD', 'index');
    define('APP_CONTROLLER_METHOD_SUFFIX', 'Method');
     
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'z_blogcms'); //tema
    define('DB_USER', 'root');
    define('DB_PASS', '');