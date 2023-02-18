<?php
//Designing the Model

/**
* This is the central Model class. Use its static methods
* To retrieve by ID : book, author, borrower. Or all the books, authors, borrowers

Search "function " (18 hits in 1 file of 1 searched)
  J:\awww\www\fwphp\01mater\fw_popel\mdl.php (18 hits)
	Line 22:   static fn g etConn()
	Line 51:   static fn g etDetails()
	Line 65:   static fn g etDetailsWithMasters()
	Line 80:   static fn g etDetailsCount()
	Line 93:   static fn g etDetailByID($id)
	Line 103:  static fn d elDetail($id)
	Line 125:  static fn g etAuthors()
	Line 136:  static fn g etAuthorCount()
	Line 149:  static fn g etAuthor($id)
	Line 166:  static fn g etBorrowers()
	Line 177:  static fn g etBorrowerCount()
	Line 190:  static fn g etBorrower($id)

	Line 217:  fn g etAuthor()
	Line 230:  fn l end($name)
	Line 281:  fn g etDetails()
	Line 294:  fn g etDetailsCount()

	Line 321:  fn g etDetailByID()
	Line 331:  fn r eturnBook()

*/
class Model
{
  /**
  * This is the connection object returned by
  * Model::getConn()
  * @var PDO
  */
  private static $conn = null;
  /**
  * This method returns (singleton) connection object.
  * Singleton means : If it has not been yet created, this method instantiates it based on :
  * global variables $connStr, $user and $pass defined in common.inc.php
  * @Return PDO connection object
  */
  static function getConn()
  {
    if(!self::$conn) 
    {
      global $connStr, $user, $pass;
      try
      {
        // http://en.wikipedia.org/wiki/Singleton_pattern
        self::$conn = new PDO($connStr, $user, $pass);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
        showHdr('Error');
        showErr("Sorry, an error has occurred. Please
        try your request later\n" . $e->getMessage());
        }
      }
      return self::$conn;
  }




  /**
  * This method returns the list of all books
  * @return PDOStatement
  */
  static function getDetails()
  {
    $sql = "SELECT * FROM books ORDER BY title";
    $q = self::getConn()->query($sql);
    $q->setFetchMode(PDO::FETCH_CLASS, 'Book', array());
    return $q;
  }


  /**
  * This method returns the list of all books with
  * author's first and last names
  * @return PDOStatement
  */
  static function getDetailsWithMasters()
  {
    $sql = "SELECT books.*, authors.lastName, authors.firstName
    FROM books, authors
    WHERE books.author=authors.id
    ORDER BY title";
    $q = self::getConn()->query($sql);
    $q->setFetchMode(PDO::FETCH_CLASS, 'Book', array());
    return $q;
  }

  /**
  * This method returns the number of books in the database
  * @return int
  */
  static function getDetailsCount()
  {
    $sql = "SELECT COUNT(*) FROM books";
    $q = self::getConn()->query($sql);
    $rv = $q->fetchColumn();
    $q->closeCursor();
    return $rv;
  }
  /**
  *This method returns a book with given ID
  * @param int $id
  * @return Book
  */
  static function getDetailByID($id)
  {
    $id = (int)$id;
    $sql = "SELECT * FROM books WHERE id=$id";
    $q = self::getConn()->query($sql);
    $rv = $q->fetchObject('Book');
    $q->closeCursor();
    return $rv;
  }

  static function delProduct($id)
  {
    $conn = Model::getConn();
    $conn->beginTransaction();
    try {
    $conn->query("DELETE FROM books WHERE id=$id");
    $conn->commit();
    } catch(PDOException $e) {
    $conn->rollBack();
    throw $e;
    }
  }


  /**
  * This method returns the list of all authors
  * @return PDOStatement
  */
  static function getAuthors()
  {
  $sql = "SELECT * FROM authors ORDER BY lastName, firstName";
  $q = self::getConn()->query($sql);
  $q->setFetchMode(PDO::FETCH_CLASS, 'Author', array());
  return $q;
  }
  /**
  * This method returns the number of authors in the database
  * @return int
  */
  static function getAuthorCount()
  {
  $sql = "SELECT COUNT(*) FROM authors";
  $q = self::getConn()->query($sql);
  $rv = $q->fetchColumn();
  $q->closeCursor();
  return $rv;
  }
  /**
  *This method returns an author with given ID
  * @param int $id
  * @return Author
  */
  static function getAuthor($id)
  {
  $id = (int)$id;
  $sql = "SELECT * FROM authors WHERE id=$id";
  $q = Model::getConn()->query($sql);
  $rv = $q->fetchObject('Author');
  $q->closeCursor();
  return $rv;
  }




  /**
  * This method returns the list of all borrowers
  * @return PDOStatement
  */
  static function getBorrowers()
  {
  $sql = "SELECT * FROM borrowers ORDER BY dt";
  $q = self::getConn()->query($sql);
  $q->setFetchMode(PDO::FETCH_CLASS, 'Borrower', array());
  return $q;
  }
  /**
  * This method returns the number of borrowers in the database
  * @return int
  */
  static function getBorrowerCount()
  {
  $sql = "SELECT COUNT(*) FROM borrowers";
  $q = self::getConn()->query($sql);
  $rv = $q->fetchColumn();
  $q->closeCursor();
  return $rv;
  }
  /**
  *This method returns a borrower with given ID
  * @param int $id
  * @return BorrowedBook
  */
  static function getBorrower($id)
  {
  $id = (int)$id;
  $sql = "SELECT * FROM borrowers WHERE id=$id";
  $q = Model::getConn()->query($sql);
  $rv = $q->fetchObject('Borrower');
  $q->closeCursor();
  return $rv;
  }
}








/**
* This class represents a single book
*/
class Book
{
  /**
  * Return the author object for this book
  * @return Author
  */
  function getAuthor()
  {
    return Model::getAuthor($this->author);
  } 
  
