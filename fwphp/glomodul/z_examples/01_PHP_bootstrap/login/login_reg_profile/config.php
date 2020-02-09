<?php
// J:\awww\www\fwphp\glomodul\z_examples\01_php_bootstrap\login\login_reg_profile_shan_shah\config.php
// J:\awww\www\fwphp\glomodul\z_examples\01_PHP_bootstrap\login_reg_profile\config.php
session_start();
$module_towsroot = '../../../../../../';

//Database Credentials 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'z_blogcms'); //authcourse tema


$dir = str_replace('\\','/', __DIR__ ).'/'; //=thismodule_cls_script_path (CONVENTION!!)
$wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
  //REQUEST_METHOD=GET
  //MODULE_RELPATH=fwphp/glomodul/z_examples/01_PHP_bootstrap/jokeyank/public/
  //REQUEST_URI=/fwphp/glomodul/z_examples/01_PHP_bootstrap/jokeyank/public/?aaa
define('WSROOT_URL', // http://dev1:8083/    //= 1. U R L_P R O T O C O L :
  ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
    // 2. URL_DOM AIN = dev1:8083 :
    . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL )
); // 'http://localhost/'
define('REQUEST_URI', $_SERVER['REQUEST_URI']);
//strtok splits string into strings (tokens), delimited by any character from string
//define( 'MODULE_RELPATH', dirname(ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/')).'/' );
define( 'MODULE_RELPATH', rtrim(str_replace($wsroot_path, '', $dir),'/') ) ;
define('MODULE_PATH', __DIR__);

//'http://dev1:8083/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/'
define('MODULE_URL', WSROOT_URL . MODULE_RELPATH .'/'); // 'http://localhost/authcourse'

          if ('1') { echo basename(__FILE__).' SAYS : <pre>';
          echo '<br />REQUEST_METHOD              ='; print_r($_SERVER['REQUEST_METHOD']); 
          echo '<br />WSROOT_URL                  ='; print_r(WSROOT_URL); 
          echo '<br />REQUEST_URI                 ='; print_r(REQUEST_URI); 
          echo '<br />MODULE_RELPATH ($route)     ='; print_r(MODULE_RELPATH); 
          echo '<br />MODULE_URL                  ='; print_r(MODULE_URL); 
          echo '<br />MODULE_PATH                 ='; print_r(MODULE_PATH); 
          echo '</pre>'; }

require_once 'functions.php';


$objDB = objDB(); //make  d b  c o n n


//'/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/profile.php',
$restricted_pages = [
    REQUEST_URI . 'profile.php'
  , REQUEST_URI . 'change_password.php'
  , REQUEST_URI . 'edit_profile.php'
  , REQUEST_URI . 'logout.php'
];

$public_pages = [
    REQUEST_URI . 'login.php'
  , REQUEST_URI . 'register.php'
  , REQUEST_URI . 'forget_password.php'
];

//3rd param.strict is set to TRUE then in_array() fn checks types of needle in  haystack
if( !isUserLoggedIn()
    and in_array($_SERVER['REQUEST_URI'], $restricted_pages, true)
) {
    setMsg('msg_notify', 'You need to login before accessing this page', 'warning');
    redirect('login.php');
    exit();
}

if( isUserLoggedIn() 
    and in_array($_SERVER['REQUEST_URI'], $public_pages, true)
) {
    setMsg('msg_notify', 'You need to logout before accessing this page', 'warning');
    redirect('profile.php');
    exit();
}


$user = '';
if( isset($_SESSION['user']) or isset($_COOKIE['user']) ) {
$user = isset($_COOKIE['user']) ? unserialize($_COOKIE['user']) : $_SESSION['user']; }

