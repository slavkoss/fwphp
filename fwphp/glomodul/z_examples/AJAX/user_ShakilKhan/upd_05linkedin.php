<?php
/**
* J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\upd_05linkedin.php
*  === Modal === I N C L U D E D
*/
$r = $db->get_byid($db, $_SESSION['user_id_loggedin']); //$r = get_ byid($_ SESSION['user_ id']);
              //echo __FILE__ .' SAYS: <pre>$r='; if (isset($r)) print_r($r); else echo 'NOT SET'; echo '</pre><br />';
if(!isset($r->linkedin)){  //if(empty($r->linkedin)){
  $linkedin_title = "Add Linkedin Account";
  $linkedin_db = 'No linkedin_db';
} else {
  $linkedin_title = "Update Linkedin";
  $linkedin_db = $r->linkedin;
}
?>
<div class="modal fade" id="linkedin" tabindex="-1" role="dialog">

  <div class="modal-dialog" role="document">

    <div class="modal-content">
       <div class="modal-header">
           <h5 class="modal-title"><?=$linkedin_title?></h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div><!-- modal-header -->
       <div class="modal-body">

         <form action="">
           <div class="form-group">
             <input type="text" class="form-control profile-input" id="add_linkedin" 
                    placeholder="Add Linkedin Account..." value="<?=$linkedin_db?>">
             <div class="linkedin-error error"></div>
           </div><!-- form-group -->
           <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-success" 
                       onclick="add_linkedin_url(this.form.add_linkedin.value);">Save
               </button>
           </div><!-- modal-footer -->
         </form>

       </div><!-- modal-body -->

    </div><!-- modal-content -->

  </div><!-- modal-dialog -->

</div><!-- modal -->