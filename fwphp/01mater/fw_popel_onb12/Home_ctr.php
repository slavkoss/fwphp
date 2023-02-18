<?php
// 
// DEFAULT CTR (ONLY ONE IN MODULE), HAS METHODS WHICH  I N C  PAGE VIEW SCRIPT OR CALL METDS
namespace B12phpfw\module\fw_popel_onb12 ;
//use PDO;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;        // c o n f i g  was core\zinc
use B12phpfw\dbadapter\fw_popel_onb12\Tbl_crud   as utl_waybill ;

class Home_ctr extends utl
{
  public function __construct(object $pp1) 
  {
                        if ('') { self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
    /**
     * LINKALIAS          URLurlqrystring                CALLED METHOD
     * IN VIEW SCRIPT     IN Home_ ctr                   IN Home_ ctr
     *  ,'cre_row_frm'     => QS.'i/method_cre_row_frm/'  method_cre_row_frm 
     * ,'ldd_category'    => QS.'i/del_category/id/'     del_category, l in ldd means link
     *      (method parameter /idvalue we assign in view script after ldd_category)
     */
    $pp1_module = [ // R O U T I N G  T A B L E
        'ROUTING_TABLE'     => '<b style="color: blue">
        $pp1_module IS MODULE PROPERTIES PART OF PROPERTY PALLETTE $pp1</b>'
      //
      // http://dev1:8083/fwphp/01mater/fw_popel_onb12/index.php?i/ccbook_frm/
      , 'ccbook_frm'     => QS.'i/ccbook_frm/'
    ] ;  //e n d  R O U T I N G  T A B L E

    parent::__construct($pp1, $pp1_module);


  } // e n d  f n  __ c o n s t r u c t



          /* *****************************************
                 CALL DISPATCH  M E T H O D S
           they 1.call other fns or 2.include script or 3.URL call script
           CALLED FROM abstract class Config_ allsites, m ethod __c onstruct
           so: $pp1->call_module_m ethod($akc, $pp1) ;
               $ a k c  is  m o d u l e  m ethod (in Home_ ctr, not global fn !!
                 because )
          ***************************************** */
                //$accessor = "get" . ucfirst(strtolower($akc));
  protected function call_module_method(string $akc, object $pp1)  //fnname, params
  {
    //This fn calls fn $ a k c in Home_ ctr which has parameters in  $ p p 1
    if ( is_callable(array($this, $akc)) ) { // and m ethod_exists($this, $akc)
      return $this->$akc($pp1) ;
    } else {
      echo '<h3>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h3>' ;
      echo 'Home_ ctr  m e t h o d  "<b>'. $akc .'</b>" is not callable.' ;
      
      echo '<br><br>See how is created  m e t h o d  name  $ a k c  in abstract class Config_ allsites, m ethod __c onstruct :<br>
      $this->call_module_method($akc, $pp1) ; //protected fn (in child cls Home_ ctr) calls private fns (in child cls Home_ ctr)
      ' ;
      return '0' ;
    }

  }





  private function home(object $pp1)
  {
    // Ver. 7 : Dependency Injection $pp1
    //http://dev1:8083/fwphp/glomodul/adrs
      require $pp1->module_path . 'hdr.php'; // MODULE_PATH
      require $pp1->module_path . 'home.php';
      require $pp1->module_path . 'ftr.php';
  }



  /**
  * pgs03.   I N C  C R U D  P A G E  SCRIPTS   &   (code behind) C R U D  M E T H O D S
  */
  private function ccbook_frm(object $pp1)
  {
    // http://dev1:8083/fwphp/01mater/fw_popel_onb12/index.php?i/ccbook_frm/
    // http://dev1:8083/fwphp/01mater/book/index.php?i/cc/
    $module_book_url = $pp1->wsroot_url 
      . basename(dirname(dirname(dirname(__FILE__)))) // fwphp    = site modules group
      .'/'. basename(dirname(dirname(__FILE__)))      // 01mater  = app modules group
      .'/book/' ; // module = dir
    //require $pp1->app_dir_path . '/book/hdr.php'; // MODULE_PATH
    //require $pp1->app_dir_path . '/book/ccbook_frm.php';
    utl::Redirect_to($module_book_url.QS.'i/cc_frm/') ; //to  c r e r o w
    //require $pp1->app_dir_path . '/book/ftr.php';
  }


    private function dd(object $pp1) // dd_song
    {
      // http://dev1:8083/fwphp/glomodul/adrs/?i/d/rt/song/id/37
      //$this->uriq=stdClass Object  [i] => d  [t] => song  [id] => 37
                    if ('') {self::jsmsg('D BEFORE dbobj '. __METHOD__, __LINE__
                    , ['$pp1->dbi_obj'=>$pp1->dbi_obj //, 
                    ] ) ; }
    // D e l  &  R e d i r e c t  to  r e f r e s h  t b l  v i e w :
    $tbl = $pp1->uriq->t = 'song' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    utl_waybill::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->module_url.QS.'i/rt/') ; //to read_ tbl

    }


  private function uu(object $pp1)
  {
           //       R O W U P D  FRM
    //echo 'Method '.__METHOD__ .' SAYS: I &nbsp; i n c l u d e &nbsp; p h p &nbsp;
    //http://dev1:8083/fwphp/glomodul/adrs?i/uu/t/song/id/22  see switch default: above !!
                  if ('0') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                  echo '<pre>'; echo '<b>$pp1</b>='; print_r($pp1);
                  echo '</pre>'; }

    if (isset($pp1->uriq->id)) {
       $uriq = $pp1->uriq ;
       if (isset($uriq->id)) 
         $IdFromURL = (int)utl::escp($uriq->id) ; //NOT (int)utl::escp($_GET['id']) ; 
    } else $IdFromURL = NULL ;
    require $pp1->module_path . 'hdr.php';
    require $pp1->module_path . 'upd_row_frm.php';  
    require $pp1->module_path . 'ftr.php';
  }



  private function ex1(object $pp1)
  {
    //http://dev1:8083/fwphp/glomodul/adrs?i/ex1/
      require $pp1->module_path . 'hdr.php';
      require $pp1->module_path . 'example_one.php';
      require $pp1->module_path . 'ftr.php';
      
                  echo '<pre>Property pallette $pp1='; print_r($pp1) ; echo '</pre>';
  }

  private function ex2(object $pp1)
  {
    //http://dev1:8083/fwphp/glomodul/adrs?i/ex2/p1/param1/p2/param2/
    $param1 = $pp1->uriq->p1 ;
    $param2 = $pp1->uriq->p2 ;
    require $pp1->module_path . 'hdr.php';
    require $pp1->module_path . 'example_two.php';
    require $pp1->module_path . 'ftr.php';
                  echo '<pre><b>Property pallette $pp1</b>='; print_r($pp1) ; echo '</pre>';
  }






    public function errmsg($myerrmsg, object $pp1)
    {
        // h d r  is  in  p a g e  which  i n c l u d e s  t h i s
                   //require $pp1->module_path . 'hdr.php'; //or __DIR__
        require $pp1->module_path . 'error.php';
        require $pp1->module_path . 'ftr.php';
    }




} // e n d  c l s  C onfig_ m ini3

