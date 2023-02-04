<?php
// J:\awww\www\fwphp\glomodul4\post\cre_post_frm.php

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post ;

use B12phpfw\core\b12phpfw\Config_allsites    as utl ;
use B12phpfw\core\b12phpfw\Db_allsites        as utldb ;
use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post;
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

$cursor_LOVcategory = Tbl_crud_category::rr_all( $pp1
  , $dmlrr='*'
  , $qrywhere="'1'='1'"
  , $binds=[]
  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__] ); 
              //echo '<pre>$cursor_LOVcategory='; print_r($cursor_LOVcategory); echo '</pre>';
//$LOVcategory_nrrows = $SrNo ;
$rcnt_LOVcategory = utldb::rrcount('category') ;


    $title = 'Add post';
    require_once $pp1->shares_path . '/hdr.php';  //require
    require_once("navbar.php");

//        2. G U I  to get user action
?>
    <!-- HEADER -->
    <!-- HEADER END -->

     <!-- Main Area -->
<main class="container">
  <div class="grid">

    <section>

          <h4>Add Post</h4>
      <?php
       echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);
       ?>

      <form class="" action="<?=$pp1->addnewpost?>" method="post" 
            enctype="multipart/form-data">

            <div>
              <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
                 <input class="form-control" type="text" name="PostTitle" id="title" 
                      title="Eg post_aboutwhatever.txt is Oper.system file name"
                      placeholder="Eg post_aboutwhatever.txt is oper.system file name" 
                      value="">
            </div>


            <div>
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


            <div>

              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
                <label for="imageSelect" class="custom-file-label">Select Image and write image description below</label>

              <textarea class="form-control" id="img_desc" name="img_desc" rows="8" cols="80"></textarea>

            </div>

            <!--=$summaryToBeInserted> <=$img_descToBeUpdated-->
            <div>
              <label for="Summary"> <span class="FieldInfo"> Summary: </span></label>
              <textarea class="form-control" id="Summary" name="SummaryDescription" rows="8" cols="80"></textarea>
            </div>

            <!--div class="form-group">
              <label for="Post"> <span class="FieldInfo"> Post: </span></label>
              <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80"></textarea>
            </div-->


            <!-- Back To Dashboard  $pp1->dashboard -->
            <div>

                <a href="<?=$pp1->posts?>" class="btn btn-warning btn-block">
                   <i class="fas fa-arrow-left"></i> Back To Posts</a>


                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Publish
                </button>

            </div>

      </form>

    </section>

  </div><!--  class="grid" -->

</main><!-- Main Area End -->




<!-- End Main Area -->


<?php require $pp1->shares_path . '/ftr.php'; ?>
