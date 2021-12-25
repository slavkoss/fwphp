<?php

  require_once("session.php");
  //define('__CONFIG__', true); 
  //require("class.user.php");
  //$ousr = new USER();

  $user_id = $_SESSION['user_session'];

  $stmt = $ousr->runQuery("SELECT * FROM admins WHERE id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Welcome Home</title>
</head>

<body>

  <div id="main">
    <h1><font color='green'>Congratulation <?= $userRow['username']?>!</font></h1>
    <p><b>You can Access this Page.</b></p>

    <p><a href="logout.php?logout=true"  ><button class="button" >SIGN OUT</button</a></p>
  </div>


</body>
</html>
