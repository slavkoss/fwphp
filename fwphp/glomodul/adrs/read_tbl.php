<?php
//J:\awww\www\fwphp\glomodul\adrs\read_tbl.php
//  <!--            display table (was and r o w c r e frm)  -->
declare(strict_types=1);

namespace B12phpfw\module\adrs ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ; // init, setings, utils
use B12phpfw\dbadapter\adrs\Tbl_crud as utl_adrs ;  //Tbl_ crud_ adrs is model (fns) for song tbl

$tbl='song';

$rcount = utl_adrs::rrcnt($tbl) ;
$cursor = utl_adrs::get_all($other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

$pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ .' ('. __METHOD__ .')';
?>
<div class="container">

  <b><span id="ajax_pgtitle_box">Adressess (Links) count : </span><?=$rcount?></b>
         <!--input type="submit" name="submit_add_song" value="Add row" /-->

    &nbsp;&nbsp;&nbsp;<a href="<?=$pp1->module_url.QS.'i/cc/'?>">Add row</a>

                      <!-- finish this if Ajax is needed : -->
                      &nbsp;&nbsp; <div style="display: inline;" >
                        <!--button id="ajax_rcount_btn" 
                                title="<?='Display rows count via jQuery Ajax in ajax_rcount_box 
                    '. $pp1->module_url.QS?>i/ajaxcountr/">
                          Ajax
                        </button-->
                        <span id="ajax_rcount_box"></span>
                      </div>
  &nbsp; Table below is displayed with <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple-DataTables</a> 
 

  <!--        main content output : List of songs
    <table class="table table-sm table-striped" id="table">
  -->
  <div class="xxbox">


    <table id="datatablesSimple">


        <thead style="background-color: #ddd; font-weight: bold;">
     <tr><td>Id</td><td>Artist</td><td>Track</td><td>Link</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        </thead>

      <tbody>


      <?php
      while ( $r = utl_adrs::rrnext($cursor) and isset($r->id) ): 
      { 
        $id = (int)($r->id) ; //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
        //$id = utl::escp($r->id) ; //Argument #1 ($string) must be of type string, int given
        ?>
        <tr>
          <td><?=$id?></td>
          <td><?php if (isset($r->artist)) echo utl::escp($r->artist); ?></td>
          <td><?php if (isset($r->track)) echo utl::escp($r->track); ?></td>
          <td>
              <?php if (isset($r->link)) { ?>
                <a href="<?=utl::escp($r->link)?>">
                   <?=utl::escp($r->link)?></a>
              <?php } ?>
          </td>

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


    <p>This page was shown by View script : <?=__FILE__?></p>
</div>
