<?php
$title='Delete Post' ;
require_once("ahdr.php");

Confirm_Login();


//if(isset($_POST["Submit"]))
if(isset($_GET['Delete']))
{

    $DeleteFromURL=$_GET['Delete'];
    
    $Query=get_cursor("DELETE FROM admin_panel WHERE id='$DeleteFromURL'", 'dd');

    if($Query){
      $_SESSION['SuccessMessage']="Post Deleted Successfully";
      Redirect_to("Dashboard.php");
    }else{
      $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
      Redirect_to("Dashboard.php");
      
    }
    
  
  
}

?>

