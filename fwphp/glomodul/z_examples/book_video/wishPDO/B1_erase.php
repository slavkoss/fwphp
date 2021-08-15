<?php
require_once("includes/db.php");
WishDB::getInstance()->delete_wisher($_POST['wisherID']);
header('Location: B1_tbl_edit.php' );
?>
