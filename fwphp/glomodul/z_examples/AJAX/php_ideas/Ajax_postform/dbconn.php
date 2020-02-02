<?php

 $dbhost = "127.0.0.1";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "tema";

$db=new MySQLi($dbhost,$dbuser,$dbpass,$dbname);
if($db->connect_errno > 0){
    die('فشل الاتصال بقاعدة البيانات [' . $db->connect_error . ']');
}
$db->query("SET NAMES 'utf8'");



?>