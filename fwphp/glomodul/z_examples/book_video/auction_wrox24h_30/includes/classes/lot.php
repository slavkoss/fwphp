<?php
/**
 * lot.php
 *
 * Lot class file
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
/**
 * Lot class
 *
 * @package    Smithside Auctions
 */
class Lot
{
  /**
   * Lot ID
   * @var int
   */
  protected $lot_id;
  
  /**
   * Lot Name
   * @var string
   */
  protected $lot_name;
  
  /**
   * Lot Description
   * @var string
   */
  protected $lot_description;
  
  /**
   * Lot Image path
   * @var string
   */
  protected $lot_image;
  
  /**
   * Lot Number
   * @var int
   */
  protected $lot_number;
  
  /**
   * Lot Price path
   * @var float
   */
  protected $lot_price;
  
  /**
   * Lot Catalog ID
   * @var int
   */
  protected $cat_id;

  /**
   * Initialize the Item
   * @param array
   */
  public function __construct($input = false) {
    if (is_array($input)) {
      foreach ($input as $key => $val) {
        // Note the $key instead of key. 
        // This will give the value in $key instead of 'key' itself
        $this->$key = $val;
      }
    }
  }

  /**
   * Return Lot ID
   * @return int
   */
  public function getLot_id() {
    return $this->lot_id;
  }
  
  /**
   * Return Lot Name
   * @return string
   */
  public function getLot_name() {
    return $this->lot_name;
  }
  
  /**
   * Return Lot Description
   * @return string
   */
  public function getLot_description() {
    return $this->lot_description;
  }
  
  /**
   * Return Lot Image path
   * @return string
   */
  public function getLot_image() {
    return $this->lot_image;
  }

  /**
   * Return Lot Number
   * @return int
   */
  public function getLot_number() {
    return $this->lot_number;
  }
  
  /**
   * Return Lot Price path
   * @return string
   */
  public function getLot_price() {
    return $this->lot_price;
  }  
  
  /**
   * Return Lot Category ID
   * @return string
   */
  public function getCat_id() {
    return $this->cat_id;
  }

  protected function _verifyInput() {
    $error = false; 
    if (!trim($this->lot_name)) {
      $error = true;
    } 
    if ($error) {
      return false;
    } else {
      return true;
    }
  }  
  
  public function addRecord() {
    
    // Verify the fields
    if ($this->_verifyInput()) {
    
      // Get the Database connection
      $connection = Database::getConnection();
        
      // Prepare the data
      $query = "INSERT INTO lots(lot_name, lot_description, lot_image, lot_number, lot_price, cat_id) 
        VALUES ('" . Database::prep($this->lot_name) . "',
         '" . Database::prep($this->lot_description) ."',
         '" . Database::prep($this->lot_image) . "',
         '" . (int) $this->lot_number . "',
         '" . (float) $this->lot_price . "',
         '" . (int) $this->cat_id . "'
       )";

      // Run the MySQL statement
      if ($connection->query($query)) {
        $return = array('', 'Lot Record successfully added.','');
    
        // add success message
        return $return;
      } else {
        // send fail message and return to categorymaint
      $return = array('lotmaint', 'No Lot Record Added. Unable to create record.','');
      return $return;
      }
    } else {
      // send fail message and return to categorymaint
      $return = array('lotmaint', 'No Lot Record Added. Missing required information.','0');
      return $return;
    }
    
  } 
  
  public function editRecord() {
    
    // Verify the fields
    if ($this->_verifyInput()) {
    
      // Get the Database connection
      $connection = Database::getConnection();
        
      // Prepare the data
      // Set up the prepared statement
      $query = 'UPDATE `lots` SET lot_name=?, lot_description=?, lot_image=?, lot_number=?, lot_price=?, cat_id=? WHERE lot_id=?';
      $statement = $connection->prepare($query);
      // bind the parameters
      $statement->bind_param('sssidii',$this->lot_name, $this->lot_description, $this->lot_image, $this->lot_number, $this->lot_price, $this->cat_id, $this->lot_id);
      // Run the MySQL statement
      if ($statement) {
        $statement->execute();
        $statement->close();
        // add success message
        $return = array('', 'Lot Record successfully added.');
      // add success message
        return $return;
      } else {
        $return = array('lotmaint', 'No Lot Record Added. Unable to create record.', '');
        return $return;
      }

    } else {
      // send fail message and return to categorymaint
      $return = array('lotmaint', 'No Lot Record Added. Missing required information.', (int) $this->lot_id);
      return $return;
    }
  }

  public static function deleteRecord($id) {
      // Get the Database connection
      $connection = Database::getConnection();     
      // Set up query
      $query = 'DELETE FROM `lots` WHERE lot_id="'. (int) $id.'"';
      // Run the query
      if ($result = $connection->query($query)) {   
        $return = array('', 'Lot Record successfully deleted.', '');
        return $return;
      } else {
        $return = array('lotdelete', 'Unable to delete Lot.', (int) $id);
        return $return;
      }
  }
  
  public static function getLot($id) {
  // clear the results
    $items = '';
    // Get the connection 
    $connection = Database::getConnection();
    // Set up the query  
    $query = 'SELECT * FROM `lots` WHERE lot_id="'.$id.'"';
    // Run the query   
    $result_obj = $connection->query($query);
    try {
      while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
        $item = new Lot($result);
      }
      // pass back the results
        return($item);
    }  
    catch(Exception $e)
    {
    echo $e->getMessage();
    }
  
  }

  static public function getLots($cat_id) {
    // clear the results
    $items = [];  //'';
    // Get the connection 
    $connection = Database::getConnection();
    // Set up the query
    $query = 'SELECT * FROM `lots` 
      WHERE cat_id="'. (int) $cat_id.'" ORDER BY lot_id';
  
   // Run the query
    $result_obj = '';
    $result_obj = $connection->query($query);
    // Loop through getting associative arrays, 
    // passing them to a new version of this class, 
    // and making a regular array of the objects
    try {  
      while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
        $items[]= new Lot($result);
      }
      // pass back the results
        return($items);
    }
    
    catch(Exception $e) {
      return false;
    }
  
  }
  
}
