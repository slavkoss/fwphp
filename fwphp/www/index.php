<?php
// J:\awww\www\fwphp\www\index.php
namespace B12phpfw\site_home\www ;
use B12phpfw\core\zinc\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_towsroot = '../../' ;  //to web server doc root or our doc root by ISP
//$app_glomodul_dir_path = str_replace('\\','/', dirname(__DIR__) ) .'/glomodul';

//MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
$pp1 = (object)
[   'dbg'=>'1', 'stack_trace'=>[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]
                             // or $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'7.0.4.0 Mnu', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3 F o r  A u t o l o a d - dirnames we  i n c  clsscripts from
  , 'module_path_arr'=>[
       str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path
      //dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
      //, $app_glomodul_dir_path.'/some_dirname_we_inc_clsscript_from/'
  ] 
] ;

//2. global cls loads classes scripts automatically
require($pp1->module_towsroot.'zinc/Autoload.php');
new Autoload($pp1);
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }

//3. process request from ibrowser & send response to ibrowser :
//1=autol STEP_2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
//STEP_3=rout/disp is in parent::__construct : fw core calls method in Home_ctr cls
$db = new Home_ctr($pp1) ; //also instatiates all higher cls-es : Config_ allsites


exit(0);








/*

require('adresses.php');
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .''; 
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '</pre>'; 
                  }

//if(!isset($_SESSION['l ang'])) { include_once '/zinc/l ang/l ang/hr.php'; }

switch (true) {
case isset($_GET['hlp1']): $title ='FAQ'; include('help.php');
  break;
case isset($_GET['hlp2']): $title ='CSSplay';
  include($wsroot_path.$path_rel_examples.'05_predlozak_cssplay_3cols&Rside_tableles.php');
  break;
case isset($_GET['hlp3']): $title ='phpenthusiast';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/index.php');
  break;
case isset($_GET['hlp4']): $title ='DM, DDD';
  include($wsroot_path.$path_rel_help .'OOP_help/index.php');
  //include(realpath($path_rel_help) .'OOP_help/index.php');
  break;
// ------------- 
case isset($_GET['b_tmplts']): $title ='Bootstrap tmplts HOME';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/index.php');
  break;
case isset($_GET['b_tmplts_socnet']): $title ='Bootstrap tmplts Socnet';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/03socnet/index.php');
  break;
case isset($_GET['b_tmplts_blog']): $title ='Bootstrap tmplts Blog';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/04blog/index.php');
  break;
case isset($_GET['b_tmplts_site']): $title ='Bootstrap tmplts Site';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/05site/index.php');
  break;
case isset($_GET['b_tmplts_portfoligrid']): $title ='Bootstrap tmplts Portfoligrid';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/06portfoligrid/index.php');
  break;
//
case isset($_GET['b_tmplts_01help']): $title ='Bootstrap tmplts Help module';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/01help/index.php');
  break;
case isset($_GET['b_tmplts_02help']): $title ='Bootstrap tmplts Help us';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/02help/index.php');
  break;
// ------------- 
// ------------- 
//case isset($_GET['adr']): $title ='URL-s';
  //include($wsroot_path.$site_dir.$glomodul_dir .'adrs/index.php');
  //break; 
default: 
  $title = 'HOME'; include('home.php'); 
  break;
} // e n d  s w i t c h    //header("location:f rm.php");


*/

/* 
if (isset($_SESSION["UserId"])) { echo 'Admin'; }


////////////////// in .html :

<!--script type="text/javascript">window.location = "https://notepad-plus-plus.org/downloads/";</script>
<script type="text/javascript">window.location = "https://code.visualstudio.com/";</script>
<script type="text/javascript">window.location = "http://brackets.io/";</script>
<script type="text/javascript">window.location = "https://www.sublimetext.com/";</script-->


*/
