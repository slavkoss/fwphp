<?php
//defined('ROOTDIR') or define('ROOTDIR',$_SERVER['DOCUMENT_ROOT']);
//require_once(ROOTDIR.'/inc/confglo.php');
require_once(__DIR__.'/confglo.php');
require_once __DIR__.'/database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_GET['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users where user_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $row = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
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
            <h3>Read a Customer</h3>
        </div>
         
        <div class="form-horizontal" >
        
          <div class="control-group">
            <label class="control-label">Name</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $row['user_name'];?>
                </label>
            </div>
          </div>
        
        <div class="control-group">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $row['user_email'];?>
                </label>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Mobile Number</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $row['user_telefon'];?>
                </label>
            </div>
          </div>

          <div class="form-actions">
              <a class="btn" href="index.php">Back</a>
           </div>
         
          
        </div>
    </div>
                 
    </div> <!-- /container -->
  </body>
</html>