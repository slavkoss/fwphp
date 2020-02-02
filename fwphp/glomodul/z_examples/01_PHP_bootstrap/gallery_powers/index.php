<?php 
ob_start();
session_start();
try 
{ 
    $SHOW_PICTURES = '1';  //require("config.php");
    $CSS_URL = 'journey.css';
    $INCPATH = '.';
    $IMGPATH = '/zinc/img'; //$IMGPATH = '../../../../../zinc/img';
    if (!isset($_SESSION['pgbdy'])) $_SESSION['pgbdy'] = 'home.php';

    include($INCPATH . '/title.php');
    include($INCPATH . "/random_image.php"); 

    require("hdr.php"); //include('ctrmenu.php');
    include($_SESSION['pgbdy']); // formira ga  c t r . p h p 
    include($INCPATH.'/ftr.php');

} catch (Exception $e) {
    ob_end_flush();
    ob_end_clean();
    header('Location: error.php'); //header('Location: http://dev/t2/error.php'); 
}
ob_end_flush();
//ob_end_clean();

/*  
    J:\awww\www\fwphp\glomodul\help_sw\test\gallery_powers\index.php
    http://dev1:8083/zdoc/books/01powers/phpsols/gallery/
    http://dev1:8083/test/t_oci8/index.php
    J:\awww\apl\dev1\zdoc\books\01powers\phpsols\gallery
    
    J:\awww\apl\dev1\zdoc\t_oci8
    J:\dev_web\htdocs\test\t_oci8\index.php  H:\dev_web\htdocs\apl\test\t_oci8\index.php
*/
?>