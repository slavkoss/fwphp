<?php
// J:\awww\www\fwphp\glomodul\adrs\Home_ctr.php
// DEFAULT MODULE CTR (ONLY ONE IN MODULE).
namespace B12phpfw\module\adrs ;
//use PDO;
use B12phpfw\core\b12phpfw\Config_allsites    as utl ; // init, setings, utilities
use B12phpfw\dbadapter\adrs\Tbl_crud          as db_module ;  // Tbl_ crud_ adrs
use B12phpfw\module\adrs\Home                 as Home_view;

class Home_ctr extends utl //Config_ allsites
{
  public function __construct(object &$pp1) 
  {
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;
                        if ('') { self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' said'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

    parent::__construct($pp1);


  } // e n d  f n  __ c o n s t r u c t



  /**
  * I N C  TEXT SHOWING  P A G E  S C R I P T S
  */
  protected function home(object $pp1)
  {
    // Ver. 7 : Dependency Injection $pp1
    Home_view::hdr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
    Home_view::navbar($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);      
      // Big page is included :
      require $pp1->module_path . '/home_content.php';
    Home_view::ftr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
                                //require $pp1->module_path . '/h dr.php'; 
                                //require $pp1->module_path . '/h ome_content.php';
                                //require $pp1->module_path . '/f tr.php';
  }

  protected function ex1(object $pp1)
  {
    //   Example 1
    Home_view::hdr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
    Home_view::navbar($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);      
    Home_view::ex1($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
    Home_view::ftr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
                    //require $pp1->module_path . '/h dr.php';
                    //require $pp1->module_path . '/e xample_one.php';
                    //require $pp1->module_path . '/f tr.php';
      
                  //echo '<pre>Property pallette $pp1='; print_r($pp1) ; echo '</pre>';
  }

  protected function ex2(object $pp1)
  {
    //   Example 2
    Home_view::hdr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
    Home_view::navbar($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);      
    Home_view::ex2($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
    Home_view::ftr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
                        //require $pp1->module_path . '/h dr.php';
                        //require $pp1->module_path . '/e xample_two.php';
                        //require $pp1->module_path . '/f tr.php';
  }



  /**
  * read (show) table
  */
  protected function rrt(object $pp1)
  {
    // D I S P L A Y  T A B L E (was AND R O W C R E FRM)
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

    $title = 'ADRS TBL';
    $Home_view = new Home_view($pp1) ;

      Home_view::hdr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
      Home_view::navbar($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
      Home_view::rrt($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
      Home_view::ftr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
          //require $pp1->module_path . '/h dr.php'; // require $pp1->shares_path . '/hdr.php';
          //require $pp1->module_path . '/r ead_tbl.php';  
          //require $pp1->module_path . '/f tr.php'; //require $pp1->shares_path . '/f tr.php';
  }



  /**
  *  C r e a t e  row FRM  &  (code behind) C R U D  M E T H O D S
  */
  protected function cc(object &$pp1)
  {
    //       R O W C R E  FRM
     $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;
                  if ('' and isset($_POST["submit_add"])) {  //if ($module_ arr['dbg']) {
                    echo '<h3>'.__METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      //echo '<b>$pp1</b>='; print_r($pp1);
                      echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; 
                    //exit(0);
                  }
 
    $title = 'ADRS UPD FRM';
    Home_view::hdr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
    Home_view::navbar($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
        require $pp1->module_path . '/cre_row_frm.php';
    Home_view::ftr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
  }


  protected function uu(object $pp1)
  {
    //       R O W U P D  FRM
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h2>' ;
                  echo '<pre>'; echo '<b>$pp1</b>='; print_r($pp1);
                  echo '</pre>'; }

    $title = 'ADRS UPD FRM';

    Home_view::hdr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
    Home_view::navbar($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
      require $pp1->module_path . '/upd_row_frm.php';  
    Home_view::ftr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
    //require $pp1->module_path . '/f tr.php'; //require $pp1->shares_path . '/f tr.php';
  }


    protected function dd(object $pp1) // dd_song
    {
                    if ('') {self::jsmsg('D BEFORE dbobj '. __METHOD__, __LINE__
                    , ['$pp1->dbi_obj'=>$pp1->dbi_obj //, 
                    ] ) ; }
    // D e l  &  R e d i r e c t  to  r e f r e s h  t b l  v i e w :
    //$pp1->urlqry_parts['tbl'] = 'song' ; 
    //$tbl = $pp1->uriq->t = 'song' ; 
    $other=['caller'=>__METHOD__.' '.', ln '.__LINE__, ', d e l '] ;

    db_module::dd($pp1, $other); 
    utl::Redirect_to($pp1->module_url.QS.'i/rrt/') ; //to read_ tbl

    }




    public function errmsg($myerrmsg, object $pp1)
    {
        // h d r  is  in  p a g e  which  i n c l u d e s  t h i s
                   //require $pp1->module_path . 'hdr.php'; //or __DIR__
        require $pp1->module_path . '/error.php';
        Home_view::ftr($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);  
    }





   /**
    * AJAX-ACTION: ajax Get Stats
    */
    protected function ajaxcountr()  //p ublic f unction ajaxGetStats()
    {
                        //$Song = new Song();
                        //$amount_of_songs = $Song->getAmountOfSongs();
                        //supersimple API would be possible by echoing JSON here
                        //echo $amount_of_songs;
                    if ('') {self::jsmsg('s001ajax. '. __METHOD__, __LINE__
                    , ['$this->uriq'=>$this->uriq, '$instance'=>$instance
                    , '$this->dbobj'=>$this->dbobj ] ) ; }
      echo db_module::rrcnt('song'); // not $this->dbobj->R_tb... !!!
    }




} // e n d  c l s  Home_ ctr


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




          /** *****************************************
           *       CALL DISPATCH  M E T H O D S
           * they 1.call other fns or 2.include script or 3.URL call script so :
           * CALLED FROM abstract class Config_ allsites, at end of m ethod __c onstruct
           * $akc = $pp1->uriq->i ; //fn name (by user entered URL we put in uriq array)
           * $this->call_module_method($akc, $pp1) ; //protected fn (in child cls Home_ ctr). 
           *     Home_ ctr instatiates Config_ allsites and calls private fns (in Home_ ctr).
           *     $akc is module method in Mcls Home_ ctr, not global fn !!
           *     because Mcls Home_ ctr knows what akc parameters mean.
           *     Shared cls Config_ allsites does not know what akc parameters mean.
           *     So Config_ allsites does routing ($pp1->uriq from URL) and dispatching (call $akc)
           * ****************************************** 
          */
                //$accessor = "get" . ucfirst(strtolower($akc));


