<?php include 'hdr.php' ; ?>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/img-01.jpg');">
      <div class="wrap-login100 p-t-190 p-b-30">
        <form class="login100-form validate-form" method="post" action="login.php">
          

          <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
            <input class="input100" type="text" name="user" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>

          <div class="container-login100-form-btn p-t-10">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="XXXbtn XXXbtn-light">
            <a href="forget.php" class="XXXtxt1">
              Forgot Username / Password?
            </a>
          </div>

          <div class="XXXbtn-light XXXtext-center XXXw-full">
            <a class="XXXtxt1" href="signup.php">
              Create new account
              <i class="fa fa-long-arrow-right"></i>            
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>


<?php include 'ftr.php' ; ?>
</body>
</html>