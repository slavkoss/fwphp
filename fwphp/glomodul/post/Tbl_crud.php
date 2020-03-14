<?php
/*
*  J:\awww\www\fwphp\glomodul\post\Db_post.php
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\dbadapter\post ;
use B12phpfw\module\blog\Home_ctr ;

class Tbl_crud //Db_post //extends Db_allsites //was Home
{

  private $tbl = "posts";

  // on-insert
  //public function cc(UserInterface $user) {
  public function cc($dm)
  {
    // 1. S U B M I T E D  F L D V A L S :
    $PostTitle   = $_POST["PostTitle"];
    $Category    = $_POST["Category"];
    $Target      = "Uploads/".basename($_FILES["Image"]["name"]);
    $Admin       = $_SESSION["username"];
    $Image       = $_FILES["Image"]["name"];
    //$img_desc    = self::escp($_POST["img_desc"]) ;
    //$img_desc    = htmlspecialchars($_POST["img_desc"], ENT_QUOTES, 'UTF-8');
    $img_desc    = $_POST["img_desc"] ; 
    //preg_replace('/\s+/', ' ', $input);
    $SummaryText = $_POST["SummaryDescription"];
    //$PostText  = $_POST["PostDescription"]; //in op.system file
    $CurrentTime = time(); $datetime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);

    // 2. V A L I D A T I O N
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

    // 3. C R E A T E  D B T B L R O W
    $flds     = "datetime,title,category,author,image, img_desc, summary" ; //not used ,post
    $qrywhat  = "VALUES(:datetime,:postTitle,:categoryName,:adminname
                         ,:imageName, :img_desc, :SummaryText)" ; //,:postDescription
    $binds = [
      ['placeh'=>':datetime',     'valph'=>$datetime, 'tip'=>'str']
     ,['placeh'=>':postTitle',    'valph'=>$PostTitle, 'tip'=>'str']
     ,['placeh'=>':categoryName', 'valph'=>$Category, 'tip'=>'str']
     ,['placeh'=>':adminname',    'valph'=>$Admin, 'tip'=>'str']
     ,['placeh'=>':imageName',    'valph'=>$Image, 'tip'=>'str']
     ,['placeh'=>':img_desc',     'valph'=>$img_desc, 'tip'=>'str']
     ,['placeh'=>':SummaryText',  'valph'=>$SummaryText, 'tip'=>'str']
    ] ;
    $cursor = $dm->cc($dm, $this->tbl, $flds, $qrywhat, $binds);

    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

    if($cursor){ $_SESSION["SuccessMessage"]="Post added Successfully";
    }else { $_SESSION["ErrorMessage"]= "Post adding  went wrong. Try Again !"; }
    $dm->Redirect_to($pp1->addnewpost);


    fnend:
  }

  public function rr_last_id($dm) {
    return $dm->rr_last_id($this->tbl) ;
  }

  // pre-query
  public function rr_all($dm, $category_from_url) {
    //////// open cursor (execute-query loop is in view script)
    if ($category_from_url) 
    {
      //3. SQL Query if FILTER BY  C ATEGORY_ FROM_ U R L  is active
      // *******************************************************************
      $cursor = $dm->rr("SELECT * FROM $this->tbl WHERE category = :category_from_url ORDER BY datetime desc"
        ,[ ['placeh'=>':category_from_url', 'valph'=>$category_from_url, 'tip'=>'str'] ]
        , __FILE__ .'() '.', ln '. __LINE__  );
    }
    // default SQL query
    else{
      $cursor = $dm->rr("SELECT * FROM $this->tbl  ORDER BY datetime desc", [], __FILE__ .' '.', ln '. __LINE__) ;
    }

    $dm::disconnect();
    return $cursor ;
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

