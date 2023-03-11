<?php
$title='Admins' ;
require_once("ahdr.php");

Confirm_Login();

if(isset($_POST["Submit"]))
{
   $Username=escp($_POST["Username"]);
   $Password=escp($_POST["Password"]);
   $ConfirmPassword=escp($_POST["ConfirmPassword"]);
   $Date_Time = date('Y-m-d H:i:s', time());
   $Admin=$_SESSION["Username"];
  if(empty($Username)||empty($Password)||empty($ConfirmPassword)){
    $_SESSION["ErrorMessage"]="All Fields must be filled out";
    Redirect_to("Admins.php");
    
  }elseif(strlen($Password)<4){
    $_SESSION["ErrorMessage"]="Atleast 4 Characters For Password are required";
    Redirect_to("Admins.php");
    
  }elseif($Password!==$ConfirmPassword){
    $_SESSION["ErrorMessage"]="Password / ConfirmPassword does not match";
    Redirect_to("Admins.php");
  }
  else{
    $Query=get_cursor("INSERT INTO registration(datetim,username,password,addedby)
    VALUES('$Date_Time','$Username','$Password','$Admin')", 'cc');
    if($Query){
      $_SESSION['SuccessMessage']="Admin Added Successfully";
      Redirect_to("Admins.php");
    }else{
      $_SESSION["ErrorMessage"]="Category failed to Add";
      Redirect_to("Admins.php");
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
  <h1>Add new Admin</h1>
  <?php echo Message();
        echo SuccessMessage();
  ?>
<div>
<form action="Admins.php" method="post">
  <fieldset>
  <div class="form-group">
  <label for="Username"><span class="FieldInfo">UserName:</span></label>
  <input class="form-control" type="text" name="Username" id="Username" placeholder="Username">
  </div>
  <div class="form-group">
  <label for="Password"><span class="FieldInfo">Password:</span></label>
  <input class="form-control" type="Password" name="Password" id="Password" placeholder="Password">
  </div>
  <div class="form-group">
  <label for="ConfirmPassword"><span class="FieldInfo">Confirm Password:</span></label>
  <input class="form-control" type="Password" name="ConfirmPassword" id="ConfirmPassword" placeholder=" Retype same Password">
  </div>
  <br>
<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Admin">
  </fieldset>
  <br>
</form>
</div>
<div class="table-responsive">
  <table class="table table-striped table-hover">
  <tr>
    <th>Sr No.</th>
    <th>Date & Time</th>
    <th>Admin Name</th>
    <th>Added By</th>
    <th>Action</th>
    
  </tr>
<?php
$ViewQuery=get_cursor("SELECT * FROM registration ORDER BY id desc");
$SrNo=0;
while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC)){

  $rowt = rlows($rowt) ;

  $Id=$rowt["id"];
  $Date_Time=$rowt["datetim"];
  $Username=$rowt["username"];
  $Admin=$rowt["addedby"];
  $SrNo++;


  
  


?>
<tr>
  <td><?php echo $SrNo; ?></td>
  <td><?php echo $Date_Time; ?></td>
  <td><?php echo $Username; ?></td>
  <td><?php echo $Admin; ?></td>
  <td><a href="DeleteAdmin.php?id=<?php echo $Id;?>">
  <span class="btn btn-danger">Delete</span></a></td>
  
</tr>
    
  <?php } ?>  
  </table>
</div>
  </div> <!-- Ending of Main Area-->
  
</div> <!-- Ending of Row-->
  
</div> <!-- Ending of Container-->



<div style="height: 10px; background: #27AAE1;"></div> 

require_once("aftr.php");
      
