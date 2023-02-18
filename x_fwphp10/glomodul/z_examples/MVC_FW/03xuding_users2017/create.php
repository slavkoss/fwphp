<?php
//defined('ROOTDIR') or define('ROOTDIR',$_SERVER['DOCUMENT_ROOT']);
//require_once(ROOTDIR.'/inc/confglo.php');
require_once(__DIR__.'/confglo.php');
require_once __DIR__.'/database.php';

if ( !empty($_POST)) {
  // keep track validation errors
  $nameError = null;
  $emailError = null;
  $mobileError = null;
   
  // keep track post values
  $name = $_POST['user_name'];
  $email = $_POST['user_email'];
  $mobile = $_POST['user_telefon'];
   
  // validate input
  $valid = true;
  if (empty($name)) {
      $nameError = 'Please enter Name';
      $valid = false;
  }
   
  if (empty($email)) {
      $emailError = 'Please enter Email Address';
      $valid = false;
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $emailError = 'Please enter a valid Email Address';
      $valid = false;
  }
   
  if (empty($mobile)) {
      $mobileError = 'Please enter Mobile Number';
      $valid = false;
  }
   
  // insert data
  if ($valid) {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO users (user_name,user_email,user_telefon) 
              values(?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($name,$email,$mobile));
      Database::disconnect();
      header("Location: index.php");
  }
}
?>



<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    
    <!--link   href="css/bootstrap.min.css" rel="stylesheet"-->
      <link href="<?= CSSURL.'/bootstrap.min.css' ?>" 
            rel="stylesheet" type="text/css">
    <!--script src="js/bootstrap.min.js"></script-->
    <script src="<?= CSSURL.'/bootstrap.min.js' ?>"></script>
    
</head>
 
<body>
    <div class="container">
     
      <div class="span10 offset1">
          <div class="row">
              <h3>Create a Customer</h3>
          </div>
   
          <form class="form-horizontal" action="create.php" method="post">
          
            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
              <label class="control-label">Name</label>
              <div class="controls">
                  <input name="user_name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                  <?php if (!empty($nameError)): ?>
                      <span class="help-inline"><?php echo $nameError;?></span>
                  <?php endif; ?>
              </div>
            </div>
          
          <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
              <label class="control-label">Email Address</label>
              <div class="controls">
                  <input name="user_email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                  <?php if (!empty($emailError)): ?>
                      <span class="help-inline"><?php echo $emailError;?></span>
                  <?php endif;?>
              </div>
            </div>
            
            <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
              <label class="control-label">Mobile Number</label>
              <div class="controls">
                  <input name="user_telefon" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                  <?php if (!empty($mobileError)): ?>
                      <span class="help-inline"><?php echo $mobileError;?></span>
                  <?php endif;?>
              </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index.php">Back</a>
              </div>
          </form>
      </div>
                 
    </div> <!-- /container -->
  </body>
</html>
