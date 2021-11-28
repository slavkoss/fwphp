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
  { }

  static public function frm_process( object $pp1 ): string 
  {
                                //see  f r m  ***1
    //    1. S U B M I T E D  A C T I O N S
                                //see  f r m  ***2
    $is_submited_frm = $_POST['submit_cc'] ?? '' ;

    //if $_POST[username] in usrtbl msg "usr exists" :
    $r_usr = (object)[];
    if ($is_submited_frm) {
        $r_usr = utl_module::rr_byusrname($_POST['username']) ;
        if ($r_usr->username == $_POST['username']) {
           $_SESSION["ErrorMessage"][] = 'User '.  $_POST['username'] .' exists !' ;
           utl::Redirect_to($pp1->cc_frm); //admins same !?
                if ('') {echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$is_submited_frm='; print_r($is_submited_frm); echo '</pre>';
                  echo '<pre>$r_usr='; print_r($r_usr); echo '</pre>';
                  echo '<pre>$_SESSION='; print_r($_SESSION); echo '</pre>';
                  exit(0);
                }    //see  f r m  ***3
        }
    }

    // obj. for view flds (empty, populated with defaults) 
    $r = utldb::pre_cc_uu(
             utl_module::$col_names, utl_module::$col_nam_str
           , utl_module::$ccflds_placeh, utl_module::$uuflds_placeh
           , utl_module::$binds, utl_module::$col_bind_types
    ) ; 
                  if ('') {
      echo '<h4>'. __METHOD__ .', line '. __LINE__ .' SAYS :'.' BEFORE if ($is_submited_frm)</h4>';
                  //echo '<pre>';
      echo '<b>*****$is_submited_frm='; print_r($is_submited_frm); echo '*****</b>'; 
                  echo '<br>$_GET='; print_r($_GET); 
                  echo '<br>$_POST='; print_r($_POST); 
      echo '<br>utl_module::$col_names='; print_r(utl_module::$col_names);
      echo '<br>::$col_bind_types='; print_r(utl_module::$col_bind_types);
                echo '<br> &nbsp; &nbsp; ::$col_nam_str='; print_r(utl_module::$col_nam_str);
                echo '<br> &nbsp; &nbsp; ::$ccflds_placeh='; print_r(utl_module::$ccflds_placeh);
                echo '<br> &nbsp; &nbsp; ::$uuflds_placeh='; print_r(utl_module::$uuflds_placeh);
                echo '<br> &nbsp; &nbsp; ::$binds[0]='; print_r(utl_module::$binds[0]);
      echo '<br>$r='; print_r($r); 
                    //echo '</pre>';
                    //exit(0);
                  }    //see  f r m  ***4 BEFORE r_ posted
    if ($is_submited_frm) {

       // v a l i d a t i o n  &  D M L
       // calls utldb, returns obj. view flds populated with user entered values :
       $r_posted = utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 

    }
                            //echo '<pre>$r='; print_r($r) ; echo '</pre>';

    self::frm_displ($pp1, $r); //, $c_admins
    
    return '1' ;

  } //e n d  f n  f r m_ p r o c e s s


  static private function frm_displ(
     object $pp1, object $r): string  //, object $c_admins
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
                <?php if ('1') {echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  //echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //echo '<pre>$is_submited_frm='; print_r($is_submited_frm); echo '</pre>';
                  //echo '<pre>$r_usr='; print_r($r_usr); echo '</pre>';
                  echo '<pre>$_SESSION='; print_r($_SESSION); echo '</pre>';
                  //exit(0);
                }    //see  f r m  ***3 ?>
          <?php echo utl::msg_err_succ(__METHOD__) ; ?>

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
                          name="aname" id="NameID" value="<?=$r->aname?>">
                   <small class="text-muted">*Optional</small>
                </div>

                <div class="form-group">
                  <label for="password"> <span class="FieldInfo"> Password: </span></label>
                   <input class="form-control" type="password" 
                          name="password" id="passwordID" value="<?=$r->password?>">
                </div>
                <div class="form-group">
                  <label for="frm_confirmpassword"> <span class="FieldInfo"> Confirm password:</span></label>
                   <input class="form-control" type="password" value="<?=NULL?>"
                          name="frm_confirmpassword" id="frm_confirmpasswordID"
                         value="">
                </div>

                <!-- ********** After  f o r m  two big :
                   l n k  "Back To Dashboard" is $pp1-> dashboard
                   & b u t t o n <input type="submit" name="submit_ cc" value="Add row">
                   ************ 
                -->
                <div class="row">
                  <div class="col-lg-6 mb-2">
                    <br>
                    <a href="<?=$pp1->home_url?>" class="btn btn-warning btn-block">
                       <i class="fas fa-arrow-left"></i> To admin table</a>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <br>
                    <button type="submit" name="submit_cc" value="1" 
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

