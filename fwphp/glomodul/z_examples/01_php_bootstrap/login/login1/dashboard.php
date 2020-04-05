<?php
// J:\awww\www\fwphp\glomodul\z_examples\01_php_bootstrap\login\login1\dashboard.php
session_start();

include_once 'hdr.php';
//include_once 'dbcon.php';

if(!$_SESSION['username']){
    header("Location: login.php");
}
?>

<div class="container mt-5">
  <h1>Dashboard</h1>
  <a class="btn btn-danger" href="logout.php">Logout</a>
  <a class="btn btn-primary" href="index.php">Register</a>
</div>

<?php include_once 'ftr.php'; ?>
