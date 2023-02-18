<?php
// J:\awww\www\fwphp\glomodul\adrs\cre_row_frm.php
declare(strict_types=1);
//<!--  -->
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\adrs ;

//vendor_namesp_prefix \ processing (behavior) \ cls dir 
use B12phpfw\core\b12phpfw\Db_allsites   as utldb ;
use B12phpfw\dbadapter\adrs\Tbl_crud as db_module ;

//if (isset($pp1->stack_trace))
  $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ ;
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      //echo '<b>$pp1</b>='; print_r($pp1);
                      echo '<br><b>$_POST</b>='; print_r($_POST);
                      //echo '<br><b>form action</b>='; print_r($pp1->module_url.QS.'i/cc');
                    echo '</pre>'; }
//    1. S U B M I T E D  A C T I O N S
  // ================================== 
  //      Coge behind  l i n k  c c 
  //======================================= 
if(isset($_POST["submit_add"])){
  // returns string
      //exit(0) ;
  db_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 

  //   2. VALUES FOR  F O R M  F I E L D S
  //list( $artist, $track, $link) = ['','',''] ; 

} //E n d  of Submit Button If-Condition



?>


<!--             r o w c r e  frm
http://dev1:8083/fwphp/glomodul/adrs/?i /c/t/s ong/
    json_encode($pp1)
    <input type="hidden" name="pp1" value="< ?= htmlspecialchars(serialize($pp1->shared_dbadapter_obj)) ? >">
    div class="xxbox"
-->
  <br /><br />
  <div>

    <form action="<?=$pp1->module_url .'/'. QS?>i/cc" method="POST" enctype="multipart/form-data">

        <label>Artist </label><input type="text" name="artist" value="" required />
        <label>Track </label> <input type="text" name="track" value="" required />
        <label>Link </label>  <input type="text" name="link" value="" />

        <input type="submit" name="submit_add" value="Add row" />
    </form>

  </div>
