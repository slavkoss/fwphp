<?php
// J:\awww\www\fwphp\glomodul\user\Admin_crud.php
namespace B12phpfw ; //ModelMapper
//use Model\UserInterface,
//    Model\User ; //entity

// 2. PdoAdapter.php (1 is namespace LibraryDatabase; interface DatabaseAdapterInterface)
class Admin_crud //extends AbstractDataMapper implements User_db_intf
{
  protected $tbl = "admins";

  // pre-query
  public function rr_all(object $db) {
    // open cursor (execute-query loop is in view script)
    $cursor = $db->rr("SELECT * FROM $this->tbl ORDER BY username", [], __FILE__ .', ln '. __LINE__ ) ;
    $db::disconnect();
    return $cursor ;
  }

  // pre-query
  public function rr(object $db, int $id) {
    // open cursor (execute-query loop is in view script)
    $cursor = $db->rr("SELECT * FROM admins WHERE id=:AdminId ORDER BY aname"
        , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
          ] , __FILE__ .' '.', ln '. __LINE__) ;
    //while ($row = $db->rrnext($cursor)): {$r = $row ;} endwhile;
    $db::disconnect();
    return $cursor ;
  }

  // on-insert
  //public function cc(UserInterface $user) {
  public function cc(object $db, array $vv) {
                if ('1') { 
                  echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  //echo '<pre>URL query array $this->uriq='; print_r($this->uriq); echo '</pre>';
                        // $this->uriq=stdClass Object( [i] => u  [d] => 79 )
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$vv='; print_r($vv); echo '</pre>';
                  //exit(0);
                }
    //  1. c r e  r o w
    $CurrentTime = time(); 
    $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime); //'2020-01-18 13:01:33'
    $flds     = "datetime,username,password,aname,addedby" ;  //"username,email"
    $qrywhat = "VALUES(:dateTime,:username,:password,:aName,:adminname)" ;
    $binds = [
      ['placeh'=>':dateTime',  'valph'=>$vv[0], 'tip'=>'str']
     ,['placeh'=>':username',  'valph'=>$vv[1], 'tip'=>'str']
     ,['placeh'=>':password',  'valph'=>$vv[2], 'tip'=>'str']
     ,['placeh'=>':aName',     'valph'=>$vv[3], 'tip'=>'str']
     ,['placeh'=>':adminname', 'valph'=>$vv[4], 'tip'=>'str']
    ] ;
    $cursor = $db->cc($db,$this->tbl,$flds,$qrywhat,$binds);

    // 2. g e t  i d
    $c_r = $db->rr("SELECT max(id) id FROM $this->tbl" 
        , [] //[ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int'] ]
        , __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $db->rrnext($c_r)): {$r = $row ;} endwhile; 

    $db::disconnect();

    $id = (int)$r->id ; // $id = $db::escp($r->id) ; //F5 to refresh page to see new user.
    if($cursor){$_SESSION["SuccessMessage"]="Admin adminname {$vv[3]}"
       .", id $id added Successfully by admin {$vv[4]}.";
    }else { $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !"; }
    //$db->Redirect_to($db->pp1->c);

    return $id; 

  }

  // on-update
  public function uu(object $db, array $vv) {
    //  1. u p d  r o w
    $flds     = "SET aname=:AName, email=:Aemail, abio=:abio" ;
    $qrywhere = "WHERE id=:AdminId" ;
    $binds = [
      ['placeh'=>':AName',  'valph'=>$vv[0], 'tip'=>'str']
     ,['placeh'=>':Aemail', 'valph'=>$vv[1], 'tip'=>'str']
     ,['placeh'=>':AdminId','valph'=>$vv[2], 'tip'=>'int']
     ,['placeh'=>':abio',   'valph'=>$vv[3], 'tip'=>'str']
    ] ;
    $cursor = $db->uu($db, $this->tbl, $flds, $qrywhere, $binds);
    $db::disconnect();
    //header("Location: index.php");
    return null ;
  }


  //public function dd($id) {  } //no need, 
  //dd is jsmsgyn dialog in home.php + call dd() in Home_ctr d() method




  public function Login_Confirm(){
    if (isset($_SESSION["userid"])) { return true;
    }  else {
      $_SESSION["ErrorMessage"]="You are not logged in, log in is required  f o r  action you want !";
      //$db->Redirect_to($db->pp1->lfrm); //ee to 'index.php?i=../user/login.php'
    }
  }


  public function lout(object $db){
    //our admins tbl - U serName may or not be  d b  s h e m a  name :
    if (isset($_SESSION['userid']))    $_SESSION['userid']    = null ;
    if (isset($_SESSION['username']))  $_SESSION['username']  = null ;
    if (isset($_SESSION['adminname'])) $_SESSION['adminname'] = null ;
    //d b  s h e m a  name :
    if (isset($_SESSION['cncts']->username)) $_SESSION['cncts']->username = null ;
    //
    session_destroy() ;
    $db->Redirect_to(QS.str_replace('|','/',$db->uriq->r)) ;
  }
  //e n d  S E S S  I O N  M E T H O D S





  public function l(object $db) // login
  {
                if ('') {$db->jsmsg( [ //basename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>''
                   ,'aaa'=>'bbb'
                ] ) ; }
      $r = '';
                  if ('') {  //if ($module_ arr->dbg) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                  echo '<pre>';
                  echo '<b>$_GET</b>='; print_r($_GET); 
                  echo '<b>$db->uriq</b>='; print_r($db->uriq); 
                  echo '<b>$_POST</b>='; print_r($_POST); 
                  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
                  echo '<b>$db->pp1</b>='; print_r($db->pp1); 
                  echo '</pre><br />'; 
                  //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                  }
      // define variables and set to empty values
      $username = $password = ''; //$nameErr = $passwordErr = '';
      //if ($_SERVER["REQUEST_METHOD"] == "POST") 
      if (!isset($_POST["Submit"]))
      {
        $_SESSION["ErrorMessage"]="l o g i n() is not called from l o g i n _ f r m  script";
        goto redirto ; //return ;
      } else {
          if (empty($_POST["username"])) { 
             $_SESSION["ErrorMessage"] = "Name is required!";
             goto redirto ;
          } else { $username = $db->escp($_POST["username"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
              $_SESSION["ErrorMessage"] = "Only letters and white space are allowed in name!";
              goto redirto ;
            }
          }

        if (empty($_POST["password"])) { 
           $_SESSION["ErrorMessage"] = "Password is required!";
           goto redirto ;
        } else { $password = $db->escp($_POST["password"]); }
                    if ('') {$db->jsmsg( [ //basename(__FILE__).
                       __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. BEFORE Config_allsites construct '
                       ,'$_SESSION["username"]'=>isset($_SESSION["username"])?$_SESSION["username"]:'NOT SET'
                       ,'$username'=>isset($username)?$username:'NOT SET'
                       ,'$password'=>isset($password)?$password:'NOT SET'
                    ] ) ; }
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>';
                      echo '$_SESSION["username"]=' . $_SESSION["username"]
                      .'<br />'.'$username=' .  $username
                       //.'<br />'.'$password='.isset($password)?$password:'NOT SET' 
                       .'<br />';
                      echo '</pre>'; }
      }
      //$qrywhere = "username=:username AND password=:password" ;
      // c u r s o r  of one  r o w :
      //$c_r = $db->r r( '1', $db, 'admins', "$qrywhere", '*'
      $c_r = $db->rr("SELECT * FROM admins WHERE username=:username AND password=:password" 
        , [ ['placeh'=>':username', 'valph'=>$username, 'tip'=>'str']
          , ['placeh'=>':password', 'valph'=>$password, 'tip'=>'str'] ] 
      , __FILE__ .' '.', ln '. __LINE__) ;
      $r = $db->rrnext($c_r);
      //all row fld names lowercase
          switch ($db->getdbi()) 
          {
            case 'oracle' : $r = $db->rlows($r) ; break; 
            default: break;
          }
                    if ('') {  //if ($module_ arr['dbg']) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>';
                    echo '<b>$username</b>='; print_r($username); 
                    echo '<br /><b>$password</b>='; print_r($password); 
                    echo '<br /><b>$r</b>='; print_r($r); 
                    echo '</pre><br />'; 
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    }
      //if (isset($r->username) and $r->username == $username) { return $Found_Account = $r;
      //}else { return null; }

      redirto:

      switch (true) 
      {
        case isset($_SESSION["userid"]) and $_SESSION["userid"] : 
          $db->Redirect_to($db->pp1->dashboard) ;
          break ;
        case $r : 
          $_SESSION["userid"]     =$r->id;
          $_SESSION["username"]   =$r->username;
          $_SESSION["adminname"]  =$r->aname;
          $_SESSION["SuccessMessage"] = "Wellcome ".$_SESSION["adminname"]."!";

          $db->Redirect_to($db->pp1->dashboard);
          break;
        default:
          $_SESSION["username"]     = $username;
          //$_SESSION["ErrorMessage"] ="Incorrect username/password";
          $db->Redirect_to($db->pp1->lfrm);
          //$db->R edirect_to($db->pp1->l oginfrm); //$db->R edirect_ to("l ogin.php");
          break;
      }


  } //e nd  f n  l o g i n


  public function ChkUsrNameExists(string $username, object $db){
    // called only from this cls which DOES NOT SEE CRUD METHODS
    //$db sees Home_ctr, Config_allsites and Db_allsites objects, 
    $cursor = $db->rr("SELECT username FROM admins WHERE username=:username" 
        , [ ['placeh'=>':username', 'valph'=>$username, 'tip'=>'str']
          ] 
    , __FILE__ .' '.', ln '. __LINE__) ;

    while ($row = $db->rrnext($cursor)): {$r = $row ;} endwhile; //c_, R_, U_, D_
    if (isset($r->username) and $r->username == $username) {return true;}
    else {return false;}
  }




}


