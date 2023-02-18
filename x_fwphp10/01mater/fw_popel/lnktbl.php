<?php
// J:\awww\www\fwphp\01mater\fw_popel\lnktbl.php
/**
* Page lists all borrowed books (products in invoice items rows)
*
*/
              //include('common.inc.php');
// 
showHdr('Lended Books (products in invoice items rows)');
// Get all lended books list
$brs = Model::getBorrowers();
$totalBooks = Model::getBorrowerCount();



// display table
?>
Total borrowed books: <?=$totalBooks?>
<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>Title</td><td>Author</td><td>Borrowed by</td><td>Borrowed on</td><td>Return</td>
</tr>
<?php
// Iterate over every row and display it
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
                   //showFtr();
