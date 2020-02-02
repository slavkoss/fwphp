<?php
//J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\index.php 
//see L:\3_sw_video\1_php\00BEST_Advanced PHP Ajax R eg & L ogin Form 
//hash 32 char eg my long psw with first uppercase: f31dbc75d39b92d5c1c0fba2bb2d7584

namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
/** *********************************
*    C O N F I G
********************************** */
if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { if(session_id() == '') { session_start(); } }
//include 'D bCrud.php'; //include 'D bCrud_module.php'; 

$module_towsroot = '../../../' ; //inet provider doc root - www or htdocs or...
//J:/awww/www/ :
$wsroot_path = str_replace('\\','/', realpath($module_towsroot)).'/' ; 
//J:/awww/www/fwphp/glomodul4/msg_share/ :
$path_rel_modul = rtrim(ltrim(str_replace('\\','/', __DIR__ .'/'), $wsroot_path),'/') ;
$module_path=$wsroot_path.$path_rel_modul.'/'; //=module_cls_script_path (CONVENTION!!)
$module_arr = [
    'dbg'=>'1'
  , 'module_path'=>$module_path
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'caller'=>[]
  , 'style'=>''
];
//require($all_sites_glo_path.'Autoload.php');
require($module_path.'Autoload.php');
$module_arr['caller'][] = __FILE__ .', lin='.__LINE__ .' CALLED Auto load($module_ arr)'; 
$autoloader = new Autoload($module_arr);

$db = new DbCrud_module;

/** *********************************
*   C O N T R O L L E R
********************************** */
switch (true) {
case isset($_GET['add_photo']):   include('upd_08photo_frm.php'); exit(0); break;
case isset($_GET['address']):     include('upd_02address.php'); exit(0); break;
case isset($_SESSION['user_id_loggedin']): include('frm.php'); exit(0); break;
//default: break;
} // e n d  s w i t c h    //header("location:f rm.php");



$css1 = 'style.css';
include 'hdr.php';
?>
<!-- === Add Background Video === -->
<!--video autoplay muted loop id="myvideo">
  <source src="img/video.mp4" type="video/mp4">
</video-->

<!-- === NAVBAR  === -->
<?php
include 'nav.php';
if(isset($_SESSION['unutherrized'])):
?>
  <div class="alert alert-danger text-center all-msg">
    <strong><?php echo $_SESSION['unutherrized']; ?></strong>
  </div>
<?php
  unset($_SESSION['unutherrized']);
endif;
?>

<div class="showcase">
<div class="container">
  <div class="row">
    <div class="col-md-8 content alert-light">
        <!-- https://www.w3schools.com/bootstrap4/bootstrap_alerts.asp
.alert-success, .alert-info, .alert-warning, .alert-danger, .alert-primary, .alert-secondary, .alert-light or .alert-dark
        ***********************************
             U S E R S  T A B L E 
        *********************************** 
        -->
        <?php include 'tbl.php'; ?>
      
      <?php if(isset($_SESSION['user_name_loggedin'])): ?>
        <h3>Thank You 
           <span class="online"><?php echo $_SESSION['user_name_loggedin'] ?></span> See you next time
        </h3> <p><i class="fa fa-thumbs-o-up"></i></p>
      <?php else: ?>
        <h1>About this module (more complicated)</h1>
        This page is output of script <?=__FILE__?>.
        <br />http://dev1:8083/fwphp/glomodul4/help_sw/test/login/user/index.php 
        <br />see https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul4/help_sw/test/login/user/
        <ol><li>Good PHP, PDO, AJAX (jQuery), Bootstrap users CRUD code.
        <li>With namespaces meaning autoloading module and siteglobal classes scripts.
        <li>Module single entry point is index.php meaning scripts are included, not URL called (except AJAX PHP scripts called from JS scripts).
        </ol>
        See also simmilar J:\awww\www\fwphp\glomodul4\usr_posttyp_post\index.php.
        <br />http://dev1:8083/fwphp/glomodul4/usr_posttyp_post\
        <br />Lorem ipsum dolor...
      <?php endif; ?>

      <?php unset($_SESSION['user_name_loggedin']); ?>


        <!-- ***********************************
             U S E R  R E G I S T E R  F R M
        *********************************** -->
    </div><!-- col -->
    <div class="col-md-4 content">
      <div class="signup-cover">
      <div class="card">
        <div class="card-header">
          
        </div><!-- card-header name not required!!! autofocus -->
        <div class="card-body">

          <form id="signup_submit">
            <div class="form-group show-progress">

            </div>
            <div class="form-group">
              <input type="text" name="name" id="name" class="form-control" 
                     placeholder="Enter Name...">
              <div class="name-error error"></div>
            </div><!-- form-group -->
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control" 
                     placeholder="Enter Email..." required>
              <div class="email-error error"></div>
            </div><!-- form-group -->
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control" 
                     placeholder="Choose Password..." required>
              <div class="password-error error"></div>
            </div><!-- form-group -->
            <div class="form-group">
              <input type="password" id="confirm" class="form-control" 
                     placeholder="Confirm Password..." required>
              <div class="confirm-error error"></div>
            </div><!-- form-group -->
            <div class="form-group">
              <button type="button" id="submit" class="btn btn-success btn-block form-btn">Register (add user, create Account)</button>
            </div><!-- form-group -->
            
            <div class="form-group">
              <a href="#" id="login">Have account? - Log in</a>
            </div>

          </form><!-- form -->

        </div><!-- card-body -->


        <div class="form-icon">
          <div class="label-heading"><h5>Register (Signup) or Log in</h5></div>
        </div>
      </div><!-- card -->
    </div><!-- signup-cover-->


        <!-- ***********************************
             U S E R  L O G I N  F R M
        *********************************** -->
    <div class="login-cover">
      <div class="card">
        <div class="card-header">
          
        </div><!-- card-header -->
        <div class="card-body">

          <form id="login-submit-form">
            <div class="form-group">
              <div class="login-error error"></div>
            </div>
            <div class="form-group">
              <input type="email" name="login_email" id="login-email" class="form-control" 
                     placeholder="Enter Email..." autofocus>
              <div class="login-email-error error"></div>
            </div><!-- form-group -->
            <div class="form-group">
              <input type="password" name="login_password" id="login-password" class="form-control" 
                     placeholder="Choose Password...">
              <div class="login-password-error error"></div>
            </div><!-- form-group -->
            <div class="form-group">
              <button type="button" id="login-submit" class="btn btn-success btn-block form-btn">
                Log in
              </button>
            </div><!-- form-group -->
            <div class="form-group">
              <a href="#" id="signup">Register (add user, create Account)?</a>
            </div>
          </form><!-- form -->

        </div><!-- card-body -->

        <div class="form-icon">
          <div class="label-heading"><h5>User Log in</h5></div>
        </div>

      </div><!-- card -->
    </div><!-- l ogin-cover-->



    </div><!-- col -->
  </div><!-- row -->
</div><!-- showcase -->
<?php  echo __FILE__ .' SAYS: <pre>$_SESSION='; if (isset($_SESSION)) print_r($_SESSION); else echo 'NOT SET'; echo '</pre><br />';?>
</div><!-- container -->

  <?php include 'ftr.php'; ?>

  <script type="text/javascript" src="simple.js"></script>
  <script type="text/javascript" src="cre_signup.js"></script>
  <script type="text/javascript" src="read_login.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){
          $(".all-msg").fadeOut("slow");
      },2000);
    })
  </script>


</body>
</html>