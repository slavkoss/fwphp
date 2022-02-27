<?php
//J:\awww\www\fwphp\glomodul4\blog\upd_post_frm.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL : 

use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;
use B12phpfw\dbadapter\post\Tbl_crud as Tbl_crud_post;
use B12phpfw\dbadapter\post_category\Tbl_crud as Tbl_crud_category;
//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"]))
{
  $cursor = Tbl_crud_post::uu($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__]);
  utl::Redirect_to($pp1->posts);
} //E n d  of Submit Button If-Condition


    require $pp1->shares_path . 'hdr.php';
    require_once("navbar_admin.php");

//               2. R E A D  D B T B L R O W S
// returns object :
$cursor_LOVcategory = Tbl_crud_category::rr_all( $sellst='*', $qrywhere="'1'='1'"
  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__] ); 



//        3. G U I  to get user action
?>
    <!-- HEADER -->
    <!--header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Edit Post</h1>
          </div>
        </div>
      </div>
    </header-->
    <!-- HEADER END -->

     <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       //echo utl::MsgErr(); echo utl::MsgSuccess();
       echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);

       // returns object :
       $rpost_toedit = Tbl_crud_post::rr_byid( $IdFromURL, $other=[ 'caller' => __FILE__ .' '.', ln '. __LINE__ ] );
      switch (utldb::getdbi()) { case 'oracle' : $rpost_toedit = self::rlows($rpost_toedit) ; break; default: break; }

         $TitleToBeUpdated    = $rpost_toedit->title;
         $CategoryToBeUpdated = $rpost_toedit->category;
         $ImageToBeUpdated    = $rpost_toedit->image;
         $PostToBeUpdated     = $rpost_toedit->post;
         $summaryToBeUpdated  = $rpost_toedit->summary;
         $img_descToBeUpdated = $rpost_toedit->img_desc;
       ?>
      <form class="" action="<?=$pp1->editpost?>id/<?=$IdFromURL?>" 
            method="post" enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">

            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Post <?=$IdFromURL?> Title: </span></label>
               <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="<?php echo $TitleToBeUpdated; ?>">
            </div>

            <div class="form-group">
              <span class="FieldInfo">Existing Category: </span>
              <?php echo $CategoryToBeUpdated;?>
              <br>
              <label for="CategoryTitle"> <span class="FieldInfo">
              Chose Category </span></label>


              <!-- LOV  C a t e g o r i e s  from  D B -->
              <select class="form-control" id="CategoryTitle"  name="Category">
                 <?php 
              while ( $rx = utldb::rrnext( $cursor_LOVcategory
                , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
            {
              ?>
              <option
                <?php
                   if ($rx->title == $CategoryToBeUpdated)
                    { echo ' selected="selected"';
                      //$found = true;
                    }
                ?>
              
              > <?=$rx->title?></option>
            <?php
            } endwhile;
            ?>
              </select>
            </div>

            <div class="form=group mb-1">
              <span class="FieldInfo">Existing Image: </span>
              <img  class="mb-1" src="Uploads/<?php echo $ImageToBeUpdated;?>" 
                    width="170px"; height="70px"; >
              <div class="custom-file">
               <!--span class="FieldInfo">Select Image and write image description below</span-->
                <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
                <label for="imageSelect" class="custom-file-label">Select Image and write image description below</label>
              </div>
              <textarea class="form-control" id="img_desc" name="img_desc" rows="8" cols="80">
                <?=$img_descToBeUpdated?></textarea>
            </div>

            <div class="form-group">
              <div>
                    <!--div style="display: inline;"-->
                    <!--div class="col-lg-6 mb-2 form-inline d-none d-sm-block"-->
                <a href="<?=$pp1->edmkdpost?>flename/<?=$TitleToBeUpdated?>/id/<?=$IdFromURL?>" 
                   class="btn btn-primary btn-block"
                >Edit post (markdown). Post Title must be = mkd_file_name.txt which exists ! 
                  Real title put in txt.
                </a>
              </div>

              <label for="Summary"> <span class="FieldInfo"> Summary: </span></label>
              <textarea class="form-control" id="Summary" name="SummaryDescription" rows="8" cols="80">
                <?=$summaryToBeUpdated?></textarea>
              <!--label for="Post"> <span class="FieldInfo"> Post: </span></label-->
              <!--textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80">
                <?php //echo $PostToBeUpdated;?>
              </textarea-->

            </div>


            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$pp1->dashboard?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
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

    //if (!empty($_FILES["Image"]["name"])) {
                    /*$sql = "UPDATE posts
                            SET title='$PostTitle', category='$Category', image='$Image'
                              , summary='$SummaryText', img_desc='$img_desc'
                            WHERE id='$IdFromURL'";*/
    //}else {
                    /*$sql = "UPDATE posts
                            SET title='$PostTitle', category='$Category'
                              , summary='$SummaryText', img_desc='$img_desc'
                            WHERE id='$IdFromURL'";*/
    //}
                  //$this->p repareSQL($sql); 
                  //$cursor = $this->e xecute();

-->

<?php require $pp1->shares_path . 'ftr.php'; ?>
