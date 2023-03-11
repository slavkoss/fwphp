<?php
declare(strict_types=1);
/**
* J:\awww\www\fwphp\glomodul\post\Tbl_crud.php
* Tbl_crud cls is instantiated in index.php after shared_dbadapter_obj which is it's parameter in $pp1
*     This c l a s s is for one module - does know module's CRUD
*          DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not f unctionality !
*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post ;

//use B12phpfw\core\b12phpfw\Db_allsites_Intf ;
//use B12phpfw\core\b12phpfw\Db_allsites as db_shared ; //(NOT HARD CODED) SHARED DBADAPTER

use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\module\blog\Home_ctr ;


// Gateway class - separate DBI layers
class Tbl_crud //implements Db_allsites_Intf //Db_post //extends Db_ allsites //was Home
{

  static protected $pp1 ; 
  //Db_allsites_ORA or Db_allsites for MySql or ... :
  static protected $db_shared ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER

  //string after protected does not work on Linux php 7.3.33
  static protected $tbl = "posts"; 

  //self is used to access static or class variables or methods
  //this is used to access non-static or object variables or methods
  public function __construct(object $pp1) { 
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$db_shared = $pp1->shared_dbadapter_obj ;
  }

  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  self::$db_shared::dd( $pp1, $other ) ;
    return '' ;
  }

  // *******************************************
  //                     R E A D
  // *******************************************

  static public function get_cursor( object $pp1 // new in ver. 10.0.3.0
    , string $dmlrr
    , string $qrywhere="'1'='1'"
    , array $binds=[]
    , array $other=[]): object
    //was string $dmlrr, string $qrywhere="'1'='1'", array $binds=[], array $other=[]): object
  {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$db_shared = $pp1->shared_dbadapter_obj ;

    $cursor =  self::$db_shared::get_cursor( //$pp1
         "SELECT $dmlrr FROM ".self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  /* static public function rr(
    string $dmlrr, string $qrywhere="'1'='1'", array $binds=[], array $other=[] ): object
  { //object $dm
    $cursor =  self::$db_shared::rr("SELECT $dmlrr FROM ".self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } */

  static public function rrcnt( object $pp1, string $tbl, array $other=[] ): int { 
    $rcnt = self::$db_shared::rrcount($tbl) ;
    return (int)$rcnt ;
    //return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( object $pp1
     , string $qrywhere='"1"="1"', array $binds=[], array $other=[] ): int
  {
                    //echo '<pre>'.__METHOD__.'SAYS: $other='; print_r($other); echo '</pre>';
    $cursor_rowcnt_filtered_posts =  self::$db_shared::get_cursor( //$pp1
         "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    $rcnt = self::rrnext( $cursor_rowcnt_filtered_posts
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt ;
  } 

  static public function rr_byid( int $id, array $other=[] ): object
  {
    $cursor =  self::$db_shared::get_cursor( //$pp1
        "SELECT * FROM ".self::$tbl." WHERE id=:id"
      , $binds=[ ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int'] ]
      , $other=['caller2' => __FILE__ .' '.', ln '. __LINE__ , 'caller1' => $other['caller'] ]
    ) ;
    $rx = self::$db_shared::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }


  static public function rrnext(object $cursor, array $other=[]): object
  {
    // not used
    $rx = self::$db_shared::rrnext($cursor) ;
    return $rx ;

  }


  // pre-query
  static public function rr_all(
    string $dmlrr, string $qrywhere="'1'='1'", array $binds=[]
       , array $other=[]): object  //returns $cursor
  {
    $category_from_url = $other['category_from_url'] ;
    //////// open cursor (execute-query, loop is in view script)
    if ($category_from_url)
    {
      //SQL Query if user clicked categ.name (FILTER BY  C ATEGORY_ FROM_ U R L is active)
      // *********************************************************************************
      $cursor = $Db_allsites->rr("SELECT $dmlrr FROM ".self::$tbl
         ." WHERE category = :category_from_url ORDER BY datetime desc"
      ,$binds=[ ['placeh'=>':category_from_url', 'valph'=>$category_from_url, 'tip'=>'str']]
      ,$other=['caller2'=> __FILE__ .' '.', ln '. __LINE__, 'caller1'=>$other['caller']]
      ) ;
    }

    else{
      //             DEFAULT SQL QUERY :
      $cursor = self::$db_shared::get_cursor( //$pp1
          "SELECT $dmlrr FROM ".self::$tbl." ORDER BY datetime desc"
        , $binds, $other ) ;
      return $cursor ;
    }

    //$self::$db_shared::disconnect(); //problem ON LINUX
    //self::$cursor = $cursor ;
    return $cursor ;


  }

  static public function get_sub_mitted_cc(): array //return '1'
  {
    $sdata = [
     $_POST["PostTitle"]
    ,$_POST["Category"]
    ,"Uploads/".basename($_FILES["Image"]["name"])
    ,$_SESSION['username']??'Guest'
    ,$_FILES["Image"]["name"]
    ,$_POST["img_desc"] // self::escp($_POST["img_desc"])
    ,$_POST["SummaryDescription"]
                    //,$_POST["PostDescription"]; //in op.system file
                    //,strftime("%Y-%m-%d %H:%M:%S",time())
    //setlocale(LC_TIME, "en_US");
    , date('Y-m-d H:i:s', time())
    ] ;
    return $sdata ;
  }

  //  c c(UserInterface $user) {
  static public function cc( object $pp1, array $other=[]): object  //was string
  {
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                if ('' and isset($_POST["subm_add"])) {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' said'.'</h3>';
                  //echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                  //echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  exit(0);
                }
     self::$pp1 = $pp1 ;
     if (isset($pp1->shared_dbadapter_obj)) self::$db_shared = $pp1->shared_dbadapter_obj ;

    // 1. S U B M I T E D  F L D V A L S - P R E  and  O N  I N S E R T
      $sdata = self::get_sub_mitted_cc() ;
      //$_SESSION["sdata"] = $sdata ;
     list( $PostTitle, $Category, $Target, $Admin, $imageName, $img_desc, $SummaryText, $datetime)
     = $sdata ;


    // 2. C C  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      case (empty($PostTitle)||empty($Category)): $err = "Title and Category Cant be empty"; break ;
      case (strlen($PostTitle)<5): $err = "Post Title is minimum 5 characters"; break ;
      case (strlen($img_desc)>4000): $err = "Image Description is max 4000 characters"; break ;
      case (strlen($SummaryText)>4000): $err = "Summary is max 4000 characters"; break ;
      //default: break;
    }

    if ($err > '') { $_SESSION["MsgErr"]= $err ;
       utl::Redirect_to($pp1->module_url.QS.'i/cc/'); 
      goto fnerr ; //e xit(0) ;
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

    $cursor = self::$db_shared::cc(
          $cc_params = [self::$tbl, $flds, $valsins, $binds]
      , $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);

    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

    //if($cursor){ $_SESSION["MsgSuccess"]="Post added Successfully";
    //}else { $_SESSION["MsgErr"]= "Post adding went wrong. Try Again !"; }

    //utl::Redirect_to($pp1->addnewpost);

      return((object)['1']);
      fnerr:
      return((object)['0']);
  }


  static public function get_sub_mitted_uu(): array //return '1'
  {
    $sdata = [
       $_POST["PostTitle"]
      ,$_POST["Category"]
      ,"Uploads/".basename($_FILES["Image"]["name"])
      ,$_FILES["Image"]["name"]
      ,$_POST["img_desc"]
      ,$_POST["SummaryDescription"]
      //$PostText  = $_POST["PostDescription"];
    ] ;
    return $sdata ;
  }
  // O N - U P D A T E (P R E - U P D A T E)
  static public function uu( object $pp1, array $other=[]): string //return id or 'err_c c'
  {
    // 1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
    list( $PostTitle, $Category, $Target, $Image, $img_desc, $SummaryText ) = self::get_sub_mitted_uu() ; //$PostText

    // 2. U U  V A L I D A T I O N
    $err = '1' ;
    switch (true) {
      case (empty($PostTitle)): $err = "Title Cant be empty"; break ;
      case (strlen($PostTitle)<5): $err = "Post Title should be min 4 characters"; break ;
      case (strlen($img_desc)>4000): $err = "Image Descr. should be max 4000 chars"; break ;
      case (strlen($SummaryText)>4000): $err = "Summary should be max 4000 chars"; break ;
      //default: break;
    }
    if ($err === '1') {} else {
      $_SESSION["MsgErr"]= $err ;
      utl::Redirect_to($pp1->posts);
      goto fnend ; //e xit(0) ;
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

      $cursor = self::$db_shared::uu( self::$tbl, $flds, $qrywhere, $binds );

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

