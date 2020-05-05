<?php
ob_start();
session_start();
if(!isset($_SESSION['userid'])) {
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <link rel="stylesheet" href="/zinc/themes/bootstrap/css/bootstrap.min.css"/>
    <!--link rel="stylesheet" href="css/bootstrap.c ss"/-->
    <!--link rel="stylesheet" href="css/font-awesome.min.c ss"/-->
</head>
<body>

