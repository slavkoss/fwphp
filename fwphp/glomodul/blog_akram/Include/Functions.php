<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php"); 


function Redirect_to($New_Location) {
    header("Location:".$New_Location);
	exit;
}



function get_cursor($dml, $crud='rr') {
  global $conn ;
  $cursor=$conn->query($dml) ;
                      //$ExecuteApproved=mysql_query($QueryApproved);
  if ($crud=='rr') $cursor->execute();
                      //$RowsApproved=mysql_fetch_array($ExecuteApproved);
                      //$RowsApproved=$QueryApproved->fetch(PDO::FETCH_ASSOC);
      return($cursor) ;
}


function escp($string='') //ESCAPING OUTPUT and input
{
  // filter input - secure_ input
  //prevent XSS attacks by ESCAPING OUTPUT. XSS = cross-site scripting attack
  // - XSS attacks hacker injects malicious client-side code into output of your page
  $data = trim($string);
  $data = stripslashes($data);
  //scalpel - recommended : ONLY encodes a small set of the most problematic chars :
  return htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); //or htmlspecialchars($data);
  // hammer - can cause display problems : encode ANY char that has an HTML entity equivalent
  //return h tmlentities($string, ENT_QUOTES, 'UTF-8');
}


function Login_Attempt($Username,$Password){
  $dml = "SELECT * FROM registration WHERE username='$Username' AND password='$Password'" ;
                             echo '<h3>'. $dml .'</h3>';
  $Query=get_cursor($dml);
  if($admin=$Query->fetch(PDO::FETCH_ASSOC)){
	  return $admin;
  }else{
	  return null;
  }
}



function Login(){
    if(isset($_SESSION["User_Id"])){
	return true;
    }
}
 function Confirm_Login(){
    if(!Login()){
	$_SESSION["ErrorMessage"]="Login Required ! ";
	Redirect_to("Login.php");
    }
    
 }



      /* //$ConnectingDB;
      //$QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' AND status='ON'";
      $QueryApproved=$conn->query("SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' AND status='ON'") ;
      //$ExecuteApproved=mysql_ query($QueryApproved);
      $QueryApproved->execute();
      //$RowsApproved=mysql_ fetch_array($ExecuteApproved);  */