/*


  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [
      strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'

      ,$_POST["username"]
      ,$_POST["Name"] // $aName ?
      ,$_POST["password"]
      ,$_SESSION['username']
      ,$_POST["frm_confirmpassword"]
    ] ;
    return $submitted ;
  }
  // O N - I N S E R T  (P R E - I N S E R T)
  //return id or 'err_c c'   public f unction c c(UserInterface $user) {
  static public function cc( // *************** c c (
     object $pp1, array $other=[]): object //was string
  {
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                             //echo '<pre>URL query array $this->uriq='; print_r($this->uriq); echo '</pre>';
                             // $this->uriq=stdClass Object( [i] => u  [d] => 79 )
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //exit(0);
                }

    // 1. S U B M I T E D  F L D V A L S
      $submitted_cc = self::get_submitted_cc() ;
      list( $DateTime, $username, $Name, $password, $Admin, $frm_confirmpassword
      ) = $submitted_cc ;
      //$pp1["submitted_cc"] = $submitted_cc ;
      $_SESSION["submitted_cc"] = $submitted_cc ;
    // 2. C C  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      case (empty($username)||empty($Name)||empty($password)||empty($frm_confirmpassword)):
        $err = "All fields must be filled out"; break ;
      case (strlen($password)<4): $err = "Password should be min 4 characters"; break ;
      case ($password !== $frm_confirmpassword):
        $err = "Password and Confirm password should match"; break ;
      case (self::ChkUsrNameExists($username)):
        $err = "Username Exists. Try Another One!"; break ;
      //default: break;
    }
    
    if ($err > '') { $_SESSION["MsgErr"]= $err ;
      utl::Redirect_to($pp1->admins); goto fnerr ; //exit(0) ;
    }

      // 3. I N S E R T  D B T B L  R O W
      // Query to insert admin in DB When everything is fine
     $col_nam_str="datetime,username,password,aname,aheadline,abio,addedby" ;
     $valsins="VALUES(:dateTime,:username,:password,:aName,:aheadline,:abio,:adminname)" ;
     $binds=[
          ['placeh'=>':dateTime',  'valph'=>$DateTime, 'tip'=>'str']
         ,['placeh'=>':username',  'valph'=>$username, 'tip'=>'str']
         ,['placeh'=>':password',  'valph'=>$password, 'tip'=>'str']
         ,['placeh'=>':aName',     'valph'=>$Name    , 'tip'=>'str']
         ,['placeh'=>':aheadline', 'valph'=>'~~~aheadline varchar(30)~~~', 'tip'=>'str']
         ,['placeh'=>':abio',     'valph'=>'~~~abio varchar(500)~~~', 'tip'=>'str']
         ,['placeh'=>':adminname', 'valph'=>$Admin   , 'tip'=>'str']
         ] ;

      $cursor = utldb::cc( self::$tbl, $col_nam_str, $valsins, $binds
                , $other=['caller'=>__FILE__.' '.',ln '.__LINE__] );

      //if($cursor){$_SESSION["MsgSuccess"]="Admin with the name of ".$Name." added Successfully";
      //}else { $_SESSION["MsgErr"]= "Something went wrong (cre admin). Try Again !"; }

      // 4. U P L O A D  I M A G E
      //move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

    // g e t  i d  - see D b _ a l l s i t e s  rr_ last_ id($tbl)
      utl::Redirect_to($pp1->admins); 
      return((object)['1']); // return('1');
      fnerr:
      return((object)['0']); // return('0');
  }





          $sql = "INSERT INTO admins(datetime,username,password,aname,addedby)";
          $sql .= "VALUES(:dateTime,:username,:password,:aname,:adminname)";
          $this->pr epareSQL($sql); 
          $this->b indvalue(':username', $username, \PDO::PARAM_STR);
          $this->b indvalue(':password', $password, \PDO::PARAM_STR);
          $this->b indvalue(':aname', $Name, \PDO::PARAM_STR);
          $this->b indvalue(':adminname', $Admin, \PDO::PARAM_STR);
          $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
          $this->b indvalue(':dateTime', $DateTime, \PDO::PARAM_STR);
          $cursor = $this->e xecute();

*/




  //f r m  ***4 BEFORE r_ posted
         /*B12phpfw\module\user\Cre::frm_process, line 44 SAYS : BEFORE if ($is_submited_frm)
        *****$is_submited_frm=1*****
        $_GET=Array ( [i/cc_frm/] => )
        $_POST=Array ( [username] => d [aname] => dddddddddd [password] => dddd [frm_confirmpassword] => dddd [submit_cc] => 1 )
        utl_module::$col_names=Array ( [0] => dateTime [1] => username [2] => password [3] => frm_confirmpassword [4] => aname [5] => aheadline [6] => abio )
        ::$col_bind_types=Array ( [0] => str [1] => str [2] => str [3] => str [4] => str [5] => str [6] => str )
            ::$col_nam_str=dateTime, username, password, frm_confirmpassword, aname, aheadline, abio
            ::$ccflds_placeh=:dateTime, :username, :password, :frm_confirmpassword, :aname, :aheadline, :abio
            ::$uuflds_placeh=dateTime = :dateTime, username = :username, password = :password, frm_confirmpassword = :frm_confirmpassword, aname = :aname, aheadline = :aheadline, abio = :abio
            ::$binds[0]=Array ( [placeh] => :dateTime [valph] => [tip] => str )
        $r=stdClass Object ( [dateTime] => [username] => d [password] => dddd [frm_confirmpassword] => dddd [aname] => dddddddddd [aheadline] => [abio] => ) 
  */





                                  //f r m  ***3
                            /*
                                  $_GET=Array
                                  (
                                      [i/cc_frm/] => 
                                  )

                                  $_POST=Array
                                  (
                                      [username] => d
                                      [Name] => ddddddddddd
                                      [password] => dddd
                                      [frm_confirmpassword] => dddd
                                      [submit_cc] => 1
                                  )

                                  $is_submited_frm=1
                            */

                                //f r m  ***1
    //$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
    //$shares_path = $pp1->shares_path ; //includes, globals, commons, reusables

    // c u r s o r  a d m i n s :
    //$c_admins = utl_module::get_cursor($sellst='*', $qrywhere= "'1'='1' ORDER BY aname"
    //  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;


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

                                //f r m  ***2
                          /*if(isset($_POST["Submit"])){
                            // returns string
                            utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
                          } */ //Ending of Submit Button If-Condition
