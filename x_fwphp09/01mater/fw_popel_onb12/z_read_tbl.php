<?php
// 
//  <!--            display table (was and r o w c r e frm)  -->
declare(strict_types=1);

namespace B12phpfw\module\fw_popel_onb12 ;

use B12phpfw\core\zinc\Config_allsites as utl;                 // init, setings, utils
use B12phpfw\core\zinc\Db_allsites as utldb ;                     // model (fns) for all tbls
use B12phpfw\dbadapter\fw_popel_onb12\Tbl_crud  as Tbl_crud_waybill ; // model (fns) for song tbl

$tbl='song';

$rcount = Tbl_crud_waybill::rrcnt($tbl) ;
$cursor = Tbl_crud_waybill::rr($sellst='*', $qrywhere= "'1'='1'" // ORDER BY aname
  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

?>
<div class="container">

  <b><span id="ajax_pgtitle_box">Adressess (Links) count : </span><?=$rcount?></b>
         <!--input type="submit" name="submit_add_song" value="Add row" /-->
    &nbsp;&nbsp;&nbsp;<a href="<?=$pp1->module_url.QS.'i/cc/'?>">Add row</a>

  &nbsp;&nbsp; <div style="display: inline;" >
    <button id="ajax_rcount_btn" 
            title="<?=$pp1->module_url.QS?>i/ajaxcountr/">
      Display rows count via jQuery Ajax in span id="ajax_rcount_box"
    </button>
    <span id="ajax_rcount_box"></span>
  </div>


  <!--        main content output : List of songs  -->
  <div class="xxbox">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
     <tr><td>Id</td><td>Artist</td><td>Track</td><td>Link</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        </thead>

    <tbody>
    <?php
    //foreach ($songs as $song) 
    while ( $r = utldb::rrnext($cursor) and isset($r->id) ): 
    { 
      $id = utl::escp($r->id) ; //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
      ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php if (isset($r->artist)) echo utl::escp($r->artist); ?></td>
        <td><?php if (isset($r->track)) echo utl::escp($r->track); ?></td>
        <td>
            <?php if (isset($r->link)) { ?>
              <a href="<?=utl::escp($r->link)?>">
                 <?=utl::escp($r->link)?></a>
            <?php } ?>
        </td>
        <!-- 
          <td><a href="<=$pp1->module_url . QS . 'i/dd/t/song/id/'.$id?>">Del</a></td>
          $pp1->ldd_admins.$id
          <=str_repeat('&nbsp;', 8 - strlen($id)) . $id ?>
        -->
        <td>
           <a id="erase_row" class="btn btn-danger"
              onclick="var yes ; yes = jsmsgyn('Erase row <?=$id?>?','') ;
              if (yes == '1') { location.href= '<?=$pp1->module_url.QS.'i/dd/t/song/id/'.$id?>/'; }"
              title="Delete tbl row ID=<?=$id?>"
           ><b style="color: red">Del</b></a>
        </td>
        
        <td><a href="<?=$pp1->module_url.QS.'i/uu/t/song/id/'.$id?>">Edit</a></td>
      </tr>
    <?php } endwhile; ?>
    </tbody>
    </table>
  </div>


    <p>You are in View: <?=__FILE__?></p>
</div>
