<?php
date_default_timezone_set("Asia/Karachi");
$CurrentTime=time();
/*

*/
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
 //This is the SQL Format for Date and Time 
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
echo $DateTime;
?>
