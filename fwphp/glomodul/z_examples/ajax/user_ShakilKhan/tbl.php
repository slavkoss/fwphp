<?php
//I N C L U D E D  i n  i n d e x.p h p
//    J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\tbl.php
//see J:\awww\www\fwphp\glomodul4\usr_posttyp_post\usr_tbl.php
//    http://dev1:8083/fwphp/glomodul4/usr_posttyp_post/usr_tbl.php
/************** Fetching all data from database ******************/
$rows = $db->getall($db);
if(count($rows) != 0){ }else{
  echo json_encode(['error' => 'no_users', 'msg' => 'Please register some users!']);
}
?>
<div class="container">
  <?php //showmsg(); ?>
  <div class="xxxjumbotron">

    <!-- breadcrumbs -->
    <!--small class="pull-right"><a
        href="<="{url_module}"?>usr_DbCrud1.php"> Add Customer </a> </small-->
    <?php if (isset($_SESSION['user_data'])) echo $_SESSION['user_data']['fullname']; 
      else echo 'YOU ARE NOT LOGGED IN';
    ?> <!-- | Admin -->

    <h2 class="text-center">Customers (Naši korisnici i njihove poruke)</h2>

    <table class="table table-bordered table-hover text-center">
    <thead >
      <tr>
        <th class="text-center">User Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Posts</th>
        <th class="text-center">Spending</th>
        <!-- D elete is also in u p d script-->
        <th class="text-center">Delete</th>
        <th class="text-center">User ID</th>
        <th class="text-center">Password</th>
      </tr>
    </thead>
    <tbody>
      <?php  foreach($rows as $r) : ?>
        <tr>
        <td><a href="<?="{url_module}"?>usr_DbcRUD.php?cus_id=<?php echo $r->user_id ?>"
               title="Edit or Delete"
               class='btn btn-success'><?=$r->user_name?></a></td>
        <td><?php echo $r->user_email ?></td>

        <td><a href="{url_post_tbl}?cus_id=<?php echo $r->user_id ?>"
               class='btn btn-primary'>Posts</a></td>

        <td><?php echo $r->spending ?></td>

        <!--td>
        <a href="<="{$url_module}"?>usr_DbcRUD.php?cus_id=<php echo $r->user_id ?>"
               class='btn btn-danger'>D elete</a>
        </td-->
        <!-- //     B U T T O N  D E L E T E -->
        <td><input type='button' class='btn btn-danger delete_btn' value='X'
             title="usr_id=<?=$r->user_id?>"
             usr_id='<?=$r->user_id?>'
        ></td>

        <td><?php echo $r->user_id ?></td>
        <td><?php echo $r->user_pass ?></td>
        </tr>
        <?php endforeach ; ?>
    </tbody>
    </table>

  </div><!-- class="jumbotron"-->
</div><!-- class="container"-->

              <div id="feedback">
              <?php
              if (file_exists('del_ajax.php')) {
                 //echo 'Server script del_ ajax.php exsists';
              } else {echo 'Server script del_ ajax.php NOT exsists';}
              ?>
              </div>

<?php //include('footer.php'); ?>
<script type="text/javascript" src="/zinc/themes/bootstrap/js/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
        //   <!-- ***********************************************************
        //     D E L E T E  B U T T O N
        //    ************************************************************ -->
       $(".delete_btn").on('click', function(){
                           //alert('dellllll');
          //var v_id = v_row['id'] = $(this).attr('usr_id') ;
          var v_id = $(this).attr('usr_id') ;
          if(confirm('Erase user id=' + v_id + '?')) 
          {
              //del_ ajax.php server script returned data to this JS
              $.post( "del_ajax.php", {id: v_id, delete_msg: 'erase_redak'}
                , function(data){ 
                    $("#feedback").html( data ) ; 
                  }
              );
                       //'&nbsp; &nbsp; 
                       //+'<i>id '+ v_id +' erased</i>' 
                      // +'<i>, F5 to refresh page</i>' 
                  //, function(data){$("#action-container").hide();}
          }
       });

    }); //e n d  d o c  r e a d y

</script>
