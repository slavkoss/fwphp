<?php
include('hdr.php');

include('Comment.php');
$comments = new Comment($db);
?>

<div class="container">
  <h3>Comments of post ...</h3>
	<table>
		<thead><tr><th>Name</th><th>Subject</th><th>Description</th><th>Created</th><th>Status</th><th>Action</th></tr></thead>
		<tbody>
			<?php
      //foreach($comments->getPendingComments() as $comment)
      foreach($comments->getAllComments() as $comment)
      { ?>
			<tr>
				<td><?php echo $comment['name']; ?></td>
				<td><?php echo $comment['subject']; ?></td>
				<td><?php echo $comment['description']; ?></td>
				<td><?php echo date('Y-m-d',strtotime($comment['created_at'])); ?></td>
				<td><?php echo $comment['status']; ?></td>

				<td>
					<form method="POST">
					<input type="hidden" name="approveID" value="<?php echo $comment['id']; ?>">
					<button type="submit" class="btn btn-outline-success btn-sm" name="approveComment">Approve/Disapr.</button>
          <!--div class="grid">&nbsp;<a style="color:red;" href="">Approve</a></div-->
					</form>


					<form method="POST">
  					<input type="hidden" name="deleteID" value="<?php echo $comment['id']; ?>">
	  				<button type="submit" class="btn btn-outline-danger btn-sm" name="delete">Delete</button>
            <!--div class="grid">&nbsp;<a style="color:red;" href="">Del</a></div-->
   				</form>
				</td>





			<?php }?>
			
				<?php
				if(isset($_POST['approveComment'])){
					$result = $comments->update($_POST['approveID']);
					if($result==true){
						echo"comment accepted successfully!!";
					}
				}
				if(isset($_POST['deleteID'])){
					$result = $comments->delete($_POST['deleteID']);
					if($result==true){
						echo"comment deleted successfully!!";
					}
				}
				?>
			</tr>
		</tbody>
	</table>
</div>
