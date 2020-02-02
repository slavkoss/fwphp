<!--
J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\upd_04facebook.php
     === Modal === I N C L U D E D
// http://www.facebook.com/slavkoss22
// https://www.facebook.com/search/top/?q=Slavko%20Srakocic
// https://www.facebook.com/search/top/?q=Slavko%20Srako%C4%8Di%C4%87 
// https://www.facebook.com/search/top/?q=Helena%20Srakocic 
// http://www.facebook.com/shakilkhan621
-->
<?php
//i nclude('func_ crud.php');
$r = $db->get_byid($db, $_SESSION['user_id_loggedin']); //$r = get_ byid($_ SESSION['user_ id']);
              //echo __FILE__ .' SAYS: <pre>$r='; if (isset($r)) print_r($r); else echo 'NOT SET'; echo '</pre><br />';
if(!isset($r->facebook)){ //if(empty($r->facebook)){
  $facebook_title = "Add Facebook Account";
  $facebook_db = 'Enter your facebook account URL';
} else {
  $facebook_title = "Update Facebook";
  $facebook_db = $r->facebook;
}
?>
<div class="modal fade" id="facebook" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

       <div class="modal-header">
           <h5 class="modal-title"><?php echo $facebook_title; ?></h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div><!-- modal-header -->

       <div class="modal-body">

           <form action="">
               <div class="form-group">
                 <input type="text" class="form-control profile-input" id="add_facebook" placeholder="Add Facebook Account..." value="<?=$facebook_db?>">
                 <div class="facebook-error error"></div>
               </div><!-- form-group -->
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-success"
                           onclick="add_facebook_account(this.form.add_facebook.value);">Save Changes
                   </button>
               </div><!-- modal-footer -->
           </form>

       </div><!-- modal-body -->

    </div><!-- modal-content -->

  </div><!-- modal-dialog -->

</div><!-- modal -->