<?php
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_GET['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
                            $sql = "SELECT * FROM admins where id = ?";
                            $q = $pdo->prepare($sql);
                            $q->execute(array($id));
                            $row = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                    <?php echo $row['username'];?>
                </label>
            </div>
          </div>
        
        <div class="control-group">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $row['email'];?>
                </label>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Mobile Number</label>
            <div class="controls">
                <label class="checkbox">
                    <?php //echo $row['user_telefon'];?>
                </label>
            </div>
          </div>

          <div class="form-actions">
              <a class="btn" href="index.php">Back</a>
           </div>
         
          
        </div>
    </div>
                 
    </div> <!-- /container -->
