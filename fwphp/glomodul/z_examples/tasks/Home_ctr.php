<?php
// J:\awww\www\fwphp\glomodul\z_examples\tasks\Home_ctr.php
// see J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\Home_ctr.php

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\tasks ;
use B12phpfw\core\zinc\Config_allsites ;
//use B12phpfw\module\dbadapter\user\DB_user ; //to Login_ Confirm_ SesUsrId
//use B12phpfw\module\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment ;

class Home_ctr extends Config_allsites
{
  public function __construct(object $pp1)
  {
    if (!defined('QS')) define('QS', '?');
    // R O U T I N G  T A B L E  - module links, (IS OK FOR MODULES IN OWN DIR)
    $pp1_module = [ 
      'P P 1 _ M O D U L E' => '~~~~~~~~~~~~~~~~~'
      ,'h'   => QS.'i/home/'
      ,'c'   => QS.'i/c/'
      ,'r'   => QS.'i/r/id/'
      ,'u'   => QS.'i/u/id/' //in view script href = $pp1->u . $id
      //$this->uriq->i/home_fn, t/tbl_name, id/idval key/value
      //in home.php onclick does jsmsgyn dialog,  home_fn "d" calls dd() (no need include script)
      ,'d'   => QS.'i/d/t/admins/id/' //in view script href = $pp1->d . $id
      ,'h'   => QS.'i/h/' //help
    ] ;

    //step 3 : fw core calls method in this cls : see home_fn above
    $pp1->stack_trace[] = [str_replace('\\','/', __FILE__ ).', lin='.__LINE__] ;
                if ('') { /* self::jsmsg( [ //basename(__FILE__).' '.
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->uriq'=>$this->uriq
                   ] ) ; */
                   echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                   //echo '<pre>$_GET='; print_r($_GET); echo '</pre><br />'; // [d/39] => 
                   //echo '<pre>$_POST='; print_r($_POST); echo '</pre><br />'; // [d/39] => 
                   //echo '<pre>$pp1->uriq='; print_r($pp1->uriq); echo '</pre><br />';
                   echo '<pre>$pp1->stack_trace='; print_r($pp1->stack_trace); echo '</pre><br />';
                   // $this->uriq=stdClass Object( [d] => 39 )
                }
    parent::__construct($pp1, $pp1_module);
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
  //Called own methods when user clicks link/button or any URL is entered in ibrowser adress field :

  public function c(object $pp1)
  {
      $title = 'TEST USER CREATE';
      require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $pp1->module_path . 'create.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function home(object $pp1)
  {
    //t b l  r e a d
      $title = 'TEST USER CRUD';
      require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $pp1->module_path . 'home.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  public function r(object $pp1)
  {
    //r o w  r e a d
      $title = 'TEST USER READ PROFILE';
      require $pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $pp1->module_path . 'read.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function u(object $pp1)
  {
      $title = 'TEST USER UPDATE';
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
      $this->dd() ;
      // R e d i r e c t = r e f r e s h  t b l  v i e w :
      switch ($this->uriq->t)
      {
        case 'admins' : $this->Redirect_to($pp1->h) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '.'T a b l e '. $this->uriq->t 
          .' does not exist (put it in home.php, in del link !)'.'</h3>';
          break;
      }

  }


  public function h(object $pp1) //help
  {
    $img_url_dir = $pp1->wsroot_url . $pp1->imgrel_path .'img_big/oop_help/';
      $title = 'DM, DDD HELP';
      //require $pp1->wsroot_path . 'zinc/hdr.php';
          //require_once("navbar.php");
          //include $pp1->wsroot_path . 'fwphp/glomodul/z_help/oop_help/index.php';
      ?>
      <!doctype html>
      <html>
      <head>
        <meta charset="utf-8" />
        <title>OOP tutorial B12phpfwdoc</title>
        <link rel="stylesheet" href="<?=$wsroot_url?>zinc/img_gallery_flex.css" />
        <link rel="stylesheet" href="<?=$wsroot_url?>zinc/exp_collapse.css">
        <style></style>
      </head>
      <body>
      <main><?php

          include $pp1->wsroot_path . 'fwphp/glomodul/z_help/oop_help/00_OOP01_basics_intro.php';
          //also works : require $pp1->module_path . 'help.php';
      //require $pp1->wsroot_path . 'zinc/ftr.php';
      
      // <=$wsroot_url>
      //Loading failed for the <script> with source “http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/03xuding_g…%20line%20%3Cb%3E143%3C/b%3E%3Cbr%20/%3Ezinc/exp_collapse.js”.
       ?>
      <hr />
      <?='$pp1->wsroot_url ='. $pp1->wsroot_url?>
      <br /><?='$img_url_dir ='. $img_url_dir?>
      <br /><?='$pp1->imgrel_path ='. $pp1->imgrel_path?> - not visible in module which is not based on CRUD skeleton "B12phpfw", ee does not use Config_allsites (like Mnu)
      </main>

      <!-- script src="zinc/exp_collapse.js" OR: -->
      <script src="<?=$pp1->wsroot_url?>zinc/exp_collapse.js" 
              language='JScript' type='text/javascript'></script>
      </body></html><?php
  }

} // e n d  c l s  
