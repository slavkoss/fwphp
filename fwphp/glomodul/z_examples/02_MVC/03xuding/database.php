<?php
class Database
{
  private static $dbName = 'z_blogcms'; //'crud_tutorial' ;
  private static $dbHost = 'localhost' ;
  private static $dbUsername = 'root';
  private static $dbUserPassword = '';
   
  private static $pdodb  = null;
   
  public function __construct() { die('Init function is not allowed'); }
   
  public static function connect()
  {
     // One connection through whole application
     if ( null == self::$pdodb )
     {     
      try
      {
        self::$pdodb =  new PDO(
          "mysql:host=".self::$dbHost.";"
               ."dbname=".self::$dbName
           , self::$dbUsername, self::$dbUserPassword); 
           //echo sprintf( '<h3>%s</h3>', 'Connected' );
      }
      catch(PDOException $e)
      {
        die($e->getMessage()); 
      }
     }
     //echo sprintf( '<h3>%s</h3>', 'Existing connection' );
     return self::$pdodb;
  }
   
  public static function disconnect()
  {
      self::$pdodb = null;
  }
}
