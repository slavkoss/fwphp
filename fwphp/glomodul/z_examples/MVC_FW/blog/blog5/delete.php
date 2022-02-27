<?php include('hdr.php'); ?>
<?php include('post.php');
	$post = new Post($db);
?>
<?php
$post->deletePostBySlug($_GET['slug']);
header('Location:dashboard.php');
?>
