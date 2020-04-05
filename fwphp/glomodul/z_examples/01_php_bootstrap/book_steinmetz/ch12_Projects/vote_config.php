<?php
$db = @mysql_connect("localhost","dbuser","dbpass") or die("Couldn't connect."); 
@mysql_select_db("wcphp", $db) or die("Couldn't select database.");
?>
