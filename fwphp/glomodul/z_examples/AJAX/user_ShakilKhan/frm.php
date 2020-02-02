<?php
/** J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\frm.php
* I N C L U D E D  i n  i n d e x.p h p  
* called from cre_signup_ajax.php ee cre_signup.js
*/
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//include 'D bCrud.php'; //include 'D bCrud_module.php'; //$db = new D bCrud_module;
include 'frm_func.php';

if(!isset($_SESSION['user_id_loggedin'])):
   $_SESSION['unutherrized'] = "Please Enter Email & Password";
   header("location:index.php");
endif;

$css1 = 'style.css';
$css2 = 'profile.css';
include 'hdr.php';
?>
  <?php include 'nav.php'; ?>
    <?php if(isset($_SESSION['image_success'])): ?>
        <div class="alert alert-success all-msg text-center success-msg">
            <?php echo $_SESSION['image_success']; ?>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['image_success']); ?>

    <?php if(isset($_SESSION['address_success'])): ?>
        <div class="alert alert-success all-msg text-center success-msg">
            <?php echo $_SESSION['address_success']; ?>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['address_success']); ?>

    <?php if(isset($_SESSION['name_update'])): ?>
        <div class="alert alert-success all-msg text-center success-msg">
            <?php echo $_SESSION['name_update']; ?>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['name_update']); ?>

    <?php if(isset($_SESSION['password_success'])): ?>
        <div class="alert alert-success all-msg text-center success-msg">
            <?php echo $_SESSION['password_success']; ?>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['password_success']); ?>

    <?php if(isset($_SESSION['linkedin_success'])): ?>
        <div class="alert alert-success all-msg text-center success-msg">
            <?php echo $_SESSION['linkedin_success']; ?>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['linkedin_success']); ?>

    <?php if(isset($_SESSION['bio_success'])): ?>
        <div class="alert alert-success all-msg text-center success-msg">
            <?php echo $_SESSION['bio_success']; ?>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['bio_success']); ?>

    <?php if(isset($_SESSION['facebook_success'])): ?>
        <div class="alert alert-success all-msg text-center success-msg">
            <?php echo $_SESSION['facebook_success']; ?>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['facebook_success']); ?>
    <div class="container contents">
      <div class="row">
        <div class="col-md-3">
          <div class="left-area">
            <?php links($db); ?>
          </div><!-- left-area -->
        </div><!-- col -->
        <div class="col-md-9">
          <div class="right-area">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Informations</h5>
                        </div><!-- col -->
                        <div class="col-md-9">
                            <?php percentage($db); ?>
                        </div>
                    </div><!-- row -->
            <hr>

                 <?php 
                 user_info($db);
                 include 'upd_03bio.php';
                 include 'upd_04facebook.php';
                 include 'upd_05linkedin.php';
                 include 'upd_01name.php';
                 include 'upd_09password_frm.php';
                 ?>

          </div><!-- right-area -->
        </div><!-- col -->
      </div><!-- row -->
<?php  echo __FILE__ .' SAYS: <pre>$_SESSION='; if (isset($_SESSION)) print_r($_SESSION); else echo 'NOT SET'; echo '</pre><br />';?>
    </div><!-- container -->


  <?php include 'ftr.php'; ?>

  <!--script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script-->
  <script type="text/javascript" src="frm.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
        $(".all-msg").fadeOut("slow");
        },2000);
    })
</script>
</body>
</html>