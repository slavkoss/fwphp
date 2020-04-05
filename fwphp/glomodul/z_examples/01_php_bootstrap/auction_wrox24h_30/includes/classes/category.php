<?php
/**
 * category.php
 */
class Category
{
  /**
   * Category ID
   * @var int
   */
  protected $cat_id;
  
  /**
   * Category Name
   * @var string
   */
  protected $cat_name;
  
  /**
   * Category Description
   * @var string
   */
  protected $cat_description;
  
  /**
   * Category Image path
   * @var string
   */
  protected $cat_image;

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
   * Return Category ID
   * @return int
   */
  public function getCat_id() {
    return $this->cat_id;
  }
  
  /**
   * Return Category Name
   * @return string
   */
  public function getCat_name() {
    return $this->cat_name;
  }
  
  /**
   * Return Category Description
   * @return string
   */
  public function getCat_description() {
    return $this->cat_description;
  }
  
  /**
   * Return Category Image path
   * @return string
   */
  public function getCat_image() {
    return $this->cat_image;
  }

  protected function _verifyInput() {
    $error = false; 
    if (!trim($this->cat_name)) {
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
      $query = "INSERT INTO categories(cat_name, cat_description, cat_image) 
        VALUES ('" . Database::prep($this->cat_name) . "',
         '" . Database::prep($this->cat_description) ."',
         '" . Database::prep($this->cat_image) . "')";
      
      // Run the MySQL statement
      if ($connection->query($query)) {
        $return = array('', 'Category Record successfully added.','');
    
        // add success message
        return $return;
      } else {
        // send fail message and return to categorymaint
      $return = array('contactmaint', 'No Category Record Added. Unable to create record.','');
      return $return;
      }
    } else {
      // send fail message and return to categorymaint
      $return = array('categorymaint', 'No Category Record Added. Missing required information.','');
      return $return;
    }
    
  }  

  static public function getCategories() {
    // clear the results
    $items = []; //'';
    // Get the connection 
    $connection = Database::getConnection();
    // Set up the query
    $query = 'SELECT * FROM `categories` ORDER BY cat_name';
  
   // Run the query
    $result_obj = '';
    $result_obj = $connection->query($query);
    // Loop through getting associative arrays, 
    // passing them to a new version of this class, 
    // and making a regular array of the objects
    try {  
      while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
        $items[]= new Category($result);
      }
      // pass back the results
        return($items);
    }
    
    catch(Exception $e) {
      return false;
    }
  
  }

  public static function getCategory($cat_id) {
    // Get the DB connection
    $connection = Database::getConnection();
    // Prepare the query
    $query = 'SELECT * FROM `categories` WHERE cat_id="'. (int) $cat_id.'"';
      
    // Run the MySQL command
    $result_obj = $connection->query($query);
    try {  
    while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
        $item = new Category($result);
      }
        // pass back the results
      return($item);
    }
    catch(Exception $e)
      {
        return false;
      }  
  }  

  public function editRecord() {
    // Verify the fields
    if ($this->_verifyInput()) {
      
      // Get the Database connection
      $connection = Database::getConnection();
      
      // Set up the prepared statement
      $query = 'UPDATE `categories` SET cat_name=?, cat_description=?, cat_image=? WHERE cat_id=?';
      $statement = $connection->prepare($query);
      // bind the parameters
      $statement->bind_param('sssi',$this->cat_name, $this->cat_description, $this->cat_image, $this->cat_id);
      if ($statement) {
        $statement->execute();
        $statement->close();
        // add success message
        $return = array('', 'Category Record successfully added.', '');
        return $return;
      } else {
        $return = array('categorymaint', 'No Category Record Added. Unable to create record.', (int) $this->cat_id);
        return $return;
      }

    } else {
      // send fail message and return to categorymaint
      $return = array('contactmaint', 'No Contact Record Added. Missing required information.', (int) $this->cat_id);
      return $return;
    }
    
  }

  public static function deleteRecord($id) {
    // Get the Database connection
    $connection = Database::getConnection();     
    // Set up query
    $query = 'DELETE FROM `categories` WHERE cat_id="'. (int) $id.'"';
    // Run the query
    if ($result = $connection->query($query)) {   
      $return = array('', 'Category Record successfully deleted.', '');
      return $return;
    } else {
      $return = array('categorydelete', 'Unable to delete Category.', (int) $id);
      return $return;
    }
  }

  public static function getCat_DropDown($selected = '') {
    // set up first option for selection if none selected
    $option_selected = '';
    if (!$selected) {
      $option_selected = ' selected="selected"';
    }
    
    // Get the categories
    $items = self::getCategories();

    $html  = array();
    
    $html[] = '<label for="cat_id">Choose Lot Category</label><br />';
    $html[] = '<select name="cat_id" id="cat_id">';
    
    foreach ($items as $i=>$item) { 
      // If the selected parameter equals the current category id then flag as selected
      if ((int) $selected == (int) $item->getCat_id()) {
        $option_selected = ' selected="selected"';
      }
      // set up the option line
      $html[]  =  '<option value="' . $item->getCat_id() . '"' . $option_selected . '>' . $item->getCat_name() . '</option>';
      // clear out the selected option flag
      $option_selected = '';
    }
    
    $html[] = '</select>';
    return implode("\n", $html);      
      
  }  
  
}
