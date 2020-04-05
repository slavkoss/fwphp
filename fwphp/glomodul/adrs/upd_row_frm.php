<?php
// J:\awww\www\fwphp\glomodul\adrs\upd_row_frm.php
//       <!-- u p d  r o w  f o r m -->
namespace B12phpfw ;

//$fle=basename(__FILE__); $lne=__LINE__; $mtd=__FILE__;
//require_once dirname(__DIR__) . '/get_ or_new_dbinstance.php' ; //Db_ all sites ?

                        if ('') {self::jsmsg( [ basename(__FILE__). //__METHOD__ .
                           ', line '. __LINE__ .' SAYS'=>'s002. BEFORE Rtbl'
                           ,'$this->pp1->dbi_obj'=>isset($this->pp1->dbi_obj)?:'NOT SET'
                           ,'$this->uriq'=>isset($this->uriq)?json_encode($this->uriq):'NOT SET'
                           ] ) ; }
$tbl='song'; 
//str or int or no 'tip' :
$binds[]=['placeh'=>':id', 'valph'=>(int)$this->uriq->id, 'tip'=>'int'];
// $sql, $binds = [], $caller = '' :
$c_rr=$this->rr("SELECT * FROM $tbl where id=:id",$binds,__FILE__.', ln '. __LINE__ ) ;

$r = $this->rrnext($c_rr); 
//while ($row_cnt = $this->rrnext($c_rcnt)): {$rcnt = $row_cnt ;} endwhile;
//$rcnt =  $rcnt->COUNT_ROWS ;

                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                  echo '<pre>';
                  echo '<b>$this->uriq</b>='; print_r($this->uriq);
                  echo '<b>$this->uriq->id</b>='; print_r($this->uriq->id);
                  echo '<br /><b>$r</b>='; print_r($r); //var_dump($r);
                  echo '</pre><br />';
                  }

if (!$r) { // r o w wasn't found, display error page  $errobj = new Error_C();
  $this->errmsg( '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
    . "r o w id=***{$this->uriq->id}*** does not exists in table $tbl"
       ."~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
  );
  exit(0) ;
}

$id = $this->escp((int)$r->id);
?>
<div class="container">
  <div>
    <h3>E d i t&nbsp; r o w</h3>

    <form action="<?=$this->pp1->module_url . QS?>i/u" method="POST">
      <label>Artist</label><input autofocus type="text" name="artist" 
         value="<?=$this->escp($r->artist)?>" required />
      
      <label>Track</label><input type="text" name="track" 
         value="<?=$this->escp($r->track)?>" required />
      
      <label>Link</label><input type="text" name="link" 
         value="<?=$this->escp($r->link)?>" />
      
      <input type="hidden" name="id" value="<?=$id?>" />
      
      <input type="submit" name="submit_update" value="Update id <?=$id?>" />
    </form>

  </div>
  <p>You are in View: <?=__FILE__?></p>

</div>

