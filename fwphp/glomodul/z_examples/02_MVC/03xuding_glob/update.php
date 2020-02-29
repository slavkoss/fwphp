<?php
$id = $this->uriq->id ;
if ( null==$id ) { header("Location: index.php"); }

if ( !empty($_POST) ) 
{
        // keep track validation errors
        $nameError = null;
        $emailError = null;

        // keep track post values
        $name = $_POST['username'];
        $email = $_POST['email'];

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

        if ($valid) {
          $flds     = "SET aname=:AName, email=:Aemail" ;
          $qrywhere = "WHERE id=:AdminId" ;
          $binds = [
            ['placeh'=>':AName',  'valph'=>$name, 'tip'=>'str']
           ,['placeh'=>':Aemail', 'valph'=>$email, 'tip'=>'str']
           ,['placeh'=>':AdminId','valph'=>$id, 'tip'=>'int']
          ] ;
          $cursor = $this->uu($this,'admins',$flds,$qrywhere,$binds);
          self::disconnect();
          header("Location: index.php");
        }
} else {
          //show row to update
          $c_r = $this->rr("SELECT * FROM admins WHERE id=:AdminId" 
              , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
                ] , __FILE__ .' '.', ln '. __LINE__) ;
          while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; 
          self::disconnect();
          $name    = $r->aname ;
          $email   = $r->email ;
}
    ?>

    <div class="container">

      <div class="span10 offset1">
          <div class="row">
              <h3>Update a Customer</h3>
          </div>

          <form class="form-horizontal"  method="post"
                action="<?=$this->pp1->u?>id/<?=$id?>">

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


            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="index.php">Back</a>
              </div>
          </form>
      </div>

    </div> <!-- /container -->
