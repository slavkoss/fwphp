<?php
session_start();

define('__CONFIG__', true); 
require_once("class.user.php");
$ousr = new USER();

if($ousr->is_loggedin()!="")
{
  $ousr->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
  $uname = strip_tags($_POST['txt_uname_email']);
  $umail = strip_tags($_POST['txt_uname_email']);
  $upass = strip_tags($_POST['txt_password']);

  if($ousr->doLogin($uname,$umail,$upass))
  {
    $ousr->redirect('home.php');
  }
  else
  {
    $error = "Wrong Details !";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Access Denied</title>
</head>

<body>
  <div id="main">
     <h1><font color='red'>Access Denied !</font></h1>
     <p><b>Sorry! You can't access this page.</b></p>
     <p><a href="index.php" ><button class="button" >SIGN IN</button</a></p>
  </div>


</body>
</html>
