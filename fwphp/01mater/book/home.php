<?php
/**
 *  P R O D U C T S  A N D  S U P P L I E R S  flat tbl display
 *  <!--    (was and r o w c r e frm)  -->
 */
declare(strict_types=1);

namespace B12phpfw\module\book ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ; // init, setings, utilities
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;   // model (fns) for PDO CRUD all t b ls
// model (CRUDfns) for waybill compound module (more tbls) :
use B12phpfw\dbadapter\book\Tbl_crud  as utl_module ; 


$path_rel_img = '/vendor/b12phpfw/img/';


//         t b l rows count :
$tbl='books'; //products, suppliers are authors
$rcount = utl_module::rrcnt($tbl) ; //Waybill items
?>
    <h2 style="text-align: center;">Books homepage</h2>

<div class="container">
  <b><span id="ajax_pgtitle_box">Product count : </span><?=$rcount?></b>
    &nbsp;&nbsp;&nbsp;
    <a href="<?=$pp1->cc_frm?>" class="btn_green">Add book (product)</a>
                <!-- 
                     https://www.w3schools.com/css/tryit.asp?filename=trycss_buttons_basic
                        <button>Default Button</button>
                        <a href="#" class="button">Link Button</a>
                        <button class="button">Button</button>
                        <input type="button" class="button" value="Input Button">
                -->
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
    $c_products = utl_module::rr($sellst='*', $qrywhere= "'1'='1'" // ORDER BY aname
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
      $r_supl = utl_module::rr_supplier_byid( $r->author
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


    <p>This page is displayed by View script: <?=__FILE__?></p>
</div>





    <br><br><br>$pp1->module_relpath below site root = <?=$pp1->module_relpath?><br>
    $pp1->module_url=<?=$pp1->module_url?><br>
    
    Namespaces are FUNCTIONAL, not POSITIONAL (not dir tree).<br>
    Each module (is like Oracle Forms .fmb) is in own folder, not all modules in 3 dirs: M, V, C.<br>

</div>



</body>
</html>