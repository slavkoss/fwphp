<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\upd_08photo_frm.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

include 'frm_func.php';

if(!isset($_SESSION['user_id_loggedin'])):
   $_SESSION['unutherrized'] = "Please Enter Email & Password"; 
   header("location:index.php");  // header("location:f rm.php");
endif;

$css1 = 'style.css';
$css2 = 'profile.css';
include 'hdr.php';

?>
  <div class="container contents">
    <div class="row">
      <div class="col-md-3">
        <div class="left-area">
          <?php links($db); ?>
        </div><!-- left-area -->
      </div><!-- col -->
      <div class="col-md-9">
        <div class="right-area">

          <h4>Update user`s <?=$_SESSION['user_name_loggedin'] . ', id '. $_SESSION['user_id_loggedin']?> Picture</h4><hr>

          <div class="form-group">
              <?php update_picture($db); ?>
          </div>
          <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="picture_upload" id="picture_upload_label"></label>
                  <input type="file" name="file" class="image_upload profile-input" required=""
                         id="picture_upload">
              </div><!-- form-group -->
              <div class="form-group">
                  <input type="submit" value="Update Picture" name="picture" class="btn btn-success">
              </div><!-- form-group -->
          </form>

                 <?php
                 //include('dbcrud_func.php');
                 include 'upd_03bio.php';
                 include 'upd_04facebook.php';
                 include 'upd_05linkedin.php';
                 include 'upd_01name.php';
                 include 'upd_09password_frm.php';
                 ?>
        </div><!-- right-area -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->

    <?php include 'ftr.php'; ?>

    <script type="text/javascript" src="frm.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
           $(document).on("change", ".image_upload", function(){
            var image_name = $(".image_upload").val();
            $("#picture_upload_label").html(image_name);
           })
        })
    </script>


</body>
</html>