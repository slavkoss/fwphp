<?php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\zinc\Config_allsites ;
//use B12phpfw\module\dbadapter\user\DB_user ; //to Login_ Confirm_ SesUsrId
//use B12phpfw\module\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment ;

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
class Home_ctr extends Config_allsites
{
  public function __construct(object $pp1)
  {
                        if ('') { self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           //,'self::$d bi'=>self::$dbi
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?');
    //if link in view is not here : Error 403, Access forbidden! Notice Undefined property in URL
    $pp1_module = [ // r o u t i n g  t a b l e
      'PP1_ MODULE' => '~~~~~in view script eg href = $pp1->u . $id~~~~~'
      ,'h'   => QS.'i/home/'         //$pp1->h
      ,'sitehome' => QS.'i/sitehome/' //$pp1->sitehome
      ,'c'   => QS.'i/c/'            //$pp1->c
      ,'r'   => QS.'i/r/id/'         //$pp1->r . $id   profile
      ,'u'   => QS.'i/u/id/'         //$pp1->u . $id   in view script href = $pp1->u . $id
      //,'upd_user_loggedin' => QS.'i/upd_user_loggedin/' //also profile
      ,'d'   => QS.'i/d/' //$pp1->d . $id   in view script href = $pp1->d . $id
      //,'d'   => QS.'i/d/t/admins/id/' //$pp1->d . $id   in view script href = $pp1->d . $id
      //$this->uriq->i/home_fn, t/tbl_name, id/idval key/value
      //in home.php onclick does jsmsgyn dialog,  home_fn "d" calls dd() (no need include script)
      // -------------------------
      ,'loginfrm' => QS.'i/loginfrm/'
      ,'login'    => QS.'i/login/' 
      ,'logout'   => QS.'i/logout/r/i|loginfrm|' //logout & r=redirect
    ] ;

    //step 3 : fw core calls method in this cls : see home_fn above
    parent::__construct($pp1, $pp1_module);

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

  //           **** D I S P A T C H I N G
          //$accessor = "get" . ucfirst(strtolower($akc));
  public function callf(string $akc, object $pp1)  //fnname, params
  {
    return ( 
      ( //method_exists($this, $akc) and
      is_callable(array($this, $akc)) ) ? $this->$akc($pp1) : '0'
    ) ;
  }



          //******************************************
          //       DISPATCH  M E T H O D S
          // they call other methods or include script
          // CALLED FROM Config_ allsites __c onstruct
          //******************************************

  // *************************************************
  // Called own methods when user clicks 
  //   - link in $pp1_module_links or button 
  //   - or URL is entered in ibrowser adress field
  // *************************************************
  public function c(object $pp1)
  {
    //         i n s  f o r m is in home.php before tbl display
      $title = 'USER CRud';
      //require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        //require $pp1->module_path . 'create.php';
        require $pp1->module_path . 'home.php'; //create.php not used
      //require $pp1->wsroot_path . 'zinc/ftr.php';
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

  public function r(object $pp1)
  {
    //r o w  r e a d
      $title = 'USER READ PROFILE';
      require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $pp1->module_path . 'read.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
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
      require $pp1->wsroot_path . 'zinc/hdr.php';
      require $pp1->module_path . '../user/login_frm.php';  
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  private function login(object $pp1) //private
  {
      $dm = $this ;            //this globals for all sites are for CRUD... !!
      $Db_user = new Db_user ; //tbl mtds and attr use globals for all sites !!
    $Db_user->login($dm, $pp1) ;
  }





  public function u(object $pp1)
  {
      $title = 'USER UPDATE';
      require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $pp1->module_path . 'update.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }

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
    $this->Redirect_to($pp1->h) ;
      /* switch ($this->uriq->t)
      {
        case 'admins' : $this->Redirect_to($pp1->h) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '.'T a b l e '. $this->uriq->t 
          .' does not exist (put it in home.php, in del link !)'.'</h3>';
          break;
      } */

  }


} // e n d  c l s  
