<?php
date_default_timezone_set("Europe/Zagreb"); // Jazeb Akram : Asia/Karachi

if (!defined('DBI')) define('DBI', 'mysql');
//if (!defined('DBI')) define('DBI', 'oracle');

require_once("Include/Functions.php");

//if ($title == 'Dashboard' or $title == 'Admins' or $title == 'Comments' or $title == 'Add Post'
//      or $title == 'Add Categorie' or $title == 'Delete Post'

//if ($title == 'Blog' or $title == 'Full Post') 
  $css = 'css/publicstyles.css' ; 
//else $css = 'css/adminstyles.css'; 

?>
<!DOCTYPE html>

<html lang="hr">
<head>
    <meta charset="UTF-8" />
    <title><?=$title??'no title !!!!!!!'?></title>
                <!--link rel="stylesheet" href="css/bootstrap.min_3.3.7.css"-->
<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css">

                <!--script src="js/jquery-3.2.1.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <!--script src="js/bootstrap.min.js"></script-->
<script src="https://cdn.usebootstrap.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?=$css?>">

<!--link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script-->

<style>
    

nav ul li{
    float: left;
}

</style> 
</head>


<body>
<div style="height: 10px; background: #27aae1;"></div>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
    data-target="#collapse">
    <span class="sr-only">Toggle Navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="index.php">
     <!--img style="margin-top: -12px;" src="imags/jazebakramcom.png" 
          alt="imags/jazebakramcom.png"
          width=200;height=30;-->
  </a>
    </div>
    <div class="collapse navbar-collapse" id="collapse">
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li class="active"><a href="index.php">Blog</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">Feature</a></li>
      <li><a href="Admins.php">Admins</a></li>
    </ul>


    <form action="index.php" class="navbar-form navbar-right">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="Search" >
    </div>
           <button class="btn btn-default" name="SearchButton">Go</button>
      
    </form>


    </div>
    
  </div>
</nav>


<div class="Line" style="height: 10px; background: #27aae1;"></div>


<div class="container"> <!--Container-->

  <div class="blog-header">

  <h1>Complete Responsive CMS Blog using PHP </h1>


