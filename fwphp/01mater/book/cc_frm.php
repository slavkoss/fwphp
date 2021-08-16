<?php
/**
 * J:\awww\www\fwphp\01mater\book\cc_frm.php
 */
declare(strict_types=1);
// vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
namespace B12phpfw\module\book ; //invoice, book

use B12phpfw\core\b12phpfw\Config_allsites as utl; // init, setings, utils
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;  // model (fns) for all tbls
use B12phpfw\dbadapter\book\Tbl_crud as utl_module ; // model (fns) for this m odule tbl


    //require $pp1->module_path . 'hdr.php';

//$module_book_url = $pp1->wsroot_url . basename(dirname(dirname(__FILE__))) 
//           . '/'. basename(dirname(__FILE__)) . '/' ;
//$book = [] ;
//$warnings = [] ;


if ( isset ($_SESSION["ErrorMessage"]) and count($_SESSION["ErrorMessage"]) > 0 ) {
  echo '<pre>Error='; print_r($_SESSION["ErrorMessage"]) ; echo '</pre>';
  unset($_SESSION["ErrorMessage"]) ;
}

if (isset ($_SESSION["submitted_cc"])) {
  // Form was not submitted. Populate ($_POST) variables with user entered values
  list( $title, $author, $isbn, $publisher, $year, $summary ) = $_SESSION["submitted_cc"] ;
  unset ($_SESSION["submitted_cc"]) ;
} else { 
  // Form was submitted. Populate ($_POST) variables with default values
   list( $title, $author, $isbn, $publisher, $year, $summary ) = ['','','','','',''] ; 
}

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST['submit_add']) and $_POST['submit_add']) 
{
  // returns string, calls utldb
  utl_module::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //E n d  of Submit Button If-Condition


//see **1

$tbl='authors';
$c_rrauthors = utl_module::rr_suppliers( $sellst='*', $qrywhere='1=1' //$qrywhere='id=:id' 
  //[['placeh'=>':id', 'valph'=>$IdFromURL, 'tip'=>'int']] //str or int or no 'tip'
  , $binds = [] , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );
?>
<!--             
          Display  r o w c r e  f o r m
-->
  <br>
<div class="xxbox">
    <form action="<?=$pp1->cc_frm?>" method="POST">
      <!--a href="B2_cre_upd.php">Add book</a><br><br-->
          <!--label>Artist </label><input type="text" name="artist" value="" required />
          <label>Track </label> <input type="text" name="track" value="" required />
          <label>Link </label>  <input type="text" name="link" value="" />
          <input type="submit" name="submit_add" value="Add row" /

          (isset($_POST['title']))?utl::escp($_POST['title']):''
          (isset($_POST['isbn']))?utl::escp($_POST['isbn']):''
          isset($_POST['publisher']))?utl::escp($_POST['publisher']):''
          (isset($_POST['year']))?utl::escp($_POST['year']):''
          (isset($_POST['summary']))?utl::escp($_POST['summary']):''
          -->
      <table border="1" cellpadding="3" width="98%">

        <tr>
          <td width="15%">Title</td>
          <td width="85%"><input type="text" required autofocus
              name="title" value="<?=$title?>" size="100" style="width: 100%;" > </td>
        </tr>
        
        <tr>
          <td width="15%">Author</td>
          <td>
          <?php
                        if ('') foreach($authors as $authorid=>$author) 
                        {
                          // $_POST['author'] is authorID
                          // $authorid == $_POST['author'] ? 'selected' : ''
                          echo '<pre>$authorid='; print_r($authorid); 
                                  if (isset($_POST['authorid']) and $authorid==$_POST['authorid']) echo ' selected'; echo '</pre>';
                        }
          ?>
          <select name="author" style="width: 100%;">
          <option value="">Please select...</option>
          <?php
          //foreach($authors as $authorid=>$author)    htmlspecialchars(
          while ( $r = utldb::rrnext($c_rrauthors) and isset($r->id) ): 
          { ?>
            <option value="<?=$r->id?>"
              <?php
              //if (isset($_POST['authorid']) and $authorid==$_POST['authorid'])
              if (isset($_POST['authorid']) and $r->id == $_POST['authorid'])
                  echo ' selected'; ?>><?= utl::escp($r->lastName)?>
            </option>
            <?php 
          } endwhile; ?>
          </select>
          </td>
        </tr>
        
        <tr>
          <td width="15%">ISBN</td>
          <td><input type="text" name="isbn" size="10" 
                      value="<?=$isbn?>"> </td>
        </tr>
        
        <tr>
          <td width="15%">Publisher</td>
          <td><input type="text" name="publisher" size="100" style="width: 100%;"
                  value="<?=$publisher?>" ></td>
        </tr>
        
        <tr>
          <td width="15%">Year</td>
          <td><input type="text" name="year" size="4" value="<?=$year?>" ></td>
        </tr>
        
        <tr>
          <td width="15%">Summary</td>
          <td>
          <textarea name="summary" id="summary" class="editable" 
             maxlength="2048" style="width: 100%;" rows="1" 
             placeholder="summary" ><?=$summary?></textarea>
          </td>
        </tr>
        
        <tr>
        <td colspan="2" align="center">
        <!-- http://dev1:8083/fwphp/01mater/book/
              http://dev1:8083/fwphp/01mater/book/index.php/?i/cc_frm/
        -->
        <input type="submit" name="submit_add" value="Add row">
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
//**1
//    1. S U B M I T E D  A C T I O N S  - See if the form was submitted
if(isset($_POST['submit_add']) and $_POST['submit_add']) 
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

// 
//showHdr('Edit Author');
// If we have any w arnings, display them now
if(count($warnings)) {
  echo "<b>Please correct these errors:</b><br>";
  foreach($warnings as $w) {
     echo "- ", utl::escp($w), "<br>";
  }
}

-->
