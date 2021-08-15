<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\xuding_glob\update.php
* http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/xuding_glob/index.php?i/u/id/79
*
* called from Home_ ctr cls method  u() when usr clicks link/button or any URL is entered in ibrowser  
* calls Tbl_crud cls method uu()     =pre-update
* which calls Db_ allsites method uu() =on-update
*/
//namespace B12phpfw ;
use B12phpfw\dbadapter\xuding_glob\Tbl_crud ;
                if ('') { 
                  echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>URL query array $pp1->uriq='; print_r($pp1->uriq); echo '</pre>';
                        // $pp1->uriq=stdClass Object( [i] => u  [d] => 79 )
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //exit();
                }
$id = (int)$pp1->uriq->id ;
if ( null==$id ) { header("Location: index.php"); }

if ( !empty($_POST) ) 
{
        // keep track validation errors
        $anameError = null;
        $userError = null;

        // keep track post values
        $username  = $_POST['username']; //hidden !!
        $aname     = $_POST['aname'];
        $user     = $_POST['user'];
        $abio      = $_POST['abio'];

        // validate input
        $valid = true;
        if (empty($aname)) {
            $anameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($user)) {
            $userError = 'Please enter user last, first name';
            $valid = false;
        } /*else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        } */

        if ($valid) {
          $fldvals = [$aname, $user, $id, $abio] ;
          $Tbl_crud = new Tbl_crud ;
          $Tbl_crud->uu($this, $fldvals);
          //echo "<h3>Updated id=$id </h3>" ;
        }
} else {
          //show row to update
          $Tbl_crud = new Tbl_crud ;
          $cursor = $Tbl_crud->rr($this, $id) ;
          while ($row = $this->rrnext($cursor)): {$r = $row ;} endwhile;
          $username = $r->username ;
          $aname    = $r->aname ;
          $user     = $r->aname ;
          $abio     = $r->abio ;
}
    ?>

    <div class="container">

      <div class="span10 offset1">
          <div class="row">
            <h3><?php if (isset($_POST['username'])): echo 'UPDATED'; else: echo 'Update';  endif; ?>  
                  Admin user
            </h3>
          </div>

          <form class="form-horizontal"  method="post"
                action="<?=$pp1->u . $id?>">

            <div class="control-group <?php echo !empty($anameError)?'error':'';?>">
              <label class="control-label">
                 Admin username=<?=$username?>, id=<?=$id?> name</label>
              <div class="controls">
                  <input name="aname" type="text"  placeholder="Admin user name" 
                         value="<?php echo !empty($aname)?$aname:'';?>">
                  <?php if (!empty($anameError)): ?>
                      <span class="help-inline"><?php echo $anameError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($userError)?'error':'';?>">
              <label class="control-label">User</label>
              <div class="controls">
                  <input name="user" type="text" placeholder="User last, first name" 
                         value="<?php echo !empty($user)?$user:'';?>">
                  <?php if (!empty($userError)): ?>
                      <span class="help-inline"><?php echo $userError;?></span>
                  <?php endif;?>
              </div>
            </div>

            <div class="control-group <?php //echo !empty($abioError)?'error':'';?>">
              <label class="control-label">Biography</label>
              <div class="controls">
                  <input name="abio" type="text" placeholder="Biography" 
                         value="<?php echo !empty($abio)?$abio:'';?>">
                  <?php //if (!empty($...)): ?>
                      <span class="help-inline"><?php //echo $...Error;?></span>
                  <?php //endif;?>
              </div>
            </div>

            <!-- name="category[id]"   $id ?? '' ...z_examples\01_php_bootstrap\jokeyank\templates\editcategory.html.php
                   NO NEED FOR THIS :
            -->
            <!--input type="hidden" name="id" value="<?=$id?>"-->
            <input type="hidden" name="username" value="<?=$username?>">

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <!--  -->
                <a class="btn" href="index.php">Back</a>
              </div>
          </form>
      </div>

    </div> <!-- /container -->
