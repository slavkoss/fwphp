<?php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\site_home\www ;
use B12phpfw\core\zinc\Config_allsites ;
//use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_admin;  //to Login_ Confirm_ SesUsrId


class Home_ctr extends Config_allsites
{
  public function __construct(object $pp1)
  {
    $DateTime = strftime( "%Y.%m.%d %H:%M:%S", time() );
                        if ('') { self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           //,'self::$d bi'=>self::$dbi
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?');
    /**
    * ROUTING TBL - module links, (IS OK FOR MODULES IN OWN DIR) key-keyvalue pairs :
    *  ------------------------------------------------------------------------------
    *  LINK ALIAS IN VIEW SCRIPT (eg ldd) => HOME METHOD TO CALL (eg del_row_do)
    *  ------------------------------------------------------------------------------
    * LINK ALIAS ldd = urlqrystring_part1 = $pp1->ldd = QS.'i/del_row_do/id/', 
    *     last part $id knows view script, so URLqry='i/del_row_do/id/'.$id, 
    * ALL VIEWS LINKS OF MODULE SHOULD BE HERE.
    * If link in view is not here : Error 403, Access forbidden! Undefined property in URL.
    */
    $pp1_module = [ 
      'LINK ALIAS => HOME METHOD TO CALL' => '~~~~~in view script eg href = $pp1->login calls QS."i/login/"~~~~~'
      //ALL VIEWS LINKS OF MODULE SHOULD BE HERE (view script knows last part) :
      //$pp1->urlqrystringpart1_name => part1 of urlqrystring (last part is in view script!)
      ,'home_mnu'   => QS.'i/home/'
      //link $pp1->ldd.$id in view script admins.php calls del_row_do method here :
      ,'sitehome'   => QS.'i/sitehome/' //$pp1->sitehome
      // -------------------------
      ,'loginfrm' => QS.'i/loginfrm/'
      ,'login'    => QS.'i/login/' 
      ,'logout'   => QS.'i/logout/r/i|loginfrm|' //logout & r=redirect
      //
      ,'lnghr'    => QS.'i/setlnghr/'
      ,'lngen'    => QS.'i/setlngen/'
      //
      //             P A G E S :
      ,'mkd'         => QS.'i/mkd/'
      ,'lsweb'       => QS.'i/lsweb/'
      ,'phpmyadmin'  => QS.'i/phpmyadmin/'
      ,'phpmanual'   => QS.'i/phpmanual/'
      //
      ,'msg'         => QS.'i/msg/'
      ,'acxe'        => QS.'i/acxe/'
      ,'examples'    => QS.'i/examples/'
      ,'b_tmplts'    => QS.'i/b_tmplts/'
    ] ;

    //step 3 : fw core calls method in this cls : see home_fn above
    parent::__construct($pp1, $pp1_module);

    //if (isset($_SESSION["UserId"])) { echo 'Admin'; }
    //see Config_allsites.php :  date_default_timezone_set("Europe/Zagreb"); //Asia/Karachi
    //see Autoload.php :  session_start()

    //$lang = $pp1->lang ;
    //If (!isset($_GET['lang']) {$_GET['lang'] = $lang ; }
    //if(!isset($_SESSION['lang'])) { include_ once 'zinc/lang/lang/'. $lang .'.php' ;} 

                if ('') { /* self::jsmsg( [ //basename(__FILE__).' '.
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->uriq'=>$this->uriq
                   ] ) ; */
                   echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                   echo '<pre>$_GET='; print_r($_GET); echo '</pre><br />'; // [d/39] => 
                   echo '<pre>$_POST='; print_r($_POST); echo '</pre><br />'; // [d/39] => 
                   echo '<pre>$this->uriq='; print_r($this->uriq); echo '</pre><br />';
                   // $this->uriq=stdClass Object( [d] => 39 )
                }


  } // e n d  f n  __ c o n s t r u c t





          //******************************************
          //       DISPATCH  M E T H O D S
          // they call other methods or include script
          // CALLED FROM Config_ allsites __c onstruct
          //******************************************
          //$accessor = "get" . ucfirst(strtolower($akc));
  public function call_module_method(string $akc, object $pp1)  //fnname, params
  {
    if ( is_callable(array($this, $akc)) ) { // and method_exists($this, $akc)
      return $this->$akc($pp1) ;
    } else {
      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
      echo 'Home_ ctr method "<b>'. $akc .'</b>" is not callable.' ;
      echo ' See how is created method name in Config_ allsites code snippet c s 0 2. R O U T I N G."' ;
      return '0' ;
    }
  }

  // *************************************************
  // Called own methods when user
  //   - clicks button 
  //   - or enters  U R L in ibrowser adress field
  // *************************************************

  // M E T H O D S  C A L L E D  BY  L I N K S  IN  V I E W  SCRIPTS

  public function sitehome(object $pp1)
  {
    $this->Redirect_to('/');
  }


  public function home_usr(object $pp1)
  {
    $this->home($pp1) ;
  }


  public function home(object $pp1)
  {
    //        M A I N  S I T E  M N U
    $title = 'MNU';
    $css1 = $pp1->shares_url .'themes/bootstrap/styles_blog.css';
    require $pp1->module_path . 'home.php'; //require $pp1->module_path . 'home.php';

  }


  public function mkd(object $pp1)
  {
            if ('1') {self::jsmsg( [ //basename(__FILE__) or  __METHOD__
               __METHOD__ .', line '. __LINE__ .' SAYS'=>'where am I'
            ] ) ; }
    // http://sspc2:8083/fwphp/glomodul/mkd/
    $this->Redirect_to( dirname($pp1->module_url) .'/glomodul/mkd/' ) ;
  }

  public function lsweb(object $pp1)
  {
    $this->Redirect_to( dirname($pp1->module_url) .'/glomodul/lsweb/lsweb.php' ) ;
  }


  public function phpmyadmin(object $pp1)
  {
    $this->Redirect_to( $pp1->wsroot_url .'phpmyadmin' ) ;
  }


  public function phpmanual(object $pp1)
  {
    // http://sspc2:8083/phpmanual/index.html
    // http://sspc2:8083/fwphp/www/shell_exec.php?p=J:\awww\www\0_phpmanual.chm
    $this->Redirect_to( $pp1->wsroot_url .'code_snippets.html' ) ; //see **1
  }


  public function msg(object $pp1)
  {
    // http://sspc2:8083/fwphp/www/
    $this->Redirect_to( dirname($pp1->module_url) .'/glomodul/blog/' ) ;
  }


  public function acxe(object $pp1)
  {
    // http://sspc2:8083/fwphp/www/
    // J:\awww\www\fwphp\glomodul\z_examples\ora11g\ACXE2
    $this->Redirect_to( dirname($pp1->module_url) .'/glomodul/z_examples/ora11g/ACXE2/' ) ;
  }

  public function examples(object $pp1)
  {
    // http://sspc2:8083/fwphp/www/
    // J:\awww\www\fwphp\glomodul\z_examples\ora11g\ACXE2
    $this->Redirect_to(
       dirname($pp1->module_url) .'/glomodul/z_examples/00_index_of_important.php' ) ;
  }


  public function b_tmplts(object $pp1)
  {
    $this->Redirect_to(
       dirname($pp1->module_url) .'/glomodul/z_examples/01_php_bootstrap/bootstrap/' ) ;
  }





  private function setlnghr(object $pp1)
  {
    //echo __METHOD__ .'------------------';
    $pp1->lang = $_GET['lang'] = 'hr' ;
    $this->home($pp1) ;
  }

  private function setlngen(object $pp1)
  {
    $pp1->lang = $_GET['lang'] = 'en' ;
    $this->home($pp1) ;
  }



  private function logout(object $pp1)
  {
    //$this = $dm = domain model = globals for all sites (eg for CRUD...) & for curr.module
    $dm = $this ;
    $Db_user = new Db_user ;
    $Db_user->logout($dm);
  }


  private function loginfrm(object $pp1) //private
  {
    //called from link, Config_ allsites based on url (calling link) calls  f n  l o g i n
    //$p p1  = $t his->g etp('p p1') ;
                if ('') {self::jsmsg( [ //basename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>''
                   ,'aaa'=>'bbb'
                ] ) ; }
      require $pp1->shares_path . 'hdr.php';
      require $pp1->module_path . '../user/login_frm.php';  
      require $pp1->shares_path . 'ftr.php';
  }

  private function login(object $pp1) //private
  {
      $dm = $this ;            //this globals for all sites are for CRUD... !!
      $Db_user = new Db_user ; //tbl mtds and attr use globals for all sites !!
    $Db_user->login($dm, $pp1) ;
  }


  private function Login_Confirm_SesUsrId(object $dm) {
    Tbl_crud_admin::Login_Confirm_SesUsrId();
  }


} // e n d  c l s  


/**
* 1=autol STEP_2=CONF 3=view/rout/disp 4=preCRUD 5=onCRUD
* STEP_3=rout/disp is in parent::__construct : fw core calls method in Home_ctr cls
J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\Home_ctr.php
* Instantiated in i ndex.php 
*
* Home_ ctr cls is router, dispatcher :
* 1. Assigns links for user interactions (module routing table) in home.php
* 2. Calls own method when user clicks link/button in home.php 
*    or any URL is entered in ibrowser adress field
* 3. Own method includes view CRUD scripts h ome.php or c reate.php or r ead.php or ... 
*    (no need for view classes ?) or calls some method or url calls other module i ndex.php
*/

//**1
    /* <div class="col-md-3">
      <a 
      href="shell_exec.php?p=<=realpath($pp1->wsroot_ path.'../').DS>0_phpmanual.chm"
         class="btn btn-primary btn-block" target="_blank"
      >PHP manual</a>
    </div> */

    //wants download : $this->Redirect_to( $pp1->wsroot_url .'0_phpmanual.chm' ) ;
    
    // NOT WORKING: both realpath($pp1->wsroot_ path) and wsroot_url
    //embed src="files/Brochure.pdf" type="application/pdf"
    //><embed src="<=realpath($pp1->wsroot_ path). DS .'0_phpmanual.chm'>" type="application/mshelp" width="100%" height="600px" /><php
    
    // welcome.pdf - ok, phpmanual.chm  NOT WORKING
    //$this->Redirect_to( $pp1->module_url 
    //  .'shell_exec.php?p='.realpath($wsroot_ path.'../../') .DS.'phpmanual.chm' ) ;
