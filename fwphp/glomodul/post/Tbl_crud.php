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

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\module\blog\Home_ctr ;

use B12phpfw\core\zinc\Interf_Tbl_crud ;
use B12phpfw\core\zinc\Db_allsites ;

// Gateway class - separate DBI layers
class Tbl_crud implements Interf_Tbl_crud //Db_post //extends Db_ allsites //was Home
{

  static protected $tbl = "posts";


  /**
  * Like Oracle forms triggers - P R E / O N  D E L E T E
  * Called from 1. link $pp1->del_row in table view script eg c a t e g o r i e s.php
  *     2. H o m e _ c t r  'del_row' => QS.'i/del_ row_ do/', del_ row_ do()
  */
  static public function dd( object $pp1, array $other=[] ): string
  {
    $cursor =  Db_allsites::dd( $pp1, $other ) ;
    return '' ;
  }

  // *******************************************
  //                     R E A D
  // *******************************************
  static public function rr(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[] ): object
  { //object $dm
    $cursor =  Db_allsites::rr("SELECT $sellst FROM ".self::$tbl." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  static public function rr_byid( int $id, array $other=[] ): object
  { 
    $cursor =  Db_allsites::rr("SELECT * FROM ".self::$tbl." WHERE id=:id"
    ,$binds=[ ['placeh'=>':id', 'valph'=>$id, 'tip'=>'str'] ]
    ,$other=['caller2' => __FILE__ .' '.', ln '. __LINE__ , 'caller1' => $other['caller'] ]
    ) ;
    $rx = Db_allsites::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }

  static public function rrnext(object $cursor): object
  {
               //while (
    $rx = Db_allsites::rrnext($cursor) ;
               //): { $row = $rx ; } endwhile;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
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
      $cursor = Db_allsites::rr( "SELECT $sellst FROM ".self::$tbl." ORDER BY datetime desc"
         , $binds, $other ) ;
      return $cursor ;
    }

    //$Db_allsites::disconnect(); //problem ON LINUX
    return $cursor ;


  }


  //  c c(UserInterface $user) {
  static public function cc( object $pp1, array $other=[]): string //return id or 'err_c c'
  {
    // 1. S U B M I T E D  F L D V A L S - P R E / O N  I N S E R T
    $PostTitle   = $_POST["PostTitle"];
    $Category    = $_POST["Category"];
    $Target      = "Uploads/".basename($_FILES["Image"]["name"]);
    $Admin       = $_SESSION["username"];
    $imageName   = $_FILES["Image"]["name"];
    //$img_desc    = self::escp($_POST["img_desc"]) ;
    //$img_desc    = htmlspecialchars($_POST["img_desc"], ENT_QUOTES, 'UTF-8');
    $img_desc    = $_POST["img_desc"] ;
    //preg_replace('/\s+/', ' ', $input);
    $SummaryText = $_POST["SummaryDescription"];
    //$PostText  = $_POST["PostDescription"]; //in op.system file
    $CurrentTime = time(); $datetime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);

    // 2. C C  V A L I D A T I O N
    $valid = true;
    if(empty($PostTitle)){ $valid = false;
      $_SESSION["ErrorMessage"]= "Title Cant be empty";
      $dm->Redirect_to($pp1->addnewpost);
    }elseif (strlen($PostTitle)<5) { $valid = false;
      $_SESSION["ErrorMessage"]= "Post Title should be greater than 5 characters";
      $dm->Redirect_to($pp1->addnewpost);

    }elseif (strlen($img_desc)>3999) { $valid = false;
      $_SESSION["ErrorMessage"]= "Image Description should be less than than 4000 characters";
      $dm->Redirect_to($pp1->addnewpost);

    }elseif (strlen($SummaryText)>3999) { $valid = false;
      $_SESSION["ErrorMessage"]= "Summary Description should be less than than 4000 characters";
      $dm->Redirect_to($pp1->addnewpost);
    } //elseif (strlen($PostText)>9999) {
    //  $_SESSION["ErrorMessage"]= "Post Description should be less than than 1000 characters";
    //  $dm->Redirect_to($pp1->addnewpost);
    //}
    if (!$valid) {goto fnend ;}

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
    //$cursor = $dm->cc($dm, self::$tbl, $flds, $valsins, $binds);
    $cursor = Db_allsites::cc(self::$tbl, $flds, $valsins, $binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);

    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

    //if($cursor){ $_SESSION["SuccessMessage"]="Post added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Post adding went wrong. Try Again !"; }

    Config_allsites::Redirect_to($pp1->addnewpost);

    return('1');
    fnend:
  }


  static public function get_submitted(): array //return '1'
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

  static public function uu( object $pp1, array $other=[]): string //return id or 'err_c c'
  {
    // 1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
    list( $PostTitle, $Category, $Target, $Image, $img_desc, $SummaryText ) = self::get_submitted() ; //$PostText

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
      Config_allsites::Redirect_to($pp1->posts);
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

      $cursor = Db_allsites::uu( self::$tbl, $flds, $qrywhere, $binds );

      // 4. U P L O A D  I M A G E
      move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);


      //var_dump($cursor);
      if($cursor){ $_SESSION["SuccessMessage"]="Post Updated Successfully";
      }else { $_SESSION["ErrorMessage"]= "Post Update went wrong. Try Again !"; }

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

