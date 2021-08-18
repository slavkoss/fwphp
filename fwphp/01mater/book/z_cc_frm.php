<?php
/**
 *     <!-- c r e  r o w  f o r m -->
 * J:\awww\www\fwphp\01mater\book\cc_frm.php
 */
declare(strict_types=1);
// vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
namespace B12phpfw\module\book ; //invoice, book

use B12phpfw\core\b12phpfw\Config_allsites as utl; // init, setings, utils
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;  // model (fns) for all t b ls
use B12phpfw\dbadapter\book\Tbl_crud as utl_module ; // model (fns) for this m odule t b l

//$tbl='authors';
$c_rrauthors = utl_module::rr_suppliers( $sellst='*', $qrywhere='1=1' //$qrywhere='id=:id' 
  //[['placeh'=>':id', 'valph'=>$IdFromURL, 'tip'=>'int']] //str or int or no 'tip'
  , $binds = [] , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );

    //require $pp1->module_path . 'hdr.php';


if ( isset ($_SESSION["ErrorMessage"]) and count($_SESSION["ErrorMessage"]) > 0 ) {
  echo '<pre>Error='; print_r($_SESSION["ErrorMessage"]) ; echo '</pre>';
  unset($_SESSION["ErrorMessage"]) ;
}

//    1. S U B M I T E D  A C T I O N S
$is_submited_frm = $_POST['submit_cc'] ?? '' ;
$r = utl_module::row_flds_binds() ; // obj. view flds (empty, populated with defaults) 
if ($is_submited_frm) {
   // calls utldb, returns obj. view flds populated with user entered values :
   $r_posted = utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
}
                        //echo '<pre>$r='; print_r($r) ; echo '</pre>';
//see **1  v a l i d a t i o n
?>



<br>
<div class="xxbox">

         <!--h3>Add  r o w</h3-->

    <form action="<?=$pp1->cc_frm?>" method="POST">
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
              http://dev1:8083/fwphp/01mater/book/index.php/?i/cc_frm/
        -->
        <input type="hidden" name="authorid" value="<?=$r->author?>">
        <input type="submit" name="submit_cc" value="Add row">
        </td>
        </tr>
      </table>
    </form>
  <?php
  //require $pp1->module_path . 'ftr.php';  //showFtr();
  //echo '$module_book_url='. $module_book_url ;
  ?>


</div> <!-- class="xxbox" -->

<!--


                        /*
                        if (!isset ($_SESSION["submit_cc"])) {
                          // Form was submitted. Populate ($_POST) variables with default values
                           unset ($_SESSION["submit_cc"]) ;
                           list( $title, $author, $isbn, $publisher, $year, $summary ) = ['','','','','',''] ; 
                        } else { 
                          // Form was not submitted. Populate ($_POST) variables with user entered values
                          list( $title, $author, $isbn, $publisher, $year, $summary ) = $_SESSION["submit_cc"] ;
                          //unset ($_SESSION["submit_cc"]) ;
                        } */


// 
//showHdr('Edit Author');
// If we have any w arnings, display them now
if(count($warnings)) {
  echo "<b>Please correct these errors:</b><br>";
  foreach($warnings as $w) {
     echo "- ", utl::escp($w), "<br>";
  }
}


/*
//if(isset($_POST['submit_cc']) and $_POST['submit_cc']) 
if($_POST['submit_cc'] ?? '') {
  // returns string, calls utldb
  utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //E n d  of Submit Button If-Condition
*/


//$module_book_url = $pp1->wsroot_url . basename(dirname(dirname(__FILE__))) 
//           . '/'. basename(dirname(__FILE__)) . '/' ;
//$book = [] ;
//$warnings = [] ;



//**1  v a l i d a t i o n
//    1. S U B M I T E D  A C T I O N S  - See if the form was submitted
if(isset($_POST['submit_cc']) and $_POST['submit_cc']) 
{
  $warnings = [] ;  // Validate every field

  if(!$_POST['title']) // Title should be non-empty
    { $warnings[] = 'Please enter book title'; }
  // Published should be non-empty
  if(!$_POST['publisher']) {
  $warnings[] = 'Please enter publisher';
  }
  // Sumary should be non-empty
  if(!$_POST['summary']) {
  $warnings[] = 'Please enter summary';
  }
  /////////////
  // Year should be 4 digits
  if(!preg_match('~^\d{4}$~', $_POST['year'])) {
  $warnings[] = 'Year should be 4 digits';
  }
  /////////////
  // FK :
  if(!array_key_exists($_POST['author'], $a uthors))
    { $warnings[] = 'Please select author for the book'; }
  // ISBN should be a 10-digit number
  //if(!preg_match('~^\d{10}$~', $_POST['isbn'])) {
  if(count($_POST['isbn']) > 20) {
  $warnings[] = 'ISBN should be max 20 characters';
  }
  // If there are no errors, we can update the database
  // If there was book ID passed, update that book
  if(count($warnings) == 0) 
  {
    //if(@$book['id']) { $sql = "UPDATE books SET title=" . $conn->quote($_POST['title']) ...
    // returns string :
    utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
    //  $sql = "INSERT INTO books(title, author, isbn, publisher, year,summary) VALUES(" .
    // $conn->quote($_POST['title']) . ', ' . $conn->quote($_POST['author']) ...
    //$conn->query($sql);
    //header("Location: B1_tbl.php");
    header("Location: index.php?p=b1_tbl");
    exit;
  }
} //E n d  of Submit Button If-Condition
else {
  // Form was not submitted. Populate the $_POST array with the author's details
  $_POST = $book;
}


-->
