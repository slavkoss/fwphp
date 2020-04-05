<?php
// J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
// DEFAULT CTR ONLY ONE FOR MODULE-IN-OWN-DIR IS ENOUGH, but may be more.
namespace B12phpfw ;

class Home_ctr extends Config_allsites
{
  public function __construct($pp1)
  {
    parent::__construct($pp1);
        // i means call ctrakcmethod of this cls  (H o m e) which includes view script or does tblrowCRUD
        $akc = $this->uriq->i ; //=home
        $this->$akc() ;

  } // e n d  f n  __ c o n s t r u c t


  //
  //       C R U D  M E T H O D S
  //

  private function home()
  {
    $start = microtime(true);

      $title = 'PAGINATION';
      require $this->pp1->wsroot_path . 'zinc/hdr.php'; // MODULE_PATH
      //require_once("navbar.php");
      require $this->pp1->module_path . 'home.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';

    $end = microtime(true);
    echo '<xxbr />'.' Vrijeme izvođenja: '.round($end - $start,4) . ' sekundi. '. __FILE__ ;
    echo '<p>&nbsp;'; echo '</p>';

  }



  /*
  //
  //    I N C  P A G E  S C R I P T S
  //

  // S E S S I O N
  public function logout_me()
  {
    $this->logout() ;
    $this->Redirect_to($this->pp1->login) ;
  }
  ...
*/


} // e n d  c l s  C onfig_ m ini3
