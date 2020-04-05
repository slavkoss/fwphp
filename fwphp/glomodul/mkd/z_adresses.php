<?php
/**
* J:\awww\www\fwphp\glomodul4\msg_share\Home_M.php
* #cs04. module model code
*/
define('QS', '?'); //to avoid web server url rewritting //if (!defined('QS')) define( 'QS', '?' ); 
define('DS', DIRECTORY_SEPARATOR); 

$dbg   = '' ;
$module_towsroot         = '../../../' ; //inet provider doc root for us - www or htdocs or...
$modulename              = 'MKD' ;
$dir                     = __DIR__ ;
      $data    = [];
      $dirname = '';

$modulename_ibrowser_tab = 'MKD' ; 
$style = 'flex_2cols' ; //''=no s t y l e  or: bootstrap or flex_2cols or...

$wsroot_path = str_replace('\\','/', realpath($module_towsroot)).'/' ; 
$path_rel_modul = rtrim(ltrim(str_replace('\\','/', __DIR__ .'/'), $wsroot_path),'/') ;

//we have only one (eg glomodul) group of modules per subsite (eg fwphp) !!
$subsite_dir       = 'fwphp' ; //basename(__DIR__) 
$glomodul_dir      = 'glomodul' ; 
$glomodul_pel_path = $subsite_dir.'/'.$glomodul_dir.'/' ;
$path_rel_help_sw  = $glomodul_pel_path .'help_sw/' ;
$path_rel_test     = $path_rel_help_sw . 'test/' ;

$all_sites_glo_path = $wsroot_path.'zinc/' ;

//http://dev1:8083/, http://sspc1:8083/
$wsroot_url = ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
      . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
      .'/', FILTER_SANITIZE_URL ) ;
$site_url   = $wsroot_url . 'fwphp/www/' ;
$module_url = $wsroot_url . $path_rel_modul .'/' ;

//$readme_edit_url   = QS.'Home/edit/'.$wsroot_path.'readme.md' ;
$readme_md2htm_url = QS.'Home/md2htm/'.$wsroot_path.'readme.md' ;
// a s i d e :
$helpsw_url         = '/'.dirname($path_rel_test).'/' ;

$all_sites_glo_path = $all_sites_glo_path ;
$module_url     = $wsroot_url . $path_rel_modul .'/' ;

$zbig_url       = $wsroot_url .'zbig/';
$zbig_path      = $wsroot_path .'zbig/'; 

//$css_url = $wsroot_url . 'zinc/themes/flex_2cols.css' ;

$img_url        = $wsroot_url . 'zinc/img/' ;
$img_path       = $wsroot_path . 'zinc/img/' ;






