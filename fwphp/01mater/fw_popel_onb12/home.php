<?php
/**
 *  P R O D U C T S  A N D  S U P P L I E R S  flat tbl display
 *  <!--    (was and r o w c r e frm)  -->
 */
declare(strict_types=1);

namespace B12phpfw\module\fw_popel_onb12 ;

use B12phpfw\core\zinc\Config_allsites as utl ; // init, setings, utilities
use B12phpfw\core\zinc\Db_allsites as utldb ;   // model (fns) for PDO CRUD all t b ls
// model (CRUDfns) for books tbl :
use B12phpfw\dbadapter\fw_popel_onb12\Tbl_crud  as Tbl_crud_waybill ; 


$path_rel_img = '/zinc/img/';


//         t b l rows count :
$tbl='books'; //products, suppliers are authors
$rcount = Tbl_crud_waybill::rrcnt($tbl) ; //Waybill items
?>
    <h1>Waybill items homepage - (LOV of) all products with suppliers</h1>

<div class="container">

  <b><span id="ajax_pgtitle_box">Product count : </span><?=$rcount?></b>

    &nbsp;&nbsp;&nbsp;<a href="<?=$pp1->module_url.QS.'i/cc/'?>">Add book (product)</a>
</div>


  <!--        main content output : List of songs  -->
  <div class="xxbox">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
    <td>Cover</td><td>Author and Title</td><td>ISBN</td><td>Publisher</td><td>Year</td>
    <td>Summary</td><td>Copies</td><td>AddItm</td><td>Edit</td>
        </thead>

    <tbody>

    <?php
    // SQL JOIN IS NOT RECOMMENDED :
    // cursor products :
    $c_products = Tbl_crud_waybill::rr($sellst='*', $qrywhere= "'1'='1'" // ORDER BY aname
      , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    //foreach ($songs as $song) 
    while ( $r = utldb::rrnext($c_products) and isset($r->id) ): 
    { 
      //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
      $r->id           = (int)utl::escp($r->id) ;
      $r->author       = (int)utl::escp($r->author) ;
      $r->coverMime    = utl::escp($r->coverMime) ;
      $r->coverimgname = utl::escp($r->coverimgname) ;
      $r->title        = utl::escp($r->title) ;
      $r->isbn         = utl::escp($r->isbn) ;
      $r->publisher    = utl::escp($r->publisher) ;
      $r->year         = utl::escp($r->year) ;
      $r->summary      = utl::escp($r->summary) ;
      $r->copies       = utl::escp($r->copies) ;

      // $r_supl = $book->getAuthor(); // in  B 1 2 p h p f w  is also one statement :
      $r_supl = Tbl_crud_waybill::rr_supplier_byid( $r->author
                      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
      $r_supl->id        = (int)utl::escp($r_supl->id) ;
      $r_supl->firstName = utl::escp($r_supl->firstName) ;
      $r_supl->lastName  = utl::escp($r_supl->lastName) ;
      ?>

    <tr>

      <td>
        <?php if($r->coverMime) {
           //for BLOB, see Working_with_BLOBs.php: <img src="showCover.php?book=<=$r->id>">
           ?><img width="200px" src="<?=$path_rel_img?><?=$r->coverimgname?>"><?php
        } else { ?> no picture <?php } ?>
      </td>

      <td>
        <!-- $_SERVER['PHP_SELF'] is eg /fwphp/glomodul/z_examples/01_phpinfo.php
             link alias b1b2 tree
        -->
        <?=$r_supl->firstName .' '. $r_supl->lastName?>
        <a href="?p=b1b2tree&id=<?=$r_supl->id?>">all books</a>
          &nbsp;id=<?=$r_supl->id?>
        <br/><b><?=$r->title?></b>
      </td>
      <td><?=htmlspecialchars($r->isbn)?>
      <a href="?delproduct=<?=$r->id?>"><span style="color:red;" title="Delete book, product">Delete</a> &nbsp;id=<?=$r->id?>
      </td>

      <td><?=htmlspecialchars($r->publisher)?></td>

      <td><?=htmlspecialchars($r->year)?></td>

      <td width="35%"><?=nl2br(htmlspecialchars($r->summary))?></td>

      <td><?=$r->copies?></td>

      <td width="5%">
      <a href="lnktbl_crerec.php?book=<?=$r->id?>" title="Waybill item, Bill of lading">Lend</a> (sell prod.)
      </td>

      <td width="5%">
      <a href="B2_cre_upd.php?bookid=<?=$r->id?>&authorid=<?=$r_supl->id?>" title="Edit book, product">Edit</a> book (prod.)
      </td>

      </tr>


    <?php } endwhile; ?>
    </tbody>
    </table>
  </div>


    <p>You are in View: <?=__FILE__?></p>
</div>





    <br><br><br>$pp1->module_relpath below site root = <?=$pp1->module_relpath?><br>
    $pp1->module_url=<?=$pp1->module_url?><br>
    
    Namespaces are FUNCTIONAL, not POSITIONAL (not dir tree).<br>
    Each module (is like Oracle Forms .fmb) is in own folder, not all modules in 3 dirs: M, V, C.<br>

</div>



</body>
</html>