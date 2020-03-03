<?php
namespace B12phpfw ;

class Home_ctr extends Config_allsites
{

  public function __construct($pp1)
  {
    if (!defined('QS')) define('QS', '?');
    $pp1_module_links = [ 
      'P P 1 _ M O D U L E' => '~~~~~~~~~~~~~~~~~' ,
      'h'            => QS.'i/home/' ,
      'c'            => QS.'i/c/' ,
      'r'            => QS.'i/r/' ,
      'u'            => QS.'i/u/' ,
      'd'            => QS.'i/d/'
    ] ;

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
          .' does not exist (put it home.php, in del link !)'.'</h3>';
          break;
      }

  }


} // e n d  c l s  
