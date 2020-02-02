<?php
//J:\awww\www\fwphp\glomodul4\blog\upd_post_frm.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

//$SarchQueryParameter = $this->ctr akc par_ arr['id'] ; //$_ GET["id"] :
$IdFromURL = $this->uriq->id ;

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"]))
{
  $PostTitle   = $_POST["PostTitle"];
  $Category    = $_POST["Category"];
  $Target      = "Uploads/".basename($_FILES["Image"]["name"]);
  $Image       = $_FILES["Image"]["name"];
  $img_desc    = $_POST["img_desc"];
  $SummaryText = $_POST["SummaryDescription"];
  //$PostText  = $_POST["PostDescription"];

  //   1.1. V A L I D A T I O N
  if(empty($PostTitle)){
    $_SESSION["ErrorMessage"]= "Title Cant be empty";
    $this->Redirect_to($this->pp1->posts);
  }elseif (strlen($PostTitle)<5) {
    $_SESSION["ErrorMessage"]= "Post Title should be greater than 5 characters";
    $this->Redirect_to($this->pp1->posts);
  }elseif (strlen($img_desc)>4999) {
    $_SESSION["ErrorMessage"]= "Image Description should be less than than 4000 characters";
    $this->Redirect_to($this->pp1->posts);
  }elseif (strlen($SummaryText)>4999) {
    $_SESSION["ErrorMessage"]= "Summary Description should be less than than 4000 characters";
    $this->Redirect_to($this->pp1->posts);
  //}elseif (strlen($PostText)>9999) {
  //  $_SESSION["ErrorMessage"]= "Post Description should be less than than 10000 characters";
  //  $this->Redirect_to($this->pp1->posts);
  }else{

  //  1.2 U P D A T E  D B T B L R O W
    // NOT USED : post='$PostText' I replaced it with mkd file
    // Query to Update Post in DB When everything is fine   

    $flds     = "SET title=:PostTitle, category=:Category
                   , summary=:SummaryText, img_desc=:img_desc" ;
    $qrywhere = "WHERE id=:IdFromURL" ;
    $binds = [
      ['placeh'=>':PostTitle',  'valph'=>$PostTitle, 'tip'=>'str']
     ,['placeh'=>':Category',   'valph'=>$Category, 'tip'=>'str']
     ,['placeh'=>':SummaryText','valph'=>$SummaryText, 'tip'=>'str']
     ,['placeh'=>':img_desc',   'valph'=>$img_desc, 'tip'=>'str']
     ,['placeh'=>':IdFromURL',  'valph'=>$IdFromURL, 'tip'=>'int']
    ] ;
    if (!empty($_FILES["Image"]["name"])) {
      $flds    .= ", image=:Image" ;
      $binds[] = ['placeh'=>':Image', 'valph'=>$Image, 'tip'=>'str'] ;
    }
    $cursor = $this->uu($this,'posts',$flds,$qrywhere,$binds);


    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    //var_dump($cursor);
    if($cursor){ $_SESSION["SuccessMessage"]="Post Updated Successfully";
    }else { $_SESSION["ErrorMessage"]= "Post Update went wrong. Try Again !"; }
    $this->Redirect_to($this->pp1->posts);
  }
} //E n d  of Submit Button If-Condition


    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar_admin.php");
//        2. G U I  to get user action
?>
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Edit Post</h1>
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
       //$c_r = $this->r r('1', $this, 'posts', "id='$IdFromURL'", '*') ;
       $c_r = $this->rr("SELECT * FROM posts WHERE id=$IdFromURL", [], __FILE__ .' '.', ln '. __LINE__ ) ;
       while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_
          switch (self::$dbi)
          {
            case 'oracle' : $r = self::rlows($r) ; break; 
            default: break;
          }
         $TitleToBeUpdated    = $r->title;
         $CategoryToBeUpdated = $r->category;
         $ImageToBeUpdated    = $r->image;
         $PostToBeUpdated     = $r->post;
         $summaryToBeUpdated  = $r->summary;
         $img_descToBeUpdated = $r->img_desc;
       //}
       ?>
      <form class="" action="<?=$this->pp1->editpost?>id/<?php echo $IdFromURL; ?>" 
            method="post" enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">

            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
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
            //$c_r = $this->r r('', $this, 'category', '1', 'id,title') ;
            $c_r = $this->rr("SELECT * FROM category ORDER BY title", [], __FILE__ .' '.', ln '. __LINE__ ) ;
            while ($row = $this->rrnext($c_r)):
            {
              $rr = $row ;
              switch (self::$dbi)
              {
                case 'oracle' : $rr = self::rlows($rr) ; break; 
                default: break;
              }
              ?>
              <option
                <?php
                   if ($rr->title == $CategoryToBeUpdated)
                    { echo ' selected="selected"';
                      //$found = true;
                    }
                ?>
              
              > <?=$rr->title?></option>
            <?php
            } endwhile; //c_, R_, U_, D_
            ?>
              </select>
            </div>

            <div class="form=group mb-1">
              <span class="FieldInfo">Existing Image: </span>
              <img  class="mb-1" src="Uploads/<?php echo $ImageToBeUpdated;?>" width="170px"; height="70px"; >
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
                <a href="<?=$this->pp1->edmkdpost?>flename/<?=$TitleToBeUpdated?>/id/<?=$IdFromURL?>" 
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
                <a href="<?=$this->pp1->dashboard?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
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

<?php require $this->pp1->wsroot_path . 'zinc/ftr.php'; ?>

