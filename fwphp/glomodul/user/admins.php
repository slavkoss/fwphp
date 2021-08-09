<?php
declare(strict_types=1);
// J:\awww\www\fwphp\glomodul4\user\admins.php
//namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\zinc\Db_allsites ;
use B12phpfw\dbadapter\user\Tbl_crud   as Tbl_crud_admin ;
use B12phpfw\dbadapter\post\Tbl_crud   as Tbl_crud_post ;
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
//namespace B12phpfw\dbadapter\user ;
//use B12phpfw\dbadapter\user\Tbl_crud ;

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

$shares_path = $pp1->shares_path ; //includes, globals, commons, reusables

$cursor_admins = Tbl_crud_admin::rr($sellst='*', $qrywhere= "'1'='1' ORDER BY aname"
  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;


if (isset ($_SESSION["submitted_cc"])) {
  list( $DateTime, $username, $Name, $password, $Admin
      , $Confirmpassword
  ) = $_SESSION["submitted_cc"] ;
  unset ($_SESSION["submitted_cc"]) ;
} else {
  $tmp = ['','','','','',''] ; //self::get_ submitted_cc() ;
  list( $DateTime, $username, $Name, $password, $Admin
        , $Confirmpassword
  ) = $tmp ;
  //in Tbl_ crud : $_SESSION["submitted_cc"] = ... ;
}


//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"])){

  // returns string
  Tbl_crud_admin::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //Ending of Submit Button If-Condition

//Warning: Cannot modify header information :
require $pp1->shares_path . 'hdr.php';
require_once("navbar_admin.php");

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
                A D M I N  F O R M   $pp1->admins
      -->
      <form class="" action="<?=$pp1->admins?>" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-header">
            <h2>Add Admin for user level rights (authorization)</h2>
          </div>

          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="username"> <span class="FieldInfo"> Username: </span></label>
               <input class="form-control" type="text" 
                      name="username" id="usernameID"  value="<?=$username?>">
            </div>

            <div class="form-group">
              <label for="Name"> <span class="FieldInfo"> Name: </span></label>
               <input class="form-control" type="text" 
                      name="Name" id="NameID" value="<?=$Name?>">
               <small class="text-muted">*Optional</small>
            </div>

            <div class="form-group">
              <label for="password"> <span class="FieldInfo"> Password: </span></label>
               <input class="form-control" type="password" 
                      name="password" id="passwordID" value="<?=$password?>">
            </div>
            <div class="form-group">
              <label for="Confirmpassword"> <span class="FieldInfo"> Confirm password:</span></label>
               <input class="form-control" type="password" value="<?=$Confirmpassword?>"
                      name="Confirmpassword" id="ConfirmpasswordID"
                     value="">
            </div>

            <!-- **********Two big b u t t o n s  after  f o r m************ 
                 Back To Dashboard is $pp1-> dashboard
            -->
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$pp1->home_usr?>" class="btn btn-warning btn-block">
                   <i class="fas fa-arrow-left"></i> Back To User home</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Publish
                </button>
              </div>
            </div>
          </div>
        </div>
      </form><!--  e n d       A D D  A D M I N  F O R M -->



      <h2>Existing Admins</h2>
    </div><!-- E N D  d i v  o f  f o r m-->

      <!-- 
                A D M I N S  T A B L E
      -->
    <div class="bg-light offset-lg-1 col-lg-10" style="min-height:400px;">

      <br /><table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No.&nbsp;Del ID</th><th>Date&Time</th><th>Username</th><th>Admin Name</th>
            <th>Added by</th><th>Action</th>
            <!--th>No. </th><th>Date&Time</th><th>username</th><th>Admin Name</th>
            <th>Added by</th><th>Action</th-->
          </tr>
        </thead>
        <tbody>
      <?php
      $SrNo = 0;
      while ( $rx = Db_allsites::rrnext( $cursor_admins
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
      {
        $id = $rx->id ;
        $SrNo++;
        ?>
            <!-- after /r/ (r means redirect) is nickname of inc/call, see $p p1 = [ ... -->
            <tr>
              <!-- ********** 1. No.&nbsp; dd = Del ID ************ -->
              <td width=16%>
                 <!--str_pad( $SrNo, 5 - strlen($SrNo), '&nbsp;', STR_PAD_LEFT )
                     str_repeat('&nbsp;', 5 - strlen($SrNo)) . $SrNo
                 -->
                 <?=str_repeat('&nbsp;', 5 - strlen((string)$SrNo)) . $SrNo?>
                 <a id="erase_row" class="btn btn-danger"
                    onclick="var yes ; yes = jsmsgyn('admins.php: Erase row <?=$id?>?','') ;
                    if (yes == '1') { location.href= '<?=$pp1->ldd_admins.$id?>/'; }"
                    title="Delete tbl row ID=$id"
                 ><?=str_repeat('&nbsp;', 8 - strlen($id)) . $id ?></a>
              </td>


              <!-- ********** 2. Date&Time ************ -->
              <td><?=self::escp($rx->datetime)?></td>


              <!-- ********** 3. Username ************ -->
                <td>
                <!-- https://getbootstrap.com/docs/4.0/components/buttons/ -->
                <a class="btn btn-link" href="<?=$pp1->upd_user_loggedin . $id?>"
                   title="Edit tbl row"
                ><?=self::escp($rx->username)?></a>
              </td>

              <!-- ********** 4. Admin Name ************ -->
              <td><?=self::escp($rx->aname)?></td>
              <!-- ********** 5. Added by ************ -->
              <td><?=self::escp($rx->addedby)?></td>

              <!-- ********** 6. Action ************ -->
              <td width=16%>
                <a class="btn btn-success" href="<?=$pp1->read_user . $id?>"
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
      } endwhile; ?>
        </tbody>
      </table>


    </div><!-- E N D  d i v  o f  t b l-->

  </div><!-- E N D  class="row"-->

</section>



<!-- End Main Area 
                      /*$sql = "INSERT INTO admins(datetime,username,password,aname,addedby)";
                      $sql .= "VALUES(:dateTime,:username,:password,:aName,:adminname)";
                      $this->pr epareSQL($sql); 
                      $this->b indvalue(':username', $username, \PDO::PARAM_STR);
                      $this->b indvalue(':password', $password, \PDO::PARAM_STR);
                      $this->b indvalue(':aName', $Name, \PDO::PARAM_STR);
                      $this->b indvalue(':adminname', $Admin, \PDO::PARAM_STR);
                      $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                      $this->b indvalue(':dateTime', $DateTime, \PDO::PARAM_STR);
                      $cursor = $this->e xecute(); */
-->


<?php require $pp1->shares_path . 'ftr.php'; ?>

