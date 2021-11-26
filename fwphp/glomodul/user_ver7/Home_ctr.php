<?php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_admin;  //to Login_ Confirm_ SesUsrId
//use B12phpfw\module\dbadapter\user\DB_user ; //to Login_ Confirm_ SesUsrId
//use B12phpfw\module\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment ;

class Home_ctr extends utl
{
  public function __construct(object $pp1)
  {
                        if ('') { self::jsmsg( [ //basename(__FILE__).
                           str_replace('\\','\\\\',__METHOD__) .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           //,'self::$d bi'=>self::$dbi
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?');
    /**
    * ROUTING TBL - module links, (IS OK FOR MODULES IN OWN DIR) key-keyvalue pairs :
    *  ------------------------------------------------------------------------------
    */
    $pp1_module = [ 
      'LINK ALIAS => HOME METHOD TO CALL' => '~~~~~in view script eg href = $pp1->login calls QS."i/login/"~~~~~'
      // LINKALIAS          URLurlqrystring                CALLED METHOD
      // IN VIEW SCRIPT     IN Home_ ctr                   IN Home_ ctr
      //, 'cre_row_frm'     => QS.'i/method_cre_row_frm/'  method_cre_row_frm 
      //, 'ldd_category'    => QS.'i/del_category/id/'     del_category, l in ldd means link
      //      (method parameter /idvalue we assign in view script after ldd_category)
      ,'home_usr'   => QS.'i/home_usr/'
      ,'admins'     => QS.'i/home_usr/'
      ,'cre_usr'    => QS.'i/cre_usr/'
      //link $pp1->ldd.$id in view script admins.php calls del_ row_ do method here :
      ,'ldd_admins' => QS.'i/del_admins/id/'
      ,'read_user'  => QS.'i/read_user/id/' //$pp1->read_user.$id (not $pp1->r)  profile
      ,'upd_user_loggedin' => QS.'i/upd_user_loggedin/id/' //also profile
      //ed_usr = LOGGED IN USR UPDATES SOME OTHER USER DATA - NO NEED :
      //,'ed_ usr' => QS.'i/ed_ usr/id/' //in view script: $pp1->ed_ usr.$id 

      ,'sitehome'   => QS.'i/sitehome/' //$pp1->sitehome
      //$this->uriq->i/home_fn, t/tbl_name, id/idval key/value
      //in home.php onclick does j s m s g y n dialog,  home_fn "d" calls dd() (no need include script)
      // -------------------------
      ,'loginfrm' => QS.'i/loginfrm/'
      ,'login'    => QS.'i/login/' 
      ,'logout'   => QS.'i/logout/r/i|loginfrm|' //logout & r=redirect
    ] ;

    //step 3 : fw core calls method in this cls : see home_fn above
    parent::__construct($pp1, $pp1_module);

                if ('') { self::jsmsg( [ //basename(__FILE__).' '.
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION['userid'])?$_SESSION['userid']:'NOT SET'
                   ,'$this->uriq'=>$this->uriq
                   ] ) ; 
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

  private function del_admins(object &$pp1) // *************** SHARED  d d (
  {
    // D e l  &  R e d i r e c t = r e f r e s h  t b l  v i e w :
    //parameter $pp1 is AUTOMATICALLY sent in all h o m e fns from call_module_method fn !!
    $tbl = $pp1->uriq->t = 'admins' ;
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;
    //$other=[ 'caller'=>__METHOD__ .', ln '.__LINE__ ] ;
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: ' ;
                              if (isset($pp1->uriq) and null !== $pp1->uriq)
                              { echo '<pre>U R L  query array ='.'$pp1->u r i q='; print_r($pp1->uriq) ; echo '</pre>'; } //[i] => del_ row_ do [t] => category [id] => 21
                              else { echo ' not set' ; } 
                              exit(0) ;
                              }
    Tbl_crud_admin::dd($pp1, $other);
    utl::Redirect_to($pp1->admins) ;

  }

  public function cre_usr(object $pp1)
  {
    //         i n s  f o r m is in home.php before tbl display
      $title = 'USER Crud';
      //require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        //require $pp1->module_path . 'create.php';
        require $pp1->module_path . 'home.php'; //create.php not used
      //require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  public function home_usr(object $pp1)
  {
    $this->home($pp1) ;
  }
  public function home(object $pp1)
  {
    //        t b l  r e a d, display
      $title = 'USER CRud';
      //require $pp1->wsroot_path . 'zinc/hdr.php'; //Warning: Cannot modify header information
        require("navbar_admin.php");
        require $pp1->module_path . 'home.php'; //require $pp1->module_path . 'home.php';
      //require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function sitehome(object $pp1)
  {
    $this->Redirect_to('/');
  }



  // U S E R  R E A D

  public function read_user(object $pp1)
  {
    //r o w  r e a d
      $title = 'USER SHOW PROFILE (cRud)';
      $css1 = 'NO';
      require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $pp1->module_path . 'read.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  private function logout(object $pp1)
  {
     Tbl_crud_admin::logout($pp1);
     //$this = $dm = domain model = globals for all sites (eg for CRUD...) & for curr.module
     //$dm = $this ;
     //$Db_ user = new Db_user ;
     //$Db_ user->l ogout($dm); 
  }


  private function loginfrm(object $pp1) //private
  {
    //called from link, Config_ allsites based on url (calling link) calls  f n  l o g i n
      //require $pp1->shares_path . 'hdr.php';
                //require $pp1->module_path . '../user/login_frm.php';  
      require $pp1->module_path . 'login_frm.php';  
      //require $pp1->shares_path . 'ftr.php';
  }

  private function login(object $pp1) //private
  {
      Tbl_crud_admin::login($pp1);
      //$dm = $this ;            //this globals for all sites are for CRUD... !!
      //$Db_user = new Db_user ; //tbl mtds and attr use globals for all sites !!
      //$Db_user->login($dm, $pp1) ;
  }


  private function Login_Confirm_SesUsrId(object $dm) {
    Tbl_crud_admin::Login_Confirm_SesUsrId();
  }

  private function upd_user_loggedin(object $pp1) //private
  {
    // U P D A T E  A D M I N  P R O F I L E  no need navbar admin -> My Profile
      //$dm = $this ;            //globals for all sites (eg for CRUD...) !!
      $title = 'USER UPDATE';
      $this->Login_Confirm_SesUsrId($this);
      //require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar_admin.php");
        require $pp1->module_path . 'upd_user_loggedin_frm.php';  
                  //require $pp1->module_path . '../user/upd_user_loggedin_frm.php';  
      //require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  /* //public function ed_usr(object $pp1)
  {
    //LOGGED IN USR UPDATES SOME OTHER USER DATA - NO NEED :
      $title = 'USER UPDATE';
      require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $pp1->module_path . 'update.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
  } */

  public function d(object $pp1)
  {
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                              .'<br />U R L  query array ='.'$this->uriq=' ;
                              if (isset($this->uriq))
                                { echo '<pre>'; print_r($this->uriq) ; echo '</pre>'; }
                              else { echo ' not set' ; } }
    //$this->dd() ;
    $this->dd($pp1->uriq->t, $pp1->uriq->id) ;
    // R e d i r e c t = r e f r e s h  t b l  v i e w :
    $this->Redirect_to($pp1->home_usr) ;
      /* switch ($this->uriq->t)
      {
        case 'admins' : $this->Redirect_to($pp1->home_usr) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '.'T a b l e '. $this->uriq->t 
          .' does not exist (put it in home.php, in del link !)'.'</h3>';
          break;
      } */

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

