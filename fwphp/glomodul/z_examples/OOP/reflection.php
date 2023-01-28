<?php

$cls = $_GET['cls'];
//require_once("Page.php");
//require_once("$cls.php"); // should be autoloader

$class = new ReflectionClass("$cls");
echo "<pre>".$class."</pre>";

?>
