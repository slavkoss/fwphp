<?php
// 
declare(strict_types=1);
//namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\book ; //invoice, fw_popel_onb12

//vendor_namesp_prefix \ processing (behavior) \ cls dir 
//use B12phpfw\core\zinc\Db_allsites as utldb ;
use B12phpfw\dbadapter\book\Tbl_crud as utl_book ; //utl_waybill

$book = [] ;
$warnings = [] ;

/* if (isset ($_SESSION["submitted_cc"])) {
  list( $artist, $track, $link) = $_SESSION["submitted_cc"] ;
  unset ($_SESSION["submitted_cc"]) ;
} else { list( $artist, $track, $link) = ['','',''] ; } */


//    1. S U B M I T E D  A C T I O N S  - See if the form was submitted
if(isset($_POST['submit_add']) and $_POST['submit_add']) 
{
  // Validate every field
  $warnings = [] ;
  // Title should be non-empty
  if(!$_POST['title'])
  {
  $warnings[] = 'Please enter book title';
  }
  // FK :
  if(!array_key_exists($_POST['author'], $authors))
  {
     $warnings[] = 'Please select author for the book';
  }
  // ISBN should be a 10-digit number
  //if(!preg_match('~^\d{10}$~', $_POST['isbn'])) {
  if(count($_POST['isbn']) > 20) {
  $warnings[] = 'ISBN should be max 20 characters';
  }
  // Published should be non-empty
  if(!$_POST['publisher']) {
  $warnings[] = 'Please enter publisher';
  }
  // Year should be 4 digits
  if(!preg_match('~^\d{4}$~', $_POST['year'])) {
  $warnings[] = 'Year should be 4 digits';
  }
  // Sumary should be non-empty
  if(!$_POST['summary']) {
  $warnings[] = 'Please enter summary';
  }
  // If there are no errors, we can update the database
  // If there was book ID passed, update that book
  if(count($warnings) == 0) 
  {
    //if(@$book['id']) { $sql = "UPDATE books SET title=" . $conn->quote($_POST['title']) ...
    // returns string :
    utl_book::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
    //  $sql = "INSERT INTO books(title, author, isbn, publisher, year,summary) VALUES(" .
    // $conn->quote($_POST['title']) . ', ' . $conn->quote($_POST['author']) ...
    //$conn->query($sql);
    //header("Location: B1_tbl.php");
    header("Location: index.php?p=b1_tbl");
    exit;
  }
} //E n d  of Submit Button If-Condition
else {
  // Form was not submitted.
  // Populate the $_POST array with the author's details
  $_POST = $book;
}

// 
//showHdr('Edit Author');
// If we have any w arnings, display them now
if(count($warnings)) {
  echo "<b>Please correct these errors:</b><br>";
  foreach($warnings as $w) {
     echo "- ", htmlspecialchars($w), "<br>";
  }
}



// Display f o r m
?>
<!--             r o w c r e  frm
http://dev1:8083/fwphp/glomodul/adrs/?i/c/t/song/
    <form action="<?=$pp1->module_url.QS?>i/c/t/song/" method="POST">
-->
  <br /><br />
  <div class="xxbox">


    <form action="<?=$pp1->module_url.QS?>i/cc/" method="POST">
      <a href="B2_cre_upd.php">Add book</a><br><br>
          <!--label>Artist </label><input type="text" name="artist" value="" required />
          <label>Track </label> <input type="text" name="track" value="" required />
          <label>Link </label>  <input type="text" name="link" value="" />
          <input type="submit" name="submit_add" value="Add row" /-->
      <table border="1" cellpadding="3" width="98%">

        <tr>
          <td width="15%">Title</td>
          <td width="85%">
            <input type="text" required autofocus
             name="title" size="100" style="width: 100%;" 
             value="<?=(isset($_POST['title']))?htmlspecialchars($_POST['title']):''?>"
             >
          </td>
        </tr>
        
        <tr>
          <td width="15%">Author</td>
          <td>
          <?php
          if ('0') foreach($authors as $authorid=>$author) 
          {
            // $_POST['author'] is authorID
            // $authorid == $_REQUEST['author'] ? 'selected' : ''
            echo '<pre>$authorid='; print_r($authorid); 
                    if (isset($_REQUEST['authorid']) and $authorid==$_REQUEST['authorid']) echo ' selected'; echo '</pre>';
          }
          ?>
          <select name="author" style="width: 100%;">
          <option value="">Please select...</option>
          <?php
          foreach($authors as $authorid=>$author) 
          {
            ?>
            <option value="<?=$authorid?>"
              <?php
              if (isset($_REQUEST['authorid']) and $authorid==$_REQUEST['authorid'])
                  echo ' selected'; ?>><?= htmlspecialchars($author)?>
            </option>
            <?php 
          } ?>
          </select>
          </td>
        </tr>
        
        <tr>
          <td width="15%">ISBN</td>
          <td>
          <input type="text" name="isbn" size="10"
          value="<?=
            (isset($_POST['isbn']))?htmlspecialchars($_POST['isbn']):''?>">
          </td>
        </tr>
        
        <tr>
          <td width="15%">Publisher</td>
          <td>
          <input type="text" name="publisher" size="100" style="width: 100%;"
          value="<?=
            (isset($_POST['publisher']))?htmlspecialchars($_POST['publisher']):''?>">
          </td>
        </tr>
        
        <tr>
          <td width="15%">Year</td>
          <td>
          <input type="text" name="year" size="4"
          value="<?=
            (isset($_POST['year']))?htmlspecialchars($_POST['year']):''?>">
          </td>
        </tr>
        
        <tr>
          <td width="15%">Summary</td>
          <td>
          <textarea name="summary" id="summary" class="editable" 
             maxlength="2048" style="width: 100%;" rows="1" 
             placeholder="summary" >
            <?=
            (isset($_POST['summary']))?htmlspecialchars($_POST['summary']):''
            ?>
          </textarea>
          </td>
        </tr>
        
        <tr>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="Save">
        </td>
        </tr>
      </table>
      <?php if(@$book['id']) { ?>
      <input type="hidden" name="bookid" value="<?=$book['id']?>">
      <?php } ?>
    </form>
  <?php
  // Display footer
  //showFtr();


  ?>



</div>
