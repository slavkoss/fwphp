<?php require "../includes/navbar.php"; ?>


<?php require "../config/config.php"; ?>

<?php 

    if(isset($_GET['del_id'])) {
        $id = $_GET['del_id'];

        $select = $conn->query("SELECT * FROM posts WHERE id =' $id'");
        $select->execute();
        $posts = $select->fetch(PDO::FETCH_OBJ);

        if($_SESSION['user_id'] !== $posts->user_id) {
            header("location: $moduleurl/index.php");

        } else {
            unlink("images/" . $posts->img . "");



            $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");
            $delete->execute([
                ':id' => $id
            ]);
        }

       

        header("location: $moduleurl/index.php");

        
    }  else {
        header("location: $moduleurl/404.php");
       
    }  

?>