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
    <a href="<?=$pp1->cc_frm?>" class="btn_green">Add product (book)</a>
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
    <td>Picture (Cover)</td><td>Product name (Title)</td><td>Mark (ISBN)</td><td>Producer (publisher)</td><td>Year</td>
    <td>Summary</td><td>On stock (Copies)</td><!--td>AddItm</td--><td>Edit product</td>
        </thead>

    <tbody>

    <?php
    // SQL JOIN IS NOT RECOMMENDED :
    // cursor products :
    $c_products = utl_module::get_cursor($sellst='*', $qrywhere= "'1'='1'" // ORDER BY aname
      , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    //foreach ($songs as $song) 
    while ( $r = utldb::rrnext($c_products) and isset($r->id) ): 
    { 
      $model_fns_akc = 'escp_all' ;
      $r = utl::escp_row($r) ; //require(__DIR__ .'/model_fns.php') ;
      $r->id           = (int)$r->id ;
      $r->author       = (int)$r->author ;
      ?>

    <tr>

      <td>
        <?php if($r->coverMime) {
           //for BLOB, see Working_with_BLOBs.php: <img src="showCover.php?book=<=$r->id>">
           ?><img width="200px" src="<?=$path_rel_img?><?=$r->coverimgname?>"><?php
        } else { ?> no picture <?php } ?>
      </td>

        <!-- $_SERVER['PHP_SELF'] is eg /fwphp/glomodul/z_examples/01_phpinfo.php
             link alias b1b2 tree
        <?=$r_supl->firstName .' '. $r_supl->lastName?>
        <a href="?p=b1b2tree&id=<?=$r_supl->id?>">all books</a>
          &nbsp;id=<?=$r_supl->id?>
        -->
      <td>
        <br/><b><?=$r->title?></b>
      </td>

      <!--td>
      -->
        <td><?=$r->isbn?>
           <a id="erase_row" 
              onclick="var yes ; yes = jsmsgyn('Erase row <?=$r->id?>?','') ; if (yes == '1') { location.href= '<?=$pp1->dd.$r->id?>/'; }"
              title="Delete tbl row ID=<?=$r->id?>"
           ><span style="color: red">Del id <?=$r->id?></span></a>
        </td>

      <td><?=$r->publisher?></td>

      <td><?=$r->year?></td>

      <td width="35%"><?=nl2br($r->summary)?></td>

      <td><?=$r->copies?></td>

      <!-- $pp1->uu_frm.QS?>?bookid=<=$r->id  $pp1->module_url.QS.'i/uu/t/song/id/'.$id 
           http://dev1:8083/fwphp/01mater/book/index.php?i/uu_frm/id/8
      -->
      <td width="5%">
      <a href="<?=$pp1->uu_frm.$r->id?>" title="Edit book, product">Edit</a> 
      </td>

      </tr>


    <?php } endwhile ; ?>
    </tbody>
    </table>
  </div>


    <p>This page is displayed by View script: <?=__FILE__?></p>
</div>





</div>



</body>
</html>