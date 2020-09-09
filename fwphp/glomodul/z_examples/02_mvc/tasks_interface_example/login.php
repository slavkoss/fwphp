<?php
ob_start();
session_start();
include "Database.php";
include "Users.php";

$user = new Users();
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    //$email = $_POST['email'];
    $password = $_POST['password'];
    $reg_msg = "";
    //if(!$user->register($username,$email,$password)) {
    if(!$user->register($username,$password)) {
        $reg_msg .= "<div class='alert alert-danger'>Something went wrong!</div>";
    }else{
        $reg_msg .= "<div class='alert alert-success'>Registered successfully! Now Login</div>";
    }

}


if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $log_msg = "";
    if(!$user->login($username,$password)) {
        $log_msg .= "<div class='alert alert-danger'>User not found</div>";
    }else{
        header("Location: index.php");
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/zinc/themes/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <!--link rel="stylesheet" href="css/bootstrap.c ss"/>
    <link rel="stylesheet" href="css/font-awesome.min.c ss"/>
    <link rel="stylesheet" href="css/style.c ss"/-->
</head>
<body>
<div class="row mt-5 main">
    <div class="col-md-5 login-screen">
        <h3>Login</h3>
        <?php
        if(isset($log_msg)) {
            echo $log_msg;
        }
        ?>
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login" class="btn btn-success btn-block"/>
            </div>
        </form>
    </div>
    <div class="col-md-7 signup-screen">
        <h3>Need an Account?</h3>
        <?php
            if(isset($reg_msg)) {
                echo $reg_msg;
            }
        ?>
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="form-control"/>
            </div>
            <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="submit" name="register" value="Register" class="btn btn-primary btn-block"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>