<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\01inanz\app\config.php
// http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01inanz/
    define('MODULE_NAME', 'Simple MVC');

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'z_blogcms'); //tema
    define('DB_USER', 'root');
    define('DB_PASS', '');

    // APP_ INNER_ DIRECTORY
    define('MODULE_RELPATH', '/fwphp/glomodul/z_examples/02_mvc/01inanz');
    //module relative path (below web server doc root) eg /mix/mvc or :

    define('MODULE_PATH', realpath(__DIR__.'/..')); // module dir
    //define('MODULE_DOMAIN', 'http://192.168.5.101');
                  /*
                  chdir('/var/www/');
                  echo realpath('./../../etc/passwd') . PHP_EOL;
                  echo realpath('/tmp/') . PHP_EOL;
                  // The above example will output:
                  /etc/passwd
                  /tmp
                  */

    define('MODULE_DOMAIN', 'http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01inanz');
     
    define('MODULE_CTR_NAMESPACE',      'Controller\\');
    define('MODULE_CTR_DEFAULT',        'Home');
    define('MODULE_CTR_DEFAULT_METHOD', 'index');
    define('MODULE_CTR_METHOD_SUFFIX',  'Method');
