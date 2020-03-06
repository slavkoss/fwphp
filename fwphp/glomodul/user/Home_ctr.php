<?php
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
    //if link in view is not here : Error 403, Access forbidden! Notice Undefined property in URL
    $pp1_module_links = [ 
      'P P 1 _ M O D U L E' => '~~~~~~~~~~~~~~~~~' ,
      'h'   => QS.'i/home/' ,        //$this->pp1->h
      'c'   => QS.'i/c/' ,           //$this->pp1->c
      'r'   => QS.'i/r/id/' ,        //$this->pp1->r . $id
      'u'   => QS.'i/u/id/' ,        //$this->pp1->u . $id   in view script href = $this->pp1->u . $id
      'd'   => QS.'i/d/t/admins/id/' //$this->pp1->d . $id   in view script href = $this->pp1->d . $id
      //$this->uriq->i/home_fn, t/tbl_name, id/idval key/value
      //in home.php onclick does jsmsgyn dialog,  home_fn "d" calls dd() (no need include script)
      // -------------------------
      'lfrm' => QS.'i/lfrm/' ,              // loginfrm
      'l'    => QS.'i/l/' ,                 // login
      'lout' => QS.'i/lout/r/i|loginfrm|' , //logout, r=redirect
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


  // *************************************************
  // Called own methods when user clicks 
  //   - link in $pp1_module_links or button 
  //   - or URL is entered in ibrowser adress field
  // *************************************************
  public function c()
  {
    //         i n s  f o r m is in home.php before tbl display
      $title = 'USER CRud';
      //require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        //require $this->pp1->module_path . 'create.php';
        require $this->pp1->module_path . 'home.php'; //create.php not used
      //require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  //Same as c because  i n s  f o r m  is in home.php before tbl display :
  public function home()
  {
    //        t b l  r e a d, display
      $title = 'USER CRud';
      //require $this->pp1->wsroot_path . 'zinc/hdr.php'; //Warning: Cannot modify header information
                //require_once("navbar.php");
        require $this->pp1->module_path . 'home.php';
      //require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function r()
  {
    //r o w  r e a d
      $title = 'USER READ PROFILE';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'read.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function u()
  {
      $title = 'USER UPDATE';
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
    $this->Redirect_to($this->pp1->h) ;
      /* switch ($this->uriq->t)
      {
        case 'admins' : $this->Redirect_to($this->pp1->h) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '.'T a b l e '. $this->uriq->t 
          .' does not exist (put it in home.php, in del link !)'.'</h3>';
          break;
      } */

  }


} // e n d  c l s  
