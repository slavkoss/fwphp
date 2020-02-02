<?php
/**
 * Database class
 * For one point of database access
 */
class Database
{
  private static $_mysqlUser = 'root'; //'php24sql'
  private static $_mysqlPass = ''; //'hJQV8RTe5t'
  private static $_mysqlDb = 'smithside'; // tema  or  smithside
  private static $_hostName = 'localhost';
  private static $_connection = NULL;

  /**
   * Constructor
   */
  private function __construct(){
  }
  
  /**
   * Get the Database Connection
   * 
   * @return Mysqli
   */
  public static function getConnection() {
    if (!self::$_connection) {
      self::$_connection = @new mysqli(self::$_hostName, self::$_mysqlUser, self::$_mysqlPass, self::$_mysqlDb);
      if (self::$_connection->connect_error) {
        die('Connect Error: ' . self::$_connection->connect_error);
      } 
    }
    return self::$_connection;
  }
  
  public static function prep($value) { 
    if (MAGIC_QUOTES_ACTIVE) {
      // If magic quotes is active, remove the slashes
      $value = stripslashes($value);
    }
    // Escape special characters to avoid SQL injections
    $value = self::$_connection->real_escape_string($value);
    return $value;
  }

}
