<?php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
/**
* J:\awww\www\fwphp\glomodul\user\home.php
*
* https://getbootstrap.com/docs/4.0/components/buttons/
* 1. <button type="button" class="btn btn-primary">Primary</button> BLUE
* 2. btn-secondary GRAY  3. btn-success GREEN    4. btn-danger RED
* 5. btn-warning YELLOW  6. btn-info DARK GREEN  7. btn-light WHITE, GRAY TXT
* 8. btn-dark BLACK      9. btn-link WHITE, BLUE TXT
*
*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\core\zinc\Db_allsites ;
use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_admin;  //to Login_ Confirm_ SesUsrId
//use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;
//use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_comment ;

//$Tbl_crud = new Tbl_crud ; //$cursor     = $Tbl_crud->rr_all($this);

//<!--             U S E R  T B L  R E A D -->
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];


//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"])) {
  // returns string
  Tbl_crud_admin::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //E n d  Submit Button If-Condition


//Warning: Cannot modify header information :
require $pp1->wsroot_path . 'zinc/hdr.php';
    //require_once('navbar_admin.php');
    //require_once($pp1->module_path .'../blog/navbar_admin.php');
    //require_once($pp1->module_path_arr[1] .'../blog/navbar_admin.php');
               //require $pp1->module_path . '../user/admins.php';
//        2. G U I  to get user action
?>
    <!-- HEADER -->
    <!--header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-user" style="color:#27aae1;"></i> Manage Admins</h1>
          </div>
        </div>
      </div>
    </header-->
    <!-- HEADER END -->

     <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>


      <!-- 
                A D D  A D M I N  F O R M   $pp1->admins
      -->
      <form class="" action="<?=$pp1->c?>" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-header">
            <h1>Add Admin</h1>
          </div>

          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="username"> <span class="FieldInfo"> Username: </span></label>
               <input class="form-control" type="text" name="username" id="username"  value="">
            </div>
            <div class="form-group">
              <label for="Name"> <span class="FieldInfo"> Name: </span></label>
               <input class="form-control" type="text" name="Name" id="Name" value="">
               <small class="text-muted">*Optional</small>
            </div>
            <div class="form-group">
              <label for="password"> <span class="FieldInfo"> Password: </span></label>
               <input class="form-control" type="password" name="password" id="password" value="">
            </div>
            <div class="form-group">
              <label for="Confirmpassword"> <span class="FieldInfo"> Confirm password:</span></label>
               <input class="form-control" type="password" name="Confirmpassword" id="Confirmpassword"
                     value="">
            </div>

            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$pp1->dashboard?>" class="btn btn-warning btn-block">
                   <i class="fas fa-arrow-left"></i> Back To Dashboard</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Publish
                </button>
              </div>
            </div>

          </div>
        </div>
      </form>
      <!-- 
         e n d       A D D  A D M I N  F O R M 
      -->

      <!-- 
                A D M I N S  T A B L E
      -->
      <h2>Existing Admins</h2>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No.&nbsp;Del ID</th><th>Date&Time</th><th>Username</th><th>Admin Name</th>
            <th>Added by</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //$cursor = $this->rr("SELECT * FROM admins ORDER BY aname", [], __FILE__ .' '.', ln '. __LINE__) ;
        $SrNo = 0;
        while ($r = $this->rrnext($cursor))
        {
          $SrNo++;
          //$SrNo_escaped = self::escp($SrNo) ;//  $SrNo_escaped = self::escp($SrNo) ;
          $id = self::escp($r->id) ;
          //all row fld names lowercase
          switch ($this->getdbi()) { case 'oracle' : $r = $this->rlows($r) ; break; default: break; }
        ?>
            <tr>
              <td width=15%>
                 <!--str_pad( $SrNo, 5 - strlen($SrNo), '&nbsp;', STR_PAD_LEFT )
                     str_repeat('&nbsp;', 5 - strlen($SrNo)) . $SrNo    t/admins/id/
                 -->
                 <?=str_repeat('&nbsp;', 5 - strlen($SrNo)) . $SrNo?>
                 <a id="erase_row" class="btn btn-danger"
                    onclick="var yes ; yes = jsmsgyn('Erase row <?=$r->id?>?','') ;
                    if (yes == '1') { location.href= '<?=$pp1->del_usr.$r->id?>/'; }"
                    title="Delete tbl row ID"
                 ><?=str_repeat('&nbsp;', 8 - strlen($id)) . $id ?></a>
              </td>

              <td><?=self::escp($r->datetime)?></td>

              <td>
                <!-- https://getbootstrap.com/docs/4.0/components/buttons/ -->
                <a class="btn btn-link" href="<?=$pp1->u . $id?>"
                   title="Edit tbl row"
                ><?=self::escp($r->username)?></a>
              </td>

              <td><?=self::escp($r->aname)?></td>
              <td><?=self::escp($r->addedby)?></td>

              <td width=15%>

                <a class="btn btn-success" href="<?=$pp1->r . $id?>"
                   title="Read - show user profile"
                >R</a>

                <a class="btn btn-warning" href="<?=$pp1->loginfrm . $id?>"
                   title="Login"
                >Login</a>
                <!--a class="btn btn-secondary" href="<?=$pp1->logout . $id?>"
                   title="Logout"
                >Lout</a-->
              </td>


          <?php
        } 
        self::disconnect();
        ?>
        </tbody>
      </table>
      <!-- 
         e n d       A D M I N S  T A B L E
      -->

    </div><!-- e n d  div class="offset-lg-1 col-lg-10" style="min-height:400px;"-->
  </div><!-- e n d  div class="row"-->

</section><!-- e n d  section class="container py-2 mb-4"-->



<!-- End Main Area 


<?php require $pp1->wsroot_path . 'zinc/ftr.php'; ?>
