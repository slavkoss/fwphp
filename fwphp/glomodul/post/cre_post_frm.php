<?php
// J:\awww\www\fwphp\glomodul4\post\cre_post_frm.php

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post ;

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\core\zinc\Db_allsites as utldb ;
use B12phpfw\dbadapter\post\Tbl_crud as Tbl_crud_post;
use B12phpfw\dbadapter\post_category\Tbl_crud as Tbl_crud_category;
//use B12phpfw\module\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment;

//           1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"]))
{
  // returns string
  Tbl_crud_post::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //E n d  Submit Button If-Condition


//               2. R E A D  D B T B L R O W S
                    /*if ($SrNo == 0): {
                      echo '<b>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: </b><pre>NO CATEGORIES $rr='; print_r($rr); echo '</pre>';
                                       //displays : 13 CATEGORIES, $rr=stdClass Object
                                       // ( [scalar] => )
                    } else: {
                      echo '<b>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: </b>'.$SrNo .'  CATEGORIES, <pre>$rr='; print_r($rr); echo '</pre>';
                    } endif ; */
$cursor_LOVcategory = Tbl_crud_category::rr_all( $sellst='*', $qrywhere="'1'='1'"
  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__] ); 
              //echo '<pre>$cursor_LOVcategory='; print_r($cursor_LOVcategory); echo '</pre>';
//$LOVcategory_nrrows = $SrNo ;
$rcnt_LOVcategory = utldb::rrcount('category') ;


require $pp1->shares_path . 'hdr.php';
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
                      title="Eg post_aboutwhatever.txt is Oper.system file name"
                      placeholder="Eg post_aboutwhatever.txt is oper.system file name" 
                      value="">
            </div>


            <div class="form-group">
              <label for="CategoryTitle"> <span class="FieldInfo"> Chose Category </span></label>

              <select class="form-control" id="CategoryTitle"  name="Category">
                <?php
                if ($rcnt_LOVcategory == 0) { ?>
                     <option>NO ROWS FOR LOV</option>
                  </select><?php
                } else
                {

              $SrNo = 0;
              while ( $rx = utldb::rrnext( $cursor_LOVcategory
                , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
                  {
                    ?>
                    <option> <?=$rx->title?> </option><?php 

                   } endwhile; ?>
                  </select>

                <?php }  ?>

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


            <!-- Back To Dashboard  $pp1->dashboard -->
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$pp1->posts?>" class="btn btn-warning btn-block">
                   <i class="fas fa-arrow-left"></i> Back To Posts</a>
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



<!-- End Main Area -->


<?php require $pp1->shares_path . 'ftr.php'; ?>
