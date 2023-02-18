<?php
/**
*  J:\awww\www\fwphp\glomodul\user\Db_ user.php
*/
namespace B12phpfw ;

class Db_user //extends Db_allsites
{


    public function __construct() //$saltLength=NULL
    {
      /** 
      * $db sees Home_ctr, Config_allsites and Db_allsites objects, 
      * but $this = $Db_ user instantiated in admins.php does not see CRUD methods
      *
      * NO NEED (COMPLICATED -> CAN HARM) to instantiate parent 
      * (occupy memory with global fn-s and variables) because 
      * methods in this cls use CRUD methods in global $db object
      * which is their parameter !!
      */
        // Call parent constructor to get or create db object
        //parent::__construct(); 
    }


  public function Login_Confirm(){
    if (isset($_SESSION["userid"])) { return true;
    }  else {
      $_SESSION["ErrorMessage"]="You are not logged in, log in is required  f o r  action you want !";
      //$db->Redirect_to($db->pp1->loginfrm); //ee to 'index.php?i=../user/login.php'
    }
  }


  public function logout($db){
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





  public function login($db)
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
          $db->Redirect_to($db->pp1->loginfrm);
          //$db->R edirect_to($db->pp1->l oginfrm); //$db->R edirect_ to("l ogin.php");
          break;
      }


  } //e nd  f n  l o g i n


  public function ChkUsrNameExists($username, $db){
    // called only from a d m i n s.p h p where is instantiated :
    // $this = $Db_ user which DOES NOT SEE CRUD METHODS
    //$db sees Home_ctr, Config_allsites and Db_allsites objects, 
    $c_r = $db->rr("SELECT username FROM admins WHERE username=:username" 
        , [ ['placeh'=>':username', 'valph'=>$username, 'tip'=>'str']
          ] 
    , __FILE__ .' '.', ln '. __LINE__) ;

    while ($row = $db->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_
    if (isset($r->username) and $r->username == $username) {return true;}
    else {return false;}
  }


/*
 J:\awww\www\fwphp\glomodul\user\Db_ user.php (5 hits)
	Line 11:     public function __construct() //$saltLength=NULL
	Line 27:   public function L ogin_ Confirm(){ 
	Line 36:   public function l ogout($db){  <------
	Line 53:   public function l ogin($db)    <------
	Line 162:   public function Chk UsrNameExists($username, $db){
*/
} // e n d  c l s  
