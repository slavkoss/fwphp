<?php
//J:\awww\www\zinc\ver5\tplt_layout.php
// P A G E S  (BOOTSTRAP 4 TEMPLATES)  C O N T R O L L E R  S C R I P T
//    h_... means part of  h o m e  p a g e :

use B12phpfw\Messages as Messages ;

    $lang = $pp1->lang ;
    If (!isset($_GET['lang'])) { $_GET['lang'] = $lang ; }
    if(!isset($_SESSION['lang'])) { include_once $pp1->wsroot_path .'zinc/lang/lang/'. $lang .'.php' ;} 

$title = 'SITEHOME';

// p p 1,  or, without  B 1 2 p h p f w  we need z_adresses.php :
$wsroot_path = $pp1->wsroot_path ;
$wsroot_url  = $pp1->wsroot_url ;
$img_url     = $pp1->img_url ;

//see Home_ctr :  lang  J:\awww\www\zinc\l ang\l ang\l ang.php includes eg e n.php

//str_replace('\\','/', dirname(__DIR__) ) .'/glomodul';
$app_glomodul_dir_path = $pp1->app_glomodul_dir_path ;

$path_rel_examples = $app_glomodul_dir_path .'/z_examples/' ;

$url_examples = $wsroot_url .'fwphp/glomodul/z_examples/' ;
$url_glomodul = $wsroot_url .'fwphp/glomodul/' ;




include $pp1->shares_path . 'hdr.php';
   include 'h_top_toolbar.php';
   include 'h_top_intro_right.php';  //<!-- HOME SECTION -->

   include 'h_content1.php';  //<!-- eg LEARN (EXPLORE) -->
   include 'h_content2.php';  //<!-- eg CREATE -->
   include 'h_content3.php';  //<!-- eg SHARE -->

include $pp1->shares_path . 'ftr.php';
                        if ('') {echo '<h2> lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šđčćž</h2>';}

//include 'help.php'; 

