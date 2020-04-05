<?php
/**
* J:\awww\www\fwphp\glomodul\lsweb\index.php
* http://dev1:8083/fwphp/glomodul/lsweb/
* http://dev1:8083/fwphp/glomodul/lsweb/Lsweb.php/?cmd=J:/awww/www/fwphp
*        l s w e b  M O D U L E  S I N G L E  E N T R Y  P O I N T
*/
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

date_default_timezone_set("Europe/Zagreb"); //Asia/Karachi
      $CurrentTime = time();
      $DateTime = strftime("%Y.%m.%d %H:%M:%S",$CurrentTime);
if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { if(session_id() == '') { session_start(); } }
//include 'D bCrud.php'; //include 'D bCrud_module.php'; 

$module_towsroot = '../../../' ; //inet provider docroot - J:\awww\www or ...htdocs or...
//eg J:/awww/www/ :
$wsroot_path = str_replace('\\','/', realpath($module_towsroot)).'/' ; 

      //eg fwphp/glomodul4/blog or .../msg_share or ... :
$path_rel_modul = rtrim(ltrim(str_replace('\\','/', __DIR__ .'/'), $wsroot_path),'/') ;

//    THIS MODULE AND IT`S MODULES_ELEMENTS for  n e w  statements below
//$module_ path=$wsroot_path.$path_rel_modul.'/'; //=module_cls_script_path (CONVENTION!!)
$module_path[]=str_replace('\\','/', __DIR__ ).'/'; //=module_cls_script_path (CONVENTION!!)


$module_arr = [
    'dbg'=>'1'
  , 'module_path'=>$module_path
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'caller'=>[]
  , 'style'=>''
];


require($wsroot_path.'zinc/Autoload.php'); //$module_ path.'Autoload.php'
$module_arr['caller'][] = $path_rel_modul.basename(__FILE__) .', lin='.__LINE__ ; 
$autoloader = new Autoload($module_arr);

$db               = new Lsweb ;  //$xxx = new xxx;
/*
switch (true) {

//       ~~~ i n c l u d e  s c r i p t    . '.php' ~~~
case isset($_GET['i']):   include($_GET['i']); exit(0); break;
//case isset($_GET['login']):  i nclude('login.php'); 

//       ~~~ c a l l  m e t h o d ~~~
//Variable eg $$p contains name of variable (eg db) content of which we want access (=obj.variable)
case isset($_GET['c']): //c=called method
  $obj = isset($_GET['o'])?$_GET['o']:'db' ; 
  $akc = isset($_GET['c'])?$_GET['c']:'index' ; 
  $noparams = '' ; $params_arr_adress = isset($_GET['p'])?$_GET['p']:'noparams';

  $$obj->{$akc}($$params_arr_adress) ; // eg f unction upd_ comments_ stat($db)
         //works $$obj->{$akc}($db) ; or $db->{$akc}($db) ;

  exit(0); break;

//default: include('home.php'); exit(0); break;
} // e n d  s w i t c h    //header("location:f rm.php");
//if (isset($_SESSION["UserId"])) { echo 'Admin'; }
*/

