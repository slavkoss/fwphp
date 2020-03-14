<?php
// J:\awww\www\fwphp\glomodul4\post\cre_post_frm.php

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post ;
use B12phpfw\module\dbadapter\post\Tbl_crud as Tbl_crud_post;
use B12phpfw\dbadapter\post_category\Tbl_crud as Tbl_crud_category;
//use B12phpfw\module\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment;

if(isset($_POST["Submit"]))
{
  $tbl_o_post = new Tbl_crud_post ;
  $tbl_o_post->cc($dm);
  //$id = $tbl_o_post->rr_last_id($dm);
} //Ending of Submit Button If-Condition

//               2. R E A D  D B T B L R O W S
//$cursor = $this->rr("SELECT * FROM category ORDER BY title", [], __FILE__ .' '.', ln '. __LINE__ ) ;
$tbl_o_category = new Tbl_crud_category ;
$c_category = $tbl_o_category->rr_all($dm);


      require $pp1->wsroot_path . 'zinc/hdr.php';
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

      <form class="" action="<?=$pp1->addnewpost?>" method="post" 
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
                while ($rr= $this->rrnext($c_category))
                {
                  //all row fld names lowercase
                  switch ($this->getdbi())
                  {
                    case 'oracle' : $rr = $dm->rlows($rr) ; break; 
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
                <a href="<?=$pp1->dashboard?>" class="btn btn-warning btn-block">
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
                  $c ursor = $this->e xecute();*/
-->


<?php require $pp1->wsroot_path . 'zinc/ftr.php'; ?>
