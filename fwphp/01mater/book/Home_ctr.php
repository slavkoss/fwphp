<?php
// 
// DEFAULT CTR (ONLY ONE IN MODULE), HAS METHODS WHICH  I N C  PAGE VIEW SCRIPT OR CALL METDS
namespace B12phpfw\module\fw_popel_onb12 ;
//use PDO;
use B12phpfw\core\zinc\Config_allsites as utl ;
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

    //$akc = $pp1->uriq->i ; //=home
    //$pp1->$akc() ; //include(str_replace('|','/', $db->uriq->i.'.php'));
    /**
    *  ------------------------------------------------------------------------------
    * ROUTING TBL - module links, (IS OK FOR MODULES IN OWN DIR) key-keyvalue pairs :
    *  LINK ALIAS IN VIEW SCRIPT (eg l d d) => HOME METHOD TO CALL (eg del_ row_do)
    *  ------------------------------------------------------------------------------
    * 1. ALL MODULE VIEWS LINKS SHOULD BE IN $pp1_ module, SHAPED SO :
    * 2. $pp1->urlqrystringpart1_name => i/M E T H O D NAME/param1name/ param1value...2,3... 
    *    (urlqrystring LAST PART IS IN VIEW SCRIPT WHICH KNOWS IT, eg idvalue !)
    * 3. IF LINK key-keyvalue pair IS NOT HERE THEN EG : 
    *    in URLurlqrystring : QS.'i/home/' home must be M E T H O D NAME in this script.
    *    Eg http://dev1:8083/fwphp/glomodul/adrs/?i/ex1/  or
    *       http://dev1:8083/fwphp/glomodul/adrs/?i/home/ or
    *       http://dev1:8083/fwphp/glomodul/adrs/
    */
    $pp1_module = [ // Property pallette module properties
      // LINKALIAS          URLurlqrystring                CALLED METHOD
      // IN VIEW SCRIPT     IN Home_ ctr                   IN Home_ ctr
      //, 'cre_row_frm'     => QS.'i/method_cre_row_frm/'  method_cre_row_frm 
      //, 'ldd_category'    => QS.'i/del_category/id/'     del_category, l in ldd means link
      //      (method parameter /idvalue we assign in view script after ldd_category)
    ] ;  //e n d  R O U T I N G  T A B L E
    //is better $pp1->cre_row_frm ? - more writing, cc fn in module ctr not visible

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




  /**
  * pgs01. I N C  TEXT SHOWING  P A G E  S C R I P T S
  */
  private function home(object $pp1)
  {
    // Ver. 7 : Dependency Injection $pp1
    //http://dev1:8083/fwphp/glomodul/adrs
      require $pp1->module_path . 'hdr.php'; // MODULE_PATH
      require $pp1->module_path . 'home.php';
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






  /**
  * pgs02. I N C  R  (c R u d)  P A G E  SCRIPTS
  */
  private function xxxrt(object $pp1)
  {
    // D I S P L A Y  T A B L E (was AND R O W C R E FRM)
    require $pp1->module_path . 'hdr.php';
    require $pp1->module_path . 'read_tbl.php';  
    require $pp1->module_path . 'ftr.php';
  }



  /**
  * pgs03.   I N C  C R U D  P A G E  SCRIPTS   &   (code behind) C R U D  M E T H O D S
  */
  private function cc(object $pp1)
  {
    // I N C  C R U D P A G E  S C R I P T
    // f o r m : http://dev1:8083/fwphp/glomodul/adrs/?i/cc/
    //http://dev1:8083/fwphp/glomodul/adrs
      require $pp1->module_path . 'hdr.php'; // MODULE_PATH
      require $pp1->module_path . 'cre_row_frm.php';
      require $pp1->module_path . 'ftr.php';
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





   /**
    * AJAX-ACTION: ajax Get Stats
    */
    private function ajaxcountr()  //p ublic f unction ajaxGetStats()
    {
                        //$Song = new Song();
                        //$amount_of_songs = $Song->getAmountOfSongs();
                        //supersimple API would be possible by echoing JSON here
                        //echo $amount_of_songs;
                    if ('') {self::jsmsg('s001ajax. '. __METHOD__, __LINE__
                    , ['$this->uriq'=>$this->uriq, '$instance'=>$instance
                    , '$this->dbobj'=>$this->dbobj ] ) ; }
      echo utl_waybill::rrcnt('song'); // not $this->dbobj->R_tb... !!!
    }





    public function errmsg($myerrmsg, object $pp1)
    {
        // h d r  is  in  p a g e  which  i n c l u d e s  t h i s
                   //require $pp1->module_path . 'hdr.php'; //or __DIR__
        require $pp1->module_path . 'error.php';
        require $pp1->module_path . 'ftr.php';
    }




} // e n d  c l s  C onfig_ m ini3

