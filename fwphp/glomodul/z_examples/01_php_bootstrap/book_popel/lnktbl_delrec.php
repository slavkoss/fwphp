<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\lnktbl_delrec.php
/**
* Page "returns" a book back to the library


*/
// 
include('common.inc.php');
// First see if the request contains the b orrowers ID
// Return to b ooks.php if not
$id = (int)$_REQUEST['borrower'];
$borrower = Model::getBorrower($id);
if(!$borrower) {
header("Location: index.php");
exit;
}
// Return the book and redirect to b ooks.php
// If anything happens, the exception will be
// handled automatically
$borrower->returnBook();
header("Location: index.php");
