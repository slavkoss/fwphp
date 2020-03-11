<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\Home_ctr.php
namespace B12phpfw ;

/**
* step 2
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
  public function __construct($pp1)
  {
    if (!defined('QS')) define('QS', '?');
    $pp1_module_links = [ 
      'P P 1 _ M O D U L E' => '~~~~~~~~~~~~~~~~~'
      ,'h'   => QS.'i/home/'
      ,'c'   => QS.'i/c/'
      ,'r'   => QS.'i/r/id/'
      ,'u'   => QS.'i/u/id/' //in view script href = $this->pp1->u . $id
      //$this->uriq->i/home_fn, t/tbl_name, id/idval key/value
      //in home.php onclick does jsmsgyn dialog,  home_fn "d" calls dd() (no need include script)
      ,'d'   => QS.'i/d/t/admins/id/' //in view script href = $this->pp1->d . $id
      ,'h'   => QS.'i/h/' //help
    ] ;

    //step 3 : fw core calls method in this cls : see home_fn above
    parent::__construct($pp1, $pp1_module_links);

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


  } // e n d  f n


  //Called own methods when user clicks link/button or any URL is entered in ibrowser adress field :

  public function c()
  {
      $title = 'TEST USER CREATE';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'create.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function home()
  {
    //t b l  r e a d
      $title = 'TEST USER CRUD';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'home.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }


  public function r()
  {
    //r o w  r e a d
      $title = 'TEST USER READ PROFILE';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'read.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function u()
  {
      $title = 'TEST USER UPDATE';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'update.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function d()
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
        case 'admins' : $this->Redirect_to($this->pp1->h) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '.'T a b l e '. $this->uriq->t 
          .' does not exist (put it in home.php, in del link !)'.'</h3>';
          break;
      }

  }


  public function h() //help
  {
    $img_url_dir = $this->pp1->wsroot_url . $this->pp1->imgrel_path .'img_big/oop_help/';
      $title = 'DM, DDD HELP';
      //require $this->pp1->wsroot_path . 'zinc/hdr.php';
          //require_once("navbar.php");
          //include $this->pp1->wsroot_path . 'fwphp/glomodul/z_help/oop_help/index.php';
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

          include $this->pp1->wsroot_path . 'fwphp/glomodul/z_help/oop_help/00_OOP01_basics_intro.php';
          //also works : require $this->pp1->module_path . 'help.php';
      //require $this->pp1->wsroot_path . 'zinc/ftr.php';
      
      // <=$wsroot_url>
      //Loading failed for the <script> with source �http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/03xuding_g�%20line%20%3Cb%3E143%3C/b%3E%3Cbr%20/%3Ezinc/exp_collapse.js�.
       ?>
      <hr />
      <?='$this->pp1->wsroot_url ='. $this->pp1->wsroot_url?>
      <br /><?='$img_url_dir ='. $img_url_dir?>
      <br /><?='$this->pp1->imgrel_path ='. $this->pp1->imgrel_path?> - not visible in module which is not based on CRUD skeleton "B12phpfw", ee does not use Config_allsites (like Mnu)
      </main>

      <!-- script src="zinc/exp_collapse.js" OR: -->
      <script src="<?=$this->pp1->wsroot_url?>zinc/exp_collapse.js" 
              language='JScript' type='text/javascript'></script>
      </body></html><?php
  }

} // e n d  c l s  
