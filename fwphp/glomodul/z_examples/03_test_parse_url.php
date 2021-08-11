<?php
/**
*          USER ENTERED  U R L  IS  R E Q U E S T 
* J:\awww\www\fwphp\glomodul\z_examples\03_test_parse_url.php
* http://dev1:8083/fwphp/glomodul/z_examples/03_test_parse_url.php?i/SOME_METHOD/param1/PARAM1VALUE
* U R L is page webadress,  i/SOME_METHOD/param1/PARAM1VAL are page parameters
* in form key/keyvalue
*
* Routing is extract key and keyvalue pairs from  U R L (behind "?")
* Dispatching is call SOME_METHOD in some Home_ctr of some module,
* or if PATH/SOME_METHOD.PHP include this script
*
*   http://php.net/manual/en/ref.array.php 
*/
define('QS', '?'); //to avoid web server url rewritting  if (!defined('QS')) define( 'QS', '?' ); 
define('DS', DIRECTORY_SEPARATOR);
/**
*           A D R E S S E S
*/
$module_towsroot = '../../../' ; //eg to wsroot ='J:/awww/www/'
// J:/awww/www/ :
$wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
$wsroot_url =  // http://dev1:8083/    //=URL_PROTOCOL or :
  ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
  . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
  .'/', FILTER_SANITIZE_URL ) ;

// J:/awww/www/fwphp/glomodul/z_examples/ :
$module_path = str_replace('\\','/', __DIR__.'/') ;
// fwphp/glomodul/z_examples :
$module_relpath = rtrim(str_replace($wsroot_path,'', $module_path),'/') ;
     //rtrim(ltrim($module_path, $wsroot_path),'/') ;

// R E Q U E S T :
// /fwphp/glomodul/z_examples/03_test_parse_url.php?i/SOME_METHOD/param1/PARAM1VALUE :
//error on Linux : $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
//Error on win: $REQUEST_URI = filter_input($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING);
$REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;

$REQUEST_URI_arr = explode(QS, $REQUEST_URI) ; 
$module_relpath_requested = rtrim(ltrim(dirname($REQUEST_URI_arr[0]),'/'),'/');

$REQUEST_URI_qrystring_arr = [] ;
if (isset($REQUEST_URI_arr[1])) { //there is some key-value pairs  behind "?" char :
  // $REQUEST_URI_arr[1] is uri_qrystring
  $REQUEST_URI_qrystring_arr = explode('/', $REQUEST_URI_arr[1]) ;
}


$urlarr['module_towsroot'] = $module_towsroot ; //eg '../../../'

$urlarr['_____wsroot_path_label']='str_replace(\'\\\',\'/\', realpath($module_towsroot) .\'/\') ' ;
$urlarr['wsroot_path']     = $wsroot_path ;

$urlarr['_____wsroot_url_label'] = 'From HTTPS, HTTP_HOST' ;
$urlarr['wsroot_url']      = $wsroot_url ;

$urlarr['_____module_path_label'] = 'str_replace(\'\\\',\'/\', __DIR__.\'/\')' ;
$urlarr['module_path']     = $module_path ;

$urlarr['_____module_relpath_label']  = 'rtrim(str_replace($wsroot_path,\'\', $module_path,\'/\')' ;
$urlarr['module_relpath'] = $module_relpath ;

$urlarr['_____module_url_label'] =  '$wsroot_url.$module_relpath.\'/\'' ;
$urlarr['module_url']       =  $wsroot_url.$module_relpath.'/' ;
// R E Q U E S T :
$urlarr['_____module_relpath_requested_label'] = 'rtrim(ltrim($REQUEST_URI_arr[0],\'/\'),\'/\')' ;
$urlarr['module_relpath_requested']  = $module_relpath_requested ;


// REQUEST_URI_qrystring_arr=[key1,val1, key2,val2...] 
// transform to $uriq=[key1=>val1,...] pairs :
//Next statement means url is module's url and we call home() method in Home_ctr :
$uriq = ['i' => 'home'] ; //$uriq = [] ;

for ( $ii = 0 ; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
      $ii < count($REQUEST_URI_qrystring_arr) ; //expr2 is evaluated at iteration begin
      $ii++ ) : //expr3 is evaluated at iteration end
{
  if (isset($REQUEST_URI_qrystring_arr[$ii + 1])) {
    $uriq[$REQUEST_URI_qrystring_arr[$ii]] = $REQUEST_URI_qrystring_arr[++$ii] ;
  }
} endfor;
?>



