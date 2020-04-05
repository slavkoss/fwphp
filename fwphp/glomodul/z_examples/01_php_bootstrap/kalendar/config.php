<?php
//J:\awww\apl\dev1\04knjige\kalendar\kal\inc\config.php
//declare(strict_types=1); // php 7
//~~~~~
//***** 1. ENABLE SESSIONS IF NEEDED
            // Avoid warning if sess. is already active
if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { if(session_id() == '') { session_start(); } }
            //$status = session_status(); //no active session :
            //if ($status == PHP_SESSION_NONE) {session_start();}
            //$_SESSION = [] ;
//~~~~~
$dir = __DIR__ ; 
//***** 2. GENERATE AN ANTI-CSRF T OKEN IF DOESN'T EXIST
if (!isset($_SESSION['token'])) {$_SESSION['token']=sha1(uniqid((string)mt_rand(),TRUE));}
//~~~~~

//***** 3. DEFINE ADRESSES (CONSTANTS) **********************
    if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

    $module_towsroot     = '../../../../' ; // from $D IRMODUL
    $wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
    $wsroot_url =  // http://dev1:8083/    //=URL_PROTOCOL or :
      ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
            //URL_DOM AIN  .$_SERVER['REQUEST_URI'] :
          . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
    $module_path = str_replace('\\','/', $dir.'/') ;
    //has error: $module_relpath = rtrim(ltrim($module_path, $wsroot_path),'/') ;
    $module_relpath = rtrim(str_replace($wsroot_path, '', $module_path),'/') ;
    
    //$module_relpath_requested = str_replace($module_relpath.'/'.QS, '', $_SERVER['REQUEST_URI']) ;
    $ctrakcpar = ltrim(str_replace($module_relpath.'/'.QS, '', $_SERVER['REQUEST_URI']),  '/') ;
    //has error: $ctrakcpar = ltrim($module_relpath_requested, $module_relpath.basename(__FILE__).QS) ;
    //$ctrakcpar = str_replace($module_relpath, '', $module_relpath_requested) ;
    //$ctrakcpar = str_replace('/'.QS, '', $ctrakcpar) ;
    $ctrakcpar_arr = explode('/', $ctrakcpar.'/');
    //if 0 or '0' instead NULL :  will remove 0 and '0'
    $ctrakcpar_arr = array_diff($ctrakcpar_arr, array(NULL)) ; // NULL / FALSE / ''
                          /* foreach($ctrakcpar_arr as $k => $v) { 
                              if($v === '') { 
                                  print('<br />'.$k.'='.$v);
                                  //unset($ctrakcpar_arr[$k]); 
                              } else $tmp=[$v];
                          } //var_dump($tmp);
                          $ctrakcpar_arr = $tmp ; */
                          //$ctrakcpar_arr = array_map('trim', $ctrakcpar_arr);
                          //$ctrakcpar_arr = array_filter($ctrakcpar_arr, 'strlen'); 
    
    // -1 means no akcmethodparameters :
    if (!isset($ctrakcpar_arr[0])) {$ctrakcpar_arr = ['Home', 'index', '-1'] ;}
    //else // $ctrakcpar_arr[1] is akcmethodname
    //if (isset($ctrakcpar_arr[2])) // it is first akcmethodparameter name

    //WEB SERVER DOC ROOT eg J:\awww\www or J:\awww\apl\fw\public
    if (!defined('PATHWSROOT')) define('PATHWSROOT',
           str_replace(DS,'/',realpath($module_towsroot))
    ); //if (!defined('PATHWSROOT')) define('PATHWSROOT', $_SERVER['DOCUMENT_ROOT']);


    //APP DOC ROOT eg virt.host J:\awww\www or J:\awww\apl\fw\public
    //dirname fn returns oper sys dir separator !!
    if (!defined('PATHMODUL')) { define('PATHMODUL', $dir); }
    if (!defined('PATHINC_MODUL')) { define('PATHINC_MODUL', PATHMODUL.'/inc'); }

    //RELATIVE PATHS
    if (!defined('PATHMODUL_REL')) { define('PATHMODUL_REL',
      str_replace( PATHWSROOT,'', str_replace(DS,'/', PATHMODUL) )
    ); }
        if (!defined('URLMODUL_CSS')) { define('URLMODUL_CSS', PATHMODUL_REL.'/css'); }
        if (!defined('URLMODUL_JS'))  { define('URLMODUL_JS',  PATHMODUL_REL.'/js'); }
