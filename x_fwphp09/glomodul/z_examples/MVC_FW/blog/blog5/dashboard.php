<?php
// J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\blog\blog5\dashboard.php
include('session.php'); 
include('hdr.php'); ?>
<?php
include('post.php');
$post = new Post($db);

?>

<div class="container">
	<h2>All Posts (Dashboard)</h2>
	<a href="view-comment.php" style="float:right;">comments</a>
	
	<?php
		if(!empty($_SESSION['username'])){
			echo "Logged in: {$_SESSION['username']}";
		}else{
			echo"You're not logged in!";
		}
	?>

	<table class="table table-striped">
		<thead><tr><th>Title</th><th>Description</th><th>Created at</th><th>Action</th></tr></thead>
		<tbody>
			<?php $ii=0; foreach($post->getAllPosts() as $post)
      { $ii++ ; ?>
        <tr>
          <td><?php echo $ii .'. '. $post['title']; ?></td>
          <td><?php echo substr($post['description'],0,20); ?></td>
          <td><?php echo date('Y-m-d',strtotime($post['created_at'])); ?></td>
          <td>
            <!--  -->
            <div class="grid">
              <a href="view.php?slug=<?php echo $post['slug'];?>">View</a>
              &nbsp;<a href="edit.php?slug=<?php echo $post['slug'];?>">Edit</a>
              &nbsp;<a style="color:red;" href="delete.php?slug=<?php echo $post['slug'];?>">Del</a>
            </div>
          </td>
			  </tr>
			<?php }?>
		</tbody>
	</table>
</div>

            <!--
               <button class="outline">View</button></a>
               <button class="outline secondary">Edit</button></a>
               <button class="outline contrast">Del</button></a>
            -->
<?php
 include('ftr.php'); 
