<!-- === Modal === I N C L U D E D  in frm.php, upd_08photo_frm.php upd_02address.php -->
<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\upd_03bio.php
//namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//include 'DbCrud.php';
//include 'DbCrud_module.php';
//$db = new DbCrud_module; //G LOBAL $db;

$r = $db->get_byid($db, $_SESSION['user_id_loggedin']);
              //echo __FILE__ .' SAYS: <pre>$r='; if (isset($r)) print_r($r); else echo 'NOT SET'; echo '</pre><br />';
if(!isset($r->bio)){
   $bio_title = "Add Bio";
   $bio_value = 'No bio value';
} else {
   $bio_title = "Update Bio";
   $bio_value = $r->bio;
}
?>
<div class="modal fade" id="bio" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-header">
          <h5 class="modal-title"><?=$bio_title?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
          </button>
       </div><!-- modal-header -->

       <div class="modal-body">
         <div class="form-group">
            <div class="bio-error error"></div>
        </div>

        <form action="">
           <div class="form-group">
              <textarea class="form-control profile-input" id="bio" cols="30" rows="10" 
                        placeholder="Add Bio..."><?=$bio_value?></textarea>
           </div><!-- form-group -->
           <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-success" 
                     onclick="add_bio(this.form.bio.value);">Save Changes
             </button>
           </div><!-- modal-footer -->
        </form>

       </div><!-- modal-body -->

    </div><!-- modal-content -->

  </div><!-- modal-dialog -->

</div><!-- modal -->