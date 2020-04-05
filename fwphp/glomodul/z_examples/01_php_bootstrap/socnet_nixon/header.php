<?php
  session_start();
  date_default_timezone_set('Europe/Zagreb');  //UTC
  //ini_set('upload_max_filesize', '10M');
  //chdir(dirname(__FILE__));

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = "$user";
  }
  else { 
    $loggedin = FALSE; 
  }

  ?> 
  <!DOCTYPE html>
  <html lang="hr-HR">
  <head>
     <title><?=$appname.' '.$userstr?></title>
     <link rel='stylesheet' href='styles.css' type='text/css'>
  </head>
       
  <body>
    <center>
      <!--canvas id='logo' width='624'  height='96'>=$appname</canvas-->
      Linked messages - help or CRM - <?=$appname?> style
    </center>
       <div class='appname'><?='Member-thema: '.$userstr?></div>
       <!--script src='javascript.js'></script-->
  <?php


  if ($loggedin)
  {
    ?> <br ><ul class='menu'>
         <li><a href='members.php?view=<?=$user?>'>Home</a></li>
         <li title="Group of messages"><a href='members.php'>
            Members-Themes</a></li>
         <li title="Linked group of messages"><a href='friends.php'>
            Friends-Follow</a></li>
         <li><a href='messages.php'>Messages</a></li>
         <br /><br />
         <li><a href='profile.php'>Edit Thema Profile</a></li>
         <li><a href='logout.php'>Log out</a></li></ul><br>
  <?php }
  else
  {
    ?> <br><ul class='menu'>
          <li><a href='index.php'>Home</a></li>
          <li><a href='signup.php'>Sign up</a></li>
          <li><a href='login.php'>Log in</a></li></ul><br>
          <span class='info'>&#8658; You must be logged in to view this page.
          </span><br><br>
  <?php }
?>
