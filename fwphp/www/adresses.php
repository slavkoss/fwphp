<!--
/**
* J:\awww\www\fwphp\www\adresses.php
* was J:\awww\www\fwphp\www5\h_M.php
*
* http://phporacle.altervista.org/zinc/img/ic_view_module_white_24dp.png
*/
-->
<?php

define('QS', '?'); //to avoid web server url rewritting //if (!defined('Q S')) define( 'Q S', '?' );
define('DS', DIRECTORY_SEPARATOR);

$ibrowser_tab_label = 'HOME';

$module_towsroot = '../../' ; //inet provider docroot - J:\awww\www or ...htdocs or...
//eg J:/awww/www/ : not $_SERVER['CONTEXT_DOCUMENT_ROOT'] - inet provider's !!
$wsroot_path = str_replace('\\','/', realpath($module_towsroot)).'/' ;

$path_rel_modul = rtrim(ltrim(str_replace('\\','/', __DIR__ .'/'), $wsroot_path),'/') ;

$wsroot_url = ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
      . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
      .'/', FILTER_SANITIZE_URL ) ;
$site_url   = $wsroot_url . 'fwphp/' ;
$module_url = $wsroot_url . $path_rel_modul .'/' ;

$css_url = $wsroot_url . 'zinc/themes/bootstrap/css/bootstrap.min.css' ;
//''=no s t y l e  or: bootstrap or flex_2cols or...
//$style                   = 'bootstrap' ;
//$modulename_ibrowser_tab = 'MSG' ;

$all_sites_glo_path = $wsroot_path.'zinc/' ;

$site_dir       = 'fwphp/' ; //basename(__DIR__)
//we have only one (eg glomodul) group of global modules per subsite (eg fwphp) !!
$glomodul_dir      = 'glomodul/' ;
$path_rel_glomodul = $site_dir.$glomodul_dir ;

$path_rel_examples = $path_rel_glomodul .'z_examples/' ;
$path_rel_help     = $path_rel_glomodul .'z_help/' ;

$zbig_url       = $wsroot_url .'zbig/';
$zbig_path      = $wsroot_path .'zbig/';

//                 img-s
$img_url = $wsroot_url . 'zinc/img/' ;
$img_path       = $wsroot_path . 'zinc/img/' ;
//NOT SO : <i class="material-icons">view_module</i>Modules
$tmp = $img_url . 'ic_view_module_white_24dp.png' ;
$img_url_modules_link = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp = $img_url . 'ic_supervisor_account_black_24dp.png' ;
$img_url_users_link   =  '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp = $img_url . 'ic_settings_black_24dp.png' ;
$img_url_settings_link = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp     = $img_url . 'ic_done_white_32dp.png' ;
$img_url_done_link_white = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp     = $img_url . 'ic_done_black_32dp.png' ;
$img_url_done_link_black = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';