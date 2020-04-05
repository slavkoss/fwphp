<?php
//J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\sess_unset_usrid_logout.php
session_start();

//unset($_SESSION['user_id_loggedin']);
$_SESSION = []; //unset($_SESSION);
header("location:index.php");
