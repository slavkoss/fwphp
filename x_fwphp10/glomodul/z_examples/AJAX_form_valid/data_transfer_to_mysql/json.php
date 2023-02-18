<?php
include('conn.php');

$sql = "select * from users";
$result = mysqli_query($conn, $sql) or die ("error" . mysqli_error($conn));
$myArray = array();
while($row = mysqli_fetch_assoc($result)){
    $myArray[] = $row;
}
mysqli_close($conn);



header('Content-Type: application/json');
//$json = file_get_contents('json.json');
/*
$myArray = array("user1" => array("firstName" => "Mike2", "lastName" => "Smith" , "age" => 34),"user2" => array("firstName" => "Mike2", "lastName" => "Smith" , "age" => 34));
*/
$json = json_encode($myArray);
echo $json;
?>