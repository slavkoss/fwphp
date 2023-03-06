<?php
$title='Admins' ;
require_once("ahdr.php");

Confirm_Login();

if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $ConnectingDB;
  $Query=get_cursor("DELETE FROM comments WHERE id='$IdFromURL'", 'dd');
  if($Query){
    $_SESSION['SuccessMessage']="Comment Deleted Successfully";
    Redirect_to("Comments.php");
  }else{
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("Comments.php");
  }
 
}

?>