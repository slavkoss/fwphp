<?php
//J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\read_login_success.php
session_start();
include 'hdr.php';
include "nav.php";
?>
  <div class="container main">
    <div class="row">
      <div class="col-md-12">
        <div class="success-area">
          
          <?php if(isset($_SESSION['user_name'])): ?>
            <i class='fa fa-check-circle'></i> Hi <strong> <?=$_SESSION['user_name']?></strong> Welcome to website, glad to see you. Now login <a href='index.php'>Login</a>
          <?php endif; ?>
          
          <?php unset($_SESSION['user_name']); ?>
        
        </div><!-- success-area -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</body>

<?php include 'ftr.php'; ?>

<script type="text/javascript">
  $(document).ready(function(){
    $(".success-area").fadeOut();
    $(".success-area").fadeIn(5000);
  })
</script>
</html>