//***** E N D  3. DEFINE ADRESS CONSTANTS ********************
                        if ('1') {
                        echo '<pre>'; 
                        echo '<b>'.Basename(__FILE__) .'</b> line '.__LINE__.' (in '.__FILE__.') SAYS : '; 
                        echo '<br />$_SESSION[\'token\']='; print_r($_SESSION['token']); 
                        echo '<br />$module_towsroot='; print_r($module_towsroot); 
                        echo '<br />$wsroot_path = ~realpath($module_towsroot)='; print_r($wsroot_path); 
                        echo '<br />$wsroot_url=from $_SERVER[\'HTTPS\'] and HTTP_HOST ='; print_r($wsroot_url); 
                        echo '<br />$module_path='; print_r($module_path); 
                        echo '<br /><br />$module_relpath='; print_r($module_relpath); 
                        //echo '<br />PATHMODUL_REL='; print_r(PATHMODUL_REL); 
                        echo '<br />$_SERVER[\'REQUEST_URI\']='; print_r($_SERVER['REQUEST_URI']); 
                        //echo '<br />$module_relpath_requested='; print_r($module_relpath_requested); 
                        echo '<br />$ctrakcpar=eliminate module_ relpath in REQUEST_URI='; print_r($ctrakcpar); 
                        echo '<br />count($ctrakcpar_arr)='; print_r(count($ctrakcpar_arr)); 
                        echo '<br />$ctrakcpar_arr='; print_r($ctrakcpar_arr); 
                        echo '</pre>';
                        }


/**
 *  ***** 4. A U T O - L O A D  F N FOR C L A S S E S  S C R I P T S
 * @param string $fqcn (=$class_name)
 * __autoload() is deprecated, use spl_autoload_register() instead
 */
  //protected function register_autoload()
  //{
  spl_autoload_register(
  function($fqcn) //Full Qualified Class Name eg B12phpfw\fwphp\www4 (B12phpfw=PATHWSROOT)
  {
      try {
        //4 $class_file = 'includes/classes/' . strtolower($fqcn) . '.php';
        //dbkoncls msgcls usercls home
        // eg fqcn = h o m e :
        $class_file = PATHMODUL.DS.'inc'.DS.strtolower($fqcn).'.php';
        //$class_file = PATHMODUL.DS.'inc'.DS.strtolower($fqcn).'.class.uklj.php';
        if (is_file($class_file)) { require_once $class_file;
        } else { throw new Exception("Unable to load class $fqcn in file $class_file."); }
      } catch (Exception $e) { echo 'Exception caught: ',  $e->getMessage(), "\n"; }
  }); // e n d  f n  c l o s u r e
              //or register autoloadfn :  spl_autoload_register('loadClsScript');
              /*
              function __autoload($class_name)
              {
                  $filename = PATHMODUL.DS.'inc'.DS.strtolower($class_name).'.class.uklj.php';
                  if ( file_exists($filename) )
                  {
                      include_once $filename;
                  } else echo __FILE__ . ' SAYS: Ne postoji '.$filename ;
              }
              */



    //***** MDL INCLUDE DBCON INFO & DEFINE DBCON CONSTANTS
    // Define  D B  constants
    include_once 'inc/dbkon_param.php';
    foreach ( $C as $name => $val ) { define($name, $val); }


