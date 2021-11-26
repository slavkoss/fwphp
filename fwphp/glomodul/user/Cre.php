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


class Cre extends utl
{
  public function __construct(object $pp1) 
  {
    
  }

  static public function frm( object $pp1 ): string 
  {
    //$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

    $shares_path = $pp1->shares_path ; //includes, globals, commons, reusables

    // cursor a dmins :
    $c_admins = utl_module::get_cursor($sellst='*', $qrywhere= "'1'='1' ORDER BY aname"
      , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
                                /*if (isset ($_SESSION["submitted_cc"])) {
                                  list( $DateTime, $username, $Name, $password, $Admin
                                      , $c onfirmpassword
                                  ) = $_SESSION["submitted_cc"] ;
                                  unset ($_SESSION["submitted_cc"]) ;
                                } else {
                                  $tmp = ['','','','','',''] ; //self::get_ submitted_cc() ;
                                  list( $DateTime, $username, $Name, $password, $Admin
                                        , $c onfirmpassword
                                  ) = $tmp ;
                                  //in Tbl_ crud : $_SESSION["submitted_cc"] = ... ;
                                } */


    //    1. S U B M I T E D  A C T I O N S
                          /*if(isset($_POST["Submit"])){
                            // returns string
                            utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
                          } */ //Ending of Submit Button If-Condition
    $is_submited_frm = $_POST['submit_cc'] ?? '' ;
    $r = utl::row_flds_binds(
           utl_module::$col_names, utl_module::$flds, utl_module::$ccflds_placeh
           , utl_module::$uuflds_placeh, utl_module::$binds, utl_module::$col_bind_types
    ) ; // obj. view flds (empty, populated with defaults) 
    if ($is_submited_frm) {
       // redirects render another pages :
       // v a l i d a t i o n  &  u p d
       // calls utldb, returns obj. view flds populated with user entered values :
       $r_posted = utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
    }
                            //echo '<pre>$r='; print_r($r) ; echo '</pre>';

    self::frm_displ($pp1, $r, $c_admins);
    
    return '1' ;

  } //e n d  f n  f r m



  static private function frm_displ(
     object $pp1, object $r, object $c_admins): string
  { 
    //Warning: Cannot modify header information :
    require $pp1->shares_path . 'hdr.php';
    require_once("navbar_admin.php");

    //        2. G U I  to get user action
    ?>

         <!-- Main Area -->
    <section class="container py-2 mb-4">
      <div class="row">


        <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
          <?php
           echo $_SESSION["ErrorMessage"] ?? '' ; //$this->ErrorMessage();
           echo $_SESSION["SuccessMessage"] ?? '' ; //$this->SuccessMessage();
           /* if ( isset ($_SESSION["ErrorMessage"]) and count($_SESSION["ErrorMessage"]) > 0 ) {
              echo '<pre>Error='; print_r($_SESSION["ErrorMessage"]) ; echo '</pre>';
              unset($_SESSION["ErrorMessage"]) ;
            } */
           ?>

          <!-- 
                    C R E A T E  A D M I N  F O R M
          -->
          <form class="" action="<?=$pp1->cc_frm?>" method="post">
            <div class="card bg-secondary text-light mb-3">
              <div class="card-header">
                <h2>Add Admin for user level rights (authorization)</h2>
              </div>

              <div class="card-body bg-dark">
                <div class="form-group">
                  <label for="username"> <span class="FieldInfo"> Username: </span></label>
                   <input class="form-control" type="text" 
                          name="username" id="usernameID"  value="<?=$r->username?>">
                </div>

                <div class="form-group">
                  <label for="Name"> <span class="FieldInfo"> Name: </span></label>
                   <input class="form-control" type="text" 
                          name="Name" id="NameID" value="<?=$r->aname?>">
                   <small class="text-muted">*Optional</small>
                </div>

                <div class="form-group">
                  <label for="password"> <span class="FieldInfo"> Password: </span></label>
                   <input class="form-control" type="password" 
                          name="password" id="passwordID" value="<?=$r->password?>">
                </div>
                <div class="form-group">
                  <label for="confirmpassword"> <span class="FieldInfo"> Confirm password:</span></label>
                   <input class="form-control" type="password" value="<?=NULL?>"
                          name="confirmpassword" id="confirmpasswordID"
                         value="">
                </div>

                <!-- **********Two big b u t t o n s  after  f o r m************ 
                     Back To Dashboard is $pp1-> dashboard
                     <input type="submit" name="submit_ cc" value="Add row">
                -->
                <div class="row">
                  <div class="col-lg-6 mb-2">
                    <a href="<?=$pp1->home_url?>" class="btn btn-warning btn-block">
                       <i class="fas fa-arrow-left"></i> To admin table</a>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <button type="submit" name="submit_cc" 
                             class="btn btn-success btn-block">
                      <i class="fas fa-check"></i> Save
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form><!--  e n d       A D D  A D M I N  F O R M -->




      </div><!-- E N D  class="row"-->

    </section>


    <?php
    require $pp1->shares_path . 'ftr.php'; 

    return '1' ;
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
