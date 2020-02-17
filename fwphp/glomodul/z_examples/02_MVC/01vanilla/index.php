<?php 
//https://github.com/ssnigdho/vanilla-php-framework
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
//require 'vendor/autoload.php';
//if(isset($_GET['nocache'])) { session_destroy(); header("Location: /"); die(); }
//1.
$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ; 
$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1', 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>'../../../../../' //to web server doc root or our doc root by ISP
  //1.2
  , 'module_version'=>'1.0.0.0 Vanilla php fw', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      //, $dirup_tmp.'/user/', $dirup_tmp.'/post_category/' //two master modules (tbls)
      //, $dirup_tmp.'/post/', $dirup_tmp.'/post_comment/'  //detail & subdet modules (tbls)
  ]
] ;

//2.
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('1') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                        .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'BEFORE  i n c  A u t o l o a d'
                   ,'require '. $pp1->module_towsroot.'zinc/Autoload.php'
                ] ) ; }

//require 'config.php';

//3. process request from ibrowser & send response to ibrowser :
//$db = n ew Home_ctr($pp1) ; // "inherits" index.php ee inherits $pp1

// Handle  r o u t e s  in  R o u t e  helper class :
//use App\Helpers\R oute;
Request_response::handle($pp1, $_SERVER['REQUEST_URI']); //Route::handle($_SERVER['PHP_SELF']);

exit(0);

/*
https://github.com/formr/Formr

********************************************************  blognette (v3.0.3)
composer create-project nette/web-project blognette
cd blognette
********************************************************

ne composer create-project phpixie/project blogpix

******************************************************** lithium PHP fw
<h2> lithium PHP fw </h2>
<p>li3 is less dense than <?= $foo ?>ium.</p>

<pre>
<a href="http://localhost:8083/z_li3blog/posts/">This page (install and setup li3)</a>
outputs :"li3 is less dense than barium..."
   see https://li3.me/docs/book/manual/1.x/quickstart

<a href="http://localhost:8083/z_li3blog/">Blog</a>
outputs :

Resources directory is writable

No database connection defined
  To create a database connection:
      Edit the file config/bootstrap.php.
      Uncomment line :  require __DIR__ . '/bootstrap/connections.php';.
      Edit the file config/bootstrap/connections.php.

  You're using the application's default home page
  To change this template, edit the file views/pages/home.html.php
  To change the layout, (that is what's wrapping content) 
    edit the file views/layouts/default.html.php

Database support :    "<--" means adapter enabled
  Database Http Mock MongoDb MySql<-- Postgre SqlSqlite<--  CouchDb<--
Cache support
    Apc File<-- Memcache Memory<-- Redis XCache

Custom routing
  Routes allow you to map custom URLs to your app code
  To change the routing, edit the file config/routes.php

Run the tests
  Check the test dashboard http://localhost:8083/z_li3blog/test
  or run all tests now to ensure Lithium is working as expected :
  http://localhost:8083/z_li3blog/test/all
     Assertion 'assertEqual' failed in lithium\tests\cases\test\UnitTest::testAssertCookieWithHeaders() on line 553
     and some tests skipped

Quickstart https://li3.me/docs/book/manual/1.x/quickstart
  Quickstart is a guide for PHP users who are looking to start building a simple app
  MVC Starts with M - Posts model that will handle the domain logic for blog posts
  1. create models/Posts.php
  2. Create controllers/PostsController.php
  3. Create views/posts/index.html.php

Learn more
  Read the Manual for detailed explanations and tutorials
  API documentation has all the implementation details you've been looking for.

Community


For general support have a look on the questions tagged with lithium on stackoverflow. 



cd J:\xampp71_31\htdocs\
composer create-project --prefer-dist unionofrad/framework z_li3blog

MongoDB, a NoSQL database. One of the advantages of a NoSQL database is that you don't have to specify the schema upfront, so it works perfectly with our RAD approach to development!
http://www.mongodb.org/
The framework has support for both relational (MySQL, MariaDB, PostgreSQL, SQLite) and NoSQL databases (MongoDB, CouchDB) and is one of the first frameworks to support both types of databases through one single ORM/ODM hybrid.

https://li3.me/docs/book/manual/1.x/quickstart
https://github.com/UnionOfRAD/lithium
********************************************************* e n d  lithium PHP fw


http://localhost:8083/grav/admin
http://localhost:8083/grav/admin/pages/home
    Save location: grav/user/pages/01.home (type: default) 
https://getgrav.org/downloads
CREATE USER 'admin'@'%' IDENTIFIED VIA mysql_native_password USING '***';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `z_october`.* TO 'admin'@'%'; 

https://github.com/hscstudio/easy/blob/master/


********************************************************************
http://localhost:8083/octobercms/
http://localhost:8083/octobercms/backend

http://octobercms.com/docs/setup/installation#post-install-steps

debug setting is found in the config/app.php
safe mode setting is found in the config/cms.php
   - enableCsrfProtection parameter : protecting your application from cross-site request forgeries. First a random token is placed in your user's session. Then when a opening form tag is used the token is added to the page and submitted back with each request.
   - edgeUpdates parameter -  to prefer test builds. composer.json :
        "october/rain": "dev-develop as 1.0",
        "october/system": "dev-develop",
        "october/backend": "dev-develop",
        "october/cms": "dev-develop",
        "laravel/framework": "5.5.*@dev",

For security reasons you should delete the following installation files, install.php, .gitignore and the install_files directory. 

--------all ok for octobercms :
    PHP version 7.0 or greater required
    cURL PHP Extension is required
    Test connection to the installation server
    Permission to write to directories and files
    PDO PHP Extension is required
    Mbstring PHP Extension is required
    Fileinfo PHP Extension is required
    OpenSSL PHP Extension is required
    ZipArchive PHP Library is required
    GD PHP Library is required
admin/admin
Backend URL  /backend
Encryption Code FpG0E6WbUwN97Gm8UzGsP8twRE1xqK9b

my long psw 

File Permission Mask   644  you may use 666
Folder Permission Mask 755  you may use 777 not recommended for shared hosting
--------------------------------------------------
********************************************************************


https://github.com/pricop/fir

https://medium.com/issuehunt/50-most-popular-php-projects-on-github-c8cf6a242eb9
https://bagisto.com/en/the-most-popular-open-source-project-built-on-laravel/

https://github.com/usbac/wolff-framework
https://www.getwolff.com/doc/2.x/home
     https://github.com/Usbac/Wolff/wiki

https://github.com/pmjones/php-history

https://github.com/Usbac/wolff
*/

