<?php
declare(strict_types=1);
/**
* J:\awww\www\fwphp\glomodul\post\Tbl_crud.php
*     This c l a s s is for one module - does know module's CRUD
*          DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not functionality !
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post ;

use B12phpfw\core\b12phpfw\Interf_Tbl_crud ;

use B12phpfw\core\b12phpfw\Db_allsites as utldb ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\module\blog\Home_ctr ;
/*
class Repcls {
  public $db ;

  public function __construct(IDBcls $db)  { $this->db = $db; }
  public function rr() { $this->db->rr(); }
}
*/
// Gateway class - separate DBI layers
class Tbl_crud //implements Interf_Tbl_crud //Db_post //extends Db_ allsites //was Home
{

  //Db_allsites_ORA or Db_allsites for MySql or ... :
  static protected $utldb ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER

  static protected string $tbl = "posts";

  //self is used to access static or class variables or methods
  //this is used to access non-static or object variables or methods
  public function __construct(Interf_Tbl_crud $utldb) { 
    self::$utldb = $utldb;
  }

  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  utldb::dd( $pp1, $other ) ;
    return '' ;
  }

  // *******************************************
  //                     R E A D
  // *******************************************

  static public function get_cursor( //instead rr
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[]): object
  {
    $cursor =  utldb::get_cursor("SELECT $sellst FROM ".self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  /* static public function rr(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[] ): object
  { //object $dm
    $cursor =  utldb::rr("SELECT $sellst FROM ".self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } */

  static public function rrcnt( string $tbl, array $other=[] ): int { 
    $rcnt = utldb::rrcount($tbl) ;
    return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( //string $sellst,
    string $qrywhere='"1"="1"', array $binds=[], array $other=[] ): int
  {
                    //echo '<pre>'.__METHOD__.'SAYS: $other='; print_r($other); echo '</pre>';
    $cursor_rowcnt_filtered_posts =  utldb::get_cursor(
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    $rcnt = self::rrnext( $cursor_rowcnt_filtered_posts
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt ;
  } 

  static public function rr_byid( int $id, array $other=[] ): object
  {
    $cursor =  utldb::get_cursor("SELECT * FROM ".self::$tbl." WHERE id=:id"
    ,$binds=[ ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int'] ]
    ,$other=['caller2' => __FILE__ .' '.', ln '. __LINE__ , 'caller1' => $other['caller'] ]
    ) ;
    $rx = utldb::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }


  static public function rrnext(object $cursor, array $other=[]): object
  {
    // not used
    $rx = utldb::rrnext($cursor) ;
    return $rx ;

  }


  // pre-query
  static public function rr_all(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[]
       , array $other=[]): object  //returns $cursor
  {
    $category_from_url = $other['category_from_url'] ;
    //////// open cursor (execute-query, loop is in view script)
    if ($category_from_url)
    {
      //SQL Query if user clicked categ.name (FILTER BY  C ATEGORY_ FROM_ U R L is active)
      // *********************************************************************************
      $cursor = $Db_allsites->rr("SELECT $sellst FROM ".self::$tbl
         ." WHERE category = :category_from_url ORDER BY datetime desc"
      ,$binds=[ ['placeh'=>':category_from_url', 'valph'=>$category_from_url, 'tip'=>'str']]
      ,$other=['caller2'=> __FILE__ .' '.', ln '. __LINE__, 'caller1'=>$other['caller']]
      ) ;
    }

    else{
      //             DEFAULT SQL QUERY :
      $cursor = utldb::get_cursor( "SELECT $sellst FROM ".self::$tbl." ORDER BY datetime desc"
         , $binds, $other ) ;
      return $cursor ;
    }

    //$utldb::disconnect(); //problem ON LINUX
    //self::$cursor = $cursor ;
    return $cursor ;


  }

  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [
     $_POST["PostTitle"]
    ,$_POST["Category"]
    ,"Uploads/".basename($_FILES["Image"]["name"])
    ,$_SESSION['username']
    ,$_FILES["Image"]["name"]
    ,$_POST["img_desc"] // self::escp($_POST["img_desc"])
    ,$_POST["SummaryDescription"]
    //$_POST["PostDescription"]; //in op.system file
    ,strftime("%Y-%m-%d %H:%M:%S",time())
    ] ;
    return $submitted ;
  }
  //  c c(UserInterface $user) {
  static public function cc( object $pp1, array $other=[]): object  //was string
  {
    // 1. S U B M I T E D  F L D V A L S - P R E / O N  I N S E R T
      $submitted_cc = self::get_submitted_cc() ;
      list( $PostTitle, $Category, $Target, $Admin, $imageName, $img_desc
            , $SummaryText, $datetime
      ) = $submitted_cc ;
      $_SESSION["submitted_cc"] = $submitted_cc ;


    // 2. C C  V A L I D A T I O N
    $valid = '1' ;
    switch (true) {
      case (empty($PostTitle)||empty($Category)):
        $valid = "Title and Category Cant be empty"; break ;
      case (strlen($PostTitle)<5): $valid = "Post Title is minimum 5 characters"; break ;
      case (strlen($img_desc)>4000): $valid = "Image Description is max 4000 characters"; break ;
      case (strlen($SummaryText)>4000): $valid = "Summary is max 4000 characters"; break ;
      //default: break;
    }

    if ($valid === '1') {} else {
      $_SESSION["MsgErr"]= $valid ;
      utl::Redirect_to($pp1->addnewpost);
      goto fnend ; //exit(0) ;
    }

    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    $flds     = "datetime,title,category,author,image, post, summary, img_desc" ;
    $valsins  = "VALUES(:datetime,:postTitle,:categoryName,:adminname
                         ,:imageName, 'post 10 kB is not used, title contains OS_file_name.txt', :SummaryText, :img_desc)" ; //,:postDescription
    $binds = [
      ['placeh'=>':datetime',     'valph'=>$datetime, 'tip'=>'str']
     ,['placeh'=>':postTitle',    'valph'=>$PostTitle, 'tip'=>'str']
     ,['placeh'=>':categoryName', 'valph'=>$Category, 'tip'=>'str']
     ,['placeh'=>':adminname',    'valph'=>$Admin, 'tip'=>'str']
     ,['placeh'=>':imageName',    'valph'=>$imageName, 'tip'=>'str']
     ,['placeh'=>':SummaryText',  'valph'=>$SummaryText, 'tip'=>'str']
     ,['placeh'=>':img_desc',     'valph'=>$img_desc, 'tip'=>'str']
    ] ;

    $cursor = utldb::cc(self::$tbl, $flds, $valsins, $binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);

    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

    //if($cursor){ $_SESSION["MsgSuccess"]="Post added Successfully";
    //}else { $_SESSION["MsgErr"]= "Post adding went wrong. Try Again !"; }

    utl::Redirect_to($pp1->addnewpost);

    return((object)['1']);
    fnend:
  }


  static public function get_submitted_uu(): array //return '1'
  {
    $submitted = [
       $_POST["PostTitle"]
      ,$_POST["Category"]
      ,"Uploads/".basename($_FILES["Image"]["name"])
      ,$_FILES["Image"]["name"]
      ,$_POST["img_desc"]
      ,$_POST["SummaryDescription"]
      //$PostText  = $_POST["PostDescription"];
    ] ;
    return $submitted ;
  }
  // O N - U P D A T E (P R E - U P D A T E)
  static public function uu( object $pp1, array $other=[]): string //return id or 'err_c c'
  {
    // 1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
    list( $PostTitle, $Category, $Target, $Image, $img_desc, $SummaryText ) = self::get_submitted_uu() ; //$PostText

    // 2. U U  V A L I D A T I O N
    $valid = '1' ;
    switch (true) {
      case (empty($PostTitle)): $valid = "Title Cant be empty"; break ;
      case (strlen($PostTitle)<5): $valid = "Post Title should be min 4 characters"; break ;
      case (strlen($img_desc)>4000): $valid = "Image Descr. should be max 4000 chars"; break ;
      case (strlen($SummaryText)>4000): $valid = "Summary should be max 4000 chars"; break ;
      //default: break;
    }
    if ($valid === '1') {} else {
      $_SESSION["MsgErr"]= $valid ;
      utl::Redirect_to($pp1->posts);
      goto fnend ; //exit(0) ;
    }


    // 3. U P D A T E  D B T B L R O W
      // Query to Update Post in DB When everything is fine
      // NOT USED : post='$PostText' I replaced it with mkd file
      $flds     = "SET title=:PostTitle, category=:Category
                     , summary=:SummaryText, img_desc=:img_desc" ;
      $qrywhere = "WHERE id=:id" ;
      $binds = [
        ['placeh'=>':PostTitle',  'valph'=>$PostTitle, 'tip'=>'str']
       ,['placeh'=>':Category',   'valph'=>$Category, 'tip'=>'str']
       ,['placeh'=>':SummaryText','valph'=>$SummaryText, 'tip'=>'str']
       ,['placeh'=>':img_desc',   'valph'=>$img_desc, 'tip'=>'str']
       ,['placeh'=>':id',  'valph'=>$pp1->uriq->id, 'tip'=>'int']
      ] ;
      if (!empty($_FILES["Image"]["name"])) {
        $flds    .= ", image=:Image" ;
        $binds[] = ['placeh'=>':Image', 'valph'=>$Image, 'tip'=>'str'] ;
      }

      $cursor = utldb::uu( self::$tbl, $flds, $qrywhere, $binds );

      // 4. U P L O A D  I M A G E
      move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);


      //var_dump($cursor);
      if($cursor){ $_SESSION["MsgSuccess"]="Post Updated Successfully";
      }else { $_SESSION["MsgErr"]= "Post Update went wrong. Try Again !"; }

      return('1');

      fnend:
  }



} // e n d  c l a s s  T b l_ c r u d



    //public function __construct() //eg '2019-10-05 01:00:00'
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

