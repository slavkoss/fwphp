<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\B2_cre_upd.php
// called so: 
//<a href="B2_cre_upd.php?bookid=?=$b->id?&authorid=?=$a->id?">Edit</a>
/**
* Page allows to add or edit b ook
*/
include('common.inc.php');
// See if we have the book ID passed in the request
if (isset($_REQUEST['bookid'])) $bookid = (int)$_REQUEST['bookid'];
else $bookid = '';
if($bookid) {
  // We have the ID, get the book details from the table
  $q = $conn->query("SELECT * FROM books WHERE id=$bookid");
  $book = $q->fetch(PDO::FETCH_ASSOC);
  $q->closeCursor();
  $q = null;
}
else {
  // We are creating a n ew book
  $book = array();
}

$warnings = array();


// Now get the list of all authors' first and last names
// We will need it to create the dropdown box for author
$authors = array();
$q = $conn->query("SELECT id, lastName, firstName FROM authors ORDER
BY lastName, firstName");
$q->setFetchMode(PDO::FETCH_ASSOC);
while($a = $q->fetch())
{
  $authors[$a['id']] = "$a[lastName], $a[firstName]";
}
//echo '<pre>$authors='; print_r($authors); echo '</pre>';
//echo '<pre>$_REQUEST[\'authorid\']='; print_r($_REQUEST['authorid']); echo '</pre>';
/*Array
(
    [4] => Author, Thisappl
    [1] => Delisle, Marc
    [3] => Popel, Dennis      
    [2] => Salehi, Sohail
)
*/
// Now see if the form was submitted
if(isset($_POST['submit']) and $_POST['submit']) 
{
  // Validate every field
  $warnings = array();
  // Title should be non-empty
  if(!$_POST['title'])
  {
  $warnings[] = 'Please enter book title';
  }
  // Author should be a key in the $authors array
  if(!array_key_exists($_POST['author'], $authors))
  {
  $warnings[] = 'Please select author for the book';
  }
  // ISBN should be a 10-digit number
  if(!preg_match('~^\d{10}$~', $_POST['isbn'])) {
  $warnings[] = 'ISBN should be 10 digits';
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
  if(count($warnings) == 0) {
  if(@$book['id']) {
  $sql = "UPDATE books SET title=" . $conn->quote($_POST['title']) .
  ', author=' . $conn->quote($_POST['author']) .
  ', isbn=' . $conn->quote($_POST['isbn']) .
  ', publisher=' . $conn->quote($_POST['publisher']) .
  ', year=' . $conn->quote($_POST['year']) .
  ', summary=' . $conn->quote($_POST['summary']) .
  " WHERE id=$book[id]";
  }
  else {
  $sql = "INSERT INTO books(title, author, isbn, publisher,
  year,summary) VALUES(" .
  $conn->quote($_POST['title']) .
  ', ' . $conn->quote($_POST['author']) .
  ', ' . $conn->quote($_POST['isbn']) .
  ', ' . $conn->quote($_POST['publisher']) .
  ', ' . $conn->quote($_POST['year']) .
  ', ' . $conn->quote($_POST['summary']) .
  ')';
  }
  // Now we are updating the DB.
  // We wrap this into a try/catch block
  // as an exception can get thrown if
  // the ISBN is already in the table
  try
  {
  $conn->query($sql);
  // If we are here that means that no error
  // We can return back to b ooks listing
  header("Location: index.php");
  exit;
  }
  catch(PDOException $e)
  {
  $warnings[] = 'Duplicate ISBN entered. Please correct';
  }
  }
}
else {
  // Form was not submitted.
  // Populate the $_POST array with the book's details
  $_POST = $book;
}



// 
showHeader('Edit Book');
// If we have any warnings, display them now
if(count($warnings)) {
echo "<b>Please correct these errors:</b><br>";
foreach($warnings as $w)
{
echo "- ", htmlspecialchars($w), "<br>";
}
}


// Now display the form
?>
<form action="B2_cre_upd.php" method="post">
<a href="B2_cre_upd.php">Add book...</a>

<table border="1" cellpadding="3" width="100%">
  <tr>
    <td width="15%">Title</td>
    <td width="85%">
    <input type="text" name="title" size="100" style="width: 100%;" autofocus
           value="<?=
      (isset($_POST['title']))?htmlspecialchars($_POST['title']):''?>">
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
//showFooter();


// Now iterate over every row and display it
while($r = $q->fetch())
{
?>
  <tr>
  <td><ahref="B1_profile.php?id=<?=$r['authorId']?>">
  <?=htmlspecialchars("$r[firstName] $r[lastName]")?></a></td>
  <td><?=htmlspecialchars($r['title'])?></td>
  <td><?=htmlspecialchars($r['isbn'])?></td>
  <td><?=htmlspecialchars($r['publisher'])?></td>
  <td><?=htmlspecialchars($r['year'])?></td>
  <td><?=htmlspecialchars($r['summary'])?></td>
  <td>
  <a href="editBook.php?bookid=<?=$r['id']?>">Edit</a>
  </td>
  </tr>
<?php
}

// Display footer
showFooter();


