<?php
declare(strict_types=1);
/**
*        DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
*        (PRE) CRUD class - DAO (Data Access Object) or data mapper
*      This c l a s s is for one module - does know module's CRUD
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not functionality !
*/

/**
*  J:\awww\www\fwphp\glomodul\post_category\Tbl_crud.php
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_category ;

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\module\blog\Home_ctr ;

use B12phpfw\core\zinc\Interf_Tbl_crud ;
use B12phpfw\core\zinc\Db_allsites ;

// Gateway class - separate DBI layers
class Tbl_crud implements Interf_Tbl_crud //Db_post_category extends Db_allsites
{
  static protected $tbl = "category";

  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  Db_allsites::dd( $pp1, $other ) ;
    return '' ;
  }

  static public function rr(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  Db_allsites::rr("SELECT $sellst FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    //$cursor =  Db_allsites::rr("SELECT $sellst FROM comments WHERE $qrywhere"
    $cursor_rowcnt =  Db_allsites::rr(
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    //return $cursor_rowcnt ;
    $rcnt = self::rrnext( $cursor_rowcnt
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt ;
  }


  // pre-query
  static public function rr_all( string $sellst, string $qrywhere="'1'='1'"
     , array $binds=[], array $other=[]): object  //returns $cursor
  {
      // default SQL query
      $cursor =  Db_allsites::rr("SELECT $sellst FROM ". self::$tbl
      ." WHERE $qrywhere ORDER BY title"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    //$Db_allsites::disconnect(); //problem ON LINUX
    return $cursor ;
  }


  /* public function rr_last_id(object $dm) {
    return Config_allsites::rr_last_id(self::$tbl) ;
  } */




  /*
  * on-insert
  * 
  * called from submit code in view script eg c a t e g o r i e s.php 
  *     not via H o m e _ c t r !
  *
  * public function cc(UserInterface $user) 
  */
  static public function cc( object $pp1, array $other=[]): string //return id or 'err_c c'
  {
    $CurrentTime = time(); $datetime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);

    // 1. S U B M I T E D  F L D V A L S :
    $category_title = $_POST["category_title"];
    $username       = $_SESSION["username"];
    // 2. V A L I D A T I O N
    $valid = true ;
    if(empty($category_title)){ $valid = false;
      $_SESSION["ErrorMessage"] = "All fields must be filled out";
      Config_allsites::Redirect_to($pp1->categories);
    }elseif (strlen($category_title)<3) { $valid = false;
      $_SESSION["ErrorMessage"] = "Category title should be greater than 2 characters";
      Config_allsites::Redirect_to($pp1->categories);
    }elseif (strlen($category_title)>49) { $valid = false;
      $_SESSION["ErrorMessage"] = "Category title should be less than than 50 characters";
      Config_allsites::Redirect_to($pp1->categories);
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

    //$last_id1 = Db_allsites::rr_last_id($tbl) ;
    $cursor = Db_allsites::cc(self::$tbl, $flds, $valsins, $binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    //$last_id2 = Db_allsites::rr_last_id($tbl) ;

    return('1');
    fnerr:
    return('0');
  }




} // e n d  c l s  T b l_ c r u d



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
