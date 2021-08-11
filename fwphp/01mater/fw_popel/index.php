<?php
/**
 * J:\awww\www\fwphp\01mater\fw_popel\index.php
 * was in J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out
 * php 7
 * This page lists books in page Block2, was b ooks.php. Modifying Frontend to Use Model.
 *
 * Single module entry point J:\awww\www\fwphp\01mater\fw_popel\index.php
 * See 2007_Popel_Learning PHP Data Objects.pdf  2007 year, still relevant !!
 * PHP version 5.2.4 has been released 31 August 2007. 
 *
*/

$path_rel_img = '/zinc/img/';

// ************************************************
// 1. R O U T I N G  & dispatching to no html : link aliases 
// ************************************************
$akc = '' ;
//$idprod_todel = '' ;

if (count($_GET) > 0) 
{
  $get = $_GET ?? '' ;
                           //var_dump( $get ) ;

  $akc = $get['p'] ?? '' ;
  if (!$akc) {
    $akc = 'delproduct' ; 
    if (isset($get['delproduct'])) {
      $idprod = $get['delproduct'] ;
      $idprod_todel = htmlspecialchars($idprod) ;
    }
  }
  $akc = htmlspecialchars($akc) ;
}
//req. once mdl, c onnparams, s howHeader, s howFooter, s howError, e xceptionHandler, $conn c onnobj glob.var
include('common.inc.php');

switch ($akc): // true
  case 'delproduct' : 
  Model::delProduct($idprod_todel);
  header("Location: index.php"); //break ; // no top toolbar

  case 'exp_B2_xml' : include ('exp_B2_xml.php') ;
  exit(0) ; //break ;

default: // b1b2flat
  showHdr('Code skeleton for Borrowed Books or Invoice items or Msgs or Todo-done  šđčćž');
  ?>
  <a href="index.php">BOOKS (products, B2) & Authors (B1)</a>&nbsp;&nbsp;&nbsp;
  <a href="?p=b1_tbl">AUTHORS (suppliers, material docs, B1)</a>&nbsp;&nbsp;&nbsp;
  <a href="?p=lnktbl">BORROWERS (invoiceItms, B3)</a>
   &nbsp;&nbsp;&nbsp;
  <a href="?p=exp_B2_xml">EXPORT B2->XML</a>
  <br><br>
  <?php
  break ;
endswitch ;




//if (isset($_REQUEST['del detid'])) Model::delDetail($_REQUEST['del detid']);
// Get books list



?>

<?php
// ************************************************
// 2. D I S P A T C H I N G : link aliases
// ************************************************
switch ($akc): // true
  case 'b1b2tree' :
  $idfromurl = $_GET['id'] ?? '' ;
  $idfromurl = (int)htmlspecialchars($idfromurl) ;
  include ('b1b2tree_B1_profile.php') ;
  break ;

  case 'b1_tbl' : include ('B1_tbl.php') ;  break ;
  case 'lnktbl' : include ('lnktbl.php') ;  break ;
  //case 'exp_B2_xml' : include ('exp_B2_xml.php') ;  break ;

default: // b1b2flat
  // ************************************************
  // H T M L  T A B L E
  // ************************************************
  ?>
  <a href="B2_cre_upd.php">Add book</a> Total books: <?=Model::getDetailsCount()?>
  <br><br>

  <table width="100%" border="1" cellpadding="3">
    <tr style="font-weight: bold">
    <td>Cover</td><td>Author and Title</td><td>ISBN</td><td>Publisher</td><td>Year</td>
    <td>Summary</td><td>Copies</td><td>Lend</td><td>Edit</td>
    </tr>



  <?php
  $books = Model::getDetails();
  // iterate over every r o w and display it
  while($b = $books->fetch()):
  {
    $a = $b->getAuthor();
    ?>
    <tr>

      <td>
        <?php if($b->coverMime) {
           //for BLOB, see Working_with_BLOBs.php: <img src="showCover.php?book=<=$b->id>">
           ?><img width="200px" src="<?=$path_rel_img?><?=$b->coverimgname?>"><?php
        } else { ?> no picture <?php } ?>
      </td>
      <td>
        <!-- $_SERVER['PHP_SELF'] eg /fwphp/glomodul/z_examples/01_phpinfo.php
             link alias b1b2 tree
        -->
        <?=htmlspecialchars("$a->firstName $a->lastName")?>
        <a href="?p=b1b2tree&id=<?=$a->id?>">all books</a>
          &nbsp;id=<?=$a->id?>
        <br/><b><?=htmlspecialchars($b->title)?></b>
      </td>

      <td><?=htmlspecialchars($b->isbn)?>
      <a href="?delproduct=<?=$b->id?>"><span style="color:red;">Delete</a> &nbsp;id=<?=$b->id?>
      </td>

      <td><?=htmlspecialchars($b->publisher)?></td>

      <td><?=htmlspecialchars($b->year)?></td>

      <td width="40%"><?=nl2br(htmlspecialchars($b->summary))?></td>

      <td><?=$b->copies?></td>

      <td>
      <a href="lnktbl_crerec.php?book=<?=$b->id?>">Lend</a><br />=Bill<br />item
      </td>

      <td>
      <a href="B2_cre_upd.php?bookid=<?=$b->id?>&authorid=<?=$a->id?>">Edit</a> book
      </td>

      </tr>
  <?php
  } endwhile ;
  ?>

  </table>


   <?php
   break ;
endswitch ;

//exit(0) ;
// Display footer
                          //showFtr();
?>


</body>
</html>
