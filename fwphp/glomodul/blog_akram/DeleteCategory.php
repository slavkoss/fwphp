<?php
$title='Admins' ;
require_once("ahdr.php");

Confirm_Login();

if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $ConnectingDB;
  $Query=get_cursor("DELETE FROM category WHERE id='$IdFromURL'", 'dd');
  if($Query){
    $_SESSION['SuccessMessage']="Category Deleted Successfully";
    Redirect_to("Categories.php");
  }else{
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("Categories.php");
  }
}

?>