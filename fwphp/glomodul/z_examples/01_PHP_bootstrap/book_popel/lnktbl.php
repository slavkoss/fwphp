<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\lnktbl.php
/**
* Page lists all borrowed books

*/
include('common.inc.php');
// 
showHeader('Lended Books');
// Get all lended books list
$brs = Model::getBorrowers();
$totalBooks = Model::getBorrowerCount();
// now create the table
?>
Total borrowed books: <?=$totalBooks?>
<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>Title</td>
<td>Author</td>
<td>Borrowed by</td>
<td>Borrowed on</td>
<td>Return</td>
</tr>
<?php
// Now iterate over every row and display it
while($br = $brs->fetch())
{
  $b = $br->getDetailByID();
  $a = $b->getAuthor();
  ?>
  <tr>
  <td><?=htmlspecialchars($b->title)?></td>
  <td><?=htmlspecialchars("$a->firstName $a->lastName")?></td>
  <td><?=htmlspecialchars($br->name)?></td>
  <td><?=date('Y.m.d', $br->dt)?></td>
  <td>
  <a href="lnktbl_delrec.php?borrower=<?=$br->id?>">Return</a>
  </td>
  </tr>
<?php
}
?>
</table>
<?php
// Display footer
showFooter();
