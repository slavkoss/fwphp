<?php

list($akc, $user_text) = explode('|', $_REQUEST['user_text']);
$response = strtoupper( $user_text ) ;
echo $response ;

//if (isset($_GET['user_text'])) { $data = $_GET ;
?>

