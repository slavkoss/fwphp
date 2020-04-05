<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\inc_hdr_ftr.php

function hdr_pge(&$module_arr, $title, $custom_css='style.css')
{ ?>
  <!DOCTYPE html>
  <html class="no-js" lang="en">
  <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

          <title><?=$title?></title>

     <!--link rel="stylesheet" href="/<?=$module_arr['theme_relpath']?>/css/all.css"-->
     <!--link rel="stylesheet" href="/<?=$module_arr['theme_relpath']?>/css/fontawesome.min.css"-->
     <!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"-->
     <link rel="stylesheet" href="/<?=$module_arr['theme_relpath']?>/css/bootstrap.min.css">
     <link rel="stylesheet" href="/<?=$module_arr['theme_relpath']?>/css/raleway_300_400.css">
         <!--Custom CSS  FOR TOP TOOLBAR & color & TOP TOOLBAR button not to overlap content !!-->
          <!--link rel="stylesheet" href="style.css"-->
    <?php if ($custom_css) {?><link rel="stylesheet" href="<?=$custom_css?>"><?php }?>

  </head>

  <body id="home">
  <?php
}

function ftr_pge(&$module_arr, $jquery_lib, $custom_js='navbar-fixed.js')
{ 
      //if(!(basename($value) == "Controller")) {
        echo '<pre>'.__FILE__ .', lin='. __LINE__ .'  <b>*** '.__METHOD__ .'  SAYS ***</b>';
          //echo '<br />$value='; print_r($value) ; 
        echo '</pre>';
        //echo "<h3 $style_red>".'Base abstract class Controller not found in $parents=class_parents($ctr) array !</h3>'; //goto fn_end ;
      //}
?>
      INPUT: $module_arr['<b>module_path</b>']=<?=$module_arr['module_path']?>
      <br />INPUT: $module_arr['<b>wsroot_path</b>']=<?=$module_arr['wsroot_path']?>
      <br />From $_SERVER['HTTPS'] and $_SERVER['HTTP_HOST'] : 
              $module_arr['<b>wsroot_url</b>']=<?=$module_arr['wsroot_url']?>
      <br />From $_SERVER['REQUEST_URI'] : 
              $module_arr['<b>module_relpath_requested</b>']=<?=$module_arr['module_relpath_requested']?>
      <br />INPUT : $module_arr['wsroot_url'] . 'fwphp/www5/'
             $module_arr['<b>site_url</b>']=<?=$module_arr['site_url']?>
      <br />From module_path and wsroot_path :
             $module_arr['<b>module_relpath</b>']=<?=$module_arr['module_relpath']?>
      <br />From wsroot_url and module_relpath :
             $module_arr['<b>module_url</b>']=<?=$module_arr['module_url']?>
      <br /><br />
    <script src="/<?=$module_arr['theme_relpath']?>/js/<?=$jquery_lib?>"></script>
    <!--script src="/<?=$module_arr['theme_relpath']?>/js/fontawesome.min.js"></script-->
    <script src="/<?=$module_arr['theme_relpath']?>/js/popper.min.js"></script>
    <script src="/<?=$module_arr['theme_relpath']?>/js/bootstrap.min.js"></script>
         <!--Custom JS FOR TOP TOOLBAR button not to overlap content !! -->
        <!--script src="navbar-fixed.js"></script-->
    <?php if ($custom_js) { ?> <script src="<?=$custom_js?>"></script> <?php } ?>
  <!--/body-->
  <?php
}

