<!-- === Modal === I N C L U D E D  in frm.php, upd_08photo_frm.php upd_02address.php -->
<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\upd_01name.php
$r = $db->get_byid($db, $_SESSION['user_id_loggedin']);
              //echo __FILE__ .' SAYS: <pre>$r='; if (isset($r)) print_r($r); else echo 'NOT SET'; echo '</pre><br />';
$name = $r->user_name;
?>
<div class="modal fade" id="update_name" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Update Name</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div><!-- modal-header --> 
         <div class="modal-body">
             <form action="">
                 <div class="form-group">
                   <input type="text" class="form-control profile-input" id="update_name" placeholder="Add Name..." value="<?php if(isset($name)): echo $name; endif; ?>">
                   <div class="name-error error"></div>
                 </div><!-- form-group -->
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-success" onclick="change_name(this.form.update_name.value);">Save Changes</button>
                 </div><!-- modal-footer -->
             </form>
         </div><!-- modal-body -->
      </div><!-- modal-content -->
      
  </div><!-- modal-dialog -->
  
</div><!-- modal -->