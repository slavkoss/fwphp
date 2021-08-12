<?php
declare(strict_types=1);
/**
* J:\awww\www\fwphp\glomodul\user\Tbl_crud.php
*   DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI - DB DRIVER, QueryBuilder
*     This c l a s s is for one module - does know module's CRUD
*         (PRE) CRUD class - DAO (Data Ac cess Object) or data mapper
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not functionality !
*/
/**
*  J:\awww\www\fwphp\glomodul\user\Tbl_crud.php
*         (PRE) CRUD class - DAO (Data Ac cess Object) or data mapper
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\user ;

use B12phpfw\core\zinc\Config_allsites as utl ;
use B12phpfw\module\blog\Home_ctr ;
use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_admin ;

use B12phpfw\core\zinc\Interf_Tbl_crud ;
use B12phpfw\core\zinc\Db_allsites as utldb ;
//use Model\UserInterface, //    Model\User ; //entity

// Gateway class - separate DBI layers
class Tbl_crud implements Interf_Tbl_crud //extends AbstractDataMapper implements User_db_intf
{
  static protected $tbl = "admins";



  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  utldb::dd( $pp1, $other ) ;
    return '' ;
  }


  // *******************************************
  //                     R E A D
  // *******************************************
  // pre-query
  static public function rr( // *************** r r (
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  {
    // open cursor (execute-query loop is in view script)
    $cursor = utldb::rr("SELECT $sellst FROM ".self::$tbl." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  static public function rrcnt( string $tbl, array $other=[] ): int { 
    $rcnt = utldb::rrcount($tbl) ;
    return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    $cursor_rowcnt_admins =  utldb::rr(
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds
       , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    $rcnt_admins = self::rrnext( $cursor_rowcnt_admins
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt_admins ;
  }

  static public function rr_byid( int $id, array $other=[] ): object
  {
    $cursor_admin_byid =  utldb::rr("SELECT * FROM ".self::$tbl." WHERE id=:id"
    ,$binds=[ ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int'] ]
    //,$other=['caller2' => __FILE__ .' '.', ln '. __LINE__ , 'caller1' => $other['caller'] ]
    ,$other[]=['caller2' => __FILE__ .' '.', ln '. __LINE__ ]
    ) ;
    $rx = utldb::rrnext( $cursor_admin_byid ) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }

  // pre-query
  static public function rr_all( string $sellst, string $qrywhere="'1'='1'"
     , array $binds=[], array $other=[]): object  //returns $cursor
  {
    if ($filterfldval)
    {
      //WHERE FILTEREDFLD_HERE = :filterfldval ORDER BY datetime desc"
      //eg [ ['placeh'=>':category_from_url', 'valph'=>$filterfldval, 'tip'=>'str'] ]
      $cursor = utldb::rr("SELECT $sellst FROM ".self::$tbl." WHERE $qrywhere"
        , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );
    }
    else{
      // default SQL query
      $cursor =  utldb::rr("SELECT $sellst FROM ".self::$tbl." WHERE $qrywhere"
         , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    }

    //$utldb::disconnect(); //problem ON LINUX
    return $cursor ;
  }




  // -----------------------------------------
  // R E A D  fns not in  i n t e r f a c e
  // -----------------------------------------
  static public function ChkUsrNameExists(string $username)
  {
    // called only before a d d admin to warn "Username Exists. Try Another One!"
    $cursor_admin_byname = self::rr($sellst='*', $qrywhere="username=:username"
      , $binds = [ ['placeh'=>':username', 'valph'=>$username, 'tip'=>'str']
          ]
      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

   $row = ''; while ( $r = utldb::rrnext($cursor_admin_byname) and isset($r->id) ):
    {$row = $r ;} endwhile;
                  //echo '<pre>'. __METHOD__ .' SAYS : $row='; print_r($row); echo '</pre>';
    if (isset($r->username) and $r->username == $username) {return true;}
    else {return false;}

  }


  static public function Login_Confirm_SesUsrId(){
    if (isset($_SESSION["userid"])) { return true;
    }  else {
      $_SESSION["ErrorMessage"]="You are not logged in, log in is required  f o r  action you want !";
      //utl::Redirect_to(utl::pp1->l oginfrm); //ee to 'index.php?i=../user/login.php'
    }
  }



  static public function logout(object $pp1){
    //our admins tbl - U serName may or not be  d b  s h e m a  name :
    if (isset($_SESSION['userid']))    $_SESSION['userid']    = null ;
    if (isset($_SESSION['username']))  $_SESSION['username']  = null ;
    if (isset($_SESSION['adminname'])) $_SESSION['adminname'] = null ;
    //d b  s h e m a  name :
    if (isset($_SESSION['cncts']->username)) $_SESSION['cncts']->username = null ;
    //
    session_destroy() ;
    // '/' is  U R L query pieces delimiter, '|' is parts of pieces delimiter
    utl::Redirect_to(QS.str_replace('|','/',$pp1->logout)) ;
  }
  //e n d  S E S S  I O N  M E T H O D S


  static public function login(object $pp1, string $goscript='') 
  {
                            if ('') {Home_ctr::jsmsg( [ //b asename(__FILE__).
                               __METHOD__ .', line '. __LINE__ .' SAYS'=>''
                               ,'aaa'=>'bbb'
                            ] ) ; }
      $r = '';
                  if ('') {  //if ($module_ arr->dbg) {
                    echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</span>' ;

                    echo '<br /><span style="color: fuchsia; font-size: normal; font-weight: normal;"">' .'CHK isset($_POST["Submit"])='. isset($_POST["Submit"]) .'</span>' ;

                    echo '<br /><span style="color: fuchsia; font-size: normal; font-weight: normal;"">' .'CHK $_POST["username"]='. $_POST["username"] .'</span>' ;

                    echo '<br /><span style="color: fuchsia; font-size: normal; font-weight: normal;"">' .'CHK $_POST["password"]='. $_POST["password"] .'</span>' ;

                  echo '<pre>';
                  //echo '<b>$_GET</b>='; print_r($_GET);
                  echo '<b>$_POST</b>='; print_r($_POST);
                  //echo '<b>$_SESSION</b>='; print_r($_SESSION);
                  echo '<b>$pp1</b>='; print_r($pp1);
                  echo '</pre><br />';
                  exit(0) ; //to avoid redirto
                  }
      // define variables and set to empty values
      $username = $password = ''; //$nameErr = $passwordErr = '';
      //if ($_SERVER["REQUEST_METHOD"] == "POST")
      if (!isset($_POST["Submit"])) { $_SESSION["ErrorMessage"]="l o g i n() is not called from l o g i n _ f r m  script";
        goto redirto ; //return ;
      } else {
          if (empty($_POST["username"])) {
             $_SESSION["ErrorMessage"] = "Name is required!";
             goto redirto ;
          } else { $username = utl::escp($_POST["username"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
              $_SESSION["ErrorMessage"] = '<span style="color: violet; font-size: large; font-weight: bold;">'
              ."Only letters and white space are allowed in name!".'</span>';
              goto redirto ;
            }
          }

        if (empty($_POST["password"])) {
           $_SESSION["ErrorMessage"] = "Password is required!";
           goto redirto ;
        } else { $password = utl::escp($_POST["password"]); }
                    /*if ('') {$db->jsmsg( [ //b asename(__FILE__).
                       __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. BEFORE Config_allsites construct '
                       ,'$_SESSION["username"]'=>isset($_SESSION["username"])?$_SESSION["username"]:'NOT SET'
                       ,'$username'=>isset($username)?$username:'NOT SET'
                       ,'$password'=>isset($password)?$password:'NOT SET'
                    ] ) ; } */
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                      echo '<pre>';
                      echo '$_SESSION["username"]=' . $_SESSION["username"]
                      .'<br />'.'$username=' .  $username
                       //.'<br />'.'$password='.isset($password)?$password:'NOT SET'
                       .'<br />';
                      echo '</pre>'; }
      }

      $cursor_usr = utldb::rr(
          "SELECT * FROM admins WHERE username=:username AND password=:password"
        , $binds=[
            ['placeh'=>':username', 'valph'=>$username, 'tip'=>'str']
          , ['placeh'=>':password', 'valph'=>$password, 'tip'=>'str']
          ]
        , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
      ) ;
      $rx = utldb::rrnext($cursor_usr);
      //all row fld names lowercase
                    if ('') {  //if ($module_ arr['dbg']) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                    echo '<pre>';
                    echo '<b>$username</b>='; print_r($username);
                    echo '<br /><b>$password</b>='; print_r($password);
                    echo '<br /><b>$rx</b>='; print_r($rx);
                    echo '</pre><br />';
                    exit(0) ; //to avoid redirto
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    }
      //if (isset($rx->username) and $rx->username == $username) { return $Found_Ac count = $rx;
      //}else { return null; }

      redirto:

      switch (true)
      {
        case isset($_SESSION["userid"]) and $_SESSION["userid"] :
          utl::Redirect_to($goscript) ; //$pp1-> dashboard
          break ;
        case $rx :
          $_SESSION["userid"]     =$rx->id;
          $_SESSION["username"]   =$rx->username;
          $_SESSION["adminname"]  =$rx->aname;
          $_SESSION["SuccessMessage"] = "Wellcome ".$_SESSION["adminname"]."!";

          utl::Redirect_to($goscript); //$pp1-> dashboard
          break;
        default:
          $_SESSION["username"]     = $username;
          //$_SESSION["ErrorMessage"] ="Incorrect username/password";
          utl::Redirect_to($pp1->loginfrm);
          break;
      }


  } //e nd  f n  l o g i n
  // *******************************************
  //                   E N D  R E A D
  // *******************************************


  // *******************************************
  //                   C R E A T E,  U,  D
  // *******************************************
  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [
      strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'

      ,$_POST["username"]
      ,$_POST["Name"] // $aName ?
      ,$_POST["password"]
      ,$_SESSION["username"]
      ,$_POST["Confirmpassword"]
    ] ;
    return $submitted ;
  }
  // O N - I N S E R T  (P R E - I N S E R T)
  //return id or 'err_c c'   public f unction c c(UserInterface $user) {
  static public function cc( // *************** c c (
     object $pp1, array $other=[]): string
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
      list( $DateTime, $username, $Name, $password, $Admin, $Confirmpassword
      ) = $submitted_cc ;
      $_SESSION["submitted_cc"] = $submitted_cc ;
    // 2. C C  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      case (empty($username)||empty($Name)||empty($password)||empty($Confirmpassword)):
        $err = "All fields must be filled out"; break ;
      case (strlen($password)<4): $err = "Password should be min 4 characters"; break ;
      case ($password !== $Confirmpassword):
        $err = "Password and Confirm password should match"; break ;
      case (self::ChkUsrNameExists($username)):
        $err = "Username Exists. Try Another One!"; break ;
      //default: break;
    }
    
    if ($err > '') { $_SESSION["ErrorMessage"]= $err ;
      utl::Redirect_to($pp1->admins); goto fnerr ; //exit(0) ;
    }

      // 3. I N S E R T  D B T B L  R O W
      // Query to insert admin in DB When everything is fine
     $flds="datetime,username,password,aname,aheadline,abio,addedby" ;
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

      $cursor = utldb::cc( self::$tbl, $flds, $valsins, $binds
                , $other=['caller'=>__FILE__.' '.',ln '.__LINE__] );

      //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
      //}else { $_SESSION["ErrorMessage"]= "Something went wrong (cre admin). Try Again !"; }

      // 4. U P L O A D  I M A G E
      //move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

    // g e t  i d  - see D b _ a l l s i t e s  rr_ last_ id($tbl)
      utl::Redirect_to($pp1->admins); 
      return('1');
      fnerr:
      return('0');
  }



  static public function get_submitted_uu(): array //return '1'
  {
    $submitted = [
       $_POST["Name"]
      ,$_POST["Headline"]
      ,$_POST["Bio"]
      ,$_FILES["Image"]["name"]
      ,"Uploads/".basename($_FILES["Image"]["name"])
    ] ;
    return $submitted ;
  }
  // O N - U P D A T E (P R E - U P D A T E)
  //return id or 'err_c c'
  static public function uu( object $pp1, array $other=[]): string // *************** u u (
  {
    $AdminId = (int)$pp1->uriq->id ;  //$AdminId = $_SESSION["userid"];

    // 1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
    list($AName, $AHeadline, $ABio, $Image, $Target) = self::get_submitted_uu() ;

    // 2. U U  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      //case (empty($PostTitle)): $err = "Title Cant be empty"; break ;
      case (strlen($AHeadline)>30): $err = "Headline Should be max 30 characters"; break ;
      case (strlen($ABio)>500): $err = "Bio should be max 500 characters"; break ;
      //default: break;
    }
    if ($err > '') {
      $_SESSION["ErrorMessage"]= $err ;
      utl::Redirect_to($pp1->upd_user_loggedin);
      goto fnerr ; //exit(0) ;
    }

    // 3. U P D A T E  D B T B L R O W
      // Query to Update u s e r in DB When everything is fine
      $flds     = "SET aname=:AName, aheadline=:AHeadline, abio=:ABio" ;
      $qrywhere = "WHERE id=:AdminId" ;
      $binds = [
        ['placeh'=>':AName',     'valph'=>$AName, 'tip'=>'str']
       ,['placeh'=>':AHeadline', 'valph'=>$AHeadline, 'tip'=>'str']
       ,['placeh'=>':ABio',      'valph'=>$ABio, 'tip'=>'str']
       ,['placeh'=>':AdminId',   'valph'=>$AdminId, 'tip'=>'int']
      ] ;
      if (!empty($_FILES["Image"]["name"])) {
        $flds    .= ", aimage=:Image" ;
        $binds[] = ['placeh'=>':Image', 'valph'=>$Image, 'tip'=>'str'] ;
      }

      $cursor = utldb::uu(self::$tbl, $flds, $qrywhere, $binds
        //, $other=['caller' => __FILE__ .' '.', ln '. __LINE__]
      );

      if($cursor){ $_SESSION["SuccessMessage"]="U s e r Updated Successfully";
      }else {$_SESSION["ErrorMessage"]= "U s e r NOT Updated. Try Again !";}

      // 4. U P L O A D  I M A G E
      move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

      return('1');
      fnerr:
      return('0');

  }





  //public function dd($id) {  } //no need,
  //dd is  j s m s g y n  dialog in home.php + call dd() in Home_ctr d() method
  // *******************************************
  //             E N D  C R E A T E,  U,  D
  // *******************************************



