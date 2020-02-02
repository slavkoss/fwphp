<?php
// J:\awww\apl\dev1\afwww\glomodul\msg\conf_01module.php
use B12phpfw\afcls\fw as core ;
//error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
if (!defined('TEST')) define('TEST', '1');

//nr dirs below web server docroot +1, eg afwww/glomodul/msg +1 
$ctrlevel = 3;
define( 'UP_TO_SITEDOCROOT', rtrim(str_repeat('../', $ctrlevel), '/') ); //dev1 dir
  //because if inet provider hosting we do not know webserverdocroot dir name !!!
//define('UP_TO_APLDOCROOT', '');    // this dir
//define('UP_TO_MODULEDOCROOT', '');    // this  dir
define('URL_MODULE', 'afwww/glomodul/ACXE2');
define('URL_MODULE_HOME', UP_TO_SITEDOCROOT.'/'.URL_MODULE.'/');
define('URL_SITE', UP_TO_SITEDOCROOT.'/'.'afwww'.'/');    // this  dir

  //if (file_exists('trace_log.html')) {
  if ($fp = fopen('trace_log.html', 'w')) { 
    if (flock($fp, LOCK_EX)) { // exclusive lock
      fwrite($fp, '<br /><br /><br /><br /><br /><br /><h1>Debugg trace info</h1>'); 
      fclose($fp); } } 

      
// ****************************************** //
// ******* 1. p r i n t _ r  formated ******* //
//function prf($n1, $v1){
//  echo '<pre>'.$n1.' ='; print_r($v1); echo '</pre>';
//}
require_once UP_TO_SITEDOCROOT.'/afinc/_02autoload.php'; 


// ********** REPOSITORY ARRAY **********
//require_once UP_TO_SITEDOCROOT.'/afcls/fw/_03SetGET.php';
$rps = new core\_03SetGET();

$time_start = explode(" ", microtime()); $time_start = $time_start[0] + $time_start[1];
$rps->time_start = $time_start ;

//$rps->test = '1' ; // better in conf_01module than in conf !!
$rps->ctrlevel = $ctrlevel;
$rps->rblk = 3 ; //rows in record block
$rps->appname = 'Socnet';
$rps->csspath = UP_TO_SITEDOCROOT . '/afinc/css';
//$rps->css_files=[]; Not needed:(why ? see J:\awww\apl\dev1\afinc\_tpl_main.html)
  //[$rps->csspath.'/2_4_col_main.css', $rps->csspath.'/2_4_col_home.css'];
$rps->imgpath = UP_TO_SITEDOCROOT . '/afinc/img';
//
//$rps_mainidx = $rps ; //page globals & property palette (like in Oracle form)
$rps->module_rootdir = __DIR__ ;
$rps->module_ctr_namespace = ''; //call Home cls 'B12phpfw\glomodul\user\\'
$rps->cnct_params_script = UP_TO_SITEDOCROOT.'/afcls/db/_dbkon_tema_zwamp.php'; //$cnct
// ********** E N D  REPOSITORY ARRAY **********

require_once UP_TO_SITEDOCROOT.'/'.'afinc'.'/'.'_03conf.php';
$rps->END_01 = 'conf_01module.php';