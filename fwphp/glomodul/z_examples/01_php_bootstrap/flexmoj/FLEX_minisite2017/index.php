<?php
$inc = 'v_home' ;
if (isset($_GET['v'])) { $inc = $_GET['v'] ;} //v_home, v_about...

include('hdr.php');

include($inc .'.php');

include('ftr.php');
?>

