<?php
/**
* http://dev1:8083/fwphp/glomodul/z_examples/?ctrclassname/actmethodname/param1/param2
*     R E Q U E S T  (U R L  A D R E S S)
* Displays :
* $urlarr = ...
* ***** R E Q U E S T  (U R L)  -> ctr, akc, akcparams *****
* IF NEXT TWO RELPATHS ARE EQUAL then we call default ctr, method, no method parameters ([akcpar1idx] => * -1)'; 
* $urlarr['module_relpath']           =fwphp/glomodul/z_examples1       
* $urlarr['module_relpath_requested'] =fwphp/glomodul/z_examples1      
*
*   http://php.net/manual/en/ref.array.php 
*/
    define('QS', '?'); //to avoid web server url rewritting  if (!defined('QS')) define( 'QS', '?' ); 
    define('DS', DIRECTORY_SEPARATOR);
    /**
    *           A D R E S S E S
    */
    $module_towsroot = '../../../' ; //to eg 'J:/awww/www/'
    $module_path = str_replace('\\','/', __DIR__.'/') ; //define('MODULE_DIR', __DIR__) ;
    $wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
    $module_relpath = rtrim(ltrim($module_path, $wsroot_path),'/') ;
    $wsroot_url =  // http://dev1:8083/    //=URL_PROTOCOL or :
      ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
      . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
      .'/', FILTER_SANITIZE_URL ) ;
    $module_relpath_requested = 
      rtrim(rtrim(
         rtrim(ltrim(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL),'/'),'/')
           , basename(__FILE__).QS
      ),'/') ;
    $ctrakcpar = ltrim($module_relpath_requested, $module_relpath.basename(__FILE__).QS) ;
    $ctrakcpar_arr = explode('/', $ctrakcpar);

    $urlarr['module_towsroot'] = $module_towsroot ;
    $urlarr['module_path']     = $module_path ;
    $urlarr['wsroot_path']     = $wsroot_path ;
    $urlarr['module_relpath']  = rtrim(ltrim($module_path, $wsroot_path),'/') ;
    $urlarr['wsroot_url']      = $wsroot_url ;
    $urlarr['module_url']      = $wsroot_url.$module_relpath ;
    $urlarr['module_relpath_requested'] = $module_relpath_requested ;
    $urlarr['$ctrakcpar']      = $ctrakcpar ;
    if($ctrakcpar_arr[0]) {
      $urlarr['ctrakcpar_arr'] = $ctrakcpar_arr ;}
    else { //Defaults :  0=ctr, 1=akc, 2=first_akcparam (= -1 means no method parameters)
      $urlarr['ctrakcpar_arr'] = ['Home_C', 'index', '-1'] ;
    }

    //print '<pre>$urlarr='; print_r($urlarr); print '</pre>';
?>

<!DOCTYPE HTML>
<html lang="hr-HR"><head><title>EXAMPLES</title><meta charset="utf-8">
  <link rel="shortcut icon" href="/zinc/img/favicon.ico">
  <link type="text/css" rel="stylesheet" media="all" href="/zinc/themes/simplest.css" />
  <style></style><!--script src="utl_inc.js"></script-->
</head><body>  <h2>Tests parse URL query string</h2>

     <!--              2. izbornik 2.redak (Banner)                -->
    <div id="hMenu">
      <ul>
        <li id="frst">

          <a href="?ctrclassname/actmethodname/param1/"
             title='ctr is default class (Home_C), act is default method (index) first actparam is -1 meaning "no actparams"'>ctr, akc, one akcparam are in URL
          </a>
          &nbsp; 
          <a href="?"
             title='ctr is default class (Home_C), act is default method (index) first actparam is -1 meaning "no actparams"'>No ctr, akc, akcparams in URL
          </a>

        </li>
      </ul>
    </div>

<pre>

$urlarr = <?=var_dump($urlarr)?>

<br />***** R E Q U E S T  (U R L)  -> 0=ctr, 1=akc, 2=firstakcparam *****
IF NEXT TWO RELPATHS ARE EQUAL then we call default ctr, method, no method parameters ([akcpar1idx] => -1)
$urlarr['module_relpath']           =<?=print_r($urlarr['module_relpath'])?>
<br />$urlarr['module_relpath_requested'] =<?=print_r($urlarr['module_relpath_requested'])?>
      <!-- /*parse_url($uri)=Array
        (
            [scheme] => http
            [host] => dev1
            [port] => 8083
            [path] => /
        ) */ -->
</pre>
