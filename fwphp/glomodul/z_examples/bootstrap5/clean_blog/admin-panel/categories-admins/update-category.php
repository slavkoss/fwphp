<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php 

    if(isset($_GET['up_id'])) {
      $id = $_GET['up_id'];

      if(!isset($_SESSION['adminname'])) {
        header("location: http://localhost/clean-blog/admin-panel/admins/login-admins.php");
      }

      $select = $conn->query("SELECT * FROM categories WHERE id = '$id'");
      $select->execute();
      $rows = $select->fetch(PDO::FETCH_OBJ);

     


      if(isset($_POST['submit'])) {
          if($_POST['name'] == '') {
              echo "<div class='alert alert-danger text-center role='alert'>
                      enter data into the inputs
                  </div>";
          } else {


              $name = $_POST['name'];
    
              $update = $conn->prepare("UPDATE categories SET name = :name  WHERE id = '$id'");

              $update->execute([
                  ':name' => $name,
                      
              ]);

              header('location: http://localhost/clean-blog/admin-panel/categories-admins/show-categories.php');
            }

      }



      } else {
        header("location: http://localhost/clean-blog/404.php");
      
      }




?>
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="update-category.php?up_id=<?php echo $rows->id; ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="<?php echo $rows->name; ?>" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
</div>
<?php require "../layouts/footer.php"; ?>
