<?php
 require_once("Include/Sessions.php");
 require_once("Include/Functions.php");

$_SESSION["User_Id"]=null;
session_destroy();
Redirect_to("Login.php");



?>