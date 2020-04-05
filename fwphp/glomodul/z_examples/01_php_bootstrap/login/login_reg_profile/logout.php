<?php
// J:\awww\www\fwphp\glomodul\z_examples\01_php_bootstrap\login\login_reg_profile\logout.php
// http://dev1:8083/fwphp/glomodul/z_examples/01_php_bootstrap/login/logout.php
require_once 'config.php';

 if(isUserLoggedIn()){
     
     if(isset($_COOKIE['user'])){
          setcookie('user', '', time() - (86400 * 30), '/');
     }
     
     if(isset($_SESSION['user'])){
         unset($_SESSION['user']);
     }
     setMsg('msg_notify', 'Your account has been successfully logged Out.');
     header('Location:login.php');
 }