<?php
/**
 * J:\awww\www\fwphp\glomodul\z_examples\01_PHP_bootstrap\auction_wrox24h_30\includes\classes\article.php
 *
 * Article class file
 *
 * @version  1.2 2011-02-03
 * @package  Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license  GNU General Public License
 * @since    Since Release 1.0
 */
/**
 * Article class
 *
 * @package  Smithside Auctions
 */
class Article extends Table
{
  
  /**
   * title
   * @var string
   */
  protected $title;
  
  /**
   * Text
   * @var String
   */
  protected $text;
  
  /**
   * Contact who created the article
   * @var int
   */
  protected $created_by;
  
  /**
   * Date & time created
   * @var datetime
   */
  protected $date_created;

  /**
   * Contact who modified the article
   * @var int
   */
  protected $modified_by;
  
  /**
   * Date & time modified
   * @var datetime
   */
  protected $date_modified;  

  /**
   * Author Information
   * @var Contact
   */
  protected $author;

  /**
   * Initialize the Article with data from database
   * @param array
   */
  public function __construct($input = false) {   
    parent::__construct($input);    
    $this->author = Contact::getContact($this->created_by);
  }
  
  /**
   * Return Title
   * @return string
   */
  public function getTitle() {
  return $this->title;
  }
  
  /**
   * Return Text
   * @return string
   */
  public function getText() {
  return $this->text;
  }
  
  /**
   * Return Created by
   * @return int
   */
  public function getCreated_by() {
  return $this->created_by;
  }
  
  /**
   * Return Created date/time
   * @return datetime
   */
  public function getDate_created() {
  return $this->date_created;
  }
  
  /**
   * Return Modified by
   * @return int
   */
  public function getModifiedBy() {
  return $this->modified_by;
  }
  
  /**
   * Return Modified date/time
   * @return datetime
   */
  public function getModified_by() {
  return $this->modified_by;
  }
  
  /**
   * Verify the Input
   * @return boolean
   */  
  protected function _verifyInput() {
    $error = false; 
    if (!trim($this->title)) {
      $error = true;
    } 
    if (!trim($this->text)) {
      $error = true;
    }
  
    if ($error) {
      return false;
    } else {
      return true;
    }
  }

  /**
   * Add a Row to the table
   * @return array (redirect content,message,id)
   */
  public function addRecord() {
  
    // Verify the fields
    if ($this->_verifyInput()) {
      // prepare the encrypted password
    
      // Get the Database connection
      $connection = Database::getConnection();
      
      // Prepare the data 
      $query = "INSERT INTO articles(title, text, created_by, 
        date_created, modified_by, date_modified) 
      VALUES ('" . Database::prep($this->title) . "',
       '" . Database::prep($this->text) . "',
       '" . (int) $_SESSION['user_id'] . "',
       CURRENT_TIMESTAMP,
       '" . (int) $_SESSION['user_id'] . "',
       CURRENT_TIMESTAMP)";
      // Run the MySQL statement 
      if ($connection->query($query)) {
      $return = array('', 'Article successfully added.', '');
    
      // add success message
      return $return;
      } else {
      // send fail message and return to contactmaint
      $return = array('articlemaint', 'No Article Added. Unable to create record.', '0');
      return $return;
      }
    } else {
      // send fail message and return to contactmaint
      $return = array('articlemaint', 'No Article Added. Missing required information.', '0');
      return $return;
    }
  
  }

  /**
   * Update a Row in the table
   * @return array (redirect content,message,id)
   */
  public function editRecord() {
    // Verify the fields
    if ($this->_verifyInput()) {
      
      // Get the Database connection
      $connection = Database::getConnection();
      
      // Prepare the data 
      $query = "UPDATE `articles` 
      SET `title` = '" . Database::prep($this->title) . "',
          `text` = '" . Database::prep($this->text) . "',
          `modified_by` = '" . (int) $_SESSION['user_id'] . "',
          `date_modified` = CURRENT_TIMESTAMP
          WHERE id='" . (int) $this->id . "'";
      // Run the MySQL statement 
      if ($connection->query($query)) {
      $return = array('', 'Article successfully updated.', '');
    
      // add success message
      return $return;
      } else {
      // send fail message 
      $return = array('articlemaint', 'Article not updated. Unable to update record.', (int) $this->id);
      return $return;
      }
    } else {
      // send fail message and return to maint
      $return = array('articlemaint', 'Article not updated. Missing required information.', '0');
      return $return;
    }
    
  }  

  /**
   * Delete a Row from the table
   * @param  int 
   * @return array (redirect content,message,id)
   */
  public static function deleteRecord($id) {
      // Get the Database connection
      $connection = Database::getConnection();     
      // Set up query
      $query = 'DELETE FROM `articles` WHERE id="'. (int) $id.'"';
      // Run the query
      if ($result = $connection->query($query)) {   
        $return = array('', 'Article successfully deleted.', '');
        return $return;
      } else {
        $return = array('articledelete', 'Unable to delete Article.', (int) $id);
        return $return;
      }
  }  

  /**
   * Get an Article
   * @param  int 
   * @return Article
   */
  public static function getArticle($id) {
    // Get the database connection
    $connection = Database::getConnection();
    // Set up the query
    $query = 'SELECT * FROM `articles` WHERE id="'. (int) $id.'"';
    // Run the MySQL command   
    $result_obj = '';    
      try {
        $result_obj = $connection->query($query);
        if (!$result_obj) {
          throw new Exception($connection->error);
        } else {
          $item = $result_obj->fetch_object('Article');
          if (!$item) {
            throw new Exception($connection->error);
          } else {
            // pass back the results
            return($item);
          }
        }
      }
      catch(Exception $e) {
        echo $e->getMessage();
      }
  }   

  /**
   * Get an array of Articles
   * @return array (Article)
   */
  public static function getArticles() {
    // clear the results
    $items = []; //'';
    // Get the connection  
    $connection = Database::getConnection();
    // Set up query
    $query = 'SELECT * FROM `articles` ORDER BY title';
    // Run the query
    $result_obj = '';
    $result_obj = $connection->query($query);
    // Loop through the results, 
    // passing them to a new version of this class, 
    // and making a regular array of the objects
    try {  
      while($result = $result_obj->fetch_object('Article')) {
        $items[]= $result;
      }
      // pass back the results
      return($items);
    }
    
    catch(Exception $e) {
      return false;
    }  
  }
  
}
