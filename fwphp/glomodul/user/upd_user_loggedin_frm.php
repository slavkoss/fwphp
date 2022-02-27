<?php
// J:\awww\www\fwphp\glomodul\user\upd_ user_loggedin_frm.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\b12phpfw\ver5

use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\dbadapter\user\Tbl_crud as utl_module;  //to Login_ Confirm_ SesUsrId

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

// Why i n c  h d r  and  f t r  must be here - in  v i e w  script :
//Warning: Cannot modify header information - headers already sent by (output started at J:\awww\www\fwphp\glomodul\user\n avbar.php:26) in J:\awww\www\b12phpfw\Config_allsites.php on line 306
                         //var_dump($_SESSION);
//$AdminId = (int)$pp1->uriq->id ;
$AdminId = (int)$_SESSION["userid"];
//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"])) // or if ( !empty($_POST) )
{
  $cursor = utl_module::uu($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__]);
  utl::Redirect_to($pp1->home_url);
} //E n d  of Submit Button If-Condition




    //        2. G U I  to get user action
       // returns object :
    $rr = utl_module::rr_byid( $AdminId, $other=[ 'caller' => __FILE__ .' '.', ln '. __LINE__ ] );


      require $pp1->shares_path . 'hdr.php';
      require_once("navbar.php");
?>
<!-- HEADER -->
<header class="bg-dark text-white py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

      <h1>
        @User: <span class="text-dark">
          <a href="<?=$pp1->rr?>username/<?php echo self::escp($rr->username); ?>"
             title="Show profile">
             <?=self::escp($rr->username)?></a>
                 </span>

        <i class="fas fa-user text-success mr-2"></i>User name: <?=$rr->aname?>
      </h1>

      <XXXsmall> &nbsp;&nbsp;&nbsp; Usr headline: <?=$rr->aheadline?></XXXsmall>

      </div>
    </div>
  </div>
</header>
<!-- HEADER END -->


<!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">


    <!-- Left Area -->
    <div class="col-md-3">
      <div class="card">
        <div class="card-header bg-dark text-light">
          <h4> <?php echo $rr->aname; ?></h4>
        </div>
        <div class="card-body">
          <img src="Uploads/<?php echo $rr->aimage; ?>" class="block img-fluid mb-3" alt="">
          <div class="">Biography: <?=$rr->abio?>  </div>
        </div>

      </div>
    </div>


    <!-- Right Area -->
    <div class="col-md-9" style="min-height:400px;">
      <?php echo utl::msg_err_succ('script='. basename(__FILE__) .' line='. __LINE__) ; ?>

      <form class="" action="<?=$pp1->upd_user_loggedin . $AdminId?>" 
            method="post" enctype="multipart/form-data">


        <div class="card bg-dark text-light">
          <div class="card-header bg-secondary text-light">
            <h4>Edit Profile</h4>
          </div>

          <div class="card-body">

            <div class="form-group">
               <input class="form-control" type="text" name="Name" id="title" 
                      title="Your name" placeholder="Your name" 
                      value="<?=$rr->aname?>">
            </div>

            <div class="form-group">
               <input class="form-control" type="text" name="Headline" id="title" 
                      title="Headline (eg I am boring user)" placeholder="Headline" 
                      value="<?=$rr->aheadline?>">
                  <small class="text-muted">
                  Add a professional headline like, 'Engineer' at XYZ or 'Architect' </small>
                  <span class="text-danger">Not more than 30 characters</span>
            </div>

            <div class="form-group">
               <textarea  class="form-control" name="Bio" id="Post"  rows="8" cols="80"
                          title="Your Biography" placeholder="Your Biography" 
               ><?=$rr->abio?>
               </textarea>
            </div>

            <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
              <label for="imageSelect" class="custom-file-label">Choose Image </label>
              </div>
            </div>


            <div class="row">
              <!-- was $pp1-> dashboard  Back To Dashboard -->
              <div class="col-lg-6 mb-2">
                <a href="<?=$pp1->home_url?>" class="btn btn-warning btn-block">
                   <i class="fas fa-arrow-left"></i> Back To Home</a>
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

</section><!-- End Main Area -->

<?php
require $pp1->shares_path . 'ftr.php';