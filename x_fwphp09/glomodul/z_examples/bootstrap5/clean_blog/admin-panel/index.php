<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

      if(!isset($_SESSION['adminname'])) {
        header("location: http://localhost/clean-blog/admin-panel/admins/login-admins.php");
      }

      
      //admins
      $select_admins = $conn->query("SELECT COUNT(*) AS admins_number FROM admins");
      $select_admins->execute();
      $admins = $select_admins->fetch(PDO::FETCH_OBJ);


      //categories
      $select_cats = $conn->query("SELECT COUNT(*) AS categories_number FROM categories");
      $select_cats->execute();
      $categories = $select_cats->fetch(PDO::FETCH_OBJ);

      //posts
      $select_posts = $conn->query("SELECT COUNT(*) AS posts_number FROM posts");
      $select_posts->execute();
      $posts = $select_posts->fetch(PDO::FETCH_OBJ);





?>


            
<div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Posts</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of posts: <?php echo $posts->posts_number; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $categories->categories_number; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admins->admins_number; ?></p>
              
            </div>
          </div>
        </div>
</div>
  
<?php require "layouts/footer.php"; ?>
        