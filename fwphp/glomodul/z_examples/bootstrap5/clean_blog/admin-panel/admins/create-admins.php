<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php  

    if(!isset($_SESSION['adminname'])) {
      header("location: http://localhost/clean-blog/admin-panel/admins/login-admins.php");
    }



    if(isset($_POST['submit'])) {

        if($_POST['email'] == '' OR $_POST['adminname'] == '' OR $_POST['password'] == '') {
          echo "<div class='alert alert-danger  text-center  role='alert'>
                  enter data into the inputs
                </div>";
        } else {
          $email = $_POST['email'];
          $adminname = $_POST['adminname'];
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

          $insert  = $conn->prepare("INSERT INTO admins (email, adminname, mypassword) VALUES
          (:email, :adminname, :mypassword)");

          $insert->execute([
            ':email' => $email,
            ':adminname' => $adminname,
            ':mypassword' => $password
          ]);

          header("location: http://localhost/clean-blog/admin-panel/index.php");



        }
      
    }


?>
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                <form method="POST" action="create-admins.php">
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">
                      <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                    
                    </div>

                    <div class="form-outline mb-4">
                      <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="username" />
                    </div>
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
</div>

<?php require "../layouts/footer.php"; ?>
