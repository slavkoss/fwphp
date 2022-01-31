<?php

//echo 'test' ;
//print_r($_REQUEST) ;
list($akc, $user_text) = explode('|', $_REQUEST['user_text']);
//$akc ='1ST PARAM' because   url, urlqry, callfn, reqtype, getxml :
//   onkeyup="reqsend('server2.php','user_text=1st param'+ '|' + document.getElementById('user_text').value + '|','show_charbychar','post','0')"
$response = strtoupper( $user_text ) ;
echo $response ;
//if (isset($_GET['user_text'])) { $data = $_GET ;


?>

