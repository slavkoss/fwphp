<?php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\site_home\www ;
use B12phpfw\core\b12phpfw\Config_allsites ;
//use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_admin;  //to Login_ Confirm_ SesUsrId


class Home_ctr extends Config_allsites
{
  public function __construct(object &$pp1)
  {
    //deprecated $DateTime = strftime( "%Y.%m.%d %H:%M:%S", time() );
                        if ('') { self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           //,'self::$d bi'=>self::$dbi
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?');

    $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ .' ('. __METHOD__ .')';


    //step 3 : fw core calls method in this cls : see home_fn above
    parent::__construct($pp1);

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



  // M E T H O D S  C A L L E D  BY LINKS, BUTTONS, U R L-s  IN  V I E W  SCRIPTS


  public function home(object $pp1)
  {
    //        M A I N  S I T E  M N U
    $title = 'MNU';
    $css1 = $pp1->shares_url .'/themes/bootstrap/styles_blog.css';
    require $pp1->module_path . '/home.php'; //require $pp1->module_path . 'home.php';

  }

  public function sitehome(object $pp1)
  {
    $this->Redirect_to('/');
  }

  public function lsweb(object $pp1)
  {
    $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ .' ('. __METHOD__ .')';
    // http://dev1:8083/fwphp/www/glomodul/lsweb/lsweb.php
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<span style="color: green; font-size: large; font-weight: bold;">This view script '.__FILE__ .'()'.', line '. __LINE__ .' SAID: '.'</span>'; 
                    echo '<pre>';
                    echo '<b>$pp1</b>='; print_r($pp1); //->stack_trace
                    //echo '<b>$_ GET</b>='; print_r($_GET); 
                    echo '</pre>';
                  } else {
    $this->Redirect_to( $pp1->glomodul_url .'/lsweb/lsweb.php' ) ;
                  }
  }



  public function home_usr(object $pp1)
  {
    $this->home($pp1) ;
  }


  public function msg_akram(object $pp1)
  {
    $this->Redirect_to( $pp1->glomodul_url .'/blog_akram/' ) ;
  }


  public function msg(object $pp1)
  {
    // http://sspc2:8083/fwphp/www/
    $this->Redirect_to( $pp1->glomodul_url .'/blog/' ) ;
    //$this->Redirect_to( dirname($pp1->module_url) .'/glomodul/blog/' ) ;
  }

  public function mkd(object $pp1)
  {
            if ('1') {self::jsmsg( [ //basename(__FILE__) or  __METHOD__
               __METHOD__ .', line '. __LINE__ .' SAYS'=>'where am I'
            ] ) ; }
    // http://sspc2:8083/fwphp/glomodul/mkd/
    $this->Redirect_to( $pp1->glomodul_url .'/mkd' ) ;
    //$this->Redirect_to( dirname($pp1->module_url) .'/glomodul/mkd/' ) ;
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
       $pp1->glomodul_url .'/z_examples/00_index_of_important.php' ) ;
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


  /*

  public function b_tmplts(object $pp1)
  {
    // http://dev1:8083/fwphp/glomodul/z_examples/bootstrap5/
    $this->Redirect_to(
       dirname($pp1->module_url) .'/glomodul/z_examples/bootstrap5/' ) ;
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
  */

  /* private function Login_Confirm_SesUsrId() {
   Tbl_crud_admin::Login_Confirm_SesUsrId();
  } */




} // e n d  c l s  

