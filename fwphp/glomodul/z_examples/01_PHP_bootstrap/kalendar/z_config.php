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

    $module_towsroot     = '../../../' ; // from $D IRMODUL
    $wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
    $wsroot_url =  // http://dev1:8083/    //=URL_PROTOCOL or :
      ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
            //URL_DOM AIN  .$_SERVER['REQUEST_URI'] :
          . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
    $module_path = str_replace('\\','/', $dir.'/') ; //define('MODULE_DIR', $dir) ;
    $module_relpath = rtrim(ltrim($module_path, $wsroot_path),'/') ;
    $module_relpath_requested = 
      rtrim(rtrim(
         rtrim(ltrim(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL),'/'),'/')
           , basename(__FILE__).QS
      ),'/') ;
    //$ctrakcpar = ltrim($module_relpath_requested, $module_relpath.basename(__FILE__).QS) ;
    $ctrakcpar = ltrim($module_relpath_requested, $module_relpath.'/'.QS) ;
    $ctrakcpar_arr = explode('/', $ctrakcpar);
    // -1 means no akcmethodparameters :
    if (!isset($ctrakcpar_arr[1])) {$ctrakcpar_arr = ['Home', 'index', '-1'] ;}
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
                        echo '<br />$module_relpath='; print_r($module_relpath); 
                        echo '<br />PATHMODUL_REL='; print_r(PATHMODUL_REL); 
                        echo '<br />$module_relpath_requested='; print_r($module_relpath_requested); 
                        echo '<br />$ctrakcpar=ltrim($module_relpath_requested, $module_relpath.\'/\'.QS)='; print_r($ctrakcpar); 
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


/*
 *     5. F O R M  PROCESSING R O U T I N G  T A B L E
 * is Lookup array for form  a c t i o n s - WAS SEPARATE SCRIPT router.php
 */
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // WAS SEPARATE SCRIPT router.php
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//define('A CTIONS' , array( // php 7, see WEEKDAYS
// f o r m  r o w  p r o c e s s
$show_kalendar = '1' ;
$ACTIONS = array(
'rfrm_proc' => array( //creupdmsg
        'object' => 'home',
        'method' => 'processForm', // processRowCUfrm
        'show_kalendar' => '0'
    ),
'loginusr' => array(
        'object' => 'usercls',
        'method' => 'processLoginForm',
        'show_kalendar' => '0'
    ),
'logoutusr' => array(
        'object' => 'usercls',
        'method' => 'processLogout',
        //'h eader' => 'Location: ../'
        'show_kalendar' => '1'
    )
);


/*
 * Make sure the anti-CSRF t oken was passed and that the
 * requested action exists in the lookup array
 */
                     //echo '<h2>h eader(...1.1</h2>';
                     //if ( isset($_GET['loginusr']) ) {echo "<h2>h eader(...1.1 isset(\$_GET['loginusr']) exit();</h2>"; exit();}

if ( isset($_POST['token'])
     and isset($_POST['action'])
     and isset($ACTIONS[$_POST['action']])
)
{
    if ( $_POST['token'] !== $_SESSION['token'] ) {

      echo '<h2>T o k e n  does not match</h2>'; exit(); }

    $akc = $ACTIONS[$_POST['action']];
    //        ~~~~~~~~~~~~~
    // 6. D I S P A T C H  clses calls according u r l params & routing table
    //        ~~~~~~~~~~~~~
               //echo '<pre>$akc='; print_r($akc); echo '</pre>';
    $obj    = new $akc['object']();
    $method = $akc['method'];

    //if ( TRUE === $msg=$obj->$method() ) //works with jquery, not zepto
    if ( $msg = $obj->$method() )
    {
      //echo '<h2>h eader(...1.3</h2>';
      //h eader($akc['h eader']); exit;
      if ( isset($_POST['action']) and $_POST['action'] == 'logoutusr' )
      { header('Location: ./'); exit; }
    }
    // If an error occured, output e r r m s g and end execution
    else { die ( $msg ); }
} else { // D I S P A T C H  other u r l params = i n c l u d e  s c r i p t s
                        if ('1') {
                        echo '<pre>'; 
                        echo '<b>'.Basename(__FILE__) .'</b> line '.__LINE__.' (in '.__FILE__.') SAYS : '; 
                        echo '<br />$_SESSION[\'token\']='; print_r($_SESSION['token']); 
                        echo '<br />$module_towsroot='; print_r($module_towsroot); 
                        echo '<br />$wsroot_path = ~realpath($module_towsroot)='; print_r($wsroot_path); 
                        echo '<br />$wsroot_url=from $_SERVER[\'HTTPS\'] and HTTP_HOST ='; print_r($wsroot_url); 
                        echo '<br />$module_path='; print_r($module_path); 
                        echo '<br />$module_relpath='; print_r($module_relpath); 
                        echo '<br />PATHMODUL_REL='; print_r(PATHMODUL_REL); 
                        echo '<br />$module_relpath_requested='; print_r($module_relpath_requested); 
                        echo '<br />$ctrakcpar=ltrim($module_relpath_requested, $module_relpath.\'/\'.QS)='; print_r($ctrakcpar); 
                        echo '<br />count($ctrakcpar_arr)='; print_r(count($ctrakcpar_arr)); 
                        echo '<br />$ctrakcpar_arr='; print_r($ctrakcpar_arr); 
                        echo '</pre>';
                        }
    // eg http://dev1:8083/fwphp/glomodul/kalendar/?//i/user_login_frm
    //if ( isset($_GET['i']) ) { include_once $_GET['i'].'.php'; } //'user_login_frm.php'
    //if ( isset($_GET['i']) ) { include_once $_GET['i'].'.php'; } //'user_login_frm.php'
}





  if ( isset($ACTIONS['show_kalendar']) ) {$show_kalendar = $ACTIONS['show_kalendar'] ;}
  if ( $show_kalendar )
  {
    //http://dev1:8083/fwphp/glomodul/kalendar/?clsname/clsakcname/m/2019-01-05
    //NOT: http://dev1:8083/fwphp/glomodul/kalendar/?m=2019-02-01 01:00:00 !!!
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // 7. WAS IN INDEX.PHP :
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // Redirect to the main index if the t oken/a ction is invalid
    // Mdl Load month calendar (home.php)
    $default_month = date('Y-m-d') ; //.' 01:00:00'  '2019-02-01 01:00:00'
    if (isset($ctrakcpar_arr[3]) and $ctrakcpar_arr[2] == 'm')
      {$requested_month = $ctrakcpar_arr[3];} 
    else {
      //header('Location: ?Home//m/'.$default_month) ;  exit(0);
    }

    $cal = new Home($requested_month);  //$cal = n ew Home('2019-10-05 01:00:00');

    // View
    $page_title = "Poruke kalendar mySQL";
    $fmte = 'css';
    $css_files = array("style.$fmte", "admin.$fmte", "ajax.$fmte");

    include_once 'inc/hdr.php'; ?>

    <div id="content">
      <?php echo $cal->outMonth() // Display calendar HTML ?>
    </div>
    <p><?php echo isset($_SESSION['user'])
        ? "Prijavljen je korisnik: ".$_SESSION['user']['name'] : "Niste prijavljeni!"; ?></p>
    <!-- end #content -->

    <?php include_once 'inc/ftr.php';
    //if('1') { index_help(); }

  }


?>