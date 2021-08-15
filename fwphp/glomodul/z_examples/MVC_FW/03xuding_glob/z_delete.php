<?php
// **************** jsmsgyn is instead this script **********
                   if ('') {echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' Before ask delete ? SAYS'.'</h3>' ;
                     echo '<pre>$pp1->uriq='; print_r($pp1->uriq); echo '</pre><br />';
                   } ;
    $id = 0;
    // ask delete below in this script ? - FIRST EXEC OF THIS SCRIPT
    // ---------------------------------
    if ( isset($pp1->uriq->d) ) { $id = $pp1->uriq->d; } //if (!empty($_GET['id'])) {$id=$_GET['id'];}

    // clicked yes is shure to delete - SECOND EXEC OF THIS SCRIPT - CODE BEHIND AND REDIRECT
    // ---------------------------------
    if ( !empty($_POST)) 
    {
      $id = $pp1->uriq->id = $_POST['id'];
      $pp1->uriq->t = 'admins' ;
                   if ('') {echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' Before delete SAYS'.'</h3>' ;
                     echo '<pre>$_POST[\'id\']='; print_r($_POST['id']); echo '</pre><br />'; };
      // delete data
      $this->dd() ;
                          /* $sql = "DELETE FROM admins WHERE id = ?";
                          $q = $pdo->prepare($sql);
                          $q->execute(array($id)); */
      self::disconnect(); //Database::disconnect();
      header("Location: index.php");
    }
?>
<!-- 
   ONLY FIRST EXEC OF THIS SCRIPT (SECOND IS CODE BEHIND AND REDIRECT) :
   ---------------------------------------------------------------------
-->
<div class="container">
  <div class="span10 offset1">
    <div class="row">
            <h3>Delete a Customer</h3>
    </div>

    <form class="form-horizontal" action="index.php?d" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>"/>
      <p class="alert alert-error">Are you sure to delete id <?php echo $id;?> ?</p>

      <div class="form-actions">

        <button type="submit" class="btn btn-danger">Yes</button>

        <a class="btn" href="index.php">No</a>

      </div>

    </form>

  </div>
</div> <!-- /container -->
