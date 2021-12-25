<?php
/**
 * User: TheCodeholic  Date: 7/7/2020 Time: 9:57 AM
 * see https://www.youtube.com/watch?v=kyoeX77HCh8&list=RDCMUC_UMEcP_kF0z4E6KbxCpV1w&index=2
 */
use app\controllers\AboutController;
use app\controllers\SiteController;
use thecodeholic\phpmvc\Application;

//J:\awww\www\fwphp\z_not_ongithub\MVC_FW\fw_codeholic\vendor\thecodeholic\php-mvc-core\autoload.php
require_once str_replace('\\','/',dirname(__DIR__)) . '/vendor/thecodeholic/php-mvc-core/autoload.php';
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=z_blogcms;',
        'user' => 'root',
        'password' => '',
    ]
];
                      echo '<h4>__FILE__='; print_r(__FILE__); echo ' SAYS :</h4>';
                      echo '<pre>$config='; print_r($config); echo '</pre>';

$app = new Application(dirname(__DIR__), $config);
                      echo '<h4>__FILE__='; print_r(__FILE__); echo ' SAYS : After new Application...</h4>';
                      $app->on(Application::EVENT_BEFORE_REQUEST, function(){
                          echo "Before request from second installation";
                      });
$app->router->get('/',          [SiteController::class, 'home']);
$app->router->get('/register',  [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login',     [SiteController::class, 'login']);
$app->router->post('/login',    [SiteController::class, 'login']);
$app->router->get('/logout',    [SiteController::class, 'logout']);
$app->router->get('/contact',   [SiteController::class, 'contact']);
$app->router->get('/about',     [AboutController::class, 'index']);
$app->router->get('/profile',   [SiteController::class, 'profile']);

$app->run();


//require_once __DIR__ . '/../vendor/autoload.php';

//$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
//$dotenv->load();

//    list( 
// self::$do_pgntion, $dbi, $db_hostname, $db_name, $db_username, $db_userpwd) 
//    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!
   //  [null,        'mysql','localhost','z_blogcms','root',          '']
//self::$dsn = self::$dbi.':host='.self::$db_hostname.';dbname='.self::$db_name.';' ;
//self::$dsn = 'mysql:host=localhost;dbname=z_blogcms;' ;
                      //echo '<pre>$_ENV='; print_r($_ENV); echo '</pre>';
                      //$_ENV=Array()
