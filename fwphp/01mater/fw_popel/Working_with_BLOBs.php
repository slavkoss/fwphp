<?php
/**
* J:\awww\www\fwphp\01mater\fw_popel\Working_with_BLOBs.php
* This page allows adding or editing a book
* PDO Library Management example application
* @author Dennis Popel


Working with BLOBs

$blob = fopen('/path/to/file.jpg', 'rb');
$stmt = $conn->prepare("INSERT INTO images(data) VALUES(?)");
$stmt->bindParam(1, $blob, PDO::PARAM_LOB);
$stmt->execute();

$id = (int)$_GET['id'];
$stmt = $db->prepare("SELECT data FROM images WHERE id=$id");
$stmt->execute();
$stmt->bindColumn(1, $blob, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);
$data = stream_get_contents($blob);
*/
// Don't forget the include
include('common.inc.php');
// See if we have the book ID passed in the request
$id = (int)$_REQUEST['book'];
if($id) {
// we have the ID, get the book details from the table
$q = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $q->fetch(PDO::FETCH_ASSOC);
$q->closeCursor();
$q = null;
}
else {
// we are creating a new book
$book = array();
}
// Now get the list of all authors' first and last names
// we will need it to create the dropdown box for author
$authors = array();
$q = $conn->query("SELECT id, lastName, firstName FROM authors ORDER
BY lastName, firstName");
$q->setFetchMode(PDO::FETCH_ASSOC);
while($a = $q->fetch())
{
$authors[$a['id']] = "$a[lastName], $a[firstName]";
}
// Now see if the form was submitted
if($_POST['submit']) {
// Validate every field
$warnings = array();
// Title should be non-empty
if(!$_POST['title']) {
$warnings[] = 'Please enter book title';
}
// Author should be a key in the $authors array
if(!array_key_exists($_POST['author'], $authors)) {
$warnings[] = 'Please select author for the book';
}
// ISBN should be a 10-digit number
//if(!preg_match('~^\d{10}$~', $_POST['isbn'])) {
  if(count($_POST['isbn']) > 20) {
  $warnings[] = 'ISBN should be max 20 characters';
}
// Published should be non-empty
if(!$_POST['publisher']) {
$warnings[] = 'Please enter publisher';
}
// Year should be 4 digits
if(!preg_match('~^\d{4}$~', $_POST['year'])) {
$warnings[] = 'Year should be 4 digits';
}
// Summary should be non-empty
if(!$_POST['summary']) {
$warnings[] = 'Please enter summary';
}
// Now validate the file upload
$uploadSuccess = false;
if(is_uploaded_file($_FILES['cover']['tmp_name'])) {
// See if the file is an image
if(!preg_match('~image/.+~', $_FILES['cover']['type'])
|| filesize($_FILES['cover']['tmp_name']) > 24000) {
$warnings[] = 'Please upload an image file less than 24K
in size';
}
else {
// Set a flag that upload is successful
$uploadSuccess = true;
}
}
// If there are no errors, we can update the database
// If there was book ID passed, update that book
if(count($warnings) == 0) {
if(@$book['id']) {
$sql = "UPDATE books SET title=?, author=?, isbn=?,
publisher=?, year=?, summary=? WHERE
id=$book[id]";
}
else {
$sql = "INSERT INTO books(title, author, isbn, publisher,
year, summary) VALUES(?, ?, ?, ?, ?, ?)";
}
$stmt = $conn->prepare($sql);
// Now we are updating the DB.
// we wrap this into a try/catch block
// as an exception can get thrown if
// the ISBN is already in the table
try
{
$stmt->execute(array($_POST['title'], $_POST['author'],
$_POST['isbn'], $_POST['publisher'], $_POST['year'],
$_POST['summary']));
// If we are here that means that no error
// Now we can update the cover columns
// But first we have to get the ID of the newly inserted book
if(!@$book['id']) {
$book['id'] = $conn->lastInsertId();
}
// Now see if there was an successful upload and
// update cover image
if($uploadSuccess) {
$stmt = $conn->prepare("UPDATE books SET coverMime=?,
coverImage=? WHERE id=$book[id]");
$cover = fopen($_FILES['cover']['tmp_name'], 'rb');
$stmt->bindValue(1, $_FILES['cover']['type']);
$stmt->bindParam(2, $cover, PDO::PARAM_LOB);
$stmt->execute();
}
// We can return back to books listing
header("Location: books.php");
exit;
}
catch(PDOException $e)
{
$warnings[] = 'Duplicate ISBN entered. Please correct';
}
}
}
else {
// Form was not submitted.
// populate the $_POST array with the book's details
$_POST = $book;
}
// Display the header
showHdr('Edit Book');
// If we have any warnings, display them now
if(count($warnings)) {
echo "<b>Please correct these errors:</b><br>";
foreach($warnings as $w)
{
echo "- ", htmlspecialchars($w), "<br>";
}
}
// Now display the form
?>
<form action="editBook.php" method="post"
enctype="multipart/form-data">
<table border="1" cellpadding="3">
<tr>
<td>Title</td>
<td>
<input type="text" name="title"
value="<?=htmlspecialchars($_POST['title'])?>">
</td>
</tr>
<tr>
<td>Author</td>
<td>
<select name="author">
<option value="">Please select...</option>
<?php foreach($authors as $id=>$author)
{ ?>
<option value="<?=$id?>"
<?= $id == $_POST['author'] ? 'selected' : ''?>>
<?=htmlspecialchars($author)?>
</option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td>ISBN</td>
<td>
<input type="text" name="isbn"
value="<?=htmlspecialchars($_POST['isbn'])?>">
</td>
</tr>
<tr>
<td>Publisher</td>
<td>
<input type="text" name="publisher"
value="<?=htmlspecialchars($_POST['publisher'])?>">
</td>
</tr>
<tr>
<td>Year</td>
<td>
<input type="text" name="year"
value="<?=htmlspecialchars($_POST['year'])?>">
</td>
</tr>
<tr>
<td>Summary</td>
<td>
<textareaname="summary"><?=htmlspecialchars($_POST['summary'])?>
</textarea>
</td>
</tr>
<tr>
<td>Cover Image</td>
<td><input type="file" name="cover"></td>
</tr>
<?php if(@$book['coverMime'])
{ ?>
<tr>
<td>Current Cover</td>
<td><img src="showCover.php?book=<?=$book['id']?>"></td>
</tr>
<? } ?>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="Save">
</td>
</tr>
</table>
<?php if(@$book['id']) { ?>
<input type="hidden" name="book" value="<?=$book['id']?>">
<?php } ?>
</form>
<?php
// Display footer
showFtr();



<?php
/**
* This script will render a book's cover image
* PDO Library Management example application
* @author Dennis Popel
*/
// Don't forget the include
include('common.inc.php');
// See if we have the book ID passed in the request
$id = (int)$_REQUEST['book'];
$stmt = $conn->prepare("SELECT coverMime, coverImage FROM books
WHERE id=$id");
$stmt->execute();
$stmt->bindColumn(1, $mime);
$stmt->bindColumn(2, $image, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);
header("Content-Type: $mime");
echo $image;



<?php
/**
* This page lists all the books we have
* PDO Library Management example application
* @author Dennis Popel
*/
// Don't forget the include
include('common.inc.php');
// Display the header
showHdr('Books');
// Issue the query
$q = $conn->query("SELECT authors.id AS authorId, firstName,
lastName, books.* FROM authors, books WHERE
author=authors.id ORDER BY title");
$q->setFetchMode(PDO::FETCH_ASSOC);
// now create the table
?>
<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>Cover</td>
<td>Author and Title</td>
<td>ISBN</td>
<td>Publisher</td>
<td>Year</td>
<td>Summary</td>
<td>Edit</td>
</tr>
<?php
// Now iterate over every row and display it
while($r = $q->fetch())
{
?>
<tr>
<td>
<?php if($r['coverMime']) { ?>
<img src="showCover.php?book=<?=$r['id']?>">
<?php }
else
{ ?>
n/a
<? } ?>
</td>
<td>
<a href="author.php?id=<?=$r['authorId']?>">
<?=htmlspecialchars("$r[firstName] $r[lastName]")?></a><br/>
<b><?=htmlspecialchars($r['title'])?></b>
</td>
<td><?=htmlspecialchars($r['isbn'])?></td>
<td><?=htmlspecialchars($r['publisher'])?></td>
<td><?=htmlspecialchars($r['year'])?></td>
<td><?=htmlspecialchars($r['summary'])?></td>
<td>
<a href="editBook.php?book=<?=$r['id']?>">Edit</a>
</td>
</tr>
<?php
}
?>
</table>
<a href="editBook.php">Add book...</a>
<?php
// Display footer
showFtr();
