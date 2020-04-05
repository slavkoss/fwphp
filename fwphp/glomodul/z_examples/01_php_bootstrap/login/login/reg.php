<?php
require_once "conn.php";
$user = $_POST['user'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "INSERT INTO admins (username, email, password) value('".$user."','".$email."','".$pass."')";
if($conn->query($sql) === true){
  echo " user created";
}
else{
  echo " error" .$sql .$conn->error;
}

?>