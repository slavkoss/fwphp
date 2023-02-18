<?php require "../../config/config.php"; ?>


<?php 

    if(isset($_GET['comment_id'])) {
        $id = $_GET['comment_id'];

        $delete = $conn->prepare("DELETE FROM comments WHERE id = :id");
        $delete->execute([
                ':id' => $id
        ]);
     

       header('location: http://localhost/clean-blog/admin-panel/comments-admins/show-comments.php');
        
    }  else {
        header("location: http://localhost/clean-blog/404.php");
       
    }  

?>