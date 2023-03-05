<?php
$title='Admins' ;
require_once("ahdr.php");

Confirm_Login();

if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $ConnectingDB;
  $Query=get_cursor("DELETE FROM registration WHERE id='$IdFromURL'", 'dd');
  if($Query){
      $_SESSION["SuccessMessage"]="Admin Deleted Successfully";
      Redirect_to("Admins.php");
  }else{
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("Admins.php");
  }
  
}

?>