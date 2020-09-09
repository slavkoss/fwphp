<?php
ob_start();
session_start();
include "Database.php";
include "Users.php";

$user = new Users();
$user->logout();
header("Location: login.php");