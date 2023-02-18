<?php
header('Content-Type: text/xml');
$vrijeme = date('H:i:s'); 
$file = basename(__FILE__) ;
?>
<?xml version="1.0"?>
<clock1>
   <timenow>
     Ispisala skripta: <?=$file?>
     Vrijeme na serveru: <?=$vrijeme?>
   </timenow>
</clock1>



<!--table border="1">
  <tr><th>Broj</th><th>Datum</th></tr>
</table-->