<!DOCTYPE HTML>
<html lang="hr-HR"><head><title>EXAMPLES</title><meta charset="utf-8">
  <link rel="shortcut icon" href="/zinc/img/favicon.ico">
  <!--link type="text/css" rel="stylesheet" media="all" href="/zinc/themes/simplest.css" /-->
  <style></style><!--script src="utl_inc.js"></script-->
</head>

<body>  <b>Tests parse URLqueryString (in URL after "?")</b>

  <!--              2. izbornik 2.redak (Banner)                -->
  <div id="hMenu">
    
          <a href="?i/SOME_METHOD/param1/PARAM1VALUE"
             title=''>
               <?php
               if ($uriq['i'] == 'home') {
                    echo 'ctr, akc, one akcparam are in URL';
               } else { echo '<b>ctr, akc, one akcparam are in URL--- THIS LINK WAS CLICKED</b>'; } ?>
          </a>
          <br />http://dev1:8083/fwphp/glomodul/z_examples/03_test_parse_url.php?QRY
          <br />B12phpfw QRY  =i/SOME_METHOD/param1/PARAM1VALUE
                &nbsp; &nbsp; <b>i means "include script or call Home_ctr method"</b>
          <br />Orher fw-s QRY=ctrclassname/actmethodname/param1value/

          &nbsp; &nbsp; &nbsp; <br /><br />
          <a href="?"
             title=''>
               <?php
               if ($uriq['i'] == 'home') {
                   echo '<b>No ctr, akc, akcparams in URL --- THIS LINK WAS CLICKED</b>';
               } else { echo 'No ctr, akc, akcparams in URL'; } ?>
          </a>



    <h3>REQUEST (U R L) query string IS NOT  ctr, akc, firstakcparamValue...</h3>
    <pre>
      1. $REQUEST_URI = <?php print_r($REQUEST_URI); ?><br />
         =filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL)
      
      2. $urlarr = <?php print_r($urlarr); ?>
      
      3. $REQUEST_URI_qrystring_arr = <?php print_r($REQUEST_URI_qrystring_arr); ?>
      
      4. Transformed REQUEST_URI_qrystring_arr is $uriq = <?php print_r($uriq); ?>

    </pre>


    <h3>We call Home_ctr method in $uriq['i']</h3>
    IF NEXT TWO RELPATHS ARE NOT EQUAL then called method is in some other module Home_ctr (in some other dir) :
    <pre>
    $urlarr['module_relpath']           =<?php print_r($urlarr['module_relpath']); ?>
    <br />
    $urlarr['module_relpath_requested'] =<?php print_r($urlarr['module_relpath_requested']);?>
          <!-- /*parse_url($uri)=Array
            (
                [scheme] => http
                [host] => dev1
                [port] => 8083
                [path] => /
            ) */ -->
    </pre>



    <pre>
ERROR :
http://phporacle.eu5.net/fwphp/glomodul/z_examples/03_test_parse_url.php?i/SOME_METHOD/param1/PARAM1VALUE


      1. $REQUEST_URI =       
      2. $urlarr = Array
(
    [module_towsroot] => ../../../
    [_____wsroot_path_label] => str_replace('\','/', realpath($module_towsroot) .'/') 
    [wsroot_path] => /srv/disk16/3266814/www/phporacle.eu5.net/
    [_____wsroot_url_label] => From HTTPS, HTTP_HOST
    [wsroot_url] => http://phporacle.eu5.net/
    [_____module_path_label] => str_replace('\','/', __DIR__.'/')
    [module_path] => /srv/disk16/3266814/www/phporacle.eu5.net/fwphp/glomodul/z_examples/
    [_____module_relpath_label] => rtrim(str_replace($wsroot_path,'', $module_path,'/')
    [module_relpath] => fwphp/glomodul/z_examples
    [_____module_url_label] => $wsroot_url.$module_relpath.'/'
    [module_url] => http://phporacle.eu5.net/fwphp/glomodul/z_examples/
    [_____module_relpath_requested_label] => rtrim(ltrim($REQUEST_URI_arr[0],'/'),'/')
    [module_relpath_requested] => 
)
      
      3. $REQUEST_URI_qrystring_arr = Array
(
)
      
      4. Transformed REQUEST_URI_qrystring_arr is $uriq = Array
(
    [i] => home
)

    

We call Home_ctr method in $uriq['i']
IF NEXT TWO RELPATHS ARE NOT EQUAL then called method is in some other module Home_ctr (in some other dir) :

    $urlarr['module_relpath']           =fwphp/glomodul/z_examples    

    $urlarr['module_relpath_requested'] =          
    




    </pre>




    </div>





<?php
echo '<br /><br /><hr />'; include(dirname(dirname(dirname(__DIR__))) .'/zinc/showsource.php');