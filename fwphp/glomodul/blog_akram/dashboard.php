<?php
$title='Dashboard' ;
require_once("ahdr.php");

Confirm_Login(); 
?>



<div class="container-fluid">
<div class="row">
  


<?php
$active = strtolower(basename(__FILE__ , '.php')) ;
require_once("aside_admin.php");
?>



  <div class="col-sm-10"> <!--Main Area-->
  <h1>Admin Dashboard</h1>
  
  <div><?php
     echo Message();
     echo SuccessMessage();
  ?></div>  
  
<div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
      <th>No</th>
      <th>Post Title</th>
      <th>Date &Time</th>
      <th>Author</th>
      <th>Category</th>
      <th>Banner</th>
      <th>Comments</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Details</th>
      
    </tr>
<?php
$ConnectingDB;
$ViewQuery=get_cursor("SELECT * FROM admin_panel ORDER BY id desc;");
$SrNo=0;
while($DataRows=$ViewQuery->fetch(PDO::FETCH_ASSOC)){
  $Id=$DataRows["id"];
  $DateTime=$DataRows["datetime"];
  $Title=$DataRows["title"];
  $Category=$DataRows["category"];
  $Admin=$DataRows["author"];
  $Image=$DataRows["image"];
  $Post=$DataRows["post"];
  $SrNo++;
  ?>
  <tr>
    
  <td><?php echo $SrNo; ?></td>
  <td style="color: #5e5eff;"><?php
  if(strlen($Title)>19){$Title=substr($Title,0,19).'..';}
  echo $Title;
  ?></td>
  <td><?php
  if(strlen($DateTime)>12){$DateTime=substr($DateTime,0,12);}
  echo $DateTime;
  ?></td>
  <td><?php
  if(strlen($Admin)>9){$Admin=substr($Admin,0,9);}
  echo $Admin; ?></td>
  <td><?php
  if(strlen($Category)>10){$Category=substr($Category,0,10);}
  echo $Category;
  ?></td>
  <td><img src="Upload/<?php echo $Image; ?>" width="90px"; height="50px"></td>
  <td>
<?php
$ConnectingDB;
$QueryApproved=get_cursor("SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='ON'");
$RowsApproved=$QueryApproved->fetch(PDO::FETCH_ASSOC);
$TotalApproved=array_shift($RowsApproved);
if($TotalApproved>0){
?>
<span class="label pull-right label-success">
<?php echo $TotalApproved;?>
</span>
    
<?php } ?>

<?php
$ConnectingDB;
$QueryUnApproved=get_cursor("SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='OFF'");
$RowsUnApproved=$QueryUnApproved->fetch(PDO::FETCH_ASSOC);
$TotalUnApproved=array_shift($RowsUnApproved);
if($TotalUnApproved>0){
?>
<span class="label  label-danger" title="TotalUnApproved">
<?php echo $TotalUnApproved;?>
</span>
    
<?php } ?>
    
    
  </td>
  <td>
    <a href="EditPost.php?Edit=<?php echo $Id; ?>">
    <span class="btn btn-warning">Edit</span>
    </a>
  </td>
  <td>
    <a href="DeletePost.php?Delete=<?php echo $Id; ?>">
    <span class="btn btn-danger">Delete</span>
    </a>
  </td>
    <td>
    <a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank">
    <span class="btn btn-primary"> Live Preview</span>
  </a>
  </td>
  </tr>
  
  
<?php } ?>






  </table>
</div>
  
      
  </div> <!-- Ending of Main Area-->
  
</div> <!-- Ending of Row-->
  
</div> <!-- Ending of Container-->



<div style="height: 10px; background: #27AAE1;"></div> 


require_once("aftr.php");

