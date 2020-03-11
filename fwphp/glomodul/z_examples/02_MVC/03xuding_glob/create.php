<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\create.php
* called from Home_ ctr cls method  c() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method c c()     =pre-insert tbl row
* which calls Db_ allsites method c c() =on-insert tbl-row
*/
namespace B12phpfw ;
//Admin_ crud is ORM class : DM of row in memory to/from DB tbl row
//where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row


if ( !empty($_POST))
{
  // keep track validation errors
  $nameError   = null;
  $emailError  = null;
  $mobileError = null;

  // keep track post values
  $username   = $_POST['username'];
  $email  = $_POST['email'];
  $mobile = '' ; //$_POST['user_telefon'];

  // 1. validate input
  $valid = true;
  if (empty($username)) {
      $usernameError = 'Please enter Name';
      $valid = false;
  }

  if (empty($email)) {
      $emailError = 'Please enter Email Address';
      $valid = false;
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $emailError = 'Please enter a valid Email Address';
      $valid = false;
  }

  // 2. insert data
  if ($valid) {
    $fldvals = [$username, $email] ;
    $Admin_crud = new Admin_crud ;
    $id = $Admin_crud->cc($this, $fldvals);
    echo "<h3>Created id=$id </h3>" ;
    //header("Location: index.php");
  }
}
?>


    <div class="container">

      <div class="span10 offset1">
          <div class="row">
              <h4>Create a Customer</h4>
          </div>

          <form class="form-horizontal" action="<?=$this->pp1->c?>" method="post">

            <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
              <label class="control-label">Name</label>
              <div class="controls">
                  <input name="username" type="text"  placeholder="Name"
                         value="<?php echo !empty($username)?$username:'';?>">
                  <?php if (!empty($usernameError)): ?>
                      <span class="help-inline"><?php echo $usernameError;?></span>
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


            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>

                <a class="btn" href="index.php">Back</a>
              </div>
          </form>
      </div>

    </div> <!-- /container -->

