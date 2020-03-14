<?php
/**
*  J:\awww\www\fwphp\glomodul\post_category\Tbl_crud.php
*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_category ;
//use B12phpfw\core\zinc\Config_ allsites ;

//class Db_post_category //extends Db_allsites
class Tbl_crud //extends Db_allsites
{
  private $tbl = "category";


  // on-insert
  //public function cc(UserInterface $user) {
  public function cc($dm)
  {
    // 1. S U B M I T E D  F L D V A L S :
    $category_title = $_POST["category_title"];
    $username          = $_SESSION["username"];
    $CurrentTime = time(); $datetime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    // 2. V A L I D A T I O N
    $valid = true;
    if(empty($category_title)){ $valid = false;
      $_SESSION["ErrorMessage"]= "All fields must be filled out";
      $dm->Redirect_to($pp1->categories);
    }elseif (strlen($category_title)<3) { $valid = false;
      $_SESSION["ErrorMessage"]= "Category title should be greater than 2 characters";
      $dm->Redirect_to($pp1->categories);
    }elseif (strlen($category_title)>49) { $valid = false;
      $_SESSION["ErrorMessage"]= "Category title should be less than than 50 characters";
      $dm->Redirect_to($pp1->categories);
    }
    if (!$valid) {goto fnend ;}


    // 3. C R E A T E  D B T B L R O W
    $flds    = "title, author, datetime" ; //names in data source
    $qrywhat = "VALUES(:category_title,:username,:datetime)" ;
    $binds = [
      ['placeh'=>':category_title', 'valph'=>$category_title, 'tip'=>'str']
     ,['placeh'=>':username',    'valph'=>$username, 'tip'=>'str']
     ,['placeh'=>':datetime',     'valph'=>$datetime, 'tip'=>'str']
    ] ;
    $cursor = $dm->cc($dm, $this->tbl, $flds, $qrywhat, $binds);
    if($cursor){
      //$_SESSION["SuccessMessage"]="Category id : " .$ConnectingDB->lastInsertId()." added Successfully";
      $_SESSION["SuccessMessage"]="Category $category_title added Successfully";
      $dm->Redirect_to($pp1->categories);
    }else {
      $_SESSION["ErrorMessage"]= "Category $category_title adding went wrong. Try Again !";
      $dm->Redirect_to($pp1->categories);
    } 


    fnend:
  }

  public function rr_last_id($dm) {
    return $dm->rr_last_id($this->tbl) ;
  }

  // pre-query
  public function rr_all($dm) {
    // open cursor (execute-query loop is in view script)
    $cursor = $dm->rr("SELECT * FROM $this->tbl ORDER BY title", [], __FILE__ .', ln '. __LINE__ ) ;
    $dm::disconnect();
    return $cursor ;
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
