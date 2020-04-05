<?php
// J:\awww\www\fwphp\glomodul\user\upd_user_loggedin_frm.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

                         //var_dump($_SESSION);

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"]))
{
  $AName     = $_POST["Name"];
  $AHeadline = $_POST["Headline"];
  $ABio      = $_POST["Bio"];
  $Image     = $_FILES["Image"]["name"];
  $Target    = "Uploads/".basename($_FILES["Image"]["name"]);

  //   1.1. V A L I D A T I O N
  if (strlen($AHeadline)>30) {
      $_SESSION["ErrorMessage"] = "Headline Should be less than 30 characters";
      $this->Redirect_to($pp1->upd_user_loggedin);
  }elseif (strlen($ABio)>500) {
      $_SESSION["ErrorMessage"] = "Bio should be less than than 500 characters";
      $this->Redirect_to($pp1->upd_user_loggedin);

  //  1.2 U P D A T E  D B T B L R O W
  }else{
      $flds     = "SET aname=:AName, aheadline=:AHeadline, abio=:ABio" ;
      $qrywhere = "WHERE id=:AdminId" ;
      $binds = [
        ['placeh'=>':AName',     'valph'=>$AName, 'tip'=>'str']
       ,['placeh'=>':AHeadline', 'valph'=>$AHeadline, 'tip'=>'str']
       ,['placeh'=>':ABio',      'valph'=>$ABio, 'tip'=>'str']
       ,['placeh'=>':AdminId',   'valph'=>$AdminId, 'tip'=>'int']
      ] ;
      if (!empty($_FILES["Image"]["name"])) {
        $flds    .= ", aimage=:Image" ;
        $binds[] = ['placeh'=>':Image', 'valph'=>$Image, 'tip'=>'str'] ;
      }
      $cursor = $this->uu($this,'admins',$flds,$qrywhere,$binds);
                        //$this->p repareSQL($sql); $p reparedsql = $this->e xecute();


      move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

      if($cursor){ $_SESSION["SuccessMessage"]="Details Updated Successfully";
      }else {$_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";}

      $this->Redirect_to($pp1->upd_user_loggedin);
    }
} //Ending of Submit Button If-Condition




    //        2. G U I  to get user action
    $c_r = $this->rr("SELECT * FROM admins WHERE id=:AdminId" 
        , [ ['placeh'=>':AdminId', 'valph'=>$AdminId, 'tip'=>'int']
          ] 
    , __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_
?>
<!-- HEADER -->
<header class="bg-dark text-white py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

      <h1>
        @User: <span class="text-dark">
          <a href="<?=$pp1->read_user?>username/<?php echo self::escp($r->username); ?>"
             title="Show profile">
             <?=self::escp($r->username)?></a>
                 </span>

        <i class="fas fa-user text-success mr-2"></i>User name: <?=$r->aname?>
      </h1>

      <XXXsmall> &nbsp;&nbsp;&nbsp; Usr headline: <?=$r->aheadline?></XXXsmall>

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
          <h4> <?php echo $r->aname; ?></h4>
        </div>
        <div class="card-body">
          <img src="Uploads/<?php echo $r->aimage; ?>" class="block img-fluid mb-3" alt="">
          <div class="">Biography: <?=$r->abio?>  </div>
        </div>

      </div>
    </div>


    <!-- Righ Area -->
    <div class="col-md-9" style="min-height:400px;">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>

      <form class="" action="<?=$pp1->upd_user_loggedin?>" 
            method="post" enctype="multipart/form-data">


        <div class="card bg-dark text-light">
          <div class="card-header bg-secondary text-light">
            <h4>Edit Profile</h4>
          </div>

          <div class="card-body">

            <div class="form-group">
               <input class="form-control" type="text" name="Name" id="title" 
                      title="Your name" placeholder="Your name" 
                      value="<?=$r->aname?>">
            </div>

            <div class="form-group">
               <input class="form-control" type="text" name="Headline" id="title" 
                      title="Headline (eg I am boring user)" placeholder="Headline" 
                      value="<?=$r->aheadline?>">
                  <small class="text-muted">
                  Add a professional headline like, 'Engineer' at XYZ or 'Architect' </small>
                  <span class="text-danger">Not more than 30 characters</span>
            </div>

            <div class="form-group">
               <textarea  class="form-control" name="Bio" id="Post"  rows="8" cols="80"
                          title="Your Biography" placeholder="Your Biography" 
               ><?=$r->abio?>
               </textarea>
            </div>

            <div class="form-group">
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>


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

</section><!-- End Main Area -->
