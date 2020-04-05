<?php
//Designing the Model

/**
* This is the central Model class. Use its static methods
* To retrieve a book, author, borrower by ID
* Or all the books, authors and borrowers
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
  * This method returns the connection object.
  * If it has not been yet created, this method
  * instantiates it based on the $connStr, $user and $pass
  * global variables defined in common.inc.php
  * @return PDO the connection object
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
        showHeader('Error');
        showError("Sorry, an error has occurred. Please
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
    $sql = "SELECT * FROM events ORDER BY event_title";
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
    $sql = "SELECT events.*, users.lastName, users.firstName
    FROM events, users
    WHERE events.user_id=users.user_id
    ORDER BY event_title";
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
    $sql = "SELECT COUNT(*) FROM events";
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
    $sql = "SELECT * FROM events WHERE event_id=$id";
    $q = self::getConn()->query($sql);
    $rv = $q->fetchObject('Book');
    $q->closeCursor();
    return $rv;
  }

  static function delDetail($id)
  {
    $conn = Model::getConn();
    $conn->beginTransaction();
    try
    {
    //$book = $this->getDetailByID();
    $conn->query("DELETE FROM events WHERE event_id=$id");
    $conn->commit();
    }
    catch(PDOException $e)
    {
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
  $sql = "SELECT * FROM users ORDER BY lastName, firstName";
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
  $sql = "SELECT COUNT(*) FROM users";
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
  $sql = "SELECT * FROM users WHERE user_id=$id";
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
* This c lass represents a single book
*/
class Book
{
  /**
  * Return the author object for this book
  * @return Author
  */
  function getAuthor()
  {
    return Model::getAuthor($this->event_id);
    //return Model::getAuthor($this->author); //user_name  event_title
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
      $stmt = $conn->query("SELECT copies FROM events
      WHERE event_id=$this->id");
      $copies = $stmt->fetchColumn();
      $stmt->closeCursor();
      if($copies > 0) {
      // If we can lend it
      $conn->query("UPDATE events SET copies=copies-1
      WHERE event_id=$this->id");
      $stmt = $conn->prepare("INSERT INTO borrowers(book, name, dt)
      VALUES(?, ?, ?)");
      $stmt->execute(array($this->id, $name, time()));
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
* This c lass represents a single author
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
    $sql = "SELECT * FROM events WHERE user_id=$this->id
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
    $sql = "SELECT COUNT(*) FROM events WHERE user_id=$this->id";
    $q = Model::getConn()->query($sql);
    $rv = $q->fetchColumn();
    $q->closeCursor();
    return $rv;
  }
}








/**
* This c lass represents a single borrower
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


