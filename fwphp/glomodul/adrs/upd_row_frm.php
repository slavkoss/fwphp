<?php
// J:\awww\www\fwphp\glomodul\adrs\upd_row_frm.php
// http://dev1:8083/fwphp/glomodul/adrs/?i/uu/id/44
// http://dev1:8083/fwphp/?i/uu

declare(strict_types=1);

//       <!-- u p d  r o w  f o r m -->
namespace B12phpfw\module\adrs ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;      // init, setings, utils
//use B12phpfw\core\b12phpfw\Db_allsites     as utldb ;    // model (fns) for all tbls
use B12phpfw\dbadapter\adrs\Tbl_crud   as db_module ; // model (fns) for song tbl

    $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__  ;
$tbl='song'; 

                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<span style="color: green; font-size: large; font-weight: bold;">This view script '.__FILE__ .'()'.', line '. __LINE__ .' SAID: '.'</span>'; 
                    echo '<pre>';
                    //echo '<b>$pp1->stack_trace</b>='; print_r($pp1->stack_trace); 
                    echo '<b>$pp1->urlqry_parts</b>='; print_r($pp1->urlqry_parts); 
                    //echo '<b>$_ GET</b>='; print_r($_GET); 
                    echo '</pre>'; 
                  }
//exit(0);
if (isset($pp1->urlqry_parts[3])) {
  $IdFromURL = (int)$pp1->urlqry_parts[3] ; // (int)utl::escp($uriq->id) 
} else { $IdFromURL = NULL ; }



//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["submit_update"]))
{
  $cursor_uu = db_module::uu($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__]);

  utl::Redirect_to($pp1->module_url.'/'.QS.'i/rrt/');
} //E n d  of Submit Button If-Condition

                        if ('') {self::jsmsg( [ basename(__FILE__). //__METHOD__ .
                           ', line '. __LINE__ .' said'=>'s002. BEFORE Rtbl'
                           ,'$pp1->dbi_obj'=>isset($pp1->dbi_obj)?:'NOT SET'
                           ,'$pp1->uriq'=>isset($pp1->uriq)?json_encode($pp1->uriq):'NOT SET'
                           ] ) ; }

$cursor = db_module::get_cursor(
    $sellst='*'
  , $qrywhere='id=:id'
  , $binds = [['placeh'=>':id', 'valph'=>$IdFromURL, 'tip'=>'int']] //str or int or no 'tip'
  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
);

while ( $rx = db_module::rrnext($cursor) and isset($rx->id) ): {$r = $rx ;} endwhile;
//$r = db_module::rrnext($cursor) ;
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h2>' ;
                  echo '<pre>';
                  echo '<b>$pp1->uriq</b>='; print_r($pp1->uriq);
                  echo '<b>$pp1->uriq->id</b>='; print_r($pp1->uriq->id);
                  echo '<br /><b>$r</b>='; print_r($r); //var_dump($r);
                  echo '</pre><br />';
                  }
if (!$r) { // r o w wasn't found, display error page  $errobj = new Error_C();
  $this->errmsg( '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h2>'
    . "r o w id=***{$pp1->uriq->id}*** does not exists in table $tbl"
       ."~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
  );
  exit(0) ;
}
?>


<div class="container">
  <div>
    <h3>E d i t&nbsp; r o w</h3>

    <form action="<?=$pp1->module_url.'/'.QS?>i/uu" method="POST">
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

