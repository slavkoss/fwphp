<?php
$title='Blog' ;
require_once("ahdr.php");


if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $ConnectingDB;
  $Query=get_cursor("UPDATE comments SET status='OFF' WHERE id='$IdFromURL'", 'uu');

  if($Query){
    $_SESSION["SuccessMessage"]="Comment Dis-Approved Successfully";
    Redirect_to("Comments.php");
  }else{
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("Comments.php");
  }
   
}

?>