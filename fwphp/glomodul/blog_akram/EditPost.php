<?php
$title='Edit Post' ;
require_once("ahdr.php");

Confirm_Login();


if(isset($_POST["Submit"]))
{
  $Title=escp($_POST["Title"]);
  $Category=escp($_POST["Category"]);
  $Post=escp($_POST["Post"]);
  $Date_Time = date('Y-m-d H:i:s', time());
  $Admin=$_SESSION["Username"];
  $Im_age=$_FILES["imag"]["name"];
  $Target="Upload/".basename($_FILES["imag"]["name"]);


  if(empty($Title)){
    $_SESSION["ErrorMessage"]="Title can't be empty";
    Redirect_to("AddNewPost.php");
    
  }elseif(strlen($Title)<2){
    $_SESSION["ErrorMessage"]="Title Should be at-least 2 Characters";
    Redirect_to("AddNewPost.php");
    
  }else{
    global $ConnectingDB;
    $EditFromURL=$_GET['Edit'];
    $Query=get_cursor("UPDATE admin_panel SET datetim='$Date_Time', title='$Title',
    category='$Category', author='$Admin',imag='$Im_age',post='$Post'
    WHERE id='$EditFromURL'", 'uu');
    
    move_uploaded_file($_FILES["imag"]["tmp_name"],$Target);

    if($Query){
      $_SESSION['SuccessMessage']="Post Updated Successfully";
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
$active = strtolower(basename(__FILE__ , '.php')) ;
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
  while($rowt=$Query->fetch(PDO::FETCH_ASSOC)){

    $rowt = rlows($rowt) ;

    $TitleToBeUpdated=$rowt['title'];
    $CategoryToBeUpdated=$rowt['category'];
    $Im_ageToBeUpdated=$rowt['imag'];
    $PostToBeUpdated=$rowt['post'];
    
  }
  
  
  ?>
<form action="EditPost.php?Edit=<?php echo $SerachQueryParameter; ?>" method="post" 
      enctype="multipart/form-data">
  <fieldset>
  <div class="form-group">
  <label for="title"><span class="FieldInfo">Title:</span></label>
  <input value="<?php echo $TitleToBeUpdated; ?>" class="form-control" type="text" 
         name="Title" id="title" placeholder="Title">
  </div>


  <div class="form-group">
    <span class="FieldInfo"> Existing Category: </span>
    <?php echo $CategoryToBeUpdated;?>
    <br>
    <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
    <select class="form-control" id="categoryselect" name="Category" >
    <?php
    $ViewQuery=get_cursor("SELECT * FROM category ORDER BY datetim desc");
    while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC)){
    
    $rowt = rlows($rowt) ;
    
    $Id=$rowt["id"];
    $CategoryName=$rowt["name"];
  ?>  
    <option><?php echo $CategoryName; ?></option>
    <?php 
    } ?>
        
    </select>
  </div>
  <div class="form-group">
    <span class="FieldInfo"> Existing imag: </span>
  <img src="Upload/<?=$Im_ageToBeUpdated?>" width=170px; height=70px;>
  <br>
  <label for="imagselect"><span class="FieldInfo">
     Select imag (eg J:\awww\www\vendor\b12phpfw\img\<?=$Im_ageToBeUpdated?>) :</span></label>
  <input type="File" class="form-control" name="imag" id="imagselect">
  </div>
  <div class="form-group">
  <label for="postarea"><span class="FieldInfo">Post:</span></label>
  <textarea rows="40" cols="110" class="form-control" name="Post" id="postarea">
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
