<?php
$title='Add Post' ;
require_once("ahdr.php");

Confirm_Login();


if(isset($_POST["Submit"]))
{
                               //echo '<pre><b>$_POST</b>='; print_r($_POST); echo '</pre>';
  unset($_POST["Submit"]) ;

   $Title=escp($_POST["Title"]);
   $Category=escp($_POST["Category"]);
   $Post=escp($_POST["Post"]);
   $Date_Time = date('Y-m-d H:i:s', time());
                    //date_default_timezone_set();
                    //$CurrentTime=time();
                    //"%Y-%m-%d %H:%M:%S"
                    //$Date_Time=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
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
    $Query=get_cursor("INSERT INTO admin_panel(datetim,title,category,author,imag,post)
    VALUES('$Date_Time','$Title','$Category','$Admin','$Im_age','$Post')", 'cc');

    move_uploaded_file($_FILES["imag"]["tmp_name"],$Target);

    if($Query){
    $_SESSION['SuccessMessage']="Post Added Successfully";
    //Redirect_to("AddNewPost.php");
    }else{
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    //Redirect_to("AddNewPost.php");
      
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
  <h1>Add New Post</h1>
  <?php echo Message();
        echo SuccessMessage();
  ?>
<div>
<form action="AddNewPost.php" method="post" enctype="multipart/form-data">
  <fieldset>
  <div class="form-group">
  <label for="title"><span class="FieldInfo">Title:</span></label>
  <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
  </div>
  <div class="form-group">
  <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
  <select class="form-control" id="categoryselect" name="Category" >
  <?php
global $ConnectingDB;
$ViewQuery=get_cursor("SELECT * FROM category ORDER BY id desc");
while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC)){
  
  $rowt = rlows($rowt) ;
  
  $Id=$rowt["id"];
  $CategoryName=$rowt["name"];
?>  
  <option><?php echo $CategoryName; ?></option>
  <?php } ?>
      
  </select>
  </div>
  <div class="form-group">
  <label for="imagselect"><span class="FieldInfo">Select imag:</span></label>
  <input type="File" class="form-control" name="imag" id="imagselect">
  </div>
  <div class="form-group">
  <label for="postarea"><span class="FieldInfo">Post:</span></label>
  <textarea class="form-control" name="Post" id="postarea"></textarea>
  <br>
<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
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