/*
  J:\awww\www\fwphp\glomodul\user\Tbl_crud.php (14 hits)
	Line 35:   static public function dd( object $pp1, array $other=[] ): string
	Line 47:   static public function r r( // *************** r r (
	Line 56:   static public function rr count( //string $sellst, 
	Line 68:   static public function rr_ byid( int $id, array $other=[] ): object
	Line 80:   static public function rr_ all( string $sellst, string $qrywhere="'1'='1'"
	Line 106:   static public function C hkUsrNameExists(string $username)
	Line 123:   static public function L ogin_ Confirm_SesUsrId(){
	Line 133:   static public function l ogout(object $db){
	Line 150:   static public function l ogin(object $db, $pp1, string $goscript='') // login
	Line 267:   static public function get_ submitted_cc(): array //return '1'
	Line 282:   static public function c c( // *************** c c (
	Line 348:   static public function get_ submitted_uu(): array //return '1'
	Line 361:   static public function u u( object $pp1, array $other=[]): string // *************** u u (
	Line 417:   //public function dd ($id) {  } //no need,
*/
}


/**
* step 4 (PRE) CRUD class - DAO (Data Access Object) or mapper (affectionately, dearly nickname)
* STEPS ARE : 1=autol STEP_2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
* STEP_3=rout/disp : fw core calls method in Home_ctr cls (parent::__construct)

* constructing model objects from data in our DB, and saving data back to DB

* 2.PdoAdapter.php is DAO (1 is namespace LibraryDatabase; interface DBAdapterInterface)
*
* Data access object (DAO) is a pattern that provides an abstract (public) interface to some DB or other persistence mechanism (implementation of DAO).
*
* By mapping app calls to  persistence layer, DAO is not  exposing DB details - isolation which supports single responsibility principle.
*
 Gateway class - separate DBI layer. Better : data mappers that interact more cleanly with our domain (bussiness) objects.  Domain logic into a Domain Model and wrap it with a series of Service Layers.


DESIGN PATTERNS solves a specific problem. Design pattern is not a tool; it is description or template that describes how to solve a specific problem.
 1. MVC - fat model (layer) and skinny controllers, eg validation is performed at the model level.
M parts : business logic, CRUD db operations, data mapper pattern and services, and so on.
 2. FACTORY DESIGN PATTERN CREATES OBJECTS that are needed to be used.
 3. OBSERVER PATTERN in which an object calls different observers on a specific event or task on it. This is mainly used FOR EVENT HANDLING.
 4. SINGLETON PATTERN used when there is a requirement that ONLY A SINGLE OBJECT OF A CLASS BE USED THROUGHOUT THE APPLICATION'S EXECUTION. A singleton object can't be serialized and cloned.

*
*    or User_db.php, or UserMapper.php :
*       namespace ModelMapper;  use Model\UserInterface, Model\User;
*       Class User_db extends AbstractDataMapper implements User_db_intf
* called from view CRUD scripts c reate.php, r ead.php...
*    when usr clicks link/button or any (CRUD) URL is entered in ibrowser
* calls Db_ allsites method c c() (=on-insert tbl-row), rr()...
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

