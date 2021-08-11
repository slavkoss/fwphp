<?php
// J:\awww\www\fwphp\01mater\fw_popel\b1b2tree_B1_profile.php
/**
* Page shows B1 profile (f o r m)
*/
// 
          //include('common.inc.php');
// Get the author
         //$id = (int)$_REQUEST['id'];
$author = Model::getAuthor($idfromurl);
// see if the author is valid - if it's not, we have an invalid ID
if(!$author) {
  showHdr('Error');
  echo "Invalid Author ID supplied";
  showFtr();
  exit;
}

// we have no error
showHdr("Author: $author->firstName $author->lastName");
// Now get the number and fetch all his books
$books = $author->getDetails();
$totalBooks = $author->getDetailsCount();


// display details
?>
<h2>Books</h2>
<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>Title</td>
<td>ISBN</td>
<td>Publisher</td>
<td>Year</td>
<td>Summary</td>
</tr>
<?php
// Now iterate over every book and display it
while($b = $books->fetch())
{
?>
<tr>
<td><?=htmlspecialchars($b->title)?></td>
<td><?=htmlspecialchars($b->isbn)?></td>
<td><?=htmlspecialchars($b->publisher)?></td>
<td><?=htmlspecialchars($b->year)?></td>
<td><?=htmlspecialchars($b->summary)?></td>
</tr>
<?php
}
?>
</table>




<!-- display master -->
<h2>Author</h2>
<a href="B1_cre_upd.php?author=<?=$author->id?>">Edit author</a>
<br><br>
<table width="60%" border="1" cellpadding="3">
<tr>
<td><b>First Name</b></td>
<td><?=htmlspecialchars($author->firstName)?></td>
</tr>
<tr>
<td><b>Last Name</b></td>
<td><?=htmlspecialchars($author->lastName)?></td>
</tr>
<tr>
<td><b>Bio</b></td>
<td><?=htmlspecialchars($author->bio)?></td>
</tr>
<tr>
<td><b>Total books</td>
<td><?=$totalBooks?></td>
</tr>
</table>



<?php
// Display footer
showFtr();

