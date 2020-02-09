<?php
//   C - R E G I S T E R  P A G E
include_once 'hdr.php';    // 'includes/header.php'
include_once 'dbcon.php'; // 'db/dbcon.php'

$username   = '';
$alert      = '';
$alert_part_loggedin = 'You are not logged in.';

if(isset($_POST['register'])){
  if($_POST['username'] and $_POST['password']) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $alert_part_loggedin = "<span style='color:blue;'>You are logged in as $username\.</span>";

      $sql = "INSERT INTO admins (username, password) VALUES (:username, :password)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([':username' => $username, ':password' => $password]);
      $alert = "Account Has Been Created Please Go To "
         .'<a class="btn btn-primary" href="login.php">Login Page</a>'
      ;
  } else {
      $alert = "<span style='color:red;'>Your Account Has NOT Been Created, enter valid (not empty, not 0) username and password !</span>"
         //.'<a class="btn btn-primary" href="login.php">Login Page</a>'
      ;
  }
}

?>

    <div class="container mt-5">

        <form method="post">
            <h1>Register Page - Create Account</h1>
            <div class="alert"><?="$alert_part_loggedin ". $alert ?></div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <button class="btn btn-primary" id="submit">Submit</button>
            <a class="btn btn-primary" href="dashboard.php">Dashboard Page</a>

            <input type="hidden" name="register">
        </form>

    </div>


<?php include_once 'ftr.php'; // 'includes/footer.php' ?>