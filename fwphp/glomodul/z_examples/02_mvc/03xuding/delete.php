<?php
    $id = 0;
    //ask are you shure ?
    if ( !empty($_GET['id']) ) { $id = $_GET['id']; }
    //yes is shure
    if ( !empty($_POST)) {
      $id = $_POST['id'];
       // delete data
      $sql = "DELETE FROM admins WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id));
      Database::disconnect();
      header("Location: index.php");
    }
?>
 
<div class="container">
  <div class="span10 offset1">
    <div class="row">
            <h3>Delete a Customer</h3>
    </div>

    <form class="form-horizontal" action="index.php?d" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>"/>
      <p class="alert alert-error">Are you sure to delete ?</p>
      <div class="form-actions">
        <button type="submit" class="btn btn-danger">Yes</button>
        <a class="btn" href="index.php">No</a>
      </div>
    </form>

  </div>
</div> <!-- /container -->
