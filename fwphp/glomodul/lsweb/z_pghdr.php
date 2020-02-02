<!DOCTYPE html>
<html lang="hr">
<!-- J:\awww\apl\dev1\tests\kalendar\kalendar\_pghdr.php -->
<head>
    <meta charset=utf-8" />
    <title><?=//$page_title?></title>
            <?php //foreach ( $css_files as $fmtf ): ?>
              <!--link rel="stylesheet" type="text/css" media="screen,projection"
               href="<=CSSRELPATH.'/'. $fmtf?>" /-->
            <?php //endforeach; ?>

</head>

<body>

<?php
//auth_check_valid_user();
if ( isset($_SESSION['user']) ) { //valid_user
  echo "Logged in&nbsp;&nbsp; U S E R&nbsp;&nbsp; I S&nbsp;&nbsp; "
       .$_SESSION['user']['name']."<br>";
} 
