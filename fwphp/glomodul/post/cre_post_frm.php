<?php
// J:\awww\www\fwphp\glomodul4\post\cre_post_frm.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"]))
{
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

  //   1.1. V A L I D A T I O N
  if(empty($PostTitle)){
    $_SESSION["ErrorMessage"]= "Title Cant be empty";
    $this->Redirect_to($this->pp1->addnewpost);
  }elseif (strlen($PostTitle)<5) {
    $_SESSION["ErrorMessage"]= "Post Title should be greater than 5 characters";
    $this->Redirect_to($this->pp1->addnewpost);
  }elseif (strlen($img_desc)>3999) {
    $_SESSION["ErrorMessage"]= "Image Description should be less than than 4000 characters";
    $this->Redirect_to($this->pp1->addnewpost);
  }elseif (strlen($SummaryText)>3999) {
    $_SESSION["ErrorMessage"]= "Summary Description should be less than than 4000 characters";
    $this->Redirect_to($this->pp1->addnewpost);
  //}elseif (strlen($PostText)>9999) {
  //  $_SESSION["ErrorMessage"]= "Post Description should be less than than 1000 characters";
  //  $this->Redirect_to($this->pp1->addnewpost);
  }else{

    //  1.2 I N S E R T  D B T B L R O W
    // Query to insert Post in DB When everything is fine
    //I NSERT INTO $t bl ($f lds) $w hat
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "datetime,title,category,author,image, img_desc, summary" ; //not used ,post
    $qrywhat  = "VALUES(:dateTime,:postTitle,:categoryName,:adminname
                       ,:imageName, :img_desc, :SummaryText)" ; //,:postDescription
    $binds = [
      ['placeh'=>':dateTime',     'valph'=>$DateTime, 'tip'=>'str']
     ,['placeh'=>':postTitle',    'valph'=>$PostTitle, 'tip'=>'str']
     ,['placeh'=>':categoryName', 'valph'=>$Category, 'tip'=>'str']
     ,['placeh'=>':adminname',    'valph'=>$Admin, 'tip'=>'str']
     ,['placeh'=>':imageName',    'valph'=>$Image, 'tip'=>'str']
     ,['placeh'=>':img_desc',     'valph'=>$img_desc, 'tip'=>'str']
     ,['placeh'=>':SummaryText',  'valph'=>$SummaryText, 'tip'=>'str']
     //,['placeh'=>':postDescription',  'valph'=>$PostText, 'tip'=>'str'] //not used
    ] ;
    $cursor = $this->cc($this,'posts',$flds,$qrywhat,$binds);



    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
      //$_SESSION["SuccessMessage"]="Post with id : " .$ConnectingDB->lastInsertId()." added Successfully";
    if($cursor){ $_SESSION["SuccessMessage"]="Post added Successfully";
    }else { $_SESSION["ErrorMessage"]= "Post adding  went wrong. Try Again !"; }
    $this->Redirect_to($this->pp1->addnewpost);
  }
} //Ending of Submit Button If-Condition


      require $this->pp1->wsroot_path . 'zinc/hdr.php';
      require_once("navbar_admin.php");
//        2. G U I  to get user action
?>
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Add Post</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->

     <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>

      <form class="" action="<?=$this->pp1->addnewpost?>" method="post" 
            enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">

            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
               <input class="form-control" type="text" name="PostTitle" id="title" 
                      title="Oper.system file name eg post_aboutwhatever.txt" placeholder="Type oper.system file name eg post_aboutwhatever.txt here" value="">
            </div>


            <div class="form-group">
              <label for="CategoryTitle"> <span class="FieldInfo"> Chose Category </span></label>

              <select class="form-control" id="CategoryTitle"  name="Category">
                 <?php
                $SrNo = 0;
                //$cursor = $this->r r('', $this, 'category', "1 ORDER BY title", '*' ) ;
                $cursor = $this->rr("SELECT * FROM category ORDER BY title", [], __FILE__ .' '.', ln '. __LINE__ ) ;
                while ($rr= $this->rrnext($cursor))
                {
                  //all row fld names lowercase
                  switch ($this->getdbi())
                  {
                    case 'oracle' : $rr = $db->rlows($rr) ; break; 
                    default: break;
                  }
                  ?>
                  <option> <?=$rr->title?></option>     <?php 
                 } ?>
              </select>

            </div>


            <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
                <label for="imageSelect" class="custom-file-label">Select Image and write image description below</label>
              </div>
              <textarea class="form-control" id="img_desc" name="img_desc" rows="8" cols="80">
              </textarea>
              </div>
            </div>
            <!--=$summaryToBeInserted> <=$img_descToBeUpdated-->
            <div class="form-group">
              <label for="Summary"> <span class="FieldInfo"> Summary: </span></label>
              <textarea class="form-control" id="Summary" name="SummaryDescription" rows="8" cols="80">
              </textarea>
            </div>

            <!--div class="form-group">
              <label for="Post"> <span class="FieldInfo"> Post: </span></label>
              <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80"></textarea>
            </div-->



            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$this->pp1->dashboard?>" class="btn btn-warning btn-block">
                   <i class="fas fa-arrow-left"></i> Back To Dashboard</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Publish
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>

</section>



<!-- End Main Area 
                  /*$sql = "INSERT INTO posts(datetime,title,category,author,image,post)";
                  $sql .= "VALUES(:dateTime,:postTitle,:categoryName,:adminname,:imageName,:postDescription)";
                  $this->p repareSQL($sql); 
                  $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                  $this->b indvalue(':dateTime', $DateTime, \PDO::PARAM_STR);
                  $this->b indvalue(':postTitle', $PostTitle, \PDO::PARAM_STR);
                  $this->b indvalue(':categoryName', $Category, \PDO::PARAM_STR);
                  $this->b indvalue(':adminname', $Admin, \PDO::PARAM_STR);
                  $this->b indvalue(':imageName', $Image, \PDO::PARAM_STR);
                  $this->b indvalue(':postDescription', $PostText, \PDO::PARAM_STR);
                  $cursor = $this->e xecute();*/
-->


<?php       require $this->pp1->wsroot_path . 'zinc/ftr.php'; ?>

