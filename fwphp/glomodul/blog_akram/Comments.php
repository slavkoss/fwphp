<?php
$title='Comments' ;
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
  <br>
  <div><?php echo Message();
        echo SuccessMessage();
  ?></div>  

  <h3>Un-Approved Comments (archived, not visible)</h3>

  <div class="table-responsive">
    <table class="table table-striped table-hover">
  <tr>
  <th>No.</th>
  <th>Name</th>
  <th> Date</th>
  <th>Comment</th>
  <th>Approve</th>
  <th>Del. Comm.</th>
  <th>Details</th>
  </tr>
<?php
$ConnectingDB;
$Query=get_cursor("SELECT * FROM comments WHERE status='OFF' ORDER BY id desc");
$SrNo=0;
while($rowt=$Query->fetch(PDO::FETCH_ASSOC)){

  $rowt = rlows($rowt) ;
  
  $CommentId=$rowt['id'];
  $Date_TimeofComment=$rowt['datetim'];
  $PersonName=$rowt['name'];
  $PersonComment=$rowt['komentar'];
  $CommentedPostId=$rowt['admin_panel_id'];
  $SrNo++;

if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'..';}
  


?>
<tr>
  <td><?php echo escp($SrNo); ?></td>
  <td style="color: #5e5eff;"><?php echo escp($PersonName); ?></td>
  <td><?php echo escp($Date_TimeofComment); ?></td>
  <td><?php echo escp($PersonComment); ?></td>
  <td><a href="ApproveComments.php?id=<?php echo $CommentId; ?>">
  <span class="btn btn-success">Approve</span></a></td>
  <td><a href="DeleteComments.php?id=<?php echo $CommentId;?>">
  <span class="btn btn-danger">Delete</span></a></td>
  <td><a href="FullPost.php?id=<?php echo $CommentedPostId; ?>" target="_blank">
  <span class="btn btn-primary">View</span></a></td>
</tr>
<?php } ?>      
      
      
    </table>
  </div>
      <h3>Approved Comments (visible)</h3>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
  <tr>
  <th>No.</th>
  <th>Name</th>
  <th>Date & Time</th>
  <th>Comment</th>
  <th>Approved By</th>
  <th>Revert Approval </th>
  <th>Del. Comm.</th>
  <th>Details</th>
  </tr>
<?php
$ConnectingDB;
$Query=get_cursor("SELECT * FROM comments WHERE status='ON' ORDER BY id desc");
$SrNo=0;
while($rowt=$Query->fetch(PDO::FETCH_ASSOC)){

  $rowt = rlows($rowt) ;

  $CommentId=$rowt['id'];
  $Date_TimeofComment=$rowt['datetim'];
  $PersonName=$rowt['name'];
  $PersonComment=$rowt['komentar']??'';
  $ApprovedBy=$rowt['approvedby'];
  $CommentedPostId=$rowt['admin_panel_id'];
  $SrNo++;
if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'..';}
if(strlen($Date_TimeofComment)>18){$Date_TimeofComment=substr($Date_TimeofComment,0,18);}


?>
<tr>
  <td><?php echo escp($SrNo); ?></td>
  <td style="color: #5e5eff;"><?=escp($PersonName)?></td>
  <td><?php echo escp($Date_TimeofComment); ?></td>
  <td><?php echo escp($PersonComment); ?></td>
  <td><?php echo escp($ApprovedBy); ?></td>
  <td><a href="DisApproveComments.php?id=<?php echo $CommentId;?>">
  <span class="btn btn-warning">Dis-Approve</span></a></td>
  <td><a href="DeleteComments.php?id=<?=$CommentId?>">
  <span class="btn btn-danger">Delete</span></a></td>
  <td><a href="FullPost.php?id=<?=$CommentedPostId?>"target="_blank">
  <span class="btn btn-primary">View</span></a></td>
</tr>
<?php } ?>      
      
      
    </table>
  </div>
      
      
      
  </div> <!-- Ending of Main Area-->
  
</div> <!-- Ending of Row-->
  
</div> <!-- Ending of Container-->

<div style="height: 10px; background: #27AAE1;"></div> 

<?php
require_once("aftr.php");
