<?php
// https://github.com/yussan/pure-php-mvc
//       HAS NAMESPACES !!!!!!!!! MIT License 2018.03.06
namespace app;
use app\Config\Request_response; //use app\Config\Bootstrap;

error_reporting(E_ALL);


if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
//1.
$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1'
  , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>'../../../../../' //to web server doc root or our doc root by ISP
  //1.2
  , 'module_version'=>'1.0.0.0 pure php fw'
  , 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
  ]
] ;


// global modules declaration

// load app bootstrap
require __DIR__ . '/vendor/autoload.php';
           //no need : require_once __DIR__ . '/app/Config/Request_response.php';
$bootstrap = new Request_response() ; //Bootstrap()
return $bootstrap::run($pp1, $_SERVER['REQUEST_URI']);




/*
# aoi-php
PHP micro framework to help build your MVC project with minimal code flow.

![pure php mvc cover]( http://res.cloudinary.com/dhjkktmal/image/upload/v1520304797/github/pure-php-mvc.png )

## Prerequisites
- Composer <a target="_blank" href="https://getcomposer.org/">read more</a>

## Instalation
```
composer install
```

## Running (please choose one)
- **Using Apache** 
 
    Pointing you **server** root file to `index.php`

- **Using PHP-CLI** 

    run using **php-cli** using this command
    ```
    php -S localhost:3000
    ```
*/