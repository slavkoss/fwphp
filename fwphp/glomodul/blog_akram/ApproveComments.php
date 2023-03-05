<?php
$title='Activate comments' ;
require_once("ahdr.php");


if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $ConnectingDB;
    $Admin=$_SESSION["Username"];
$Query=get_cursor("UPDATE comments SET status='ON', approvedby='$Admin' WHERE id='$IdFromURL'", 'uu');
if($Query){
	$_SESSION["SuccessMessage"]="Comment Approved Successfully";
	Redirect_to("Comments.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("Comments.php");
		
	}
    
    
    
    
    
}

?>