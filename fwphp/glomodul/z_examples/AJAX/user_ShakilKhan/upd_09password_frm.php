<!-- === Modal === 
J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\upd_09password_frm.php
-->
<div class="modal fade" id="update_password" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">Update Password</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div><!-- modal-header --> 
           <div class="modal-body">
               <form action="">
                   <div class="form-group">
                     <input type="password" class="form-control profile-input" id="current" placeholder="Current Password...">
                     <div class="current-error error"></div>
                   </div><!-- form-group -->
                    <input type="password" class="form-control profile-input" id="new_password" placeholder="New Password...">
                    <div class="new-error error"></div>
                   </div><!-- form-group -->
                   <div class="modal-footer">
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-success" onclick="change_password(this.form.current.value, this.form.new_password.value);">Save Changes</button>
                   </div><!-- modal-footer -->
               </form>
           </div><!-- modal-body -->
        </div><!-- modal-content -->
        
    </div><!-- modal-dialog -->
    
</div><!-- modal -->