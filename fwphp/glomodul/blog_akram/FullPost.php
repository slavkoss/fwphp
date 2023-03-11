<?php
$title='Full Post' ;
require_once("ahdr.php");

require_once '../../../vendor/erusev/parsedown/Parsedown.php';
$pdown = new \Parsedown; // Parsedown cls has no namespace

if(isset($_POST["Submit"]))
{
  $Name=escp($_POST["Name"]);
  $Email=escp($_POST["Email"]);
  $Comment=escp($_POST["Comment"]);
  $Date_Time = date('Y-m-d H:i:s', time());
  $PostId=$_GET["id"];


  if(empty($Name)||empty($Email) ||empty($Comment)){
    $_SESSION["ErrorMessage"]="All Fields are required";
    
  }elseif(strlen($Comment)>500){
    $_SESSION["ErrorMessage"]="only 500  Characters are Allowed in Comment";
    
  }else{

    $PostIDFromURL=$_GET['id'];
    $Query=get_cursor("INSERT into comments (datetim,name,email,komentar,approvedby,status,admin_panel_id)
    VALUES ('$Date_Time','$Name','$Email','$Comment','Pending','OFF','$PostIDFromURL')", 'cc');
    if($Query){
      $_SESSION['SuccessMessage']="Comment Submitted Successfully";
      Redirect_to("FullPost.php?id={$PostId}");
    }else{
      $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
      Redirect_to("FullPost.php?id={$PostId}");
    }
    
  }  
  
}

?>


  </div><!-- e n d  div class="blog-header" -->


  <div class="row"> <!--Row-->
    <div class="col-sm-8"> <!--Main Blog Area-->
    <?php echo Message();
        echo SuccessMessage();
  ?>
    <?php
    global $ConnectingDB;
    if(isset($_GET["SearchButton"]))
    {
      $Search=$_GET["Search"];
      $ViewQuery=get_cursor("SELECT * FROM admin_panel
        WHERE datetim LIKE '%$Search%' OR title LIKE '%$Search%'
        OR category LIKE '%$Search%' OR post LIKE '%$Search%'");
    }else
    {
      $PostIDFromURL=$_GET["id"];
      $ViewQuery=get_cursor("SELECT * FROM admin_panel WHERE id='$PostIDFromURL'
        ORDER BY datetim desc");
    }

    while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC))
    {

      $rowt = rlows($rowt) ;

      $PostId=$rowt["id"];
      $Date_Time=$rowt["datetim"];
      $Title=$rowt["title"];
      $Category=$rowt["category"];
      $Admin=$rowt["author"];
        $Im_age=$rowt["imag"]??'NOT EXISTENT IMG' ;
          if ($Im_age<'0') $Im_age='NOT EXISTENT IMG' ;
      $Post=$rowt["post"];
    
      ?>


      <div class="blogpost thumbnail">


              <?php if (file_exists("Upload/$Im_age")) { ?>
                <img class="img-responsive img-rounded" alt="file exists Upload/<?=$Im_age?>"
                     src="Upload/<?=$Im_age?>" 
                     width="640"; height="480"
                > <?php 
                echo 'Upload/'. $Im_age;
              } else { echo 'Upload/'. $Im_age .' does not exist'; }
              ?>



        <div class="caption">
          <h1 id="heading"> <?php echo escp($Title); ?></h1>
          <p class="description">Category:<?php echo escp($Category); ?> Published on
          <?=escp($Date_Time)?></p>


        <?php
        $htmltxt = $pdown->text($Post) ;
        echo $pdown->text($htmltxt) ;
        ?>



       </div>
        
      </div>
      <?php 
    } ?>





    <br><br><br><br>
    <span class="FieldInfo">Comments</span>
<?php

$PostIdForComments=$_GET["id"];
$ExtractingCommentsQuery=get_cursor("SELECT * FROM comments WHERE admin_panel_id='$PostIdForComments' AND status='ON' ");
while($rowt=$ExtractingCommentsQuery->fetch(PDO::FETCH_ASSOC)){

  $rowt = rlows($rowt) ;

  $CommentDate=$rowt["datetim"];
  $CommenterName=$rowt["name"];
  $Comments=$rowt["komentar"];


?>
<div class="CommentBlock">
  <img style="margin-left: 10px; margin-top: 10px;" class="pull-left" src="imags/comment.png" width=70px; height=70px;>
  <p style="margin-left: 90px;" class="Comment-info"><?php echo $CommenterName; ?></p>
  <p style="margin-left: 90px;"class="description"><?php echo $CommentDate; ?></p>
  <p style="margin-left: 90px;" class="Comment"><?php echo nl2br($Comments); ?></p>
  
</div>

  <hr>
<?php } ?>
    
    
    <br>
    <span class="FieldInfo">Share your thoughts about this post</span>
    
    
<div>
<form action="FullPost.php?id=<?php echo $PostId; ?>" method="post" enctype="multipart/form-data">
  <fieldset>
  <div class="form-group">
  <label for="Name"><span class="FieldInfo">Name</span></label>
  <input class="form-control" type="text" name="Name" id="Name" placeholder="Name">
  </div>
  <div class="form-group">
  <label for="Email"><span class="FieldInfo">Email</span></label>
  <input class="form-control" type="email" name="Email" id="Email" placeholder="email">
  </div>
  <div class="form-group">
  <label for="commentarea"><span class="FieldInfo">Comment</span></label>
  <textarea class="form-control" name="Comment" id="commentarea"></textarea>
  <br>
<input class="btn btn-primary" type="Submit" name="Submit" value="Submit">
  </fieldset>
  <br>
</form>
</div>

    </div> <!--Main Blog Area Ending-->

<?php
require_once("aside.php");
?>

  </div> <!--Row Ending-->
  
  
</div><!--Container Ending-->



<div style="height: 10px; background: #27AAE1;"></div> 

<?php
require_once("aftr.php");




