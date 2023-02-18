<?php
// J:\awww\www\zbig\04knjige\dynamic_webs_design_nekretn\ch10NEKRETNINE\cre_upd_del.php
$myData = $_POST['data'];  //This recieves the data passed from the HTML form
list($userid, $password) = explode('|', $myData);

include "fns.php";
//***************************************
//Add Guestbook Information to File
//***************************************
$statement  = "INSERT INTO users (user_id, user_pass, user_name) VALUES(99, '99','99')";
//"DELETE FROM `users` WHERE `users`.`user_id` = 99"?
/*$statement  = "INSERT INTO users ";
$statement .= "(user_id, user_pass) ";
$statement .= "VALUES (";
$statement .= "'".$userid."', '".$password."')";*/

$rtn = insDelUpd($statement);
print "Insert Result Code: $rtn";

?>