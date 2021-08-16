<?php
// J:\awww\www\fwphp\01mater\book\uu_frm.php
declare(strict_types=1);

//       <!-- u p d  r o w  f o r m -->
namespace B12phpfw\module\book ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;  // init, setings, utils
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;    // model (fns) for all tbls
// model (fns) waybill compound module (more tbls) :
use B12phpfw\dbadapter\book\Tbl_crud  as utl_module ; 

$tbl='song'; 

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["submit_update"]))
{
  $cursor = utl_module::uu($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__]);

  utl::Redirect_to($pp1->module_url.QS.'i/rt/');
} //E n d  of Submit Button If-Condition
//$fle=basename(__FILE__); $lne=__LINE__; $mtd=__FILE__;
                        if ('') {self::jsmsg( [ basename(__FILE__). //__METHOD__ .
                           ', line '. __LINE__ .' SAYS'=>'s002. BEFORE Rtbl'
                           ,'$pp1->dbi_obj'=>isset($pp1->dbi_obj)?:'NOT SET'
                           ,'$pp1->uriq'=>isset($pp1->uriq)?json_encode($pp1->uriq):'NOT SET'
                           ] ) ; }

$c_rr = utl_module::rr( $sellst='*', $qrywhere='id=:id'
  , $binds = [['placeh'=>':id', 'valph'=>$IdFromURL, 'tip'=>'int']] //str or int or no 'tip'
  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );
//while ($row_cnt=$this->rrnext($c_rcnt)): {$rcnt=$row_cnt;} endwhile; $rcnt=$rcnt->COUNT_ROWS;
while ( $rx = utldb::rrnext($c_rr) and isset($rx->id) ): {$r = $rx ;} endwhile;
                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                  echo '<pre>';
                  echo '<b>$pp1->uriq</b>='; print_r($pp1->uriq);
                  echo '<b>$pp1->uriq->id</b>='; print_r($pp1->uriq->id);
                  echo '<br /><b>$r</b>='; print_r($r); //var_dump($r);
                  echo '</pre><br />';
                  }
if (!$r) { // r o w wasn't found, display error page  $errobj = new Error_C();
  $this->errmsg( '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
    . "r o w id=***{$pp1->uriq->id}*** does not exists in table $tbl"
       ."~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
  );
  exit(0) ;
}

//$id = utl::escp((int)$r->id);
?>
<div class="container">
  <div>
    <h3>E d i t&nbsp; r o w</h3>

    <form action="<?=$pp1->module_url.QS?>i/uu" method="POST">
      <label>Artist </label><input autofocus type="text" name="artist" 
         value="<?=utl::escp($r->artist)?>" required />
      
      <label>Track </label><input type="text" name="track" 
         value="<?=utl::escp($r->track)?>" required />
      
      <label>Link </label><input type="text" name="link" 
         value="<?=utl::escp($r->link)?>" />
      
      <input type="hidden" name="id" value="<?=$IdFromURL?>" />
      
      <input type="submit" name="submit_update" value="Update id <?=$IdFromURL?>" />
    </form>

  </div>
  <p>You are in View: <?=__FILE__?></p>

</div>

