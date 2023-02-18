<?php
// J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
// DEFAULT CTR ONLY ONE FOR MODULE-IN-OWN-DIR IS ENOUGH, but may be more.
namespace B12phpfw\glomodul\oraedoop ;

use B12phpfw\core\b12phpfw\Config_allsites ;

// was App, Route_dispatch :
class Home_ctr extends Config_allsites //Home_mdl
{
  // $saltLength=NULL
  public function __construct(object $pp1)
  {
    //parent::__construct($pp1);
    $this->set_default_cls_states_atr($this->pp1);

    // R O U T I N G  T A B L E  (ok for modules in own dir) 
    //We have one tbl 

    //$this->pp1->autoloads       = $autoloads ; 
    //$this->pp1->act_record      = false ; 
          //Format version string $version = trim(substr('$Revision: 1.20 $', 10, -1));
    $this->pp1->home           = QS.'i/home/' ;
    $this->pp1->login          = QS.'i/login/' ;
    //$this->pp1->tbl             = QS.'i/read_tbl/' ; //.'i/login/' 
    $this->pp1->logout          = QS.'i/logout_me/' ; 
    //
    $this->pp1->filter_page     = QS.'i/home/p/' ; // i/home/

    //e n d  R O U T I N G  T A B L E
                        if ('') {
                          //echo ( json_encode($_SESSION, JSON_PRETTY_PRINT) ) ;
                          self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s002. '
                           ,'$this->pp1->dbi_obj'=>isset($this->pp1->dbi_obj)?$this->pp1->dbi_obj:'NOT SET'
                           //,'self::$dbi_obj'=>isset(self::$dbi_obj)?self::$dbi_obj:'NOT SET'
                           ,'$_SESSION'=>isset($_SESSION)?$_SESSION:'NOT SET'
                           ] ) ; }
    /** ************** coding step cs04. *******************
    *   4. MODULE C O N T R O L L E R and DISPATCHER 
    *     (includes, calls, http jumps only to other module)
    ***************************************************** */
    //i = ctrakcmethod of this cls  (H o m e) which includes view script or calls method (does tblrowCRUD...)
    $akc = $this->uriq->i ; //home: uriq = url query string
    $this->$akc() ; //include(str_replace('|','/', $this->uriq->i.'.php'));


  } // e n d  f n  __ c o n s t r u c t


          //******************************************
          //       DISPATCH  M E T H O D S
          // they call other methods or include script
          //******************************************

  //******************************************
  // 24. fns 300 lines
  //******************************************

  private function home()
  {
    if ( isset($_POST['blk_rowsnum']) and (int)$_POST['blk_rowsnum'] > -1 )
    { $_SESSION['states']->blk_rowsnum = $_POST['blk_rowsnum'] ; }

   if ( isset($_POST['table']) and $_POST['table'] > ' ' )
    { $_SESSION['states']->table = $_POST['table'] ; }

    //$this->set_ses2this(); //sesvar -> atr.klase
    //$this->set_this2ses(); //atr.klase u sesvar - npr kada postedvar promjeni sesvar

    if (
      ( !isset($_SESSION['cncts']->username) or empty($_SESSION['cncts']->username) )
      //or
      //( !isset($_POST['cncts']['username']) or empty($_POST['cncts']['username']) )
    )
    { 
      // PAGE 1 : 26.  l o g i n . f o r m  - p rijava na bazu
      require 'hdr.php';
                 //require $this->pp1->wsroot_path . 'zinc/hdr.php';
      include 'login_frm.php';
                      //require $this->pp1->module_path . 'oraedoop.php';
      require 'ftr.php';
    
    } else {
      // PAGE 2: get or new  d b o b j : Automatically populated SQL (popup mode)
      require 'hdr.php';
      include 'read_tbl.php';
      include 'ftr.php';
    } // end page 2: ako nije ($conn == false) Automatically populated SQL (popup mode)

  }

  //        u s e r  r e a d
    private function login()
    {
      $this->set_this2ses(); //atr.klase u sesvar - npr kada postedvar promjeni sesvar
      $this->set_ses2this(); //sesvar -> atr.klase
      $this->Redirect_to($this->pp1->home.'p/1/') ;
      //works : $this->Redirect_to($this->pp1->module_url.QS.'i/home/') ;
      //$this->Redirect_to($this->pp1->module_url.QS.'i/rt/') ; // to  t b l
      //if (isset($this->uriq->r)) { $this->Redirect_to(QS.'i/'.$this->uriq->r) ; }
    }

  private function logout_me(&$pp1) //pof_ d isconnect()
  { 
     //global $conn; if ($conn) ocilogoff($conn);  //oci_close()
    //$this->logout() ;
    $this->clearses($pp1) ;
    $this->set_this2ses() ;
    $this->set_ses2this() ;
    $this->Redirect_to($this->pp1->home) ;
  }






    public function set_default_cls_states_atr(&$pp1) {
        //public $aplpath     = null; public $aplurl      = null;
        $this->pp1->states->debug   = false;
        $this->pp1->cncts->username = null ;
        $this->pp1->cncts->password = null ;
        $this->pp1->cncts->service  = null ;
        //
        $this->pp1->states->entrymode        = 'popups';
        $this->pp1->states->act_record       = false;
        $this->pp1->states->blk_startrow     = 1 ;
        $this->pp1->states->blk_rowsnum      = 10;
        //
        $this->pp1->states->table            = '';
        $this->pp1->states->select           = '*';
        $this->pp1->states->where            = '';
        $this->pp1->states->set              = 1;
        //
        $this->pp1->states->exportformat     = 'xml';
        $this->pp1->states->csrftoken        = null ;
        $this->pp1->states->sql              = '';
        $this->pp1->states->history          = []; //remembered dml statesments
        $this->pp1->states->cache            = []; //remembered dml statesments
        $this->pp1->states->blk_rowsnums     = [10,25,50,100,1000,10000] ;
        //
    }


