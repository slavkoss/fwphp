<?php

error_reporting(0);

//getting database credentials
$db_name = "movies_api";
$mysql_username = "root";
$mysql_pass = "";
$server_name = "127.0.0.1";

//connection --> connect to db
$con = mysqli_connect($server_name,$mysql_username,$mysql_pass,$db_name);

//if we cannot connect
if(!$con){
  echo '{"message":"Unable to ceonnect to datanase"}';
  die();
}



/*

1- Get 
2- Insert
3- Update
4- Delete



*/






?>