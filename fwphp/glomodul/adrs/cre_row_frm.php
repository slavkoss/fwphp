<?php
// J:\awww\www\fwphp\glomodul\adrs\cre_row_frm.php
declare(strict_types=1);
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\adrs ;

//vendor_namesp_prefix \ processing (behavior) \ cls dir 
use B12phpfw\core\b12phpfw\Db_allsites   as utldb ;
use B12phpfw\dbadapter\adrs\Tbl_crud as utl_adrs ;

if (isset ($_SESSION["submitted_cc"])) {
  list( $artist, $track, $link) = $_SESSION["submitted_cc"] ;
  unset ($_SESSION["submitted_cc"]) ;
} else { list( $artist, $track, $link) = ['','',''] ; }


//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["submit_add_song"])){
  // returns string
  utl_adrs::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //E n d  of Submit Button If-Condition

?>


<!--             r o w c r e  frm
http://dev1:8083/fwphp/glomodul/adrs/?i/c/t/song/
    <form action="<?=$pp1->module_url.QS?>i/c/t/song/" method="POST">
-->
  <br /><br />
  <div class="xxbox">


    <form action="<?=$pp1->module_url.QS?>i/cc/" method="POST">

        <label>Artist </label><input type="text" name="artist" value="" required />
        <label>Track </label> <input type="text" name="track" value="" required />
        <label>Link </label>  <input type="text" name="link" value="" />

        <input type="submit" name="submit_add_song" value="Add row" />
    </form>


  </div>
