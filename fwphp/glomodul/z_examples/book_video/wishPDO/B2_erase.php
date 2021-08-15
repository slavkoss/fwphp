<?php
//session_start();
require_once dirname(dirname(dirname(__DIR__ )))."/vendor/taq/pdooci/src/PDO.php";
require_once("includes/db.php");
WishDB::getInstance()->delete_wish ($_POST['wishID']);
header('Location: B2_tbl_edit.php' );
?>
