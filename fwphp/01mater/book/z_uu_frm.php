<?php
/**
 *      <!-- u p d  r o w  f o r m -->
 * J:\awww\www\fwphp\01mater\book\uu_frm.php
 */
declare(strict_types=1);
// vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
namespace B12phpfw\module\book ; //invoice, book

use B12phpfw\core\b12phpfw\Config_allsites as utl; // init, setings, utils
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;  // model (fns) for all t b ls
use B12phpfw\dbadapter\book\Tbl_crud as utl_module ; // model (fns) for this m odule t b l


    //require $pp1->module_path . 'hdr.php'; 

if ( isset ($_SESSION["ErrorMessage"]) and count($_SESSION["ErrorMessage"]) > 0 ) {
  echo '<pre>Error='; print_r($_SESSION["ErrorMessage"]) ; echo '</pre>';
  unset($_SESSION["ErrorMessage"]) ;
}

//$tbl='authors';
$c_rrauthors = utl_module::rr_suppliers( $sellst='*', $qrywhere='1=1' //$qrywhere='id=:id' 
  //[['placeh'=>':id', 'valph'=>$I dFromURL, 'tip'=>'int']] //str or int or no 'tip'
  , $binds = [] , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );

//    1. S U B M I T E D  A C T I O N S
$is_submited_frm = $_POST['submit_uu'] ?? '' ;
if (!$is_submited_frm) {
  $id = (int)$pp1->uriq->id ; //in _GET
  $r = utl_module::rr_byid($id, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
} else {
   //$id = (int)$_POST['id'] ?? '' ; //in _POST
   $id = (int)$_SESSION['id'] ?? '' ; //in _POST
   $r = utl_module::row_flds_binds() ; // obj. view flds (empty, populated with defaults) 
   // calls utldb, returns obj. view flds populated with user entered values :
   $r_posted = utl_module::uu( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
}
                        if ('') {
                        echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS'.'</h3>';
                        echo '<pre>$is_submited_frm='; print_r($is_submited_frm) ; echo '</pre>';
                        echo '<pre>$id='; print_r($id) ; echo '</pre>';
                        echo '<pre>$r='; print_r($r) ; echo '</pre>';
                        echo '<pre>$r_posted='; print_r($r_posted ?? '') ; echo '</pre>';
                        }
//see **1  v a l i d a t i o n
?>



<!--div class="container"-->

<br>
<div class="xxbox">

         <!--h3>Add  r o w</h3-->

    <form action="<?=$pp1->uu_frm?>" method="POST">
      <!--
          <label>Artist </label><input type="text" name="artist" value="" required />
      -->
      <table border="1" cellpadding="3" width="98%">

        <tr>
          <td width="15%">Title</td>
          <td width="85%"><input type="text" required autofocus
              name="title" value="<?=$r->title?>" size="100" style="width: 99%;" > </td>
        </tr>


        
        <tr>
          <td width="15%">Author</td>
          <td>
            <select name="author" style="width: 100%;">
              <option value="">Please select...</option>
              <?php
                while ( $r_author = utldb::rrnext($c_rrauthors) and isset($r_author->id) ): 
                { ?>
                 <option value="<?=$r_author->id?>"
                     <?php
                     if (isset($_POST['authorid']) and $r_author->id == $_POST['authorid'])
                         {echo ' selected';} 
                     ?>
                  >
                   <?= utl::escp($r_author->lastName .' '. $r_author->firstName)?>
                 </option>
                  <?php 
                } endwhile; ?>
            </select>
          </td>
        </tr>


        
        <tr>
          <td width="15%">ISBN</td>
          <td width="85%"><input type="text" name="isbn" size="20" style="width: 99%;"
                      value="<?=$r->isbn?>"> </td>
        </tr>
        
        <tr>
          <td width="15%">Publisher</td>
          <td width="85%"><input type="text" name="publisher" size="100" style="width: 99%;"
                  value="<?=$r->publisher?>" ></td>
        </tr>
        
        <tr>
          <td width="15%">Year</td>
          <td width="85%"><input type="text" name="year" size="4" style="width: 99%;"
               value="<?=$r->year?>" ></td>
        </tr>
        
        <tr>
          <td width="15%">Summary</td>
          <td width="85%">
          <textarea name="summary" id="summary" class="editable" style="width: 99%;"
             maxlength="2048" style="width: 99%;" rows="5" 
             placeholder="summary" ><?=$r->summary?></textarea>
          </td>
        </tr>
        
        <tr>
        <td colspan="2" align="center">
        <!-- http://dev1:8083/fwphp/01mater/book/
              http://dev1:8083/fwphp/01mater/book/index.php/?i/uu_frm/
        -->
        <input type="hidden" name="authorid" value="<?=$r->author?>">
        <input type="hidden" name="id" value="<?=$id?>" />
        <input type="submit" name="submit_uu" value="Upd row">
        </td>
        </tr>
      </table>
    </form>
  <?php
  //require $pp1->module_path . 'ftr.php';  //showFtr();
  //echo '$module_book_url='. $module_book_url ;
  ?>


</div> <!-- class="xxbox" -->

  <p>You are in View: <?=__FILE__?></p>

<!--/div--><!-- cls container -->
