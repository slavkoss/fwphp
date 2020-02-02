<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\B1_cre_upd.php
/**
* Page to add or edit an Block1 record
*/
include('common.inc.php');

// See if we have the author ID passed in the request
if (isset($_REQUEST['author'])) $id = (int)$_REQUEST['author'];
else $id = '';
if($id) {
  // We have the ID, get the author details from the table
  $q = $conn->query("SELECT * FROM authors WHERE id=$id");
  $author = $q->fetch(PDO::FETCH_ASSOC);
  $q->closeCursor();
  $q = null;
}
else {
  // We are creating a n ew book
  $author = array();
}
// Now see if the form was submitted
$warnings = array();
if(isset($_POST['submit']) and $_POST['submit']) {
// Validate every field
$warnings = array();
// First name should be non-empty
if(!$_POST['firstName']) {
$warnings[] = 'Please enter first name';
}
// Last name should be non-empty
if(!$_POST['lastName']) {
$warnings[] = 'Please enter last name';
}
// Bio should be non-empty
if(!$_POST['bio']) {
  $warnings[] = 'Please enter bio';
}
// If there are no errors, we can update the database
// If there was book ID passed, update that book
  if(count($warnings) == 0) {
    if(@$author['id']) {
    $sql = "UPDATE authors SET firstName=" .
    $conn->quote($_POST['firstName']) .
    ', lastName=' . $conn->quote($_POST['lastName']) .
    ', bio=' . $conn->quote($_POST['bio']) .
    " WHERE id=$author[id]";
    }
    else {
    $sql = "INSERT INTO authors(firstName, lastName, bio) VALUES(" .
    $conn->quote($_POST['firstName']) .
    ', ' . $conn->quote($_POST['lastName']) .
    ', ' . $conn->quote($_POST['bio']) .
    ')';
    }
    $conn->query($sql);
    header("Location: B1_tbl.php");
    exit;
  }
}
else {
// Form was not submitted.
// Populate the $_POST array with the author's details
$_POST = $author;
}
// 
showHeader('Edit Author');
// If we have any w arnings, display them now
if(count($warnings)) {
echo "<b>Please correct these errors:</b><br>";
foreach($warnings as $w)
{
echo "- ", htmlspecialchars($w), "<br>";
}
}
// Now display the form
?>
<form action="B1_cre_upd.php" method="post">
<table border="1" cellpadding="3">
<tr>
<td>First name</td>
<td>
<input type="text" name="firstName"
value="<?=
(isset($_POST['firstName']))?htmlspecialchars($_POST['firstName']):''?>">
</td>
</tr>
<tr>
<td>Last name</td>
<td>
<input type="text" name="lastName"
value="<?=
(isset($_POST['lastName']))?htmlspecialchars($_POST['lastName']):''?>">
</td>
</tr>
<tr>
<td>Bio</td>
<td>
<textarea name="bio"><?=
(isset($_POST['bio']))?htmlspecialchars($_POST['bio']):''?>
</textarea>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="Save">
</td>
</tr>
</table>
<?php if(@$author['id']) { ?>
<input type="hidden" name="author" value="<?=$author['id']?>">
<?php } ?>
</form>
<?php
// Display footer
showFooter();


/*
while($r = $q->fetch(PDO::FETCH_ASSOC))
{
?>
<tr>
<td><?=htmlspecialchars($r['firstName'])?></td>
<td><?=htmlspecialchars($r['lastName'])?></td>
<td><?=htmlspecialchars($r['bio'])?></td>
<td>
<a href="B1_cre_upd.php?author=<?=$r['id']?>">Edit</a>
</td>
</tr>
<?php
}
*/


