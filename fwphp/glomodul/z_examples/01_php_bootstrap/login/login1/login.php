<?php
//   R - by usrname, psw
session_start();

include_once 'hdr.php';
include_once 'dbcon.php';

$alert = '';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = :username and password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':password' => $password]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user > 0){
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
       $alert = "<span style='color:red;'>User you entered \"". $username . '" does not exist or wrong password ?</span>'
       //.'<a class="btn btn-primary" href="login.php">Login Page</a>'
    ;
    }
}

?>

    <div class="container mt-5">
        <form method="post">
            <h1>Login Page</h1>
            <div class="alert"><?= $alert ?></div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <button class="btn btn-primary" id="submit">Login</button>
            <!--a class="btn btn-primary" href="dashboard.php">Dashboard Page</a-->

            <input type="hidden" name="login">
        </form>
    </div>


<?php include_once 'ftr.php'; ?>