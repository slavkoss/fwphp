<?php
declare(strict_types=1);
/**
*  J:\awww\www\fwphp\glomodul\post_category\Tbl_crud.php
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_category ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;
//use B12phpfw\module\post_category\Home_ctr ;


// Gateway class - separate DBI layers
class Tbl_crud //implements Db_allsites_Intf //Db_post_category extends Db_allsites
{
  static protected $pp1 ; 
  //Db_allsites_ORA or Db_allsites for MySql or ... :
  static protected $utldb ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER

  static protected $tbl = "category";

  //self is used to access static or class variables or methods
  //this is used to access non-static or object variables or methods
  public function __construct(object $pp1) { 
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;
  }

  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

    $cursor =  self::$utldb::dd( $pp1, $other ) ;
    return '' ;
  }



          //$pp1
        //, "SELECT $dmlrr FROM ".self::$tbl." WHERE $qrywhere ORDER BY title"
        //, $binds=[]
        //, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
  static public function get_cursor(
      object $pp1, string $dmlrr, string $qrywhere="'1'='1'", array $binds=[]
    , array $other=[]): object
  {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

    $cursor =  self::$utldb::get_cursor( //$pp1
         "SELECT $dmlrr FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds
       , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } 


  // pre-query
  static public function rr_all(
       object $pp1
     , string $dmlrr
     , string $qrywhere="'1'='1'"
     , array $binds=[]
     , array $other=[]
  ): object  //returns $cursor
  {
      self::$pp1 = $pp1 ;
      if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

      //$rcnt = self::$utldb::rrcount(self::$tbl) ;
      //return (int)$rcnt ;
      // default SQL query
      $cursor =  self::$utldb::get_cursor( //$pp1
          "SELECT $dmlrr FROM ".self::$tbl." WHERE $qrywhere ORDER BY title"
        , $binds=[]
        , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    //$self::$utldb::disconnect(); //problem ON LINUX
    return $cursor ;
  }



  static public function rrnext(object $cursor, array $other=[] ): object
  {
    $rx = self::$utldb::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }

  static public function rrcnt( object $pp1, string $tbl, array $other=[] ): int { 
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

    $rcnt = self::$utldb::rrcount($tbl) ;
    return (int)$rcnt ;
    //return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( object $pp1
     , string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    $cursor_rowcnt =  self::$utldb::get_cursor( //$pp1
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    //return $cursor_rowcnt ;
    $rcnt = self::rrnext( $cursor_rowcnt
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt ;
  }





  /* public function rr_last_id(object $dm) {
    return utl::rr_last_id(self::$tbl) ;
  } */


  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
        utl::escp($_POST["category_title"])
      , utl::escp($_SESSION['username'])
      //, utl::escp($_SESSION['datetime'])
    ] ;
    return $submitted ;
  }

  /*
  * on-insert
  * 
  * called from submit code in view script eg c a t e g o r i e s.php 
  *     not via H o m e _ c t r !
  *
  * public function cc(UserInterface $user) 
  */
  static public function cc( object $pp1
      //string $tbl, string $flds, string $valsins, array $binds=[]
    , array $other=[]
  ): object //return id or 'err_c c'
  {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

              if ($pp1->dbg)

                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' said'.'</h3>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
              }

    // 1. S U B M I T E D  F L D V A L S
      $submitted_cc = self::get_submitted_cc() ;
      list( $title, $username ) = $submitted_cc ;
      $_SESSION["submitted_cc"] = $submitted_cc ;

                   //$CurrentTime = time(); 
                   //$datetime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime); //deprecated
      //setlocale(LC_TIME, "en_US");
      $datetime = date('Y-m-d H:i:s', time());


    // 2. C C  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      case (empty($title)): //||empty($Name)))
        $err = "category_title field must be filled out"; break ;
      //default: break;
    }
    
    if ($err > '') { $_SESSION["ErrorMessage"]= $err ;
      utl::Redirect_to($pp1->module_url.QS.'i/cc/'); goto fnerr ; // Add row
      //better Redirect_to($pp1->cre_row_frm) ? - more writing, cc fn in module ctr not visible
      //exit(0) ;
    }


    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    $flds    = "title, author, datetime" ; //names in data source
    $valsins = "VALUES(:title, :username, :datetime)" ;
    $binds = [
        ['placeh'=>':title',    'valph'=>$title, 'tip'=>'str']
      , ['placeh'=>':username', 'valph'=>$username, 'tip'=>'str']
      , ['placeh'=>':datetime', 'valph'=>$datetime, 'tip'=>'str']
    ] ;

    //$last_id1 = self::$utldb::rr_last_id($tbl) ;



      // =============================================
      // Assign  $ p p 1 = array of module and above module properties
      // =============================================
      //$pp1 = (array)$pp1 ;
      //$pp1['cc_params'] = [self::$tbl, $flds, $valsins, $binds] ;
      //$pp1 = (object)$pp1 ;
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' said'.'</h3>';
                  //echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
                }
    //$cursor = self::$utldb::cc($pp1, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    $cursor = self::$utldb::cc( //$pp1
        $cc_params = [self::$tbl, $flds, $valsins, $binds]
      , $other=['caller'=>__FILE__.' '.',ln '.__LINE__]
    );

    //$last_id2 = utldb::rr_last_id($tbl) ;

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Something went wrong (cre admin). Try Again !"; }

      // http://dev1:8083/fwphp/glomodul/blog/?i/categories/
      utl::Redirect_to($pp1->module_url.QS.'i/categories/'); // i/cc ok for small tbls
      return((object)['1']);
      fnerr:
      return((object)['0']);






    /*
    // 1. S U B M I T E D  F L D V A L S :
    $category_title = $_POST["category_title"];
    $username       = $_SESSION['username'];
    // 2. V A L I D A T I O N
    $valid = true ;
    if(empty($category_title)){ $valid = false;
      $_SESSION["MsgErr"] = "All fields must be filled out";
      utl::Redirect_to($pp1->categories);
    }elseif (strlen($category_title)<3) { $valid = false;
      $_SESSION["MsgErr"] = "Category title should be greater than 2 characters";
      utl::Redirect_to($pp1->categories);
    }elseif (strlen($category_title)>49) { $valid = false;
      $_SESSION["MsgErr"] = "Category title should be less than than 50 characters";
      utl::Redirect_to($pp1->categories);
    }
    if (!$valid) {goto fnerr ;}


    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    $flds    = "title, author, datetime" ; //names in data source
    $valsins = "VALUES(:category_title,:username,:datetime)" ;
    $binds = [
      ['placeh'=>':category_title', 'valph'=>$category_title, 'tip'=>'str']
     ,['placeh'=>':username',    'valph'=>$username, 'tip'=>'str']
     ,['placeh'=>':datetime',     'valph'=>$datetime, 'tip'=>'str']
    ] ;

    //$last_id1 = self::$utldb::rr_last_id($tbl) ;
    $cursor = self::$utldb::cc(
        //self::$tbl      , $flds      , $valsins      , $binds
        $pp1
      , $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    //$last_id2 = self::$utldb::rr_last_id($tbl) ;

    return((object)['1']); //return('1');
    fnerr:
    return((object)['0']);
    */

  }




} // e n d  c l s  T b l_ c r u d




/**
*        DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
*        (PRE) CRUD class - DAO (Data Access Object) or data mapper
*      This c l a s s is for one module - does know module's CRUD
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not functionality !
*/




    //public function __construct($saltLength=NULL)
    //{
      /** 
      * NO NEED (COMPLICATED -> CAN HARM) to instantiate parent 
      * (occupy memory with global fn-s and variables) because 
      * methods in this cls use CRUD methods in global $db object
      * which is their parameter !!
      */
        // Call parent constructor to get or create db object
        //parent::__construct(); 
    //}
