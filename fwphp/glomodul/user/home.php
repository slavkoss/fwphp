<?php
//     J:\awww\www\fwphp\glomodul\user\Home.php
// was J:\awww\www\fwphp\glomodul4\user\admins.php
declare(strict_types=1);
                       //require_once($pp1->module_path .'admins.php');
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\core\b12phpfw\Db_allsites     as utldb ;
use B12phpfw\dbadapter\user\Tbl_crud       as utl_module ;


class Home extends utl
{
  public function __construct(object $pp1) 
  {
    
  }

  static public function displ( object $pp1 ): string 
  {
    //$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

    $shares_path = $pp1->shares_path ; //includes, globals, commons, reusables

    // cursor a dmins :
    $c_admins = utl_module::get_cursor($sellst='*', $qrywhere= "'1'='1' ORDER BY aname"
      , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

                                  /*
                                  if (isset ($_SESSION["submitted_cc"])) {
                                    list( $DateTime, $username, $Name, $password, $Admin
                                        , $confirmpassword
                                    ) = $_SESSION["submitted_cc"] ;
                                    unset ($_SESSION["submitted_cc"]) ;
                                  } else {
                                    $tmp = ['','','','','',''] ; //self::get_ submitted_cc() ;
                                    list( $DateTime, $username, $Name, $password, $Admin
                                          , $confirmpassword
                                    ) = $tmp ;
                                    //in Tbl_ crud : $_SESSION["submitted_cc"] = ... ;
                                  }


                                  //    1. S U B M I T E D  A C T I O N S
                                  if(isset($_POST["Submit"])){

                                    // returns string
                                    utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
                                  } //Ending of Submit Button If-Condition

                                  */



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


        <div class="offset-lg-1 col-lg-10" style="min-height:0px;">
          <?php
          $err_tmp = $_SESSION["ErrorMessage"] ?? '' ;
          $suc_tmp = $_SESSION["SuccessMessage"] ?? '' ;
          if (count($err_tmp) > 0) print_r( $err_tmp ) ; 
          if (count($suc_tmp) > 0) print_r( $_suc_tmp );


           //$pp1->rr . $id
           ?>
          <h2>Admins
            <a class="btn btn-success" href="<?=$pp1->cc_frm?>" title="Add user">Add admin</a>
          </h2>
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
          //foreach ($songs as $song)        and isset($r->id) ): 
          while ( $r = utldb::rrnext( $c_admins
             , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $r->rexists ):
          {
            $id = $r->id ;
            $SrNo++;
            ?>
                <!-- after /r/ (r means redirect) is nickname of inc/call, see $p p1 = [ ... -->
                <tr>
                  <!-- ********** 1. No.&nbsp; dd = Del ID ************ -->
                  <td width=16%>
                     <!--str_pad( $SrNo, 5 - strlen($SrNo), '&nbsp;', STR_PAD_LEFT )
                         str_repeat('&nbsp;', 5 - strlen($SrNo)) . $SrNo
                         
                         $pp1->ldd_admins.$id
                     -->
                     <?=str_repeat('&nbsp;', 5 - strlen((string)$SrNo)) . $SrNo?>
                     <a id="erase_row" class="btn btn-danger"
                        onclick="var yes ; yes = jsmsgyn('Home.php: Erase row <?=$id?>?','') ;
                        if (yes == '1') { location.href= '<?=$pp1->dd.$id?>/'; }"
                        title="Delete tbl row ID=$id"
                     ><?=str_repeat('&nbsp;', 8 - strlen($id)) . $id ?></a>
                  </td>


                  <!-- ********** 2. Date&Time ************ -->
                  <td><?=self::escp($r->datetime)?></td>


                  <!-- ********** 3. Username ************ -->
                    <td>
                    <!-- https://getbootstrap.com/docs/4.0/components/buttons/ 
                    Undefined%20property:$upd_user_loggedin%20in
                    -->
                    <a class="btn btn-link" href="<?=$pp1->upd_user_loggedin . $id?>"
                       title="Edit tbl row"
                    ><?=self::escp($r->username)?></a>
                  </td>

                  <!-- ********** 4. Admin Name ************ -->
                  <td><?=self::escp($r->aname)?></td>
                  <!-- ********** 5. Added by ************ -->
                  <td><?=self::escp($r->addedby)?></td>

                  <!-- ********** 6. Action ************ -->
                  <td width=16%>
                    <a class="btn btn-success" href="<?=$pp1->rr . $id?>"
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


    <?php
    require $pp1->shares_path . 'ftr.php'; 


  } //e n d  f n  d i s p l



} //e n d  c l s

?>


<!-- End Main Area 
                      /*$sql = "INSERT INTO admins(datetime,username,password,aname,addedby)";
                      $sql .= "VALUES(:dateTime,:username,:password,:aname,:adminname)";
                      $this->pr epareSQL($sql); 
                      $this->b indvalue(':username', $username, \PDO::PARAM_STR);
                      $this->b indvalue(':password', $password, \PDO::PARAM_STR);
                      $this->b indvalue(':aname', $Name, \PDO::PARAM_STR);
                      $this->b indvalue(':adminname', $Admin, \PDO::PARAM_STR);
                      $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                      $this->b indvalue(':dateTime', $DateTime, \PDO::PARAM_STR);
                      $cursor = $this->e xecute(); */
-->