/** ********************************************
*   coding step cs04.
*   5. C O N T R O L L E R  (se also DbCrud_ module, public $pp1 = [...)
*      & DISPATCHER (NO http JUMPS, only includes $ _GET['i']  & calls $ _GET['c'])
*   CONVENTION!! : $_GET['i'] contains script (path) to include, ee NO http JUMPS
******************************************** */
$displ_home = '';
switch (true) {

//       ~~~ i n c l u d e  s c r i p t    . '.php' ~~~
case $ctrakcpar_arr[0] == 'loadscript': //isset($ctrakcpar_arr[0]) and 
   // http://dev1:8083/fwphp/glomodul/kalendar/?loadscript/user_login_frm
   if (isset($ctrakcpar_arr[2]) and $ctrakcpar_arr[2] == 'event_id') 
       {$event_id = $ctrakcpar_arr[3];}
   include($ctrakcpar_arr[1].'.php');
   //exit(0);
   break;

//       ~~~ c a l l  m e t h o d ~~~
//Variable eg $$obj contains name of variable (eg Usercls) content of which we want access
//isset($ctrakcpar_arr[0]) and 
case $ctrakcpar_arr[0] == 'login': 
  // http://dev1:8083/fwphp/glomodul/kalendar/?loadscript/user_login_frm
  // http://dev1:8083/fwphp/glomodul/kalendar/?login/
  $Usercls = new Usercls ; $obj = 'Usercls' ; $akc = 'processLoginForm' ; 
  $$obj->{$akc}() ; //works $Usercls->processLoginForm() ;  $$obj->{$akc}($db) ; or $db->{$akc}($db) ;
  $displ_home = '1';
  //exit(0);
  break;

case $ctrakcpar_arr[0] == 'odjava': 
  // http://dev1:8083/fwphp/glomodul/kalendar/?odjava
  $Usercls = new Usercls ; $obj = 'Usercls' ; $akc = 'processLogout' ; 
  $$obj->{$akc}() ; //works $Usercls->processLoginForm() ;  $$obj->{$akc}($db) ; or $db->{$akc}($db) ;
  $displ_home = '1';
  //exit(0);
  break;
case $ctrakcpar_arr[0] == 'creupdmsg': 
//case isset($_POST['action']) and  $_POST['action'] == 'creupdmsg': 
  // http://dev1:8083/fwphp/glomodul/kalendar/?loadscript/user_login_frm
  // http://dev1:8083/fwphp/glomodul/kalendar/?login/
  $Home = new Home ; $obj = 'Home' ; $akc = 'processRowCUfrm' ; 
  $$obj->{$akc}() ;
  $displ_home = '1';
  //exit(0);
  break;
/*
case isset($_GET['c']): //c=called method
  $obj = isset($_GET['o'])?$_GET['o']:'db' ; 
  $akc = isset($_GET['c'])?$_GET['c']:'index' ; 
  $noparams = '' ; $params_arr_adress = isset($_GET['p'])?$_GET['p']:'noparams';

  $$obj->{$akc}($$params_arr_adress) ; // eg f unction upd_ comments_ stat($db)
         //works $$obj->{$akc}($db) ; or $db->{$akc}($db) ;

  //exit(0);
  break;
*/

default: // s h o w  k a l e n d a r    include('home.php');
   $displ_home = '1';
   //exit(0); 
   break;
} // e n d  s w i t c h    //header("location:f rm.php");


if ($displ_home) {
   $default_month = date('Y-m-d') ; //.' 01:00:00'  '2019-02-01 01:00:00'
   if (isset($ctrakcpar_arr[1]) and $ctrakcpar_arr[0] == 'm')
   {
     $requested_month = $ctrakcpar_arr[1];
                        if ('1') {
                        echo '<pre>'; 
                        echo '<b>'.Basename(__FILE__) .'</b> line '.__LINE__.' (in '.__FILE__.') SAYS : '; 
                        echo '<br />$ctrakcpar_arr[1]='; print_r($ctrakcpar_arr[1]); 
                        echo '</pre>';
                        }
     include('read_tbl.php') ;
   }
   else { 
      header('Location: ?m/'.$default_month) ;
      exit(0);
   }
}

exit(0); 
