<?php
$title='Edit Post' ;
require_once("ahdr.php");

Confirm_Login();


if(isset($_POST["Submit"]))
{
  $Title=escp($_POST["Title"]);
  $Category=escp($_POST["Category"]);
  $Post=escp($_POST["Post"]);
  //date_default_timezone_set("Asia/Karachi");
  $CurrentTime=time();
  //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  $DateTime;
  $Admin=$_SESSION["Username"];
  $Image=$_FILES["Image"]["name"];
  $Target="Upload/".basename($_FILES["Image"]["name"]);
  if(empty($Title)){
    $_SESSION["ErrorMessage"]="Title can't be empty";
    Redirect_to("AddNewPost.php");
    
  }elseif(strlen($Title)<2){
    $_SESSION["ErrorMessage"]="Title Should be at-least 2 Characters";
    Redirect_to("AddNewPost.php");
    
  }else{
    global $ConnectingDB;
    $EditFromURL=$_GET['Edit'];
    $Query=get_cursor("UPDATE admin_panel SET datetime='$DateTime', title='$Title',
    category='$Category', author='$Admin',image='$Image',post='$Post'
    WHERE id='$EditFromURL'", 'uu');
    
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

    if($Query){
      $_SESSION["SuccessMessage"]="Post Updated Successfully";
      Redirect_to("Dashboard.php");
    }else{
      $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
      Redirect_to("Dashboard.php");
    }
    
  }	
	
}

?>


<div class="container-fluid">
<div class="row">
	

<?php
require_once("aside_admin.php");
?>


	<div class="col-sm-10">
	<h1>Update Post</h1>
	<?php echo Message();
	      echo SuccessMessage();
	?>
<div>
	<?php
	$SerachQueryParameter=$_GET['Edit'];
	$Query=get_cursor("SELECT * FROM admin_panel WHERE id='$SerachQueryParameter'");
	while($DataRows=$Query->fetch(PDO::FETCH_ASSOC)){
		$TitleToBeUpdated=$DataRows['title'];
		$CategoryToBeUpdated=$DataRows['category'];
		$ImageToBeUpdated=$DataRows['image'];
		$PostToBeUpdated=$DataRows['post'];
		
	}
	
	
	?>
<form action="EditPost.php?Edit=<?php echo $SerachQueryParameter; ?>" method="post" enctype="multipart/form-data">
	<fieldset>
	<div class="form-group">
	<label for="title"><span class="FieldInfo">Title:</span></label>
	<input value="<?php echo $TitleToBeUpdated; ?>" class="form-control" type="text" name="Title" id="title" placeholder="Title">
	</div>
	<div class="form-group">
	<span class="FieldInfo"> Existing Category: </span>
	<?php echo $CategoryToBeUpdated;?>
	<br>
	<label for="categoryselect"><span class="FieldInfo">Category:</span></label>
	<select class="form-control" id="categoryselect" name="Category" >
	<?php
$ViewQuery=get_cursor("SELECT * FROM category ORDER BY datetime desc");
while($DataRows=$ViewQuery->fetch(PDO::FETCH_ASSOC)){
	$Id=$DataRows["id"];
	$CategoryName=$DataRows["name"];
?>	
	<option><?php echo $CategoryName; ?></option>
	<?php } ?>
			
	</select>
	</div>
	<div class="form-group">
		<span class="FieldInfo"> Existing Image: </span>
	<img src="Upload/<?php echo $ImageToBeUpdated;?>" width=170px; height=70px;>
	<br>
	<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
	<input type="File" class="form-control" name="Image" id="imageselect">
	</div>
	<div class="form-group">
	<label for="postarea"><span class="FieldInfo">Post:</span></label>
	<textarea class="form-control" name="Post" id="postarea">
		<?php echo $PostToBeUpdated; ?>
	</textarea>
	<br>
<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Update Post">
	</fieldset>
	<br>
</form>
</div>



	</div> <!-- Ending of Main Area-->
	
</div> <!-- Ending of Row-->
	
</div> <!-- Ending of Container-->

<div style="height: 10px; background: #27AAE1;"></div> 

<?php
require_once("aftr.php");
