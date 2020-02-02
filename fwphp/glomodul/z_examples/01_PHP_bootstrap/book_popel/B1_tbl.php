<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\B1_tbl.php
/**
* Page lists Block1
*/
include('common.inc.php');
// 
showHeader('Authors');
// Get number of authors and issue the query
$authors = Model::getAuthors();
// now create the table
?>
<a href="B1_cre_upd.php">Add Author...</a> &nbsp;Total authors: <?=Model::getAuthorCount()?>

<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>First Name</td>
<td>Last Name</td>
<td>Bio</td>
<td>Edit</td>
</tr>
<?php
// Now iterate over every row and display it
while($a = $authors->fetch())
{
?>
<tr>
<td><?=htmlspecialchars($a->firstName)?></td>
<td><?=htmlspecialchars($a->lastName)?></td>
<td><?=htmlspecialchars($a->bio)?></td>
<td><a href="B1_cre_upd.php?author=<?=$a->id?>">Edit</a><td>
</tr>
<?php
}
?>
</table>


<?php
// Display footer
showFooter();
