<?php
$title='Full Post' ;
require_once("ahdr.php");

if(isset($_POST["Submit"]))
{
  $Name=escp($_POST["Name"]);
  $Email=escp($_POST["Email"]);
  $Comment=escp($_POST["Comment"]);
  date_default_timezone_set("Asia/Karachi");
  $CurrentTime=time();
  //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  $DateTime;
  $PostId=$_GET["id"];


  if(empty($Name)||empty($Email) ||empty($Comment)){
    $_SESSION["ErrorMessage"]="All Fields are required";
    
  }elseif(strlen($Comment)>500){
    $_SESSION["ErrorMessage"]="only 500  Characters are Allowed in Comment";
    
  }else{
    global $ConnectingDB;
    $PostIDFromURL=$_GET['id'];
    $Query=get_cursor("INSERT into comments (datetime,name,email,comment,approvedby,status,admin_panel_id)
    VALUES ('$DateTime','$Name','$Email','$Comment','Pending','OFF','$PostIDFromURL')", 'cc');
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

<div class="container"> <!--Container-->
	<div class="blog-header">

	<h1>The Complete Responsive CMS Blog  </h1>

	<p class="lead">Blog using PHP</p>
	</div>
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
		    WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%'
		    OR category LIKE '%$Search%' OR post LIKE '%$Search%'");
		}else
    {
			$PostIDFromURL=$_GET["id"];
		  $ViewQuery=get_cursor("SELECT * FROM admin_panel WHERE id='$PostIDFromURL'
		    ORDER BY datetime desc");
    }

    while($DataRows=$ViewQuery->fetch(PDO::FETCH_ASSOC))
    {
			$PostId=$DataRows["id"];
			$DateTime=$DataRows["datetime"];
			$Title=$DataRows["title"];
			$Category=$DataRows["category"];
			$Admin=$DataRows["author"];
			$Image=$DataRows["image"];
			$Post=$DataRows["post"];
		
		?>
		<div class="blogpost thumbnail">
			<img class="img-responsive img-rounded"src="Upload/<?php echo $Image;  ?>" >
		<div class="caption">
			<h1 id="heading"> <?php echo htmlentities($Title); ?></h1>
		<p class="description">Category:<?php echo htmlentities($Category); ?> Published on
		<?php echo htmlentities($DateTime);?></p>
		<p class="post"><?php
		echo nl2br($Post); ?></p>
		</div>
			
		</div>
		<?php } ?>
		<br><br>
		<br><br>
		<span class="FieldInfo">Comments</span>
<?php

$PostIdForComments=$_GET["id"];
$ExtractingCommentsQuery=get_cursor("SELECT * FROM comments WHERE admin_panel_id='$PostIdForComments' AND status='ON' ");
while($DataRows=$ExtractingCommentsQuery->fetch(PDO::FETCH_ASSOC)){
	$CommentDate=$DataRows["datetime"];
	$CommenterName=$DataRows["name"];
	$Comments=$DataRows["comment"];


?>
<div class="CommentBlock">
	<img style="margin-left: 10px; margin-top: 10px;" class="pull-left" src="images/comment.png" width=70px; height=70px;>
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




