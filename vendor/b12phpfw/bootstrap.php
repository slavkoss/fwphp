<?php
$wsroot_path = dirname(dirname(dirname($module_path))) ;
              //or in index.php $wsroot_path = str_replace('\\','/', realpath('../../../'))  ;
$shares_url = '/vendor/b12phpfw' ; //includes, globals, commons, reusables CONVENTION
$shares_path = $wsroot_path . $shares_url ;
$site_path   = dirname(dirname($module_path)) ; //to app dir ...fwphp" dir
//
$dir_site = basename($site_path) ; 
     //$dir_ site = basename(dirname(dirname($module_path))); 
  // = 'fwphp' is below '/' (web server doc root or virtual host or hosting root) 
//$dir_glomodul = 'glomodul' ; // is below dir_ site. Below are more dir_apl

$dir_apl = basename(dirname($module_path)); 
  // ='glomodul' is below dir_ site. Module group to which this module (dir_module) belongs 
  $dir_module = basename($module_path); // is below dir_apl
  $dir_menu = 'www'; // is below dir_apl

$pp1->shares_path   = $shares_path ;
$pp1->wsroot_path   = $wsroot_path ;
$pp1->site_path     = $site_path ;
$pp1->examples_path = $site_path .'/glomodul/z_examples' ; // CONVENTION 
//
$pp1->dir_menu      = $dir_menu ;
$pp1->dir_site      = $dir_site ;
$pp1->dir_apl       = $dir_apl ;
$pp1->dir_module    = $dir_module ;
//
$pp1->pp1_group02U  = '~~~~~ ADRESSES : URLs ~~~~~'  ;
$pp1->wsroot_url    = '/' ;
$pp1->shares_url    = $shares_url ;
$pp1->module_url    = "/$dir_site/$dir_apl/$dir_module" ;
$pp1->glomodul_url  = "/$dir_site/glomodul" ; // CONVENTION
