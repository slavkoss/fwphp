<?php
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        // keep track post values
        $name = $_POST['username'];
        $email = $_POST['email'];
        $mobile = ''; //$_POST['user_telefon'];
         
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
         
        /* if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        } */
         
        // update data   , user_telefon =?
        if ($valid) {
            $sql = "UPDATE admins set username = ?, email = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$id)); //,$mobile
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $sql = "SELECT * FROM admins where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['username'];
        $email = $data['email'];
        $mobile = ''; //$data['user_telefon'];
        Database::disconnect();
    }
?>

    <div class="container">
     
      <div class="span10 offset1">
          <div class="row">
              <h3>Update a Customer</h3>
          </div>
   
          <form class="form-horizontal"  method="post"
                action="index.php?u&id=<?php echo $id?>">
            
            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
              <label class="control-label">Name</label>
              <div class="controls">
                  <input name="username" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                  <?php if (!empty($nameError)): ?>
                      <span class="help-inline"><?php echo $nameError;?></span>
                  <?php endif; ?>
              </div>
            </div>
            
            <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
              <label class="control-label">Email Address</label>
              <div class="controls">
                  <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
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
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="index.php">Back</a>
              </div>
          </form>
      </div>
                 
    </div> <!-- /container -->
