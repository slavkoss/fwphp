<?php
namespace B12phpfw ;

class Home_ctr extends Config_allsites
{
  //NO ATTRIBUTES -attr. are in parent classes 

  public function __construct($pp1)
  {
    parent::__construct($pp1); //assigns uriq object ($this accesess 4 obj vars&fns in hierarchy)
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

    //include_once 'hdr.php';
    include $this->pp1->wsroot_path . 'zinc/hdr.php';

    switch (true) {
      case isset($_GET['c']): include 'create.php'; break;
      case isset($_GET['r']): include 'read.php'; break;
      case isset($_GET['u']): include 'update.php'; break;
      //case isset($_GET['d']): include 'delete.php'; break;
      case isset($this->uriq->d)  // click "Del" in home.php
           or isset($_POST['id']) : // click "Yes" in delete.php ($_GET['d'] is also set)
         include 'delete.php'; break;

      default: include_once 'home.php'; break;
    }

    //include_once 'ftr.php';
    include $this->pp1->wsroot_path . 'zinc/ftr.php';

  } // e n d  f n


} // e n d  c l s  
