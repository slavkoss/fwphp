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
//SELECT id, title, post FROM admin_panel ORDER BY id ; //where id=1
$ViewQuery=get_cursor("SELECT * FROM admin_panel ORDER BY id desc");
$SrNo=0;
while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC)){

  $rowt = rlows($rowt) ;

  $Id=$rowt["id"];
  $Date_Time=$rowt["datetim"];
  $Title=$rowt["title"];
  $Category=$rowt["category"];
  $Admin=$rowt["author"];
  $Im_age=$rowt["imag"];
  $Post=$rowt["post"];
  $SrNo++;
  ?>
  <tr>
    
  <td><?php echo $SrNo; ?></td>

  <td style="color: #5e5eff;"><?php
  if(strlen($Title)>20){$Title=substr($Title,0,20).'...';}
  echo $Title;
  ?></td>

  <td><?php
  //if(strlen($Date_Time)>12){$Date_Time=substr($Date_Time,0,12);}
  echo $Date_Time;
  ?></td>

  <td><?php
  if(strlen($Admin)>9){$Admin=substr($Admin,0,9);}
  echo $Admin; ?></td>

  <td><?php
  if(strlen($Category)>10){$Category=substr($Category,0,10);}
  echo $Category;
  ?></td>

  <td><img src="Upload/<?php echo $Im_age; ?>" width="70px"; height="50px"></td>
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
      
  <?php 
} 
  //jsmsg(['keymsg1'=>"row id=$Id", 'keymsg2'=>'valmsg2']) ;
?>
    
    
  </td>
  <td>
    <a href="EditPost.php?Edit=<?=$Id?>">
    <span class="btn btn-warning">Edit</span>
    </a>
  </td>
  <td>
    
    <a id="erase_row" class="btn btn-danger"
       onclick="var yes ; yes = jsmsgyn('Erase row <?=$Id?>?','') ; if (yes == '1') { location.href= 'DelPost.php?Delete=<?=$Id?>' }"
       title="Delete tbl row ID=<?=$Id?>"
    ><b style="color: white">Del <?=$Id?></b></a>
    
    <!--a href="DeletePost.php?Delete=<?=$Id?>">
    <span class="btn btn-danger">Del <?=$Id?></span>
    </a-->

  </td>


    <td>
    <a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank">
    <span class="btn btn-primary">Show</span>
  </a>
  </td>
  </tr>
  
  
   <?php 
   // $pp1->module_url.QS.'i/dd/id/'.$id
} ?>






  </table>
</div>
  
      
  </div> <!-- Ending of Main Area-->
  
</div> <!-- Ending of Row-->
  
</div> <!-- Ending of Container-->



<div style="height: 10px; background: #27AAE1;"></div> 

<?php
require_once("aftr.php");

