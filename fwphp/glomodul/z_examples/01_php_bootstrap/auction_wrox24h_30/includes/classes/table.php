<?php
/**
 * table.php
 *
 * Table class file
 *
 * @version  1.2 2011-02-03
 * @package  Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license  GNU General Public License
 * @since    Since Release 1.0
 */
/**
 * Table class
 *
 * @package  Smithside Auctions
 */
class Table
{
  /**
   * ID
   * @var int
   */
  protected $id;

  /**
   * Initialize the class with data from database
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
   * Return ID
   * @return int
   */
  public function getId() {
  return $this->id;
  }  
  
}
