<?php
$title='Delete Post' ;
require_once("ahdr.php");

Confirm_Login();


if(isset($_POST["Submit"]))
{
  //$Title=escp($_POST["Title"]);
  //$Category=escp($_POST["Category"]);
  //$Post=escp($_POST["Post"]);
  //date_default_timezone_set();
  //$Date_Time = date('Y-m-d H:i:s', time());
  //$Admin="Jazeb Akram";
  //$Im_age=$_FILES["imag"]["name"];
  //$Target="Upload/".basename($_FILES["imag"]["name"]);

    $DeleteFromURL=$_GET['Delete'];
    
    $Query=get_cursor("DELETE FROM admin_panel WHERE id='$DeleteFromURL'", 'dd');

    move_uploaded_file($_FILES["imag"]["tmp_name"],$Target);

    if($Query){
    $_SESSION['SuccessMessage']="Post Deleted Successfully";
    Redirect_to("Dashboard.php");
    }else{
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("Dashboard.php");
      
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
  <h1>Delete Post</h1>
  <?php echo Message();
        echo SuccessMessage();
  ?>
<div>
  <?php
  $SerachQueryParameter=$_GET['Delete'];
  $Query=get_cursor("SELECT * FROM admin_panel WHERE id='$SerachQueryParameter'");
  while($rowt=$Query->fetch(PDO::FETCH_ASSOC)){
    
    $rowt = rlows($rowt) ;
    
    $TitleToBeUpdated=$rowt['title'];
    $CategoryToBeUpdated=$rowt['category'];
    $Im_ageToBeUpdated=$rowt['imag'];
    $PostToBeUpdated=$rowt['post'];
    
  }
  
  
  ?>
<form action="DeletePost.php?Delete=<?=$SerachQueryParameter?>" method="post" 
      enctype="multipart/form-data">
  <fieldset>
  <div class="form-group">
  <label for="title"><span class="FieldInfo">Title:</span></label>
  <input disabled value="<?php echo $TitleToBeUpdated; ?>" class="form-control" type="text" name="Title" id="title" placeholder="Title">
  </div>
  <div class="form-group">
  <span class="FieldInfo"> Existing Category: </span>
  <?php echo $CategoryToBeUpdated;?>
  <br>
  <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
  <select disabled class="form-control" id="categoryselect" name="Category" >
  <?php
$ViewQuery=get_cursor("SELECT * FROM category ORDER BY datetim desc");
while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC)){
  $Id=$rowt["id"];
  $CategoryName=$rowt["name"];
?>  
  <option><?php echo $CategoryName; ?></option>
  <?php } ?>
      
  </select>
  </div>
  <div class="form-group">
    <span class="FieldInfo"> Existing imag: </span>
  <img src="Upload/<?php echo $Im_ageToBeUpdated;?>" width=170px; height=70px;>
  <br>
  <label for="imagselect"><span class="FieldInfo">Select imag:</span></label>
  <input disabled type="File" class="form-control" name="imag" id="imagselect">
  </div>
  <div class="form-group">
  <label for="postarea"><span class="FieldInfo">Post:</span></label>
  <textarea disabled class="form-control" name="Post" id="postarea">
    <?php echo $PostToBeUpdated; ?>
  </textarea>
  <br>
<input class="btn btn-danger btn-block" type="Submit" name="Submit" value="Delete Post">
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
