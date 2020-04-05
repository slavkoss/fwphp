<?php
// J:\awww\www\fwphp\glomodul\z_examples\01_PHP_bootstrap\login_reg_profile\config.php
session_start();

//Database Credentials 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tema'); //authcourse


//URL
//define('URLROOT', 'http://localhost/authcourse');
define('URLROOT', 
  'http://dev1:8083/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile'
);


//APP URL
define( 'APPROOT', __DIR__ );



require_once 'functions.php';


//make database connection
$objDB = objDB();



$restricted_pages = [
    
    '/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/profile.php',
    '/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/change_password.php',
    '/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/edit_profile.php',
    '/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/logout.php',
     
];



$public_pages = [
    '/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/login.php',
    '/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/register.php',
    '/fwphp/glomodul/z_examples/01_PHP_bootstrap/login_reg_profile/forget_password.php',
];


 

if(!isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $restricted_pages, true)){
    setMsg('msg_notify', 'You need to login before accessing this page', 'warning');
    redirect('login.php');
    exit();
}


if(isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $public_pages, true)){
    setMsg('msg_notify', 'You need to logout before accessing this page', 'warning');
    redirect('profile.php');
    exit();
}



if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
    $user = isset($_COOKIE['user']) ? unserialize($_COOKIE['user']) : $_SESSION['user'];
}else{
    $user = '';
}

