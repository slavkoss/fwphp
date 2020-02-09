<!--
Shan Shah
ALTER TABLE `admins` ADD `is_active` VARCHAR(4) NULL AFTER `addedby`; 
ALTER TABLE `admins` ADD `reset_code` VARCHAR(32) NULL AFTER `is_active`; 
ALTER TABLE `admins` ADD `user_email` VARCHAR(128) NULL AFTER `reset_code`; 
ALTER TABLE `admins` ADD `website` VARCHAR(255) NULL AFTER `user_email`; 
-->
<?php require_once 'i_hdr.php'; // 'includes/header.php' ?>
<?php require_once 'i_nav.php'; ?>

<div class="container">

  <div class='jumbotron jumbotron-fluid text-center color-set'>
      <div class="container">
          <h1 class='display-6'>LOGIN &amp; REGISTER</h1>
          <p class="text-lead">Create complete login and register form. Lot of functionality (good code). No usr table for login, older MySQLi DBI.</p>
      </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class='card card-custom'>
        <div class="card-header card-header-custom text-center">
            <a href="" class="active" id="login-form-link mx-auto">Features [Part - 1]</a>
        </div>
        <div class='card-body'>
            <div class="row">
              <div class="col-lg-12">
                  <ul class="list-group text-center">
                      <li class="list-group-item">
                          <a href="login.php">Login</a> / 
                          <a href="register.php">Register</a> /
                          <a href="logout.php">Logout</a>
                      </li>
                      <li class="list-group-item">Profile mangement System</li>
                      <li class="list-group-item">Forget/Reset Password</li>
                      <li class="list-group-item">Remember me Option</li>
                     
                  </ul>
              </div><!--div class="col-lg-12"-->
          </div><!--div class="row"-->
        </div><!--div class="card-body"-->
      </div><!--div class="card card-custom"-->
    </div><!--div class="col-md-6"-->



    <div class="col-md-6 ">

        <div class='card card-custom'>


            <div class="card-header card-header-custom text-center">

                <a href="" class="active" id="login-form-link mx-auto">Features [Part - 2]</a>
            </div>
            <div class='card-body'>

                <div class="row">
                    <div class="col-lg-12">


                        <ul class="list-group text-center">
                            
                            <li class="list-group-item">Deactivate Account</li>
                            <li class="list-group-item">Email Verification</li>
                            <li class="list-group-item">Account Verification</li>
                            <li class="list-group-item">XSS &amp; SQL injection prevention</li>
                        </ul>


                    </div><!--div class="col-lg-12"-->
                </div><!--div class="row"-->



            </div><!--div class="card-body"-->


        </div><!--div class="card card-custom"-->
    </div><!--div class="col-md-6"-->
  </div><!--div class="row"-->

</div><!--div class="container"-->

<?php require_once 'i_ftr.php'; ?>

   