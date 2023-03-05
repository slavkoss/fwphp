<?php
$title='Comments' ;
require_once("ahdr.php");

Confirm_Login();
?>


<div class="container-fluid">
<div class="row">
	

<?php
require_once("aside_admin.php");
?>


	<div class="col-sm-10"> <!--Main Area-->
	<br>
	<div><?php echo Message();
	      echo SuccessMessage();
	?></div>	
	<h1>Un-Approved Comments</h1>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
	<tr>
	<th>No.</th>
	<th>Name</th>
	<th> Date</th>
	<th>Comment</th>
	<th>Approve</th>
	<th>Delete Comment</th>
	<th>Details</th>
	</tr>
<?php
$ConnectingDB;
$Query=get_cursor("SELECT * FROM comments WHERE status='OFF' ORDER BY id desc");
$SrNo=0;
while($DataRows=$Query->fetch(PDO::FETCH_ASSOC)){
	$CommentId=$DataRows['id'];
	$DateTimeofComment=$DataRows['datetime'];
	$PersonName=$DataRows['name'];
	$PersonComment=$DataRows['comment'];
	$CommentedPostId=$DataRows['admin_panel_id'];
	$SrNo++;

if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'..';}
	


?>
<tr>
	<td><?php echo htmlentities($SrNo); ?></td>
	<td style="color: #5e5eff;"><?php echo htmlentities($PersonName); ?></td>
	<td><?php echo htmlentities($DateTimeofComment); ?></td>
	<td><?php echo htmlentities($PersonComment); ?></td>
	<td><a href="ApproveComments.php?id=<?php echo $CommentId; ?>">
	<span class="btn btn-success">Approve</span></a></td>
	<td><a href="DeleteComments.php?id=<?php echo $CommentId;?>">
	<span class="btn btn-danger">Delete</span></a></td>
	<td><a href="FullPost.php?id=<?php echo $CommentedPostId; ?>" target="_blank">
	<span class="btn btn-primary">Live Preview</span></a></td>
</tr>
<?php } ?>			
			
			
		</table>
	</div>
	    <h1>Approved Comments</h1>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
	<tr>
	<th>No.</th>
	<th>Name</th>
	<th>Date & Time</th>
	<th>Comment</th>
	<th>Approved By</th>
	<th>Revert Approval </th>
	<th>Delete Comment</th>
	<th>Details</th>
	</tr>
<?php
$ConnectingDB;
$Query=get_cursor("SELECT * FROM comments WHERE status='ON' ORDER BY id desc");
$SrNo=0;
while($DataRows=$Query->fetch(PDO::FETCH_ASSOC)){
	$CommentId=$DataRows['id'];
	$DateTimeofComment=$DataRows['datetime'];
	$PersonName=$DataRows['name'];
	$PersonComment=$DataRows['comment'];
	$ApprovedBy=$DataRows['approvedby'];
	$CommentedPostId=$DataRows['admin_panel_id'];
	$SrNo++;
if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'..';}
if(strlen($DateTimeofComment)>18){$DateTimeofComment=substr($DateTimeofComment,0,18);}


?>
<tr>
	<td><?php echo htmlentities($SrNo); ?></td>
	<td style="color: #5e5eff;"><?php echo htmlentities($PersonName); ?></td>
	<td><?php echo htmlentities($DateTimeofComment); ?></td>
	<td><?php echo htmlentities($PersonComment); ?></td>
	<td><?php echo htmlentities($ApprovedBy); ?></td>
	<td><a href="DisApproveComments.php?id=<?php echo $CommentId;?>">
	<span class="btn btn-warning">Dis-Approve</span></a></td>
	<td><a href="DeleteComments.php?id=<?php echo $CommentId;?>">
	<span class="btn btn-danger">Delete</span></a></td>
	<td><a href="FullPost.php?id=<?php echo $CommentedPostId; ?>"target="_blank">
	<span class="btn btn-primary">Live Preview</span></a></td>
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
