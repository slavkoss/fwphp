<?php
/**
* step 3 - display user profile
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\read.php
* called from Home_ ctr cls method  r() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method rr() =pre-query which sets rows filter (default-where), sort... 
* which calls Db_ allsites method rr() =execute-query which creates cursor for read row by row loop here
*/
namespace B12phpfw ;

use Parsedown ; //in global namespace (version 1.7.4 stil has no namespace)

//require 'J:\\awww\\www\\vendor\\erusev\\parsedown\\Parsedown.php' ;
require '../../../../../vendor/erusev/parsedown/Parsedown.php' ;
$Parsedown = new Parsedown(); //OR NO use : \Parsedown() where "\" means global namespace
          //echo $Parsedown->text('Hello _Parsedown_!'); # prints: <p>Hello <em>Parsedown</em>!</p>
          ///////// You can also parse inline markdown only:
          //echo $Parsedown->line('Hello _Parsedown_!'); # prints: Hello <em>Parsedown</em>!

$id = (int)$this->uriq->id ;
if ( null==$id ) { header("Location: index.php"); exit(0) ; }

$Admin_crud = new Admin_crud ;
$cursor = $Admin_crud->rr($this, $id) ;
while ($row = $this->rrnext($cursor)): {$r = $row ;} endwhile;

?>

    <div class="container">

      <div class="span10 offset1">
        <div class="row">
            <h3>Admin <?=$r->aname?>, id <?=$id?> profile</h3>
        </div>

        <div class="form-horizontal" >

          <div class="control-group">
            <label class="control-label">User name</label>
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

        <div class="control-group">
            <label class="control-label">Biography</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $Parsedown->text($r->abio);?>
                </label>
            </div>
          </div>



          <div class="form-actions">
              <a class="btn" href="index.php">Back</a>
           </div>


        </div>
    </div>

    </div> <!-- /container -->
