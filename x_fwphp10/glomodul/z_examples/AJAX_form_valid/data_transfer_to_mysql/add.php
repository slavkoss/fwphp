<?php
//add.php
include('conn.php');
$firstName = cleanup($_POST['firstName']);
$lastName = cleanup($_POST['lastName']);
$age = cleanup($_POST['age']);

$sql = "INSERT INTO users (`firstName`, `lastName`, `age`) VALUES ('".$firstName."','".$lastName."','".$age."')";
if(mysqli_query($conn, $sql)){
    echo 'success';
}else{
    echo 'error '. mysqli_error($conn);
}

mysqli_close($conn);


?>