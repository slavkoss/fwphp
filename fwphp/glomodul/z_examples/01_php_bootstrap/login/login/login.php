<?php
require_once "conn.php";
$user = $_POST['user'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM admins
        WHERE username='$user' AND
        password='$pass'
        LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0){
  echo "you are login";
  header('Refresh: 2; URL = home.php');
}
else{
  echo "<br />your username or password is wrong";
}

?>