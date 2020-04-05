<?php
//DB CRUD php script
include_once('dbconn.php'); //include_once('../includes/config.php');

$postedtxt=$db->real_escape_string($_POST['body']);
//$db->query("insert into ajax(a_post) values ('$postedtxt')");
//echo '$db->query("insert into ajax(a_post) values (\'$postedtxt\')");';
echo '--dbcrudscript (crud.php) SAYS: '
.'This txt is response ee value assigned in dbcrudscript which is in response JS variable in frm_ajaxscript. '
."\n"
.'Posted form variable value from frm_ajaxscript to dbcrudscript is "'.$postedtxt.'" which we use for crud rows in some dbtbl.'
."\n\n"
;


?>