<?php

//This recieves the data passed from JavaScript
//if (is_object($_POST['data'])) { 
   //$myData = json_decode($_POST['data']) ;
//} else { 
   $myData = $_POST['data'] ; 
//}

print "<p>Hello from ". basename(__FILE__) .", THIS IS : " ;
  print_r( $myData );
print "</p>";


/*
$myObj = new stdClass();
$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj);

echo $myJSON;
*/


?>