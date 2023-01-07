<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php 

    if(isset($_GET['prof_id'])) {
        $id = $_GET['prof_id'];

        //first query

        $select = $conn->query("SELECT * FROM users WHERE id = '$id'");
        $select->execute();
        $rows = $select->fetch(PDO::FETCH_OBJ);

        if($_SESSION['user_id'] !== $rows->id) {
            header('location: http://localhost/clean-blog/index.php');
        }


        //second query

        if(isset($_POST['submit'])) {
            if($_POST['email'] == '' OR $_POST['username'] == '') {
                echo 'one or more inputs are empty';
            } else {

                
    
              
    
    
    
                $email = $_POST['email'];
                $username = $_POST['username'];
              

    
              
    
                $update = $conn->prepare("UPDATE users SET email = :email, username = :username
                    WHERE id = '$id'");
    
                $update->execute([
                    ':email' => $email,
                    ':username' => $username,
                   
                    
                ]);


               

                header('location: http://localhost/clean-blog/users/profile.php?prof_id='.$_SESSION['user_id'].'');
            }
    
        }



    } else {
        header("location: http://localhost/clean-blog/404.php");
       
    }




?>

            <form method="POST" action="profile.php?prof_id=<?php echo $rows->id; ?>" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" value="<?php echo $rows->email; ?>" id="form2Example1" class="form-control" placeholder="email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="username" value="<?php echo $rows->username; ?>" id="form2Example1" class="form-control" placeholder="username" />
            </div>

           

              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


 <?php require "../includes/footer.php"; ?>