<?php

namespace B12phpfw\PHPLoginAuthTut\login_pasw_hash ;

use \PDO as PDO ;

class DBconn {

  protected static $con;

  private function __construct() {

    if(!defined('__CONFIG__')) {  exit('You do not have a config file'); }

    try {
      self::$con = new PDO(
      'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=z_blogcms', 'root', ''
      );  //...dbname=login_course', 'root', 'root' );
      self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//uncomment on production sites
      self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
      self::$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    } catch (PDOException $e) {
      echo "Could not connect to database."; exit;
    }

  }


  public static function getConnection() {

    if (!self::$con) {
      new DBconn();
    }

    return self::$con;
  }
}

?>
