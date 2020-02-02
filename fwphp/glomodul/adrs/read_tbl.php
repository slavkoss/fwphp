<?php
//J:\awww\www\fwphp\glomodul\adrs\read_tbl.php
//  <!--            display table (was and r o w c r e frm)  -->
namespace B12phpfw ;
                //not parent::__construct($pp1);

$tbl='song'; $rcount = $this->rrcount($tbl); // $sql, $binds = [], $caller = '' :
$cursor = $this->rr("SELECT * FROM $tbl", [], __FILE__ .' '.', ln '. __LINE__ ) ;
//$cursor = $this->rr('', $this, $tbl, "'1'='1' ORDER BY track", '*') ;

?>
<div class="container">

  <b><span id="ajax_pgtitle_box">Adressess (Links) count : </span><?=$rcount?></b>
         <!--input type="submit" name="submit_add_song" value="Add row" /-->
    &nbsp;&nbsp;&nbsp;<a href="<?=$this->pp1->module_url . QS . 'i/cr/'?>">Add row</a>

  &nbsp;&nbsp; <div style="display: inline;" >
    <button id="ajax_rcount_btn" 
            title="<?=$this->pp1->module_url.QS?>i/ajaxcountr/">
      Display rows count via jQuery Ajax in span id="ajax_rcount_box"
    </button>
    <span id="ajax_rcount_box"></span>
  </div>

  <!--             r o w c r e  frm  -->
  <!--div class="xxbox">
    <form action="<=$this->pp1->module_url . QS>i/c/t/song/" method="POST">
        <label>Artist</label><input type="text" name="artist" value="" required />
        <label>Track</label> <input type="text" name="track" value="" required />
        <label>Link</label>  <input type="text" name="link" value="" />

    </form>
  </div-->


  <!--        main content output : List of songs  -->
  <div class="xxbox">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
     <tr><td>Id</td><td>Artist</td><td>Track</td><td>Link</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        </thead>

    <tbody>
    <?php
    while ($r = $this->rrnext($cursor)) //foreach ($songs as $song) 
    { ?>
    <tr>
      <td><?php if (isset($r->id)) echo htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); ?></td>
      <td><?php if (isset($r->artist)) echo htmlspecialchars($r->artist, ENT_QUOTES, 'UTF-8'); ?></td>
      <td><?php if (isset($r->track)) echo htmlspecialchars($r->track, ENT_QUOTES, 'UTF-8'); ?></td>
      <td>
          <?php if (isset($r->link)) { ?>
            <a href="<?=htmlspecialchars($r->link, ENT_QUOTES, 'UTF-8')?>">
               <?=htmlspecialchars($r->link, ENT_QUOTES, 'UTF-8')?></a>
          <?php } ?>
      </td>
      <!-- $this->pp1->module_url . QS . 'song/d/'   call del_row glob. all sites method
           $this->pp1->module_url . QS . 'song/e/
      -->
      <td><a href="<?=$this->pp1->module_url . QS . 'i/d/t/song/id/'
            . htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8')?>">Del</a></td>
      
      <td><a href="<?=$this->pp1->module_url . QS . 'i/ur/t/song/id/' 
            .  htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8')?>">Edit</a></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
  </div>


    <p>You are in View: <?=__FILE__?></p>
</div>
