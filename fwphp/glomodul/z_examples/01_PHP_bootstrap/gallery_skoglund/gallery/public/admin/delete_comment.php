<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	// must have an ID
  if(empty($_GET['id'])) {
  	$session->message("No comment ID was provided.");
    redirect_to('index.php');
  }

  $comment = Comment::find_by_id($_GET['id']);
  if($comment && $comment->delete()) {
    $session->message("The comment was deleted.");
    redirect_to("comments.php?id={$comment->photograph_id}");
  } else {
    $session->message("The comment could not be deleted.");
    redirect_to('list_photos.php');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>
