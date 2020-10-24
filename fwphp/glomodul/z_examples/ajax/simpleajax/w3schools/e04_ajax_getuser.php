<?php
echo '<pre>$_GET='; echo json_encode( $_GET, JSON_PRETTY_PRINT ) ;   echo '</pre>';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$mysqli = new mysqli("servername", "username", "password", "dbname");
$mysqli = new mysqli("localhost", "root", "", "z_blogcms");
if($mysqli->connect_error) {
  exit('Could not connect');
} else echo 'Connected to user (db) z_blogcms.';

$sql = "SELECT id, username, aname FROM admins WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $username, $aname);
$stmt->fetch();
$stmt->close();

?>
<table>
  <tr>
    <th>UserID</th><th>Username</th><th>Name</th>
  </tr>
  <tr>
    <td><?=$id?></td><td><?=$username?></td><td><?=$aname?></td>
  </tr>
</table>
