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
  public function cc($dm, $vv)
  {
    //$fldvals = $vv = [$Category, $Admin, $DateTime] ;

    // 1.1. V A L I D A T I O N
    $valid = true;
    if(empty($vv[0])){ $valid = false;
      $_SESSION["ErrorMessage"]= "All fields must be filled out";
      $dm->Redirect_to($pp1->categories);
    }elseif (strlen($vv[0])<3) { $valid = false;
      $_SESSION["ErrorMessage"]= "Category title should be greater than 2 characters";
      $dm->Redirect_to($pp1->categories);
    }elseif (strlen($vv[0])>49) { $valid = false;
      $_SESSION["ErrorMessage"]= "Category title should be less than than 50 characters";
      $dm->Redirect_to($pp1->categories);
    }
    if (!$valid) {goto fnend ;}


    // 1.2 C R E A T E  D B T B L R O W
    $flds    = "title, author, datetime" ; //names in data source
    $qrywhat = "VALUES(:categoryName,:adminname,:dateTime)" ;
    $binds = [
      ['placeh'=>':categoryName', 'valph'=>$vv[0], 'tip'=>'str']
     ,['placeh'=>':adminname',    'valph'=>$vv[1], 'tip'=>'str']
     ,['placeh'=>':dateTime',     'valph'=>$vv[2], 'tip'=>'str']
    ] ;
    $cursor = $dm->cc($dm, $this->tbl, $flds, $qrywhat, $binds);
    if($cursor){
      //$_SESSION["SuccessMessage"]="Category id : " .$ConnectingDB->lastInsertId()." added Successfully";
      $_SESSION["SuccessMessage"]="Category {$vv[0]} added Successfully";
      $dm->Redirect_to($pp1->categories);
    }else {
      $_SESSION["ErrorMessage"]= "Category {$vv[0]} adding went wrong. Try Again !";
      $dm->Redirect_to($pp1->categories);
    } 

    // 1.3  G E T  I D
    $c_r = $dm->rr("SELECT max(id) id FROM $this->tbl" 
        , []
        , __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $dm->rrnext($c_r)): {$r = $row ;} endwhile; 

    $dm::disconnect();

    return $r->id;

    fnend:
  }


  // pre-query
  public function rr_all($dm) {
    // open cursor (execute-query loop is in view script)
    $cursor = $dm->rr("SELECT * FROM $this->tbl ORDER BY title", [], __FILE__ .', ln '. __LINE__ ) ;
    $dm::disconnect();
    return $cursor ;
  }

} // e n d  c l s



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