/**
* step 4 (pre) CRUD class - Data Access Object or mapper, as we affectionately (dearly) call it
* constructing model objects from data in our DB, and saving data back to DB
*
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\Admin_crud.php
*    or User_db.php, or UserMapper.php :
*       namespace ModelMapper;  use Model\UserInterface, Model\User;
*       Class User_db extends AbstractDataMapper implements User_db_intf
* called from view CRUD scripts c reate.php, r ead.php... 
*    when usr clicks link/button or any (CRUD) URL is entered in ibrowser  
* calls Db_ allsites method cc() (=on-insert tbl-row), rr()...
*
* Admin_ crud separates CRUD code skeleton (B12phpfw) from data source (DB or web service or...).
* Admin_ crud is ORM (TBL ADAPTER) CLASS. When instantiated it is DM object of row in memory
*    Where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row
* Admin_ crud maps (adapts) model of tbl row in memory to tbl row in DM data source (DB, web service...)
* Admin_ crud is used to move data to/from data source.
*
* REASON WHY EACH DB TBL SHOULD HAVE DM CLASS NAMED EG TblNAME_crud :
* CRUD code should be separated from C and V code ee should be in TblNAME_crud.
* TblNAME_crud is FAT MODEL - When business logic is complicated here is lot of code
* - most importand module code (can not be in global model cls) !!
* C and V are tiny. HTML in V is eg one of bootstrap templates - PHP CRUD code in it is tiny,
* only calls TblNAME_crud methods.
*
* So this example is not MVC, it is DMVC
*
* Domain Model definition 
* =======================
* 1. System of abstractions that describes selected aspects of a sphere of knowledge,
*    influence or activity (a domain). DM can be used to solve problems related to domain.
* 
* 2. An object model of the domain that incorporates both behavior and data.
*    Creates a web of interconnected objects, where each object represents some
*    meaningful individual, whether as large as a corporation or as small as a 
*    single line on an order form.
*/