  /**
  * This method is used to lend this book to the person
  * specified by $name. It returns the Borrower class
  * instance in case of success, or null in case when we cannot
  * lend this book due to insufficient copies left
  * @param string $name
  * @return Borrower
  */
  function lend($name)
  {
    $conn = Model::getConn();
    $conn->beginTransaction();
    try
    {
      $stmt = $conn->query("SELECT copies FROM books
      WHERE id=$this->id");
      $copies = $stmt->fetchColumn();
      $stmt->closeCursor();
      if($copies > 0) {
      // If we can lend it
      $conn->query("UPDATE books SET copies=copies-1
      WHERE id=$this->id");
      $stmt = $conn->prepare("INSERT INTO borrowers(book, name, dt)
      VALUES(?, ?, ?)");
      $stmt->execute(array($this->id, $name, time())); // bind
      // Success, get the newly created borrower ID
      $bid = $conn->lastInsertId();
      $rv = Model::getBorrower($bid);
      }
      else {
      $rv = null;
      }
      $conn->commit();
    }
    catch(PDOException $e)
    {
      // Something bad happened
      // Roll back and rethrow the exception
      $conn->rollBack();
      throw $e;
    }
    return $rv;
  }
}





/**
* This class represents a single author
*/
class Author
{
  /**
  * This method returns the list of books
  * written by this author
  * @return PDOStatement
  */
  function getDetails()
  {
    $sql = "SELECT * FROM books WHERE author=$this->id
    ORDER BY title";
    $q = Model::getConn()->query($sql);
    $q->setFetchMode(PDO::FETCH_CLASS, 'Book', array());
    return $q;
  }
  /**
  * This method returns the number of books
  * written by this author
  * @return int
  */
  function getDetailsCount()
  {
    $sql = "SELECT COUNT(*) FROM books WHERE author=$this->id";
    $q = Model::getConn()->query($sql);
    $rv = $q->fetchColumn();
    $q->closeCursor();
    return $rv;
  }
}








/**
* This class represents a single borrower
* (i.e., a record in the borrowers table)
*/
class Borrower
{
  /**
  * Return the book associated with this borrower
  * @return Book
  */
  function getDetailByID()
  {
  return Model::getDetailByID($this->book);
  }
  /**
  * This method "returns" a book.
  * After this method call, this object
  * is unusable as it does not represent
  * a data entity any more
  */
  function returnBook()
  {
    $conn = Model::getConn();
    $conn->beginTransaction();
    try
    {
      $book = $this->getDetailByID();
      $conn->query("DELETE FROM borrowers WHERE id=$this->id");
      $conn->query("UPDATE books SET copies=copies+1 WHERE id=$book->id");
      $conn->commit();
    }
    catch(PDOException $e)
    {
      $conn->rollBack();
      throw $e;
    }
  }
}


