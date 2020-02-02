<?php
// J:\awww\www\fwphp\www\index.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

date_default_timezone_set("Europe/Zagreb"); //Asia/Karachi
      $CurrentTime = time();
      $DateTime = strftime("%Y.%m.%d %H:%M:%S",$CurrentTime);
if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { if(session_id() == '') { session_start(); } }

require('adresses.php');
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .''; 
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '</pre>'; 
                  }
//include_once '/zinc/lang/lang/hr.php'; 
include_once($all_sites_glo_path.'lang/lang.php');
//if(!isset($_SESSION['lang'])) { include_once '/zinc/lang/lang/hr.php'; }

switch (true) {
case isset($_GET['h1']): $title ='FAQ'; include('help.php');
  break;
case isset($_GET['h2']): $title ='CSSplay';
  include($wsroot_path.$path_rel_examples.'05_predlozak_cssplay_3cols&Rside_tableles.php');
  break;
case isset($_GET['h3']): $title ='phpenthusiast';
  include($wsroot_path.$path_rel_examples .'01_PHP_bootstrap/index.php');
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


exit(0);

//if (isset($_SESSION["UserId"])) { echo 'Admin'; }
