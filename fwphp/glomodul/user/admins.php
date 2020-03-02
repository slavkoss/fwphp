<?php
// J:\awww\www\fwphp\glomodul4\user\admins.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

    $db = $this ;            //this globals for all sites are for CRUD... !!
    $Db_user = new Db_user ; //tbl mtds and attr use globals for all sites !!

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["Submit"])){
  $username        = $_POST["username"];
  $Name            = $_POST["Name"];
  //$DateTime        = $_POST["DateTime"];
      $CurrentTime = time();
      $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
  $password        = $_POST["password"];
  $Confirmpassword = $_POST["Confirmpassword"];
  $Admin           = $_SESSION["username"];

  //   1.1. V A L I D A T I O N
  if(empty($username)||empty($password)||empty($Confirmpassword)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    $this->Redirect_to($this->pp1->admins);
  }elseif (strlen($password)<4) {
    $_SESSION["ErrorMessage"]= "password should be greater than 3 characters";
    $this->Redirect_to($this->pp1->admins);
  }elseif ($password !== $Confirmpassword) {
    $_SESSION["ErrorMessage"]= "password and Confirm password should match";
    $this->Redirect_to($this->pp1->admins);
  }elseif ($Db_user->ChkUsrNameExists($username, $db)) {
    $_SESSION["ErrorMessage"]= "username Exists. Try Another One! ";
    $this->Redirect_to($this->pp1->admins);
  }else{
    //  1.2 I N S E R T  D B T B L R O W
    // Query to insert admin in DB When everything is fine

    //INSERT INTO $tbl ($flds) $what
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "datetime,username,password,aname,addedby" ;
    $qrywhat = "VALUES(:dateTime,:username,:password,:aName,:adminname)" ;
    $binds = [
      ['placeh'=>':dateTime',  'valph'=>$DateTime, 'tip'=>'str']
     ,['placeh'=>':username',  'valph'=>$username, 'tip'=>'str']
     ,['placeh'=>':password',  'valph'=>$password, 'tip'=>'str']
     ,['placeh'=>':aName',     'valph'=>$Name, 'tip'=>'str']
     ,['placeh'=>':adminname', 'valph'=>$Admin, 'tip'=>'str']
    ] ;
    $cursor = $this->cc($this,'admins',$flds,$qrywhat,$binds);

    if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    }else { $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !"; }
    $this->Redirect_to($this->pp1->admins);
  }
} //Ending of Submit Button If-Condition

//Warning: Cannot modify header information :
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar_admin.php");
    //require $this->pp1->module_path . '../user/admins.php';
//        2. G U I  to get user action
?>
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-user" style="color:#27aae1;"></i> Manage Admins</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->

     <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>


      <form class="" action="<?=$this->pp1->admins?>" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-header">
            <h1>Add Admin</h1>
          </div>

          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="username"> <span class="FieldInfo"> username: </span></label>
               <input class="form-control" type="text" name="username" id="username"  value="">
            </div>
            <div class="form-group">
              <label for="Name"> <span class="FieldInfo"> Name: </span></label>
               <input class="form-control" type="text" name="Name" id="Name" value="">
               <small class="text-muted">*Optional</small>
            </div>
            <div class="form-group">
              <label for="password"> <span class="FieldInfo"> password: </span></label>
               <input class="form-control" type="password" name="password" id="password" value="">
            </div>
            <div class="form-group">
              <label for="Confirmpassword"> <span class="FieldInfo"> Confirm password:</span></label>
               <input class="form-control" type="password" name="Confirmpassword" id="Confirmpassword"
                     value="">
            </div>

            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="<?=$this->pp1->dashboard?>" class="btn btn-warning btn-block">
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


      <h2>Existing Admins</h2>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No. </th><th>Date&Time</th><th>username</th><th>Admin Name</th>
            <th>Added by</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
      <?php
      //$cursor = $db->r r('', $db, 'admins', "'1'='1' ORDER BY aname", '*' ) ;
      $cursor = $this->rr("SELECT * FROM admins ORDER BY aname", [], __FILE__ .' '.', ln '. __LINE__) ;
      $SrNo = 0;
      while ($r = $this->rrnext($cursor))
      {
        $SrNo++;
          //all row fld names lowercase
          switch ($db->getdbi())
          {
            case 'oracle' : $r = $db->rlows($r) ; break; 
            default: break;
          }
        ?>
            <tr>
              <td><?=self::escp($SrNo)?></td>
              <td><?=self::escp($r->datetime)?></td>
              <td><?=self::escp($r->username)?></td>
              <td><?=self::escp($r->aname)?></td>
              <td><?=self::escp($r->addedby)?></td>
              <!-- after /r/ (r means redirect) is nickname of inc/call, see $pp1 = [ ... -->
              <td>
                 <a id="erase_row" class="btn btn-danger"
                    onclick="if (jsmsgyn('Erase row ?',''))
                    { location.href= '<?=$this->pp1->del_row?>t/admins/id/<?=$r->id?>/'; }"
                 >Delete <?=$r->id?></a>
              </td>
        <?php
      } ?>
        </tbody>
      </table>
    </div>
  </div>

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


<?php require $this->pp1->wsroot_path . 'zinc/ftr.php'; ?>

