<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\lnktbl_crerec.php
/**
* Page allows you to lend a book


*/
// 
include('common.inc.php');
// First see if the request contains the book ID
// Return to b ooks.php if the ID invalid
$id = (int)$_REQUEST['book'];
$book = Model::getDetailByID($id);
if(!$book) {
  header("Location: index.php");
  exit;
}
// Now see if the form was submitted
$warnings = array();
if(isset($_POST['submit']) and $_POST['submit']) 
{
  // Require that the b orrower's name is entered
  if(!$_POST['name']) {
    $warnings[] = 'Please enter b orrower\'s name';
  }
  else {
    // Form is OK, "lend" the book
    if(!$book->lend($_POST['name'])) {
    // Failure, show error message
    $warnings[] = 'There are no more copies of
    this book available';
    }
  }
  // Now, if we don't have errors,
  // redirect back to b ooks.php
  if(count($warnings) == 0) {
    header("Location: index.php");
  exit;
  }
  // Otherwise, the warnings will be displayed
}
// 
showHdr('Lend Book');
// If we have any warnings, display them now
if(count($warnings)) {
  echo "<b>Please correct these errors:</b><br>";
  foreach($warnings as $w) {
    echo "- ", htmlspecialchars($w), "<br>";
  }
}


// Now display the form
?>
<form action="lnktbl_crerec.php" method="post">
  <input type="hidden" name="book" value="<?=$id?>">
  <b>Please enter b o r r o w e r's  n a m e:<br></b>
  <input type="text" name="name" 
         value="<?php
            if(isset($_POST['name']))      
              echo htmlspecialchars($_POST['name']);
            else echo ' ';
         ?>">
  <input type="submit" name="submit" value=" Lend book ">
</form>
<?php
// Display footer
showFtr();

