<?php
// b ooks.php Modifying the Frontend to Use the Model  
/**
* Page lists Block2
*/

$path_rel_img = '/zinc/img/';

include('common.inc.php');

showHeader('Borrowed Books or Msgs or Todo-done or Invoice items šđčćž');

if (isset($_REQUEST['deldetid'])) Model::delDetail($_REQUEST['deldetid']);

// Get books list
$books = Model::getDetails();



// c r e a t e  h t m l  table
?>
<a href="B2_cre_upd.php">Add book...</a>
Total books: <?=Model::getDetailsCount()?>


<table width="100%" border="1" cellpadding="3">
  <tr style="font-weight: bold">
  <td>Cover</td>
  <td>Author and Title</td>
  <td>ISBN</td>
  <td>Publisher</td>
  <td>Year</td>
  <td>Summary</td>
  <td>Copies</td>
  <td>Lend</td>
  <td>Edit</td>
  </tr>

<?php
// iterate over every r o w and display it
while($b = $books->fetch())
{
  $a = $b->getAuthor();
  ?>
  <tr>
    <td>
      <?php 
        //if($b->coverMime) {
        if('') {
           //for BLOB, see Working_with_BLOBs.php: <img src="showCover.php?book=<=$b->id>">
         ?><img width="200px" src="<?=$path_rel_img?><?=$b->coverimgname?>"><?php
      } else { ?> no picture <?php } ?>
    </td>
    <td>
      <a href="B1_profile.php?id=<?=$a->user_id?>">
        <?=htmlspecialchars("$a->user_email $a->user_name")?></a>
        &nbsp;id=<?=$a->id?>
      <br/><b><?=htmlspecialchars($b->title)?></b>
    </td>
    <td><?=htmlspecialchars($b->isbn)?>
    <a href="index.php?deldetid=<?=$b->id?>"><span style="color:red;">Delete</a> &nbsp;id=<?=$b->id?>
    </td>
    <td><?=htmlspecialchars($b->publisher)?></td>
    <td><?=htmlspecialchars($b->year)?></td>
    <td width="40%"><?=nl2br(htmlspecialchars($b->summary))?></td>
    <td><?=$b->copies?></td>
    <td>
    <a href="lnktbl_crerec.php?book=<?=$b->id?>">Lend</a><br />=Bill<br />item
    </td>
    <td>
    <a href="B2_cre_upd.php?bookid=<?=$b->id?>&authorid=<?=$a->id?>">Edit</a>
    </td>
    </tr>
<?php
}
?>

</table>


<?php
// Display footer
showFooter();
?>
