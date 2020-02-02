<?php
/**
 * menu.php
 *
 * Menu class file
 *
 * @version  1.2 2011-02-03
 * @package  Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license  GNU General Public License
 * @since    Since Release 1.0
 */
/**
 * Menu class
 *
 * @package  Smithside Auctions
 */
class Menu extends Table
{
  /**
   * Title
   * @var string
   */
  protected $title;
  
  /**
   * Link
   * @var String
   */
  protected $link;
  
  /**
   * Level
   * @var string
   */
  protected $level;
  
  /**
   * Order By
   * @var int
   */
  protected $orderby;
  
  /**
   * Return Title
   * @return string
   */
  public function getTitle() {
  return $this->title;
  }
  
  /**
   * Return Link
   * @return string
   */
  public function getLink() {
  return $this->link;
  }
  
  /**
   * Return Level
   * @return string
   */
  public function getLevel() {
  return $this->level;
  }
  
  /**
   * Return Order By
   * @return int
   */
  public function getOrderby() {
    return $this->orderby;
    }
    
    protected function _verifyInput() {
    $error = false; 
    if (!trim($this->title)) {
      $error = true;
    } 
    if (!trim($this->link)) {
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
      $query = "INSERT INTO menus (title, link, level, orderby) 
      VALUES ('" . Database::prep($this->title) . "',
       '" . Database::prep($this->link) . "',
       '" . Database::prep($this->level) . "',
       '" . (int) $this->orderby .  "')";
      var_dump($query);
      // Run the MySQL statement 
      if ($connection->query($query)) {
      $return = array('', 'Menu item successfully added.', '');
    
      // add success message
      return $return;
      } else {
      // send fail message and return to contactmaint
      $return = array('menumaint', 'No Menu Item Added. Unable to create record.', '');
      return $return;
      }
    } else {
      // send fail message and return to maint
      $return = array('menumaint', 'No Menu Item Added. 
        Missing required information.', '');
      return $return;
    }
  
  }
  
  public function editRecord() {
    // Verify the fields
    if ($this->_verifyInput()) {
      
      // Get the Database connection
      $connection = Database::getConnection();

      // update without a password changed
      // Set up the prepared statement
      $query = 'UPDATE `menus` SET title=?, link=?, level=?, orderby=? WHERE id=?';
      $statement = $connection->prepare($query);
      // bind the parameters
      $statement->bind_param('sssii',$this->title, $this->link, 
        $this->level, $this->orderby, $this->id);
    
      if ($statement) {
        $statement->execute();
        $statement->close();
        // add success message
        $return = array('', 'Menu Item successfully updated.', '');
        return $return;
      } else {
        $return = array('menumaint', 'Menu Item not changed. 
          Unable to change record.', (int) $this->id);
        return $return;
      }

    } else {
      // send fail message and return to categorymaint
      $return = array('menumaint', 'Menu Item not changed. 
        Missing required information.', (int) $this->id);
      return $return;
    }
    
  }

  public static function deleteRecord($id) {
      // Get the Database connection
      $connection = Database::getConnection();     
      // Set up query
      $query = 'DELETE FROM `menus` WHERE id="'. (int) $id.'"';
      // Run the query
      if ($result = $connection->query($query)) {   
        $return = array('', 'Menu Item successfully deleted.', '');
        return $return;
      } else {
        $return = array('menudelete', 'Unable to delete Menu item.', (int) $id);
        return $return;
      }
  }  


  public static function getMenus() {
    // clear the results
    $items = []; //Fatal err: [] operator not supported for strings : $items = '';
    // Get the connection  
    $connection = Database::getConnection();
    // Set up query
    $query = 'SELECT * FROM `menus` ORDER BY `orderby` ASC';
    // Run the query
    $result_obj = '';
    $result_obj = $connection->query($query);
    // Loop through the results, 
    // passing them to a new version of this class, 
    // and making a regular array of the objects
    try {  
      while($result = $result_obj->fetch_object('Menu')) {
        $items[]= $result;
      }
      // pass back the results
      return($items);
    }
    
    catch(Exception $e) {
      return false;
    }  
  }  
  /*public static function getMenus() {
    // clear the results
    $items = '';
    // Get the connection  
    $connection = Database::getConnection();
    // Set up query
    $query = 'SELECT * FROM `menus` ORDER BY `orderby` ASC';
    // Run the query
    $result_obj = '';
    $result_obj = $connection->query($query);
    // Loop through the results, 
    // passing them to a new version of this class, 
    // and making a regular array of the objects
    try {  
      while($result = $result_obj->fetch_object('Menu')) {
        $items[]= $result;
      }
      // pass back the results
      return($items);
    }
    
    catch(Exception $e) {
      return false;
    }  
  }  */
  
  public static function getMenu($id) {
    // Get the database connection
    $connection = Database::getConnection();
    // Set up the query
    $query = 'SELECT * FROM `menus` WHERE id="'. (int) $id.'"';
    // Run the MySQL command   
    $result_obj = '';    
      try {
        $result_obj = $connection->query($query);
        if (!$result_obj) {
          throw new Exception($connection->error);
        } else {
          $item = $result_obj->fetch_object('Menu');
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
  
  public function getLevel_DropDown() {
    // set up first option for selection if none selected
    $option_selected = '';
    if (!$this->level) {
      $option_selected = ' selected="selected"';
    }
    
    // Get the levels
    $items = array('Public', 'Registered', 'Admin', 'LoggedIn', 'LoggedOut');

    $html  = array();
    
    $html[] = '<label for="level">Choose Menu Level</label><br />';
    $html[] = '<select name="level" id="level">';
    
    foreach ($items as $i=>$item) { 
      // If the selected parameter equals the current then flag as selected
      if ($this->level == $item) {
        $option_selected = ' selected="selected"';
      }
      // set up the option line
      $html[]  =  '<option value="' . $item . '"' . $option_selected . '>' . $item . '</option>';
      // clear out the selected option flag
      $option_selected = '';
    }
    
    $html[] = '</select>';
    return implode("\n", $html);      
      
  }

  public static function setMenu() {
    $items = self::getMenus();
    $logged_in = Contact::isLoggedIn();
    $accessLevel = Contact::accessLevel();
    
    $html = array();
    
    $html[] = '<h3 class="element-invisible">Menu</h3>';
    $html[] = '<ul class="mainnav">';
    
    foreach ($items as $item) {
      if (!($item->level) 
        OR ($item->level == "Public")
        OR ($item->level == "Admin" AND $accessLevel == "Admin")
        OR ($item->level == "Registered" AND ($accessLevel == "Registered" OR $accessLevel == "Admin"))
        OR ($item->level == "LoggedIn" AND $logged_in)
        OR ($item->level == "LoggedOut" AND !$logged_in)) {   
          $html[] = '<li><a href="index.php?' . $item->link. '">' . $item->title. '</a></li>';
      }
    }

    $html[] = '</ul>';
    $return = implode("\n", $html) . "\n";
    return $return;
  }  
  
}
