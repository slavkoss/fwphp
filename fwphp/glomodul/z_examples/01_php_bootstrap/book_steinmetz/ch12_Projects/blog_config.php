<?php
session_start(); 
$connection = @mysql_connect("localhost","dbuser","dbpass") or die("Couldn't connect."); 
$db = @mysql_select_db("wcphp", $connection) or die(mysql_error());
require_once ("smarty/Smarty.class.php");
$smarty = new Smarty();
?>
