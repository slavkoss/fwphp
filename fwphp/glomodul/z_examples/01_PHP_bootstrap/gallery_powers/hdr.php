<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8>
    
    <title>GALERIJA
       <?php if (isset($title)) {echo " - {$title}";} ?>
    </title>
   
   <style type="text/css" media="screen">
     @import url(<?php echo $CSS_URL;?>); 
   </style>        
        
    <?php
    if ($SHOW_PICTURES) {
        if (isset($imageSize)) { ?>
        <style>
        #caption {
           width: <?php echo $imageSize[0];?>px;
        }
        body,td,th {
         font-size: 16px;
        }
        </style>
    <?php } } ?>
</head>

<body>

<!-- echo<<<EOTXT -->
<div id="header"> vidi uputu u css-u </div>

<?php include('ctrmenu.php');?>

<h2>&nbsp;&nbsp;BLOG</h2>

<div id="wrapper">
<!-- EOTXT; -->

