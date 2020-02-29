<?php
    $id = $this->uriq->id ;
    if ( null==$id ) { header("Location: index.php");} 
    else {
      $c_r = $this->rr("SELECT * FROM admins WHERE id=:AdminId" 
          , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
            ] , __FILE__ .' '.', ln '. __LINE__) ;
      while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; 
      self::disconnect();
    }
      ?>

    <div class="container">
     
      <div class="span10 offset1">
        <div class="row">
            <h3>Read a Customer</h3>
        </div>
         
        <div class="form-horizontal" >
        
          <div class="control-group">
            <label class="control-label">Name</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $r->username;?>
                </label>
            </div>
          </div>
        
        <div class="control-group">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $r->email;?>
                </label>
            </div>
          </div>

          <div class="form-actions">
              <a class="btn" href="index.php">Back</a>
           </div>
         
          
        </div>
    </div>
                 
    </div> <!-- /container -->
