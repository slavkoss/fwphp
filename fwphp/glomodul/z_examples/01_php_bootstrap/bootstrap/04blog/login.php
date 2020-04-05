<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
--> */
$module_arr = [ // MODULE IS FOLDER bootstrap !!
  // J:/awww/www/fwphp/glomodul4/help_sw/test/bootstrap/ :
    'module_path'     => str_replace('\\','/', dirname(__DIR__).'/')
] ;
require '../inc_adresses.php' ;
require '../inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Blog Admin Area', '/'.$module_arr['module_relpath'].'/04blog/style.css');
?>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <a href="index.php" class="navbar-brand">Blog</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      </div>
    </div>
  </nav>

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-user"></i> Blog Admin</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </section>

  <!-- LOGIN -->
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Account Login</h4>
            </div>
            <div class="card-body">
              <form action="index.php">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Login">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="conatiner">
      <div class="row">
        <div class="col">
          <p class="lead text-center">Copyright &copy; 2017 Blog</p>
        </div>
      </div>
    </div>
  </footer>

  <!--script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script-->
  <!--script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script-->

  <?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>

  <script>
      //CKEDITOR.replace( 'editor1' );
  </script>
</body>
</html>
