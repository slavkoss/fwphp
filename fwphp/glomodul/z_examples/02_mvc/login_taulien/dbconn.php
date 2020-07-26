<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\login_taulien\dbconn.php
// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
  exit('You do not have a config file');
}

class DB {

  protected static $con;

  private function __construct() {

    try {

      self::$con = new PDO(
        'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=z_blogcms', 'root', ''
      ); // dbname=login_course
      self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      //self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//uncomment on production sites
      self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
      self::$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    } catch (PDOException $e) {
      echo "Could not connect to database."; exit;
    }

  }


  public static function getConnection() {

    if (!self::$con) {
      new DB();
    }

    return self::$con;
  }
}

?>
