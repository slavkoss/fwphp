<?php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\flatFilesEd\mkd ;
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
      ,'app_glomodul_dir_path' => str_replace('\\','/', dirname(__DIR__) ) .'/glomodul'
      //ALL VIEWS LINKS OF MODULE SHOULD BE HERE (view script knows last part) :
      //$pp1->urlqrystringpart1_name => part1 of urlqrystring (last part is in view script!)
      ,'home_mnu'   => QS.'i/home/'
      //link $pp1->ldd.$id in view script admins.php calls del_row_do method here :
      ,'sitehome'   => QS.'i/sitehome/' //$pp1->sitehome
      // -------------------------
      ,'edit'      => QS.'i/edit/path/'
      ,'showhtml'  => QS.'i/showhtml/path/' 
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
                 //require $pp1->wsroot_path . 'zinc/hdr.php'; //Warning: Cannot modify header information
        //require("h_top_toolbar.php"); //navbar_admin.php
    require $pp1->module_path . 'home.php'; //require $pp1->module_path . 'home.php';
        //require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  public function edit(object $pp1)
  {
    $title = 'ed  '. basename($pp1->uriq->path) ;
    /*
      // URL is eg http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme.md
      // Config_ allsites.php extracts this from U R L above :
      $this->u riq=stdClass Object (
          [i] => edit <-----this is this method used in callf method
          [path] => J:\awww\www\readme.md ) */
    // 
    //$this->Redirect_to( $pp1->module_url .'/edit.php/' ) ; //view should not be in ctr !
    //$fle_to_edit_path = rtrim($pp1->uriq->path,'/')  ; //rtrim($_GET['edit'],'/') ;
    $fle_to_edit_path = str_replace('/','\\', rtrim($pp1->uriq->path,'/'));
    include 'edit.php';
  }


  public function showhtml(object $pp1)
  {
    $title = basename($pp1->uriq->path) ;
    //http://sspc2:8083/fwphp/glomodul/mkd/?i/showhtml/path/=01\001_config_ssl_tls\hosts.txt
    //$fle_to_displ_path = rtrim($pp1->uriq->path,'/')  ;
    $fle_to_displ_path = str_replace('/','\\', rtrim($pp1->uriq->path,'/'));
    include 'showhtml.php';

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

