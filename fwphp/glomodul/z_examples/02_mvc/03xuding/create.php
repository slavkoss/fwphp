<?php
if ( !empty($_POST)) 
{
  // keep track validation errors
  $nameError   = null;
  $emailError  = null;
  $mobileError = null;
   
  // keep track post values
  $name   = $_POST['username'];
  $email  = $_POST['email'];
  $mobile = '' ; //$_POST['user_telefon'];
   
  // 1. validate input
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
   
  /*if (empty($mobile)) {
      $mobileError = 'Please enter Mobile Number';
      $valid = false;
  } */


  // 2. insert data
  if ($valid) {
      //user_telefon
      $sql = "INSERT INTO admins (username,email) values(?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($name,$email)); //,$mobile
      Database::disconnect();
      header("Location: index.php");
  }
}
?>


    <div class="container">
     
      <div class="span10 offset1">
          <div class="row">
              <h3>Create a Customer</h3>
          </div>
   
          <form class="form-horizontal" action="index.php?c" method="post">
          
            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
              <label class="control-label">Name</label>
              <div class="controls">
                  <input name="username" type="text"  placeholder="Name" 
                         value="<?php echo !empty($name)?$name:'';?>">
                  <?php if (!empty($nameError)): ?>
                      <span class="help-inline"><?php echo $nameError;?></span>
                  <?php endif; ?>
              </div>
            </div>
          
          <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
              <label class="control-label">Email Address</label>
              <div class="controls">
                  <input name="email" type="text" placeholder="Email Address" 
                         value="<?php echo !empty($email)?$email:'';?>">
                  <?php if (!empty($emailError)): ?>
                      <span class="help-inline"><?php echo $emailError;?></span>
                  <?php endif;?>
              </div>
            </div>
            
            <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
              <label class="control-label">Mobile Number</label>
              <div class="controls">
                  <input name="user_telefon" type="text"  placeholder="Mobile Number" 
                  value="<?php echo !empty($mobile)?$mobile:'';?>">
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