//class Ses {
  /**
   * 3 METHODS TO STORE, FETCH AND CLEAR THE SESSION VALUES
   *       to provide a statesful web experience:
   *
   * When any of  c l s (ee this) attr. change, (A n y C o)  appl.
   * will call set_this 2ses() to RECORD CHANGED states. Later when another appl.
   * request starts processing, its script will call set_ses 2this() method
   * to retrieve saved attr. values so : ternary "?:" tests will use session value
   * if there is one, or else use a hardcoded default.
  */

    public function clearses(&$pp1) {
      //3. CLEAR SESSION VALUES
      // Logout current D B  u s e r
        $blk_startrow = $this->pp1->states->blk_startrow ;
        $blk_rowsnum  = $this->pp1->states->blk_rowsnum ;

        $this->set_default_cls_states_atr($pp1) ;

        $this->pp1->states->blk_startrow = $blk_startrow ;
        $this->pp1->states->blk_rowsnum  = $blk_rowsnum ;


        $_SESSION = [] ;
        $_SESSION['cncts']  = $this->pp1->cncts ;
        $_SESSION['states'] = $this->pp1->states ;
    } // end clear ses

  public function set_this2ses() 
  {
    //    ~~~~~~~ 1. STORE SESSION VALUES ~~~~~~~
        //$_SESSION['states']->aplurl'] = $this->aplurl; //$_SESSION['states']->aplpath'] = $this->aplpath;
        // m o d u l e  s t a t e s :
        $_SESSION['cncts']          = $this->pp1->cncts;
        $_SESSION['states']         = $this->pp1->states;
        //
    // 6. data for LOVs of page parameters:
    //if (! isset($_SESSION['states']->exportformat' ])) $_SESSION['states']->exportformat' ] = 'xml';
    // 7. Initialize  D B c o n  parameters :  or isset($_REQUEST[ 'disconnect' ])
    //if ( !isset($_SESSION['cncts']) ) $this->c learses(); // p of_b lanksession()

    if (isset($_POST[ 'cncts' ]))
    {
      if ( is_array($_POST[ 'cncts' ]) and count($_POST[ 'cncts' ]) > 0 )
      {
        //$this->c learses(); // p of_bl anksession()

        $_SESSION['cncts'] = (object)$_POST[ 'cncts' ] ;

          if (isset($_POST[ 'cncts' ][ 'username' ])) {
            $_SESSION['cncts']->username =
                substr(trim(
            preg_replace('/[^a-zA-Z0-9$_-]/', '', $_POST[ 'cncts' ][ 'username' ])
                     ), 0, 30);
          }
          if (isset($_POST[ 'cncts' ][ 'password' ])) {
            $_SESSION['cncts']->password = 
              substr(trim($_POST[ 'cncts' ][ 'password' ]), 0, 30);
          }
          if (isset($_POST[ 'cncts' ][ 'service' ])) {
            $_SESSION['cncts']->service = 
              substr(trim(preg_replace('|[^a-zA-Z0-9:.() =/_-]|', '', $_POST[ 'cncts' ][ 'service' ])), 0, 2000);
          }
      }  /// end if c o n n ...
    }
  } // end set ses

  public function set_ses2this() 
  {
    //2. FETCH SESSION VALUES
    if (isset($_SESSION['cncts'])) {$this->pp1->cncts = $_SESSION['cncts'];}
    if (isset($_SESSION['states'])) {$this->pp1->cncts = $_SESSION['states'];}
          //$this->aplurl = isset($_SESSION['states']->aplurl']) ? $_SESSION['states']->aplurl'] : null;
          //$this->aplpath = isset($_SESSION['states']->aplpath']) ? $_SESSION['states']->aplpath'] : null;
  } // end get ses

    /*
    // 9. Initialize debug mode
    if (! isset($_SESSION['states']->debug' ])) $_SESSION['states']->debug' ] = false;
    if (isset($_REQUEST[ 'debug' ])) $_SESSION['states']->debug' ] = ($_REQUEST[ 'debug' ] == 1);

    // 10. Initialize / drop DDL cache
    if (! isset($_SESSION['states']->cache' ]))   $_SESSION['states']->cache' ] = array();
    if (isset($_REQUEST[ 'dropcache' ])) $_SESSION['states']->cache' ] = array();

    // 11. Initialize entry mode
    if (! isset($_SESSION['states']->entrymode' ])) $_SESSION['states']->entrymode' ] = 'popups';

    // 12. Initialize SQL filter fields
    if (! isset($_SESSION['states']->sql'     ])) $_SESSION['states']->sql'     ] = '';
    if (! isset($_SESSION['states']->table'   ])) $_SESSION['states']->table'   ] = '';
    if (! isset($_SESSION['states']->select'  ])) $_SESSION['states']->select'  ] = '*';
    if (! isset($_SESSION['states']->where'   ])) $_SESSION['states']->where'   ] = '';
    if (! isset($_SESSION['states']->set'     ])) $_SESSION['states']->set'     ] = 1;
    // default pg=10 rows :
    if (! isset($_SESSION['states']->blk_rowsnum' ])) 
    {$_SESSION['states']->blk_rowsnum' ] = $this->pp1->states->blk_rowsnums[ 0 ];}

    if (isset($_REQUEST[ 'select' ]))
       $_SESSION['states']->select' ] = trim($_REQUEST[ 'select' ]);
    */
    ///////////////////////////////



  //e n d  3 METHODS TO STORE, FETCH AND CLEAR THE SESSION VALUES



  //not allowed : include 'Home_mdl.php';



    /* switch (true) 
    {
      default: //i = ctrakcmethod of this cls  (H o m e) which includes view script or calls method (does tblrowCRUD...)
        $akc = $this->uriq->i ; //home: uriq = url query string
        $this->$akc() ;
        break;
              //include(str_replace('|','/', $this->uriq->i.'.php'));  break;
    } */
      /*case isset($this->uriq->c) : //and $this->uriq->c == 'home' and count( (array)$this->uriq )  == 1
        //       CALL CLSAKCMETHOD  $A K C  IN CLS  $C T R :
        //http://dev1:8083/fwphp/glomodul/adrs?c/tbl/m/l/ - see top toolbar href
        $nsctr = $this->pp1->vendor_namesp_prefix . '\\' . ucfirst($this->uriq->c) . '_ctr' ;
        $akc = $this->uriq->m ;
        $obj = n ew $nsctr($this, $this->pp1) ; //$this is $db in index.php !!
        $obj->$akc() ; 
        break;
                //c a l l  (ONLY db object`s)  m e t h o d :
                // $obj = 'db'; $akc = $this->uriq->a ; 
                // $$obj->{$akc}() ; // $$obj contains "obj" = name of variable, so $$obj=$db
      */


} // e n d  c l s  C onfig_ m ini3