<?php require "../../config/config.php"; ?>


<?php 


    if(!isset($_SESSION['adminname'])) {
        header("location: http://localhost/clean-blog/admin-panel/admins/login-admins.php");
    }

    if(isset($_GET['id']) AND isset($_GET['status'])) {
      $id = $_GET['id'];
      $status = $_GET['status'];

     

            if($status == 0) {
                
            
                    $update = $conn->prepare("UPDATE posts SET status = 1  WHERE id = '$id'");

                    $update->execute();

                    header('location: http://localhost/clean-blog/admin-panel/posts-admins/show-posts.php');
                    

            } else {
                    $update = $conn->prepare("UPDATE posts SET status = 0  WHERE id = '$id'");

                    $update->execute();

                    header('location: http://localhost/clean-blog/admin-panel/posts-admins/show-posts.php');
            
            }



      } else {
        header("location: http://localhost/clean-blog/404.php");
      
      }




?>