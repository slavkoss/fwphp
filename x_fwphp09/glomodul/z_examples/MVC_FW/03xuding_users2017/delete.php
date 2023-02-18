<?php
//defined('ROOTDIR') or define('ROOTDIR',$_SERVER['DOCUMENT_ROOT']);
//require_once(ROOTDIR.'/inc/confglo.php');
require_once(__DIR__.'/confglo.php');
require_once __DIR__.'/database.php';

    $id = 0;
    //ask are you shure ?
    if ( !empty($_GET['id'])) { $id = $_GET['id']; }
    //yes is shure
    if ( !empty($_POST)) {
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM users WHERE user_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
         
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
            <h3>Delete a Customer</h3>
        </div>
         
        <form class="form-horizontal" action="delete.php" method="post">
         
         <input type="hidden" name="id" value="<?php echo $id;?>"/>
          <p class="alert alert-error">Are you sure to delete ?</p>
          
          <div class="form-actions">
              <button type="submit" class="btn btn-danger">Yes</button>
              <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>
                 
    </div> <!-- /container -->
  </body>
</html>