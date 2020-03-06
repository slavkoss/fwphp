<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\update.php
* http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/03xuding_glob/index.php?i/u/id/79
*
* called from Home_ ctr cls method  u() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method uu()     =pre-update
* which calls Db_ allsites method uu() =on-update
*/
namespace B12phpfw ;
                if ('') { 
                  echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>URL query array $this->uriq='; print_r($this->uriq); echo '</pre>';
                        // $this->uriq=stdClass Object( [i] => u  [d] => 79 )
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //exit();
                }
$id = (int)$this->uriq->id ;
if ( null==$id ) { header("Location: index.php"); }

if ( !empty($_POST) ) 
{
        // keep track validation errors
        $anameError = null;
        $emailError = null;

        // keep track post values
        $username  = $_POST['username']; //hidden !!
        $aname     = $_POST['aname'];
        $email     = $_POST['email'];
        $abio      = $_POST['abio'];

        // validate input
        $valid = true;
        if (empty($aname)) {
            $anameError = 'Please enter Name';
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
          $fldvals = [$aname, $email, $id, $abio] ;
          $Admin_crud = new Admin_crud ;
          $Admin_crud->uu($this, $fldvals);
          //echo "<h3>Updated id=$id </h3>" ;
        }
} else {
          //show row to update
          $Admin_crud = new Admin_crud ;
          $cursor = $Admin_crud->rr($this, $id) ;
          while ($row = $this->rrnext($cursor)): {$r = $row ;} endwhile;
          $username = $r->username ;
          $aname    = $r->aname ;
          $email    = $r->email ;
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
                action="<?=$this->pp1->u . $id?>">

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

            <div class="control-group <?php //echo !empty($abioError)?'error':'';?>">
              <label class="control-label">Biography</label>
              <div class="controls">
                  <input name="abio" type="text" placeholder="Biography" 
                         value="<?php echo !empty($abio)?$abio:'';?>">
                  <?php //if (!empty($emailError)): ?>
                      <span class="help-inline"><?php //echo $emailError;?></span>
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
